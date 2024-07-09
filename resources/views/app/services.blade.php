@extends('layouts.app')

<head>
    <link href="{{ asset('assets/css/servicepage.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/button.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

@section('content')
    <div class="back">
        <div class="container my-3">
            <div class="row parent">
                <div class="col-md-12">
                    <div class="container mb-12 ">
                        <div class="container">

                            <div>
                                <img class="bImage" img
                                    src="https://fakeimg.pl/1920x1080/?text={{ $serviceProvider->name }}">
                            </div>

                            <!--MODALL-->
                            <!-- Button trigger modal -->
                            <button type="button" class="custb reviewBtn" data-bs-toggle="modal" data-bs-target="#rev">
                                Reviews & Comment
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="rev" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Reviews </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Reviews and everything
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--END MODALL-->

                            <p>{{ $serviceProvider->description }}</p>
                            <p>Category: {{ $serviceProvider->category }}</p>
                            <p>Rating: {{ $serviceProvider->rating }}</p>
                            <p>Location: {{ $serviceProvider->location }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Services Offered</h3>
            <div class="blackfont">
                <div class="col-md-12">
                    <div class="row ">
                        @foreach ($serviceProvider->services as $service)
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row serviceCard">
                                            <div class="col-md-3">
                                                <td><img src="{{ $service->servicePicture ? asset('storage/' . $service->servicePicture) : asset('/images/no-image.png') }}"
                                                        alt="{{ $service->name }} Image" class="img-fluid servepic"></td>
                                            </div>
                                            <div class="col-md-9">
                                                <h5 class="card-title cTitle"><b>Name:</b> {{ $service->name }} </h5>
                                                <p><b>Description:</b>
                                                    {{ $service->description }}</p>
                                                <p><b>Duration: </b> {{ $service->duration }} mins</p>
                                                <p><b>Price: {{ $service->price }}</b> PHP</p>
                                                <a htype="button " class="custb book-service-btn" data-bs-toggle="modal"
                                                    data-bs-target="#" data-service-id="{{ $service->id }}"
                                                    data-service-name="{{ $service->name }}"
                                                    data-service-description="{{ $service->description }}"
                                                    data-service-price="{{ $service->price }}"
                                                    data-service-picture="{{ $service->servicePicture }}">Book an
                                                    appointment
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->



        {{-- blackfont end --}}
    </div>
    </div>

    <!-- Service Details Modal -->
    <div class="modal fade" id="bookServiceModal" tabindex="-1" aria-labelledby="bookServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookServiceModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Additional information about the service -->
                    <img src="" alt="Service Picture" id="modal-service-picture" class="img-fluid">
                    <p id="serviceModalDescription"></p>
                    <span>Price: </span>
                    <p id="serviceModalPrice"></p>

                    <!-- Input fields for the appointment details -->
                    <form method="POST" action="{{ route('services.book') }}">
                        @csrf
                        <input type="hidden" name="service_id" id="service-id">
                        <div class="form-group">
                            <label for="appointment-time">Appointment Time</label>
                            <input type="time" name="appointment_time" class="form-control" id="appointmentTime"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="appointment-date">Appointment Date</label>
                            <input type="date" name="appointment_date" class="form-control" id="appointmentDate"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="notes">Additional Notes</label>
                            <textarea name="additional_notes" class="form-control" id="notes" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/services.js') }}" defer></script>
    <script>
        $(document).ready(function() {
            $('.book-service-btn').click(function() {
                var service_id = $(this).data('service-id');
                var service_name = $(this).data('service-name');
                var service_description = $(this).data('service-description');
                var service_price = $(this).data('service-price');
                var service_picture = $(this).data('service-picture');

                $('#bookServiceModalLabel').html(service_name);
                $('#serviceModalDescription').html(service_description);
                $('#serviceModalPrice').html(service_price);
                $('#service-id').val(service_id);
                $('#modal-service-picture').attr('src', "{{ asset('storage/') }}/" + service_picture);

                $('#bookServiceModal').modal('show');
            });
        })
    </script>
@endsection
