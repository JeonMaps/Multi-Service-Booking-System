@extends('layouts.app')

<head>

    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/home_shops_view.css') }}" rel="stylesheet">
</head>
@section('content')

    <div class="text-custom-1">
        {{-- Start of category list --}}
        {{-- <div class="container categ">
            <h3 class="texts"> Categories:</h3>
            <div class="grid-container">
                <div class="service-item">
                    <img src="{{ asset('assets/img/icons/haircut.png') }}" alt="Category 1">
                    <a href="#">Barber</a>
                </div>
                <div class="service-item">
                    <img src="{{ asset('assets/img/icons/hair-salon.png') }}" alt="Category 1">
                    <a href="#">Salon</a>
                </div>
                <div class="service-item">
                    <img src="{{ asset('assets/img/icons/carwash.png') }}" alt="Category 1">
                    <a href="#">Carwash</a>
                </div>
                <div class="service-item">
                    <img src="{{ asset('assets/img/icons/spa.png') }}" alt="Category 1">
                    <a href="#">Spa</a>
                </div>
                <div class="service-item">
                    <img src="{{ asset('assets/img/icons/pets.png') }}" alt="Category 1">
                    <a href="#">Pet Shop</a>
                </div>
                <div class="service-item">
                    <img src="{{ asset('assets/img/icons/medical-history.png') }}" alt="Category 1">
                    <a href="#">Medical</a>
                </div>
                <div class="service-item">
                    <img src="{{ asset('assets/img/icons/massage.png') }}" alt="Category 1">
                    <a href="#">Massage</a>
                </div>
                <div class="service-item">
                    <img src="{{ asset('assets/img/icons/cleaning.png') }}" alt="Category 1">
                    <a href="#">Cleaning</a>
                </div>
                <div class="service-item">
                    <img src="{{ asset('assets/img/icons/photography.png') }}" alt="Category 1">
                    <a href="#">Photography</a>
                </div>
                <div class="service-item">
                    <img src="{{ asset('assets/img/icons/fitness.png') }}" alt="Category 1">
                    <a href="#">Fitness</a>
                </div>
                <div class="service-item">
                    <img src="{{ asset('assets/img/icons/legal.png') }}" alt="Category 1">
                    <a href="#">Legal</a>
                </div>
                <div class="service-item">
                    <img src="{{ asset('assets/img/icons/accomodation.png') }}" alt="Category 1">
                    <a href="#">Accomodation</a>
                </div>
            </div> --}}
            {{-- End of category list --}}

            {{-- Start of NEW category list --}}

            <div class="container">
                <div class="carousel categ">
                    <div  class="item">
                        <div>
                            <img src="{{ asset('assets/img/icons/haircut.png') }}" width="50px" height="50px">
                        </div>
                        <h1><a href="#">Barber</a></h1>
                    </div>
                    <div  class="item">
                        <div>
                            <img src="{{ asset('assets/img/icons/hair-salon.png') }}" width="50px" height="50px">
                        </div>
                        <h1><a href="#">Salon</a></h1>
                    </div>
                    <div  class="item">
                        <div>
                            <img src="{{ asset('assets/img/icons/carwash.png') }}" width="50px" height="50px">
                        </div>
                        <h1><a href="#">Carwash</a></h1>
                    </div>
                    <div  class="item">
                        <div>
                            <img src="{{ asset('assets/img/icons/spa.png') }}" width="50px" height="50px">
                        </div>
                        <h1><a href="#">Spa</a></h1>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('assets/img/icons/pets.png') }}" width="50px" height="50px">
                        </div>
                        <h1><a href="#">Pet Shop</a></h1>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('assets/img/icons/medical-history.png') }}" width="50px" height="50px">
                        </div>
                        <h1><a href="#">Medical</a></h1>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('assets/img/icons/massage.png') }}" width="50px" height="50px">
                        </div>
                        <h1><a href="#">Massage</a></h1>
                    </div>
                    <div  class="item">
                        <div>
                            <img src="{{ asset('assets/img/icons/cleaning.png') }}" width="50px" height="50px">
                        </div>
                        <h1><a href="#">Cleaning</a></h1>
                    </div>
                    <div  class="item">
                        <div>
                            <img src="{{ asset('assets/img/icons/photography.png') }}" width="50px" height="50px">
                        </div>
                        <h1><a href="#">Photography</a></h1>
                    </div>
                    <div  class="item">
                        <div>
                            <img src="{{ asset('assets/img/icons/fitness.png') }}" width="50px" height="50px">
                        </div>
                        <h1><a href="#">Fitness</a></h1>
                    </div>
                    <div  class="item">
                        <div>
                            <img src="{{ asset('assets/img/icons/legal.png') }}" width="50px" height="50px">
                        </div>
                        <h1><a href="#">Legal</a></h1>
                    </div>
                    <div  class="item">
                        <div>
                            <img src="{{ asset('assets/img/icons/accomodation.png') }}" width="50px" height="50px">
                        </div>
                        <h1><a href="#">Accomodation</a></h1>
                    </div>
                </div>
            </div>


            {{-- End of NEW category list --}}

            <div class="container text-center my-3"> {{-- Card Carousel --}}

                <div class="input-group">
                    <form action="{{ route('search') }}" method="GET">

                        <div class="col-md-12 d-flex justify-content-end p-2">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control" placeholder="Search a business"
                                    aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-outline-dark" id="ser"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </form>

                    {{-- Category List Start --}}
                    <form action="{{ route('home.filter') }}" method="GET">
                        <div class="row p-2">
                            <div class="col-md-12 d-flex justify-content-start">
                                <select name="category" id="category">
                                    <option value="">All categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-dark" type="submit" id="cat"><i
                                        class="bi bi-filter"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <<<<<<< Updated upstream {{-- OLD Service Provider card Start --}}======={{-- OLD Service Provider card Start --}}>>>>>>> Stashed changes
                    {{-- <div class="row">
                @if ($serviceProviders->count() > 0)
                    @foreach ($serviceProviders as $serviceProvider)
                        <div class="col-md-3 mb-3">
                            <div class="card cardcontaine">
                                <div class="card-body">
                                    <figure>
                                        <img src="{{ $serviceProvider->logo ? asset('storage/' . $serviceProvider->logo) : asset('/images/no-image.png') }}"
                                            class="card-img-top" />
                                    </figure>
                                    <h5 class="card-title" style="color: black;">{{ $serviceProvider->name }}</h5>

                                    <div class="scrollbar" id="style-1">
                                        <div class="force-overflow">
                                            <p class="card-text" style="color: black;">{{ $serviceProvider->description }}
                                            </p>
                                        </div>
                                    </div>


                                    <a href="{{ route('service-providers.services', $serviceProvider->id) }}"
                                        class="viewserve">View Services</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p style="color:black">No service providers found.</p>
                @endif
            </div> --}}
                    {{-- OLD Service Provider Cards End --}}

                    {{-- TEST Service Provider card Start --}}
                    <div class="row">
                        @if ($serviceProviders->count() > 0)
                            @foreach ($serviceProviders as $serviceProvider)
                                <div class="col-md-3 mb-3">
                                    <a href="{{ route('service-providers.services', $serviceProvider->id) }}"
                                        class="card">
                                        <img src="{{ $serviceProvider->logo ? asset('storage/' . $serviceProvider->logo) : asset('/images/no-image.png') }}"
                                            class="card-img-top" />
                                        <div class="card__overlay">
                                            <div class="card__header">
                                                <div class="card__header-text">
                                                    <h3 class="card__title">{{ $serviceProvider->name }}</h3>
                                                </div>
                                            </div>
                                            <p class="card__description">{{ $serviceProvider->description }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p style="color:black">No service providers found.</p>
                        @endif
                    </div>
                    {{-- END TEST Service Provider Cards End --}}

                    <!--
                                <div class="row"> {{-- 2nd Card TEST Service Provider Cards --}}
                                    @if ($serviceProviders->count() > 0)
    @foreach ($serviceProviders as $serviceProvider)
    <div class="col-md-3 mb-3">
                                                <div class="card2">
                                                    <div class="card2-details">
                                                        <p class="card2-image"><img
                                                                src="{{ $serviceProvider->logo ? asset('storage/' . $serviceProvider->logo) : asset('/images/no-image.png') }}"
                                                                class="card-img-top" /></p>
                                                        <p class="text2-title">{{ $serviceProvider->name }}</p>
                                                        <p>
                                                            <span class="left">
                                                                Rating
                                                            </span>
                                                            <span class="Right">
                                                                $$$
                                                            </span>
                                                        </p>
                                                        <p>
                                                            <span class="left">
                                                                Address
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <button class="card2-button">View Services</button>
                                                </div>
                                            </div>
    @endforeach
@else
    <p style="color:black">No service providers found.</p>
    @endif
                                </div>{{-- END  2nd Card TEST Service Provider Cards --}}

                                <div class="row"> {{-- 2nd Card TEST Service Provider Cards --}}
                                    @if ($serviceProviders->count() > 0)
    @foreach ($serviceProviders as $serviceProvider)
    <div class="col-md-3 mb-3">
                                                <div class="card3">
                                                    <img src="{{ $serviceProvider->logo ? asset('storage/' . $serviceProvider->logo) : asset('/images/no-image.png') }}"
                                                        class="card-img-top" />
                                                    <div class="content3">
                                                        <h2>
                                                            <span class="title3">
                                                                {{ $serviceProvider->name }}
                                                            </span>
                                                        </h2>

                                                        <p class="rate3">
                                                            <span>Rate</span>
                                                            <span class="price3">
                                                                $$$ </span>
                                                        </p>

                                                        <p class="address3">
                                                            Address
                                                        </p>

                                                        <a href="#" class="action">
                                                            Find out more
                                                            <span aria-hidden="true">
                                                                →
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
    @endforeach
@else
    <p style="color:black">No service providers found.</p>
    @endif
                                </div>END  2nd Card TEST Service Provider Cards

                                -->

            </div>

        @endsection

        <script>
            $(document).ready(function() {
                if (!$.browser.webkit) {
                    $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
                }
            });
        </script>
