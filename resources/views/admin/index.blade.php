@extends('layouts.app')

@section('title') Index @endsection

@section('operations')
    <a href="{{ route('admin.create') }}" class="nav-link active">
        Create Artwork
    </a>
    <a href="{{ route('admin.purchases') }}" class="nav-link active">
        View Purchases
    </a>
@endsection

@section('content')


    <div class="container mt-5">
        <div class="row">

            @foreach($artworks as $artwork)
                <div class="col-md-3 mb-5">

                    <!-- الكارد الكامل: الإطار يشمل الصورة + الاسم -->
                    <div class="image-frame shadow-sm">

                        <div class="image-container">
                            <img src="{{ asset($artwork->image) }}" alt="{{ $artwork->title }}">

                            <div class="overlay-layer">

                                <a href="{{ route('admin.edit', $artwork->id) }}" class="btn btn-pill btn-edit-white">
                                    Edit
                                </a>

                                <a href="{{ route('user.details', $artwork->id) }}"
                                    class="btn btn-pill btn-view-outline text-decoration-none text-center">
                                    View
                                </a>

                                <form action="{{ route('admin.destroy', $artwork->id) }}" method="POST"
                                    class="w-100 text-center">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-pill btn-delete-custom mx-auto d-block"
                                        onclick="return confirm('Are you sure you want to delete this?')">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </div>

                        <!-- الاسم داخل الإطار -->
                        <div class="artwork-title">
                            {{ $artwork->title }}
                        </div>

                    </div>

                </div>
            @endforeach

        </div>
    </div>
    

@endsection