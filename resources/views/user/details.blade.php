@extends('layouts.app')

@section('title') {{$artwork->title}} @endsection

@section('content')

  <div class="d-flex justify-content-center align-items-center" style="max-height: 100vh;">

    <div class="card shadow-lg" style="width: 95vw; max-width: 1000px; min-height: 600px;">
      <div class="row g-0 h-100">


        <div class="col-md-6 d-flex align-items-center justify-content-center">
          <div style="width: 100%; height: 70vh;  margin: 35px 0;">
            <img src="{{ asset($artwork->image) }}" style="height: 100%; width: 100%; object-fit: contain;">
          </div>
        </div>


        <div class="col-md-6 d-flex align-items-center">
          <div class="card-body">
            <h2 class="card-title fw-bold">{{$artwork->title}}</h2>
            <p class="card-text text-muted">
              {{$artwork->description}}
            </p>
            <div class="d-flex justify-content-between align-items-center mt-4">
              <span class="fs-4 fw-bold text-primary">{{$artwork->price}} $</span>
              <span class="text-secondary">Available: {{$artwork->quantity}}</span>
            </div>

            @if($artwork->quantity > 0)
              <form action="{{ route('user.buyNow', $artwork->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-primary w-100 mt-2">
                  Buy Now
                </button>
              </form>
            @else
              <button class="btn btn-danger w-100 mt-2" disabled>
                Sold Out
              </button>
            @endif




            @if(auth()->check() && auth()->user()->role == 'admin')
              <a href="{{ route('admin.index') }}" class="btn btn-dark w-100 mt-2">← Back</a>
            @else
              <a href="{{ route('user.show') }}" class="btn btn-dark w-100 mt-2">← Back</a>
            @endif
            

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection