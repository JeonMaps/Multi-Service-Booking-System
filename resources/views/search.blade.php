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
                            <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>


            {{-- Category List Start --}}
            <form action="{{ route('home.filter') }}" method="GET">
                <div class="row p-2">
                    <div class="col-md-12 d-flex justify-content-start">
                        <label for="category" class="text-custom-2">Filter by category:</label>
                        <select name="category" id="category">
                            <option value="">All categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Search</button>
                    </div>
                </div>
            </form>

            <h1 style="color:black">Search results for "{{ $query }}"</h1>
            {{-- Service Provider card Start --}}
            <div class="row">
                @forelse($serviceProviders as $serviceProvider)
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
                @empty
                    <p style="color:black">No service providers found.</p>
                @endforelse
            </div>
            {{-- Service Provider Cards End --}}
        </div> {{-- Final Div --}}
    </div>
@endsection
