@extends('layouts.app')

@section('title') Create Artwork @endsection

@section('content')

    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input name="price" type="number" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input name="quantity" type="number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Artwork Image</label>
            <input name="image" type="file" class="form-control" accept="image/*" required>
        </div>




        <div class="mt-4 text-center">
            <a href="{{ route('admin.index') }}" class="btn btn-dark ">← Back</a>
            <button class="btn btn-success">Submit</button>
            
        </div>
    </form>

@endsection