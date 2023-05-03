@extends('dashboard.layout')
@section('title', 'User Management')
@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h5 class="card-title text-light mb-0">Detail User</h5>
        </div>
        <div class="card-body">
            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" placeholder="Input Name" class="form-control" value="{{ $user->name }}" disabled>
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" placeholder="Input email" class="form-control" autocomplete="off" value="{{ $user->email }}" disabled>
            </div>
            <div class="mb-2">
                <label for="role" class="form-label">Role</label>
                <input type="text" name="role" id="role" value="{{ $user->role }}" class="form-control" disabled>
            </div>
        </div>
        <div class="card-footer bg-light">
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
