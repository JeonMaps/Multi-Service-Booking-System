@extends('layouts.business-app-crud')
@extends('layouts.business-components.business-header')
@extends('layouts.business-components.business-footer')
@extends('layouts.business-components.business-sidebar')

@section('content')
    <h1>Edit Service</h1>

    <form action="{{ route('services.update', ['id' => $service->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Service Name:</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $service->name }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{$service->description}}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="duration">Duration(mins):</label>
            <input type="number" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" value="{{$service->duration}}" required>
            @error('duration')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $service->price }}" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="servicePicture">Picture of Service:</label>
            <input type="file" name="servicePicture" id="servicePicture" class="form-control-file @error('servicePicture') is-invalid @enderror">
            @error('servicePicture')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
