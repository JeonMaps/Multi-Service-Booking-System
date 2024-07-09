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
</style>
@section('content')
    <h1>Edit Service Provider</h1>

    <form action="{{ route('service-providers.update', ['id' => $serviceProvider->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $serviceProvider->name }}"
                required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ $serviceProvider->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="category">Category *Multiple inputs</label>
            <div class="checkbox-group @error('category') is-invalid @enderror">
                @foreach ($categories as $category)
                    <label>
                        <input type="checkbox" name="category[]" value="{{ $category->id }}"
                            @if ($serviceProvider->categories->contains($category->id)) checked @endif>
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" class="form-control"
                value="{{ $serviceProvider->location }}" required>
        </div>

        <div class="form-group">
            <label for="location">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control"
                value="{{ $serviceProvider->phone_number }}" required>
        </div>

        <div class="form-group">
            <label for="logo">Logo:</label>
            <input type="file" name="logo" id="logo"
                class="form-control-file @error('logo') is-invalid @enderror">
            @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
