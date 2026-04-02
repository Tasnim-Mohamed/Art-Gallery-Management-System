@extends('layouts.app')

@section('title') Orders @endsection

@section('content')
<div class="container mt-5">
    <h1>My Orders</h1>
@if($orders->count() > 0)
@foreach ($orders as $order)
    <div class="order-card">
        <h2 >Order #{{ $order->id }} - {{ $order->status }}</h2>
        <p>Total: ${{ number_format($order->total_price,2) }}</p>
        <p>Shipping: {{ $order->shipping_address }}</p>
        <p>Payment: {{ $order->payment_method }} ({{ $order->payment_status }})</p>

        <h3>Items:</h3>
        <ul>
            @foreach ($order->order_item as $item)
                <li>{{ $item->artwork->title }} × {{ $item->quantity }} - ${{ number_format($item->price,2) }}</li>
            @endforeach
        </ul>
    </div>
@endforeach
 @else
        <p class="text-center fs-4 mt-5">It is empty here</p>
    @endif

    <div class="mt-4 text-center">
        <a href="{{ route('user.show') }}" class="btn btn-outline-dark">← Continue Shopping</a>
    </div>
    
</div>
@endsection
