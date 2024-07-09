@extends('layouts.business-app-crud')
@extends('layouts.business-components.business-header')
@extends('layouts.business-components.business-footer')
@extends('layouts.business-components.business-sidebar')

<head>
    <link href="{{ asset('assets/css/business_tablecss.css') }}" rel="stylesheet">
</head>
@section('content')
            <h1 class="a">Services</h1>

            <a href="{{ route('services.create') }}" class="btn btn-success mb-3">Create Service</a>

            <table class="table table-striped datatable tablecss">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Service Name</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->name }}</td>
                            <td><img src="{{ $service->servicePicture ? asset('storage/' . $service->servicePicture) : asset('/images/no-image.png') }}"
                                alt="Service Image" class="img-fluid" width="150" height="150"></td>
                            <td>{{ $service->description }}</td>
                            <td>{{ $service->category }}</td>
                            <td>{{ $service->duration }}</td>
                            <td>{{ $service->price }}</td>
                            <td>
                                <a href="{{ route('services.show', ['id' => $service->id]) }}"
                                    class="btn btn-primary" title="View Service">
                                    <i class="bi bi-card-heading"></i>
                                </a>
                                <a href="{{ route('services.edit', ['id' => $service->id]) }}"
                                    class="btn btn-warning" title="Edit Service">
                                    <i class="bi bi-pen"></i>

                                </a>
                                <form action="{{ route('services.destroy', ['id' => $service->id]) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary"
                                        onclick="return confirm('Are you sure you want to delete this service?')" title="Delete Service">
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
@endsection
