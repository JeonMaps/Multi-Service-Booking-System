@extends('layouts.admin-app-crud')
@extends('layouts.admin-components.admin-header')
@extends('layouts.admin-components.admin-sidebar')


@section('content')
    <h1>ADMIN APPOINTMENTS</h1>
    <div class="row">
        <div class="col-md-3">
            @if (isset($search))
                <a class="btn btn-info"
                    href="{{ route('appointments.export', ['search' => $search, 'start_date' => 'none', 'end_date' => 'none']) }}">Generate
                    PDF Report</a>
            @elseif(isset($start_date) && isset($end_date))
                <a class="btn btn-info"
                    href="{{ route('appointments.export', ['search' => 'none', 'start_date' => $start_date, 'end_date' => $end_date]) }}">Generate
                    PDF Report</a>
            @else
                <a class="btn btn-info"
                    href="{{ route('appointments.export', ['search' => 'none', 'start_date' => 'none', 'end_date' => 'none']) }}">Generate
                    PDF Report</a>
            @endif
        </div>
    </div>

    <!-- Filter by date -->
    <form action="{{ route('appointments.filterDate') }}" method="GET">
        <div class="row mt-3">
            <div class="col-md-3">
                <input type="date" name="start_date" class="form-control" placeholder="Start Date" value="">
            </div>
            <div class="col-md-3">
                <input type="date" name="end_date" class="form-control" placeholder="End Date" value="">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Search -->
    <form action="{{ route('appointments.search') }}" method="GET">
        <div class="row mt-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search" value="">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <div class="row mt-3">
        <div class="col-md-12">
            @if (isset($search))
                <h4>Displaying search results for "{{ $search }}". Showing {{ count($appointments) }} search results.
                </h4>
            @elseif(isset($start_date) && isset($end_date))
                <h4>Date Filter from "{{ $start_date }}" to "{{ $end_date }}"</h4>
            {{-- @else
                <h4>Showing {{ count($appointments) }} search results.</h4> --}}
            @endif
            @if (count($appointments) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Customer Email</th>
                            <th>Service Provider</th>
                            <th>Service Name</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $appointment->user->name }}</td>
                                <td>{{ $appointment->user->email }}</td>
                                <td>{{ $appointment->service_provider_name }}</td>
                                <td>{{ $appointment->service_name }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->appointment_time }}</td>
                                <td>{{ $appointment->status }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#viewModal-{{ $appointment->id }}" title="View Appointment">
                                        <i class="bi bi-card-heading"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- View Modal -->
                            <div class="modal fade" id="viewModal-{{ $appointment->id }}" tabindex="-1"
                                aria-labelledby="viewModalLabel" aria-hidden="true">
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
                                            @if (!($appointment->additional_notes == null))
                                                <p>Additional Notes: {{ $appointment->additional_notes }}</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>There are no appointments with the search query: "{{ $search }}"</p>
            @endif
            {{ $appointments->links() }}
        </div>
    </div>
@endsection
