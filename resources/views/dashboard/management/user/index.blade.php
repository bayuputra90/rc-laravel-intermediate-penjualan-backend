@extends('dashboard.layout')
@section('title', 'User Management')
@section('content')
<div class="card">
    <div class="card-header text-bg-primary d-flex justify-content-between">
        <h5 class="card-title text-light">User</h5>

        <a href="{{ url('user/create') }}" class="btn badge">
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
                    <th>Email</th>
                    <th>Role</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td class="col-md-3 text-center">
                            <a href="{{ url('user/' . $user->id) }}" class="btn btn-sm btn-info rounded">Detail</a> |
                            <a href="{{ url('user/' . $user->id . '/edit') }}" class="btn btn-sm btn-warning rounded">Edit</a> |
                            <form action="{{ url('user/' . $user->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('delete this user ?')" class="btn btn-sm btn-danger rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
