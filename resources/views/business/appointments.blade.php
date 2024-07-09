@extends('layouts.business-app-crud')
@extends('layouts.business-components.business-header')
@extends('layouts.business-components.business-footer')
@extends('layouts.business-components.business-sidebar')

<head>
    <link href="{{ asset('assets/css/business_tablecss.css') }}" rel="stylesheet">
</head>

@section('content')



    <h1 class="a">BUSINESS APPOINTMENTS</h1>
    <br>
    <table class="table table-striped datatable tablecss">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Customer Email</th>
                <th>Service Name</th>
                <th>Service Duration</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Additional Notes</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->user->name }}</td>
                    <td>{{ $appointment->user->email }}</td>
                    <td>{{ $appointment->service_name }}</td>
                    <td>{{ $appointment->service_duration }} mins</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->appointment_time }}</td>
                    <td>{{ $appointment->additional_notes }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>
                        <div style="display: flex;">
                            @if ($appointment->status == 'Done' || $appointment->status == 'No Show' || $appointment->status == 'Cancelled')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#viewModal-{{ $appointment->id }}" title="View Appointment">
                                    <i class="bi bi-card-heading"></i>
                                </button>
                            @elseif($appointment->status == 'Paid')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#viewModal-{{ $appointment->id }}" title="View Appointment">
                                    <i class="bi bi-card-heading"></i>
                                </button>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#doneModal-{{ $appointment->id }}" title="Mark as done">
                                    <i class="bi bi-check"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#cancelModal-{{ $appointment->id }}" title="Cancel Appointment">
                                    <i class="bi bi-archive"></i>
                                </button>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#noshowModal-{{ $appointment->id }}" title="No Show">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            @elseif($appointment->status == 'To Pay')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#viewModal-{{ $appointment->id }}" title="View Appointment">
                                    <i class="bi bi-card-heading"></i>
                                </button>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#payModal-{{ $appointment->id }}" title="Pay fee">
                                    <i class="bi bi-cash"></i>
                                </button>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#noshowModal-{{ $appointment->id }}" title="No Show">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                                {{-- <form action="{{ route('business-appointments.paid', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success"><i class="bi bi-cash"></i></button>
                                </form> --}}
                            @endif
                        </div>
                    </td>
                </tr>
                <!-- View Modal -->
                <div class="modal fade" id="viewModal-{{$appointment->id}}" tabindex="-1" aria-labelledby="viewModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel">Appointment information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Customer: {{ $appointment->user->name }}</p>
                                <p>Service: {{ $appointment->service_name }}</p>
                                <p>Service Duration: {{ $appointment->service_duration }} mins</p>
                                <p>Date and Time of Service: {{ $appointment->appointment_date }}
                                    {{ $appointment->appointment_time }}</p>
                                @if(!($appointment->additional_notes == null))
                                <p>Additional Notes: {{ $appointment->additional_notes }}</p>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Done Modal -->
                <div class="modal fade" id="doneModal-{{ $appointment->id }}" tabindex="-1"
                    aria-labelledby="doneModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="doneModalLabel">Mark as completed</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to mark this appointment as done?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('business-appointments.done', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success"><i class="bi bi-check"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cancel Modal -->
                <div class="modal fade" id="cancelModal-{{ $appointment->id }}" tabindex="-1"
                    aria-labelledby="cancelModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cancelModalLabel">Cancellation Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to cancel this appointment?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('business-appointments.cancel', $appointment->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-archive"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- No Show Modal -->
                <div class="modal fade" id="noshowModal-{{ $appointment->id }}" tabindex="-1"
                    aria-labelledby="noshowModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="noshowModalLabel">No Show Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to mark this appointment as a No Show?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('business-appointments.noshow', $appointment->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-secondary"><i
                                            class="bi bi-x-circle"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pay Modal -->
                <div class="modal fade" id="payModal-{{ $appointment->id }}" tabindex="-1"
                    aria-labelledby="payModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="payModalLabel">Payment Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to mark this appointment as paid?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('business-appointments.paid', $appointment->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success"><i class="bi bi-cash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {{-- <form action="{{ route('business-appointments.done', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success"><i class="bi bi-check"></i></button>
                                </form>
                                <form action="{{ route('business-appointments.cancel', $appointment->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-archive"></i></button>
                                </form>
                                <form action="{{ route('business-appointments.noshow', $appointment->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-secondary"><i class="bi bi-x-circle"></i></button>
                                </form> --}}
@endsection
