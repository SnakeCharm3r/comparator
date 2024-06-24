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
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="role-select" class="form-label">Select Role</label>
                                    <select id="role-select" class="form-select">
                                        <option value="">Select a role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <form id="permissions-form">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%;">ID</th>
                                                <th style="width: 70%;">Permission Name</th>
                                                <th style="width: 20%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permissions as $permission)
                                                <tr>
                                                    <td>{{ $permission->id }}</td>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="permissions[]" value="{{ $permission->name }}"
                                                                id="permission-{{ $permission->id }}">
                                                            <label class="form-check-label"
                                                                for="permission-{{ $permission->id }}"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('permission.create') }}" class="btn btn-success ms-2">Add New</a>
                                    </div>
                                </div>
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
            const checkboxes = document.querySelectorAll('.form-check-input');

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
