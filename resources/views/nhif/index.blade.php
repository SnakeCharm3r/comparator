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
                            <h3 class="page-title">NHIF Form</h3>
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
                                    <a href="{{ route('nhif.create') }}"
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
                                    @foreach ($nhif as $nhifs)
                                        <tr>
                                            <td>{{ $nhifs->name }}</td>
                                            <td>{{ $nhifs->status }}</td>
                                            <td>
                                                <a href="{{ route('nhif.edit', $nhifs->id) }}" class="btn btn-sm edit-btn"
                                                    data-id="{{ $nhifs->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button
                                                    onclick="deleteConfirmation('{{ route('nhif.destroy', $nhifs->id) }}')"
                                                    class="btn btn-sm btn-delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{ $nhifs->id }}"
                                                    action="{{ route('nhif.destroy', $nhifs->id) }}" method="POST"
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
                        swal("Your record is safe!");
                    }
                });
        }
    </script>
@endsection
