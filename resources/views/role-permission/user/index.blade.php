@extends('layouts.template')
@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Users</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card mt-3">
                    <div class="card-body">
                        {{-- <div class="row position-relative">
                            <div class="col-md-12">
                                <a href="{{ route('users.create') }}"
                                    class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2"
                                    style="background-color: #61ce70; border-color: #61ce70;">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div> --}}

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $rolename)
                                                    <label
                                                        style="padding: 0.0em 0.3em; background-color: #60656b; color: white;">
                                                        {{ $rolename }}
                                                    </label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm edit-btn"
                                                title="Edit">
                                                <i class="fas fa-edit text-success"></i>
                                            </a>
                                            <a href="{{ route('users.destroy', $user->id) }}"
                                                class="btn btn-sm delete-btn mx-2" title="Delete">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

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
                            swal("Role is safe!");
                        }
                    });
            }
        </script>
    @endsection
