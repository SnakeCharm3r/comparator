@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">

                        @if ($errors->any())
                            <ul class="alert alert-warning">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h4>Edit User Role
                                    {{-- <a href="{{ url('users') }}" class="btn btn-danger float-end">Back</a> --}}
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('users.edit', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="username">User Name</label>
                                        <input type="text" name="username" value="{{ $user->username }}"
                                            class="form-control" />
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" readonly value="{{ $user->email }}"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="roles">Roles</label>
                                        @foreach ($roles as $role)
                                            <div class="form-check">
                                                <input type="radio" name="roles" id="role-{{ $role->name }}"
                                                    value="{{ $role->name }}" class="form-check-input"
                                                    {{ !empty($userRoles) && $role->name == $userRoles[0] ? 'checked' : '' }}>
                                                <label for="role-{{ $role->name }}"
                                                    class="form-check-label">{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                        @error('roles')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('content')
@endsection
