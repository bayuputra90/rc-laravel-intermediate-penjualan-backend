@extends('dashboard.layout')
@section('title', 'Sales Management')
@section('content')
<div class="card">
    <div class="card-header bg-primary">
        <h5 class="card-title text-light">Customer Checkout's</h5>
    </div>
    <div class="card-body">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Product</th>
                    <th>Purchase Amount</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checkouts as $checkout)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $checkout->name }}</td>
                    <td>{{ $checkout->address }}</td>
                    <td>{{ $checkout->product->name }}</td>
                    <td>{{ $checkout->amount }}</td>
                    <td>{{ $checkout->status }}</td>
                    <td class="col-md-3 text-center">
                        <a href="{{ url('product/' . $checkout->id) }}" class="btn btn-sm btn-info rounded">Detail</a> |
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
