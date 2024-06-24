@extends('layouts.template')
@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Permissions</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row position-relative">
                                    <div class="col-md-12">
                                        <a href="{{ route('permission.create') }}"
                                            class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2"
                                            style="background-color: #61ce70; border-color: #61ce70;">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="role-select" class="form-label">Select Role</label>
                                        <select id="role-select" class="form-select">
                                            <option value="">Select a role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $permissions->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <form id="permissions-form">
                                    @csrf
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permissions as $permission)
                                                <tr>
                                                    <td>{{ $permission->id }}</td>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>
                                                        <input type="checkbox" name="permissions[]"
                                                            value="{{ $permission->name }}" class="permission-checkbox">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary">Save Permissions</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const roleSelect = document.getElementById('role-select');
                const checkboxes = document.querySelectorAll('.permission-checkbox');

                roleSelect.addEventListener('change', function() {
                    const roleId = this.value;
                    if (roleId) {
                        fetch(`/role/${roleId}/permissions`)
                            .then(response => response.json())
                            .then(data => {
                                checkboxes.forEach(checkbox => {
                                    checkbox.checked = data.includes(checkbox.value);
                                });
                            })
                            .catch(error => console.error('Error fetching permissions:', error));
                    } else {
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = false;
                        });
                    }
                });
            });
        </script>
    @endsection
