@extends('dashboard.layout')
@section('title', 'User Management')
@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h5 class="card-title text-light mb-0">Create User</h5>
        </div>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" placeholder="Input Name" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Input email" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="Input password" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="password" name="password" id="password" placeholder="Input password" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <select name="role" id="role" class="form-select my-2">
                    <option value="">Select Role</option>
                    <option value="administrator">Administrator</option>
                    <option value="cashier">cashier</option>
                </select>
            </div>
            <div class="card-footer bg-light">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success float-end">Add User</button>
            </div>
        </form>
    </div>
@endsection
