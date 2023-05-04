@extends('dashboard.layout')
@section('title', 'User Management')
@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h5 class="card-title text-light mb-0">Edit User</h5>
        </div>
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" placeholder="Input Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Input email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                                <option value="">Select Role</option>
                                <option value="administrator" @if(old('role', $user->role) == 'administrator') selected @endif>Administrator</option>
                                <option value="cashier" @if(old('role', $user->role) == 'cashier') selected @endif>cashier</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $errors->first('role') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success float-end">Update</button>
            </div>
        </form>
    </div>
@endsection
