@extends('layouts.app')
<head>
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
</head>
@section('content')
    <div class="text-custom-1">

        <div class="container text-center my-3"> {{-- Card Carousel --}}

            <form action="{{ route('search') }}" method="GET">
                <div class="input-group">
                    <div class="col-md-4 d-flex justify-content-end p-2">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Search a business"
                                aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" class="btn btn-outline-dark"><i class="bi bi-search"></i></button>
                        </div>
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
                        <button class="btn btn-outline-dark" type="submit"><i class="bi bi-filter"></i></button>
                    </div>
                </div>
            </form>

            {{-- Service Provider card Start --}}
            <div class="row">
                @if($serviceProviders->count() > 0)
                @foreach ($serviceProviders as $serviceProvider)
                    <div class="col-md-3 mb-3">
                        <div class="card cardcontaine">
                            <div class="card-body">
                                <img src="{{ $serviceProvider->logo ? asset('storage/' . $serviceProvider->logo) : asset('/images/no-image.png') }}"
                                    class="card-img-top w-100" />
                                <h5 class="card-title" style="color: black;">{{ $serviceProvider->name }}</h5>

                                <div class="scrollbar" id="style-1">
                                    <div class="force-overflow">
                                        <p class="card-text" style="color: black;">{{ $serviceProvider->description }}</p>
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
            </div>
            {{-- Service Provider Cards End --}}
        </div> {{-- Final Div --}}
    </div>
@endsection
<script>
    $(document).ready(function() {
        if (!$.browser.webkit) {
            $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
        }
    });
</script>
