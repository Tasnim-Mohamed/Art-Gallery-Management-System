@extends('layouts.app')

@section('title') Edit Artwork @endsection

@section('content')

    <form method="POST" action="{{ route('admin.update', $artwork->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" value="{{ $artwork->title }}" class="form-control" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $artwork->description }}</textarea>
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input name="price" type="number" step="0.01" value="{{ $artwork->price }}" class="form-control" required>
        </div>

        <!-- Quantity -->
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input name="quantity" type="number" value="{{ $artwork->quantity }}" class="form-control" required>
        </div>

        <!-- Current Image -->
        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            @if($artwork->image)
                <img src="{{ asset($artwork->image) }}" width="150" alt="Artwork Image">
            @else
                <span>No image uploaded</span>
            @endif
        </div>

        <!-- Upload New Image -->
        <div class="mb-3">
            <label class="form-label">Change Artwork Image</label>
            <input name="image" type="file" class="form-control" accept="image/*">
            <small class="text-muted">Leave empty if you don't want to change the image.</small>
        </div>


        <div class="mt-4 text-center">
            <a href="{{ route('admin.index') }}" class="btn btn-dark ">← Back</a>
            <button class="btn btn-primary">Update</button>
            
        </div>

    </form>

@endsection