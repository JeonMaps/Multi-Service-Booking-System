@extends('layouts.app')


@section('content')
<head>
    <link href="{{ asset('assets/css/business_tablecss.css') }}" rel="stylesheet">
</head>
    <div class="container">
        @include('layouts.flash-message')
        <h1 class="text">YOUR APPOINTMENTS</h1>

        <table class="table table-striped datatable tablecss">
            <thead>
                <tr>
                    <th>Service Provider</th>
                    <th>Service</th>
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
                        <td>{{ $appointment->service_provider_name }}</td>
                        <td>{{ $appointment->service_name }}</td>
                        <td>{{ $appointment->service_duration }} mins</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->appointment_time }}</td>
                        <td>{{ $appointment->additional_notes }}</td>
                        <td>{{ $appointment->status }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal-{{$appointment->id}}"
                                title="View Appointment">
                                <i class="bi bi-card-heading"></i>
                            </button>
                            @if ($appointment->status == 'Paid' || $appointment->status == 'To Pay')
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#cancelModal-{{$appointment->id}}" title="Cancel Appointment">
                                    <i class="bi bi-archive"></i>
                                </button>
                            @elseif ($appointment->status == 'Done')
                                <a class="btn btn-warning" href={{ route('appointments.show', $appointment->id) }}><i
                                        class="bi bi-star-fill"></i></a>
                            @endif
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
                                    <p>Business: {{ $appointment->service_provider_name }}</p>
                                    <p>Service: {{ $appointment->service_name }}</p>
                                    <p>Service Duration: {{ $appointment->service_duration }} mins</p>
                                    <p>Date and Time of Service: {{ $appointment->appointment_date }}
                                        {{ $appointment->appointment_time }}</p>
                                    <p>Additional Notes: {{ $appointment->additional_notes }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Cancel Modal -->
                    <div class="modal fade" id="cancelModal-{{$appointment->id}}" tabindex="-1" aria-labelledby="cancelModalLabel"
                        aria-hidden="true">
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                    <form action="{{ route('appointments.cancel', $appointment->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">Yes, Cancel the appointment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
