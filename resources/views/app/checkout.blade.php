@extends('layouts.app')

<head>
    <link href="{{ asset('assets/css/checkout.css') }}" rel="stylesheet">
</head>

@section('content')
    <div class="container">
        <div class="card">
            <img src="{{ asset('storage/' . $service->servicePicture) }}" class="card-img-top Bimage" alt="...">
            <div class="card-body">
                <h1 class="card-Title">Service Name: {{ $service->name }}</h1>
                <div class="container">
                    <div class="row">
                        <div class="col-3 col-md-2">
                            <label class="card-text label">Date:
                                <p>{{ $appointmentDate }}</p>
                            </label>
                        </div>
                        <div class="col-3 col-md-2">
                            <label class="card-text label">Time:
                                <p>{{ $appointmentTime }}</p>
                            </label>
                        </div>
                        <div class="col-3 col-md-2">
                            <label class="card-text label">Duration:
                                <p>{{ $service->duration }}</p>
                            </label>
                        </div>
                        <div class="col-3 col-md-2">
                            <label class="card-text label">Notes:
                                <p>{{ $additionalNotes }}</p>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-body">
                <h1 class="card-Title">Personal Information</h1>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label a">Name: </label>
                    <div class="col-sm-5">
                        <p>{{ $user->name }}</p>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label a">Email: </label>
                    <div class="col-sm-5">
                        <p>{{ $user->email }}</p>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label a">Phone Number: </label>
                    <div class="col-sm-5">
                        <p>09234567365</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="card-Title">Payment</h1>
                <label class="col-sm col-form-label a">Price: {{ $service->price }} </label>

                <p>
                <h3>Select Payment Method</h3>
                </p>
                <div class="container">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                            checked="">
                        <label class="btn btn-outline-primary" for="btnradio1">
                            <img src="{{ asset('assets/img/gcashIcon.png') }}" class="icon" height="55px"
                                width="60px"> GCash</label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off"
                            checked="">
                        <label class="btn btn-outline-primary" for="btnradio2">
                            <img src="{{ asset('assets/img/paymayaIcon.png') }}" class="icon" height="50px"
                                width="65px">
                            PayMaya</label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off"
                            checked="">
                        <label class="btn btn-outline-primary" for="btnradio3">
                            <img src="{{ asset('assets/img/metroBankIcon.png') }}" class="icon" height="55px"
                                width="70px"> MetroBank
                        </label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off"
                            checked="">
                        <label class="btn btn-outline-primary" for="btnradio4">
                            <img src="{{ asset('assets/img/overTheCounter.png') }}" class="icon" height="55px"
                                width="70px"> Over The
                            Counter</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5><b style="color: red">IMPORTANT!</b> <b>Please review the following terms before proceeding with your
                        payment:</b></h5>
                <ul>
                    <li>There will be a 10% charge for cancelling appointments</li>
                    <li>For over-the-counter (OTC) payments, a 30% downpayment is required. The remaining 70% can be paid
                        over the counter.</li>
                    <li>Once your appointment is confirmed and accepted by the business, it cannot be cancelled.</li>
                </ul>
            </div>
        </div>


        <div class="buttons">
            <div class="action_btn">
                <button type="button" class="btn btn-primary proceedBtn">Proceed</button>
                <button type="button" class="btn btn-danger proceedBtn">Cancel</button>
            </div>
            <form method="POST" action="{{ route('services.fakePayment', ['id' => $service->serviceProvider->id]) }}">
                @csrf
                <input type="hidden" name="service_name" value="{{ $service->name }}">
                <input type="hidden" name="service_provider_name" value="{{ $service->serviceProvider->name }}">
                <input type="hidden" name="service_duration" value="{{ $service->duration }}">
                <input type="hidden" name="appointment_date" value="{{ $appointmentDate }}">
                <input type="hidden" name="appointment_time" value="{{ $appointmentTime }}">
                <input type="hidden" name="additional_notes" value="{{ $additionalNotes }}">
                <button type="submit" class="btn btn-info">Fake Payment</button>
            </form>

            <form method="POST" action="{{ route('services.otcPayment', ['id' => $service->serviceProvider->id]) }}">
                @csrf
                <input type="hidden" name="service_name" value="{{ $service->name }}">
                <input type="hidden" name="service_provider_name" value="{{ $service->serviceProvider->name }}">
                <input type="hidden" name="service_duration" value="{{ $service->duration }}">
                <input type="hidden" name="appointment_date" value="{{ $appointmentDate }}">
                <input type="hidden" name="appointment_time" value="{{ $appointmentTime }}">
                <input type="hidden" name="additional_notes" value="{{ $additionalNotes }}">
                <button type="submit" class="btn btn-info">OTC Payment</button>
            </form>
        </div>
    </div>
    <br><br><br>
    </div>
@endsection
