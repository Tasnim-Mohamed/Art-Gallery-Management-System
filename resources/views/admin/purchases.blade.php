@extends('layouts.app')

@section('title') Purchases @endsection

@section('content')
    <div class="container mt-5">
        <h2>All Purchases</h2>
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>Artwork Title</th>
                    <th>Buyer Name</th>
                    <th>Quantity</th>
                    <th>Purchase Date</th>

                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    @foreach ($order->order_item as $item)
                        <tr>
                            <td>{{ $item->artwork->title }}</td>
                            <td>{{ $order->user ? $order->user->name : 'Not Found' }}</td>
                            <td>{{ $item->quantity ?? 1 }}</td>
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>


        <div class="mt-4 text-center">
            <a href="{{ route('admin.index') }}" class="btn btn-dark ">← Back</a>
        </div>
    </div>
@endsection