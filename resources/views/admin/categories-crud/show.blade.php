@extends('layouts.admin-app-crud')
@extends('layouts.admin-components.admin-header')
@extends('layouts.admin-components.admin-sidebar')


@section('content')
        <h1>Category Details</h1>

        <table class="table table-striped">
            <tbody>
                <tr>
                    <th>ID:</th>
                    <td>{{ $category->id }}</td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td>{{ $category->name }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST"
            style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this service provider?')">Delete</button>
        </form>
@endsection
