@extends('layouts.app')

@section('title') showUser @endsection

@section('operations')
  <div class="collapse navbar-collapse" id="navbarContent">
    <form method="GET" action="{{ route('user.show') }}" class="d-flex ms-auto me-2">
      <input class="form-control me-2" type="search" name="search" placeholder="Search artworks" aria-label="Search">
      <button class="btn btn-outline-dark" type="submit">Search</button>
    </form>
    <form method="GET" action="{{ route('user.User_Oreder') }}" class="d-flex ms-auto me-2">
      
      <button class="btn btn-outline-dark" type="submit">My Order</button>
    </form>
    <a class="btn btn-outline-dark me-2" href="{{ route('showCart') }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart"
        viewBox="0 0 15 15">
        <path
          d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .485.379L2.89 5H14.5a.5.5 0 0 1 .49.598l-1.5 7A.5.5 0 0 1 13 13H4a.5.5 0 0 1-.491-.408L1.01 1.607 1 1.5H.5a.5.5 0 0 1-.5-.5zM3.14 6l1.25 6h8.22l1.25-6H3.14z" />
        <path d="M5 14a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 1a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
      </svg>
    </a>
    
  </div>
@endsection

@section('content')
  <!-- Art Gallery -->
  <div class="container mt-5">
    <div class="row">

      @foreach($artworks as $artwork)
        <div class="col-md-3 mb-5">

          <!-- الكارد الكامل: الإطار يشمل الصورة + الاسم -->
          <div class="image-frame shadow-sm">

            <div class="image-container">
              <img src="{{ asset($artwork->image) }}" alt="{{ $artwork->title }}">

              <div class="overlay-layer">


                <a href="{{ route('user.details', $artwork->id) }}"
                  class="btn btn-pill btn-view-outline text-decoration-none text-center">
                  View
                </a>



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