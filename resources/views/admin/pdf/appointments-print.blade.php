<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12pt;
    }

    .text-center {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th {
        background-color: #eee;
        border: 1px solid #ccc;
        padding: 8px;
        font-weight: bold;
    }

    tr {
        border: 1px solid #ccc;
    }

    td {
        border: 1px solid #ccc;
        padding: 5px;
    }

    .page-header {
        margin-bottom: 20px;
    }

    .page-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 50px;
        border-top: 1px solid #ccc;
        text-align: center;
        font-size: 12px;
        padding-top: 10px;
    }

    .page-break {
        page-break-after: always;
    }
</style>
<h1 class="page-header text-center">APPOINTMENTS</h1>
@if($search!="none")
<h3 style="text-align:center;">Report for search query "{{$search}}"</h3>
@elseif($start_date!="none" && $end_date!="none")
<h3 style="text-align:center;">Report for dates "{{$start_date}}" to "{{$end_date}}"</h3>
@endif
<table class="table">
    <thead>
        <tr>
            <th>Customer</th>
            <th>Customer Email</th>
            <th>Service Provider</th>
            <th>Service Name</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appointments as $index => $appointment)
            <tr @if (($index + 1) % 10 == 0) class="page-break" @endif>
                <td>{{ $appointment->user->name }}</td>
                <td>{{ $appointment->user->email }}</td>
                <td>{{ $appointment->service_provider_name }}</td>
                <td>{{ $appointment->service_name }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->appointment_time }}</td>
                <td>{{ $appointment->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="page-footer">
    © Copyright MSABS ADMIN 2023
</div>
