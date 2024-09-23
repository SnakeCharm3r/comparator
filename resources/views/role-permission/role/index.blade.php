{{-- @extends('layouts.template')
@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Roles</h3>
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
                                        <a href="{{ route('role.create') }}"
                                            class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2"
                                            style="background-color: #61ce70; border-color: #61ce70;">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>



                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $role->id }}</td>
                                                <td>{{ $role->name }}</td>

                                                <td>
                                                    <a href="{{ route('role.edit', $role->id) }}"
                                                        class="btn btn-sm edit-btn" data-id="{{ $role->id }}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <button
                                                        onclick="deleteConfirmation('{{ route('role.destroy', $role->id) }}')"
                                                        class="btn btn-sm btn-delete"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                    <form id="delete-form-{{ $role->id }}"
                                                        action="{{ route('role.destroy', $role->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script>
            function deleteConfirmation(urlToRedirect) {
                swal({
                        title: "Are you sure to delete?",
                        text: "You will not be able to revert this!",
                        icon: "warning",
                        buttons: ["Cancel", "Delete"],
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            document.getElementById('delete-form-' + urlToRedirect.split('/').pop()).submit();
                        } else {
                            swal("Your Role is safe!");
                        }
                    });
            }
        </script>
    @endsection --}}

@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Roles</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row position-relative mb-3">
                                <div class="col-md-12">
                                    <a href="{{ route('role.create') }}"
                                        class="btn btn-primary position-absolute top-0 end-0"
                                        style="background-color: #61ce70; border-color: #61ce70;">
                                        <i class="fas fa-plus"></i> Add Role
                                    </a>
                                </div>
                            </div>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm edit-btn"
                                                    data-id="{{ $role->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <button onclick="deleteConfirmation('{{ $role->id }}')"
                                                    class="btn btn-sm btn-delete">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                                <form id="delete-form-{{ $role->id }}"
                                                    action="{{ route('role.destroy', $role->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No roles found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function deleteConfirmation(roleId) {
                Swal.fire({
                    title: "Are you sure to delete?",
                    text: "This action cannot be undone!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#61ce70",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + roleId).submit();
                    } else {
                        Swal.fire("Your role is safe!");
                    }
                });
            }
        </script>
    @endsection
