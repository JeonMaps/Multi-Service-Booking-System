@extends('layouts.business-app-crud')
@extends('layouts.business-components.business-header')
@extends('layouts.business-components.business-footer')
@extends('layouts.business-components.business-sidebar')

@section('content')
    <h1>Service Details</h1>

    <table class="table table-striped">
        <tbody>
            <tr>
                <th>ID:</th>
                <td>{{ $service->id }}</td>
            </tr>
            <tr>
                <th>Name:</th>
                <td>{{ $service->name }}</td>
            </tr>
            <tr>
                <th>Description:</th>
                <td>{{ $service->description }}</td>
            </tr>
            <tr>
                <th>Category:</th>
                <td>{{ $service->category }}</td>
            </tr>
            <tr>
                <th>Duration:</th>
                <td>{{ $service->duration }}</td>
            </tr>
            <tr>
                <th>Price:</th>
                <td>{{ $service->price }}</td>
            </tr>
            <tr>
                <th>Picture of Service:</th>
                <td><img src="{{ $service->servicePicture ? asset('storage/' . $service->servicePicture) : asset('/images/no-image.png')}}" alt="Service Provider Image"></td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('services.edit', ['id' => $service->id]) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('services.destroy', ['id' => $service->id]) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this service provider?')">Delete</button>
    </form>
@endsection
