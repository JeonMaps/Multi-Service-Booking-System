@extends('layouts.admin-app-crud')
@extends('layouts.admin-components.admin-header')
@extends('layouts.admin-components.admin-sidebar')

<style>
    /* .button {
        appearance: none;
        background-color: transparent;
        border: 2px solid #00ABB3;
        border-radius: 15px;
        box-sizing: border-box;
        color: #3B3B3B;
        cursor: pointer;
        display: inline-block;
        font-family: Roobert, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        font-size: 16px;
        font-weight: 600;
        line-height: normal;
        margin: 0;
        min-height: 60px;
        min-width: 0;
        outline: none;
        padding: 16px 24px;
        text-align: center;
        text-decoration: none;
        transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: 30%;
        will-change: transform;
    } */

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
    <h1>Users</h1>

    <table class="table table-striped datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Phone Number</th>
                <th>Service Provider</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->phone_number }}</td>
                    @if ($user->service_provider_id)
                        <td>{{ $user->serviceProvider->name }}</td>
                    @else
                        <td>N/A</td>
                    @endif
                    <td>
                        <div class="row text-center">
                        <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            <a href="{{ route('users.show', ['id' => $user->id]) }}" class="button">View</a>
                            <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="button">Edit</a>
                            @method('DELETE')
                            <button type="submit" class="button"
                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection
