@extends('layouts.admin-app-crud')
@extends('layouts.admin-components.admin-header')
@extends('layouts.admin-components.admin-sidebar')

@section('content')

        <h1>Edit Service Provider</h1>

        <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}"
                    required>

                @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
@endsection
