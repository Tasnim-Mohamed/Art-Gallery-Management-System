@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container my-5">


    <h2 class="mb-4 text-center">Shopping Cart</h2>

    @if($purchases->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Artwork Name</th>
                    <th>Quantity</th>
                    <th>Price per Artwork</th>
                    <th>Total</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach($purchases as $purchase)
                    @php $lineTotal = $purchase->quantity * $purchase->total_price; @endphp
                    <tr>
                        <td>
                            <img src="{{ asset($purchase->artwork->image) }}" alt="{{ $purchase->artwork->title }}" style="height:80px; width:80px; object-fit:cover; border-radius:5px;">
                        </td>
                        <td>{{ $purchase->artwork->title }}</td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>${{ number_format($purchase->total_price, 2) }}</td>
                        <td>${{ number_format($lineTotal, 2) }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove', $purchase->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @php $grandTotal += $lineTotal; @endphp
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4 flex-column flex-md-row">
        <h4>Grand Total: <span class="text-primary">${{ number_format($grandTotal, 2) }}</span></h4>

        <a href="{{ route('cart.checkout') }}" class="btn btn-success"> Check out</a>

    </div>

    @else
        <p class="text-center fs-4 mt-5">Your cart is empty.</p>
    @endif

    <div class="mt-4 text-center">
        <a href="{{ route('user.show') }}" class="btn btn-outline-dark">← Continue Shopping</a>
    </div>
</div>



@endsection
