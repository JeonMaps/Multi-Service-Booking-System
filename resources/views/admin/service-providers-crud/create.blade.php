@extends('layouts.admin-app-crud')
@extends('layouts.admin-components.admin-header')
@extends('layouts.admin-components.admin-sidebar')

<style>
    .checkbox-group {
        display: flex;
        flex-wrap: wrap;
    }

    .checkbox-group label {
        display: inline-block;
        margin-right: 10px;
    }

    label {
        color: var(--green);
    }

    .button {
        appearance: none;
        background-color: transparent;
        border: 2px solid var(--green);
        border-radius: 15px;
        box-sizing: border-box;
        color: #3B3B3B;
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
    <h1>Create Service Provider</h1>
    <div class="row">
        <form action="{{ route('service-providers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md-12 p-2">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 p-2">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="col-md-12 p-2">
                <div class="form-group">
                    <label for="category">Category /s</label>
                    <div class="checkbox-group @error('category') is-invalid @enderror">
                        @foreach ($categories as $category)
                            <label style="padding-right: 10px; padding-left: 10px">
                                <input type="checkbox" name="category[]" value="{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        @endforeach
                    </div>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 p-2">
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" name="location" id="location"
                        class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" required>

                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 p-2">
                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" name="phone_number" id="phone_number"
                        class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}"
                        required>

                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 p-2">
                <div class="form-group">
                    <label for="logo">Logo:</label>
                    <input type="file" name="logo" id="logo"
                        class="form-control-file @error('logo') is-invalid @enderror">
                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-3 p-2">
                <button type="submit" class="button">Create</button>
            </div>
        </form>
    </div>
@endsection
