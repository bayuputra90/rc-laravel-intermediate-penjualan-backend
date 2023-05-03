@extends('dashboard.layout')
@section('title', 'Product Management')
@section('content')
<div class="card">
    <div class="card-header text-bg-primary">
        <h5 class="card-title text-light mb-0">Create Product</h5>
    </div>
    <form action="{{ url('product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Product Name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Product Price" value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $errors->first('price') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md">
                    <div class="mb-2">
                        <label for="qty" class="form-label">Qty</label>
                        <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" placeholder="Product qty" value="{{ old('qty') }}">
                        @error('qty')
                            <div class="invalid-feedback">
                                {{ $errors->first('qty') }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="Product image" value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $errors->first('image') }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="my-2">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @enderror
            </div>
            <div class="row col-md-3 py-2">
                <label for="status" class="col-md-auto col-form-label">Status</label>
                <select name="status" id="status" class="form-select col-md @error('status') is-invalid @enderror">
                    <option value="active" @if(old('status') == 'active') selected @endif>Active</option>
                    <option value="inactive" @if(old('status') == 'inactive') selected @endif>Inactive</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between bg-light">
            <a href="{{ url('product') }}" class="btn btn-secondary rounded">Back</a>
            <button type="submit" class="btn btn-success rounded">Add Product</button>
        </div>
    </form>
</div>
@endsection
