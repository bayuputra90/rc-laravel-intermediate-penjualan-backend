@extends('dashboard.layout')
@section('title', 'Product Management')
@section('content')
<div class="card">
    <div class="card-header text-bg-primary">
        <h5 class="card-title text-light mb-0">Detail Product</h5>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-auto text-center">
                <img src="{{ asset('storage/' . $product->image) }}" style="height: 350px; width: 280px" alt="Product Image" class="img-thumbnail">
            </div>
            <div class="col-md">
                <div class="row mb-2">
                    <label for="name" class="form-label col-sm-2 col-form-label">Name</label>
                    <input type="text" class="form-control col-sm" id="name" name="name" placeholder="Product Name" value="{{ $product->name }}" disabled>
                </div>
                <div class="row mb-2">
                    <label for="price" class="form-label col-sm-2 col-form-label">Price</label>
                    <input type="text" class="form-control col-sm" id="price" name="price" placeholder="Product Price" value="{{ $product->price }}" disabled>
                </div>
                <div class="row mb-2">
                    <label for="qty" class="form-label col-sm-2 col-form-label">Qty</label>
                    <input type="number" class="form-control col-sm" id="qty" name="qty" placeholder="Product qty" value="{{ $product->qty }}" disabled>
                </div>
            </div>
        </div>
        <div class="my-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="5" class="form-control" disabled>{{ $product->description }}</textarea>
        </div>
        <div class="row col-md-3 py-2">
            <label for="status" class="col-md-auto col-form-label">Status</label>
            <input type="text" name="status" id="status" class="form-control col-md" value="{{ $product->status }}" disabled>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ url('product') }}" class="btn btn-secondary rounded">Back</a>
    </div>
</div>
@endsection
