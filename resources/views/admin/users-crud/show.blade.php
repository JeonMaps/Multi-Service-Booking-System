@extends('layouts.admin-app-crud')
@extends('layouts.admin-components.admin-header')
@extends('layouts.admin-components.admin-sidebar')


@section('content')
        <h1>Service Provider Details</h1>

        <table class="table table-striped">
            <tbody>
                <tr>
                    <th>ID:</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Role:</th>
                    <td>{{ $user->role }}</td>
                </tr>
                <tr>
                    <th>Service Provider:</th>
                    <td>{{ $user->service_provider_id }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST"
            style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this service provider?')">Delete</button>
        </form>
@endsection
