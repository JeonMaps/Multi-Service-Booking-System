<?php

namespace App\Http\Controllers\UserControllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ServiceProvider;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userAppointmentPage($id)
    {
        if (Auth::id() != $id) {
            return redirect()->route('user.appointments', Auth::id())->with('error', 'You are not authorized to view this page.');
        }

        $appointments = Appointment::where('user_id', $id)->get();

        return view('app.appointments', compact('appointments'));
    }
    public function businessAppointmentPage($id)
    {
        $user = Auth::user();
        $serviceProviderName = ServiceProvider::where('id', $user->service_provider_id)->value('name');


        $appointments = Appointment::where('service_provider_name', $serviceProviderName)->get();
        return view('business.appointments', compact('appointments'));
    }
    public function adminAppointmentPage()
    {
        $appointments = Appointment::paginate(5);
        return view('admin.appointments', compact('appointments'));
    }
    
    public function show($id)
    {
        $appointment = Appointment::where('appointment_id', $id);
        return view('show-appointment', compact('appointment'));
    }

    public function cancel(Appointment $appointment)
    {
        $appointment = Appointment::findOrFail($appointment);
        $user = auth()->user();

        // Check if the appointment belongs to the logged in user
        if ($appointment->user_id != $user->id) {
            return back()->with('error', 'Unauthorized access');
        }

        // Check if the appointment can be cancelled
        $appointmentDateTime = Carbon::parse($appointment->appointment_date . ' ' . $appointment->appointment_time);
        $now = Carbon::now();
        $cancellableTime = $appointmentDateTime->subHours(3); // Set the cancellable time to 3 hours before the appointment
        if ($now->gte($cancellableTime)) {
            return back()->with('error', 'The appointment is no longer cancellable.');
        }

        // Update the appointment status
        $appointment->update([
            'status' => 'Cancelled',
        ]);

        // Redirect back to the appointments page with a success message
        return redirect()->back()->with('error', 'Appointment has been cancelled.');
    }

    public function cancelBusiness(Appointment $appointment)
    {
        // Update the appointment status
        $appointment->update([
            'status' => 'Cancelled',
        ]);

        // Redirect back to the appointments page with a success message
        return redirect()->back()->with('error', 'Appointment has been cancelled.');
    }

    public function done(Appointment $appointment)
    {
        // Update the appointment status
        $appointment->update([
            'status' => 'Done',
        ]);

        // Redirect back to the appointments page with a success message
        return redirect()->back()->with('success', 'Appointment has been marked as done.');
    }

    public function noshow(Appointment $appointment)
    {
        $appointment->status = 'No Show';
        $appointment->save();

        return redirect()->back()->with('info', 'Appointment marked as no-show.');
    }

    public function paid(Appointment $appointment)
    {
        $appointment->status = 'Paid';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment marked as Paid.');
    }

    public function filterDate(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $appointments = Appointment::when($start_date, function ($query, $start_date) {
            return $query->whereDate('appointment_date', '>=', $start_date);
        })
            ->when($end_date, function ($query, $end_date) {
                return $query->whereDate('appointment_date', '<=', $end_date);
            })
            ->paginate(5)->appends(compact('start_date','end_date'));

        return view('admin.appointments', compact('appointments', 'start_date', 'end_date'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $appointments = Appointment::where(function ($query) use ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            })
                ->orWhere('service_provider_name', 'LIKE', '%' . $search . '%')
                ->orWhere('service_name', 'LIKE', '%' . $search . '%')
                ->orWhere('appointment_date', 'LIKE', '%' . $search . '%')
                ->orWhere('appointment_time', 'LIKE', '%' . $search . '%')
                ->orWhere('additional_notes', 'LIKE', '%' . $search . '%');
        })
            ->paginate(5)->appends(compact('search'));

        return view('admin.appointments', compact('appointments', 'search'));
    }

    public function generatePDF($search = null, $start_date = null, $end_date = null)
    {
        if ($search != "none") {
            $appointments = Appointment::where(function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%');
                })
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('service_provider_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('service_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('appointment_date', 'LIKE', '%' . $search . '%')
                    ->orWhere('appointment_time', 'LIKE', '%' . $search . '%')
                    ->orWhere('additional_notes', 'LIKE', '%' . $search . '%');
            })->get();
        } elseif ($start_date != "none" && $end_date != "none") {
            $appointments = Appointment::when($start_date, function ($query, $start_date) {
                return $query->whereDate('appointment_date', '>=', $start_date);
            })
                ->when($end_date, function ($query, $end_date) {
                    return $query->whereDate('appointment_date', '<=', $end_date);
                })
                ->get();
        } else {
            $appointments = Appointment::all();
        }
        $pdf = PDF::loadView('admin.pdf.appointments-print', compact('appointments','search','start_date','end_date'))->setPaper('a4','landscape');
        return $pdf->stream();
        //return $pdf->download('appointments-report.pdf');
    }
}
