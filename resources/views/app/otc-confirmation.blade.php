<!-- app/order-confirmation.blade.php -->
@extends('layouts.app')

<head>
    <link href="{{ asset('assets/css/order-confirmation.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/servicepage.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

</head>
@section('content')
    <section class="py-5">
        <div class="container">



            <div class="row">
                <div class="col-lg-6 mx-auto">


                    <!-- CUSTOM BLOCKQUOTE -->
                    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">


                        <center>
                            <lottie-player src="{{ asset('assets/lottie/check.json') }}" background="transparent"
                                speed="1" style="width: 150px; height: 150px;" autoplay></lottie-player>
                        </center>
                        <h1>Booking Confirmed!</h1>
                        <p class="mb-0 mt-2 font-italic">Thank you for booking an appointment! Don't forget to pay Over The Counter on the day of your appointment!</p>

                        <p class="mb-0 mt-2 font-italic">Booking Details:</p>
                        <ul>
                            <li>Service Provider: {{ $appointment->service_provider_name }}</li>
                            <li>Service: {{ $appointment->service_name }}</li>
                            <li>Duration: {{ $appointment->service_duration }}</li>
                            <li>Date: {{ $appointment->appointment_date }}</li>
                            <li>Time: {{ $appointment->appointment_time }}</li>
                            <li>Notes: {{ $appointment->additional_notes }}</li>
                        </ul>
                        <div class="homebtn">
                            <a htype="button " class="btn default book-service-btn" href="{{ url('/home') }}">Home</a>
                        </div>
                    </blockquote><!-- END -->

                </div>
            </div>
        </div>
    </section>
@endsection
