@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Privilege Levels</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row position-relative">
                                <div class="col-md-12">
                                    <a href="{{ route('privilege.create') }}"
                                        class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2 create-btn">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($priv as $privilege)
                                        <tr>
                                            <td>{{ $privilege->prv_name }}</td>
                                            <td>{{ $privilege->prv_status }}</td>
                                            <td>
                                                <a href="{{ route('privilege.edit', $privilege->id) }}"
                                                    class="btn btn-sm edit-btn" data-id="{{ $privilege->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button
                                                    onclick="deleteConfirmation('{{ route('privilege.destroy', $privilege->id) }}')"
                                                    class="btn btn-sm btn-delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{ $privilege->id }}"
                                                    action="{{ route('privilege.destroy', $privilege->id) }}" method="POST"
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        swal("Your record is safe!");
                    }
                });
        }
    </script>
@endsection
