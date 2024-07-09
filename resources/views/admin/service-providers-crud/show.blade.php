@extends('layouts.admin-app-crud')
@extends('layouts.admin-components.admin-header')
@extends('layouts.admin-components.admin-sidebar')


@section('content')
        <h1>Service Provider Details</h1>

        <table class="table table-striped">
            <tbody>
                <tr>
                    <th>ID:</th>
                    <td>{{ $serviceProvider->id }}</td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td>{{ $serviceProvider->name }}</td>
                </tr>
                <tr>
                    <th>Phone Number:</th>
                    <td>{{ $serviceProvider->phone_number }}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{ $serviceProvider->description }}</td>
                </tr>
                <tr>
                    <th>Category:</th>
                    <td>{{ $serviceProvider->category }}</td>
                </tr>
                <tr>
                    <th>Rating:</th>
                    <td>{{ $serviceProvider->rating }}</td>
                </tr>
                <tr>
                    <th>Location:</th>
                    <td>{{ $serviceProvider->location }}</td>
                </tr>
                <tr>
                    <th>Logo:</th>
                    <td><img src="{{ $serviceProvider->logo ? asset('storage/' . $serviceProvider->logo) : asset('/images/no-image.png') }}"
                            alt="Service Provider Image" class="img-fluid" width="500"
                            height="500"></td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('service-providers.edit', ['id' => $serviceProvider->id]) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('service-providers.destroy', ['id' => $serviceProvider->id]) }}" method="POST"
            style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this service provider?')">Delete</button>
        </form>
@endsection
