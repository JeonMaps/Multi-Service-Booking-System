@extends('layouts.admin-app-crud')
@extends('layouts.admin-components.admin-header')
@extends('layouts.admin-components.admin-sidebar')

<style>
    .button {
        appearance: none;
        background-color: transparent;
        border: 2px solid var(--green);
        border-radius: 15px;
        box-sizing: border-box;
        color: var(--black);
        cursor: pointer;
        display: inline-block;
        font-family: Roobert, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        font-size: 14px;
        font-weight: 600;
        line-height: normal;
        margin: 0;
        min-height: 30px;
        min-width: 0;
        outline: none;
        padding: 8px 12px;
        text-align: center;
        text-decoration: none;
        transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: 50%;
        will-change: transform;
    }

    .button:disabled {
        pointer-events: none;
    }

    .button:hover {
        color: white;
        background-color: var(--green);
        box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
        transform: translateY(-2px);
    }

    .button:active {
        box-shadow: none;
        transform: translateY(0);
    }
</style>

@section('content')
    <h1>Service Providers</h1>

    <a href="{{ route('service-providers.create') }}" class="btn btn-success mb-3">Create Service Provider</a>

    <table class="table table-striped datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Phone Number</th>
                <th>Category</th>
                <th>Rating</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($serviceProviders as $serviceProvider)
                <tr>
                    <td>{{ $serviceProvider->id }}</td>
                    <td>{{ $serviceProvider->name }}</td>
                    <td><img src="{{ $serviceProvider->logo ? asset('storage/' . $serviceProvider->logo) : asset('/images/no-image.png') }}"
                            alt="Service Provider Image" class="img-fluid" width="150" height="150"></td>
                    <td>{{ $serviceProvider->phone_number }}</td>
                    <td>
                        @foreach ($serviceProvider->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </td>
                    <td>{{ $serviceProvider->rating }}</td>
                    <td>{{ $serviceProvider->location }}</td>
                    <td>
                        <div class="row text-center">
                                <form action="{{ route('service-providers.destroy', ['id' => $serviceProvider->id]) }}"
                                    method="POST" style="display: inline-block;">
                                    @csrf
                                    <a href="{{ route('service-providers.show', ['id' => $serviceProvider->id]) }}"
                                        class="button">View</a>
                                    <a href="{{ route('service-providers.edit', ['id' => $serviceProvider->id]) }}"
                                        class="button">Edit</a>
                                    @method('DELETE')
                                    <button type="submit" class="button"
                                        onclick="return confirm('Are you sure you want to delete this service provider?')">Delete</button>
                                </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
