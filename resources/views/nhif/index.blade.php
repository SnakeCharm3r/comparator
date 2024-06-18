@extends('layouts.template')
@section('breadcrumb')
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
                                    <a href="{{ route('nhif.create') }}" class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2" style="background-color: #61ce70; border-color: #61ce70;">
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
                                @foreach($nhif_qualifications as $nhif_qualification)
                                    <tr>
                                        <td>{{ $nhif_qualification->name }}</td>
                                        <td>{{ $nhif_qualification->status }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm edit-btn" data-id="#"><i class="fas fa-edit"></i></a>
                                            <form action="#" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm"><i class="fas fa-trash-alt"></i></button>
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
        $(document).ready(function () {
            $('.table').DataTable();

            // Edit button click event
            $('.edit-btn').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.get('/department/' + id + '/edit', function(data) {
                    // Show edit modal with the fetched data
                    $('#editModal .modal-content').html(data);
                    $('#editModal').modal('show');
                });
            });

            // Submit edit form via AJAX
            $(document).on('submit', '#editDepartmentForm', function(e) {
                e.preventDefault();
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    type: 'PUT',
                    url: url,
                    data: form.serialize(),
                    success: function(response) {
                        if (response.status == 200) {
                            $('#editModal').modal('hide');
                            location.reload();
                        } else {
                            // Handle validation errors
                            var errors = response.errors;
                            for (var error in errors) {
                                form.find('.' + error + '-error').text(errors[error][0]);
                            }
                        }
                    }
                });
            });
        });
    </script>



    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Dynamic content will be loaded here -->
            </div>
        </div>
    </div>
@endsection

