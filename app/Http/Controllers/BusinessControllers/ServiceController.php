<?php

namespace App\Http\Controllers\BusinessControllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewBookingNotification;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently logged-in user's service_provider_id
        $serviceProviderId = auth()->user()->service_provider_id;

        // Get the services that are related to the user's service_provider_id
        $services = Service::where('service_provider_id', $serviceProviderId)->get();

        return view('business.services-crud.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.services-crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $category = ServiceProvider::find(auth()->user()->service_provider_id)->category;

        $service = new Service();
        $service->name = $data['name'];
        $service->description = $data['description'];
        $service->duration = $data['duration'];
        $service->price = $data['price'];
        $service->category = $category; // Set the category value
        $service->service_provider_id = auth()->user()->service_provider_id;
        if ($request->hasFile('servicePicture')) {
            $service->servicePicture = $request->file('servicePicture')->store('servicePictures', 'public');
        }
        $service->save();

        return redirect('/services')->with('success', 'Service has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);

        return view('business.services-crud.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('business.services-crud.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::where('id', $id)
            ->where('service_provider_id', auth()->user()->service_provider_id)
            ->firstOrFail();

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $category = ServiceProvider::find(auth()->user()->service_provider_id)->category;

        $service->name = $data['name'];
        $service->description = $data['description'];
        $service->duration = $data['duration'];
        $service->price = $data['price'];
        $service->category = $category;
        if ($request->hasFile('servicePicture')) {
            $service->servicePicture = $request->file('servicePicture')->store('servicePictures', 'public');
        }
        $service->save();

        return redirect('/services')->with('success', 'Service has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect('/services')->with('success', 'Service has been deleted successfully!');
    }

    public function bookService(Request $request)
    {
        // Validate input
        // $request->validate([
        //     'service_id' => 'required|integer',
        //     'appointment_date' => 'required|date',
        //     'appointment_time' => 'required',
        // ]);

        $serviceId = $request->input('service_id');
        $service = Service::find($serviceId);

        $user = auth()->user();

        $appointmentDate = $request->input('appointment_date');
        $appointmentTime = $request->input('appointment_time');
        $additionalNotes = $request->input('additional_notes');

        return view('app.checkout', compact('service', 'user', 'appointmentDate', 'appointmentTime', 'additionalNotes'));
    }

    public function checkout(Request $request)
    {
        $serviceId = $request->input('service_id');
        $service = Service::find($serviceId);

        $user = auth()->user();

        $appointmentDate = $request->input('appointment_date');
        $appointmentTime = $request->input('appointment_time');
        $additionalNotes = $request->input('additional_notes');

        return view('app.checkout', compact('service', 'user', 'appointmentDate', 'appointmentTime', 'additionalNotes'));
    }

    public function fakePayment(Request $request, $id)
    {
        $user = auth()->user();
        $appointment = Appointment::create([
            'user_id' => $user->id,
            'service_name' => $request->input('service_name'),
            'service_provider_name' => $request->input('service_provider_name'),
            'service_duration' => $request->input('service_duration'),
            'appointment_date' => $request->input('appointment_date'),
            'appointment_time' => $request->input('appointment_time'),
            'additional_notes' => $request->input('additional_notes'),
            'status' => 'Paid',
        ]);

        
        // send notification to service provider and admin
        $serviceProvider = User::where('service_provider_id', $id)->first();
        $admin = User::where('role', 'Admin')->first();

        $serviceProvider->notify(new NewBookingNotification($appointment));
        $admin->notify(new NewBookingNotification($appointment));

        
       return redirect()->route('services.orderConfirmation', $appointment->id);
    }

    public function otcPayment(Request $request, $id)
    {
        $user = auth()->user();
        $appointment = Appointment::create([
            'user_id' => $user->id,
            'service_name' => $request->input('service_name'),
            'service_provider_name' => $request->input('service_provider_name'),
            'service_duration' => $request->input('service_duration'),
            'appointment_date' => $request->input('appointment_date'),
            'appointment_time' => $request->input('appointment_time'),
            'additional_notes' => $request->input('additional_notes'),
            'status' => 'To Pay',
        ]);

        
        // send notification to service provider and admin
        $serviceProvider = User::where('service_provider_id', $id)->first();
        $admin = User::where('role', 'Admin')->first();

        $serviceProvider->notify(new NewBookingNotification($appointment));
        $admin->notify(new NewBookingNotification($appointment));

        
       return redirect()->route('services.otcConfirmation', $appointment->id);
    }

    public function orderConfirmation($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('app.order-confirmation', compact('appointment'));
    }

    public function otcConfirmation($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('app.otc-confirmation', compact('appointment'));
    }
}
