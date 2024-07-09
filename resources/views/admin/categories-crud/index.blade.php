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
@include('layouts.flash-message')
    <h1>Categories</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Create Category</a>

    <table class="table table-striped datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        <td>
                            <div class="row text-center">
                                <div class="col-md-4 text-end"><a href="{{ route('categories.show', ['id' => $category->id]) }}"
                                        class="button">View</a></div>
                                <div class="col-md-4"><a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                        class="button">Edit</a></div>
                                <div class="col-md-4 text-start">
                                    @method('DELETE')
                                    <button type="submit" class="button"
                                        onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                </div>
                            </div>
                        </td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
