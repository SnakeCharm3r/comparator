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
                                                    <a href="{{ route('permission.edit', $permission->id) }}"
                                                        class="btn btn-sm edit-btn" data-id="{{ $permission->id }}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <button
                                                        onclick="deleteConfirmation('{{ route('permission.destroy', $permission->id) }}')"
                                                        class="btn btn-sm btn-delete"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                    <form id="delete-form-{{ $permission->id }}"
                                                        action="{{ route('permission.destroy', $permission->id) }}"
                                                        method="POST" style="display: none;">
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
                            swal("Permission is safe!");
                        }
                    });
            }
        </script>
    @endsection
