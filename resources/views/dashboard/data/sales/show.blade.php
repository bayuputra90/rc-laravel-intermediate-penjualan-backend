@extends('dashboard.layout')
@section('title', 'Sales Management')
@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h5 class="card-title text-light">Checkout Detail</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md border border-2 border-light rounded p-2 mx-2">
                    <h3 class="card-title text-center">Product</h3>
                    <div class="row mb-2 mt-3">
                        <strong class="col-md-4">Product Name</strong>
                        <span class="col-md">: {{ $checkout->product->name }}</span>
                    </div>
                    <div class="row mb-2">
                        <strong class="col-md-4">Amount</strong>
                        <span class="col-md">: {{ $checkout->amount }}</span>
                    </div>
                </div>
                <div class="col-md border border-2 border-light rounded p-2 mx-2">
                    <h3 class="card-title text-center">Customer</h3>
                    <div class="row mb-2 mt-3">
                        <strong class="col-md-4">Name</strong>
                        <span class="col-md">: {{ $checkout->name }}</span>
                    </div>
                    <div class="row mb-2 mt-3">
                        <strong class="col-md-4">Email</strong>
                        <span class="col-md">: {{ $checkout->email }}</span>
                    </div>
                    <div class="row mb-2 mt-3">
                        <strong class="col-md-4">Phone</strong>
                        <span class="col-md">: {{ $checkout->phone }}</span>
                    </div>
                    <div class="row mb-2 mt-3">
                        <strong class="col-md-4">Address</strong>
                        <span class="col-md">: {{ $checkout->address }}</span>
                    </div>
                </div>
            </div>
            <form action="{{ route('sales.update', $checkout->id) }}" method="POST" id="formupdate">
                @csrf
                @method('PUT')
                <div class="row my-2">
                    <label class="col-md-1 col-form-label" for="status">Status</label>
                    <div class="col-md-3">
                        <select name="status" id="status" class="form-select">
                            <option value="Waiting for payment" @if($checkout->status == 'Waiting for payment') selected @endif>Waiting for payment</option>
                            <option value="Process" @if($checkout->status == 'Process') selected @endif>Process</option>
                            <option value="Sent" @if($checkout->status == 'Sent') selected @endif>Sent</option>
                            <option value="Done" @if($checkout->status == 'Done') selected @endif>Done</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer bg-light">
            <a href="{{ route('sales.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success float-end" form="formupdate">Update</button>
        </div>
    </div>
@endsection
