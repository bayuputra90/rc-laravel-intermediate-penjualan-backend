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
                            <input type="text" name="name" id="name" placeholder="Input Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Input email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="Input password" class="form-control @error('password') is-invalid @enderror" autocomplete="off">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" class="form-control @error('password_confirmation') is-invalid @enderror" autocomplete="off">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <select name="role" id="role" class="form-select my-2 @error('role') is-invalid @enderror">
                    <option value="">Select Role</option>
                    <option value="administrator" @if(old('role') == 'administrator') selected @endif>Administrator</option>
                    <option value="cashier" @if(old('role') == 'cashier') selected @endif>cashier</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">
                        {{ $errors->first('role') }}
                    </div>
                @enderror
            </div>
            <div class="card-footer bg-light">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success float-end">Add User</button>
            </div>
        </form>
    </div>
@endsection
