@extends('dashboard.layout')
@section('title', 'Product Management')
@section('content')
<div class="card">
    <div class="card-header text-bg-primary">
        <h5 class="card-title text-light mb-0">Edit Product</h5>
    </div>
    <form action="{{ url('product/' . $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-auto">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-thumbnail" style="height: 350px; width:280px">
                </div>
                <div class="col-md">
                    <div class="row mb-2">
                        <label for="name" class="col-md-3 col-form-label">Name</label>
                        <input type="text" class="col-md form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Product Name" value="{{ old('name', $product->name) }}">
                    </div>
                    <div class="row mb-2">
                        <label for="price" class="col-md-3 col-form-label">Price</label>
                        <input type="text" class="col-md form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Product Price" value="{{ old('price', $product->price) }}">
                    </div>
                    <div class="row mb-2">
                        <label for="qty" class="col-md-3 col-form-label">Qty</label>
                        <input type="number" class="col-md form-control @error('qty') is-invalid @enderror" id="qty" name="qty" placeholder="Product qty" value="{{ old('qty', $product->qty) }}">
                    </div>
                    <div class="row mb-2">
                        <label for="image" class="col-md-3 col-form-label">Change Image</label>
                        <input type="file" class="col-md form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="Product image" value="{{ old('image', $product->image) }}">
                    </div>
                </div>
            </div>
            <div class="my-2">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="row col-md-3 py-2">
                <label for="status" class="col-md-auto col-form-label">Status</label>
                <select name="status" id="status" class="form-select col-md @error('status') is-invalid @enderror">
                    <option value="active" @if(old('status', $product->status) == 'active') selected @endif>Active</option>
                    <option value="inactive" @if(old('status', $product->status) == 'inactive') selected @endif>Inactive</option>
                </select>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between bg-light">
            <a href="{{ url('product') }}" class="btn btn-secondary rounded">Back</a>
            <button type="submit" class="btn btn-success rounded">Add Product</button>
        </div>
    </form>
</div>
@endsection
