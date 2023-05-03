@extends('dashboard.layout')
@section('title', 'Product Management')
@section('content')
<div class="card">
    <div class="card-header text-bg-primary d-flex justify-content-between">
        <h5 class="card-title text-light">Product</h5>

        <a href="{{ url('product/create') }}" class="btn badge">
            <i data-feather="plus"></i>&nbsp;Add
        </a>
    </div>
    <div class="card-body">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->status }}</td>
                        <td class="col-md-3 text-center">
                            <a href="{{ url('product/' . $product->id) }}" class="btn btn-sm btn-info rounded">Detail</a> |
                            <a href="{{ url('product/' . $product->id . '/edit') }}" class="btn btn-sm btn-warning rounded">Edit</a> |
                            <form action="#" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
