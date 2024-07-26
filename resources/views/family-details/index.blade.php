@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">User Profile</h3>
                        </div>
                    </div>
                </div>
            </div>

            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <!-- Include SweetAlert2 -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <div class="container">
                <div class="row flex-lg-nowrap">
                    <div class="col">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="{{ route('profile.index') }}"
                                                    class="nav-link">User Info</a></li>
                                            <li class="nav-item"><a href="{{ route('policies.user') }}"
                                                    class="nav-link">Policies</a></li>
                                            <li class="nav-item"><a href="{{ route('user_profile.pass') }}"
                                                    class="nav-link">Password</a></li>
                                            <li class="nav-item"><a href="{{ route('family-details.index') }}"
                                                    class="active nav-link">Family Details</a></li>
                                            <li class="nav-item"><a href="{{ route('health-details.index') }}"
                                                    class=" nav-link">Health Details</a></li>
                                            <li class="nav-item"><a href="{{ route('ccbrt_relation.index') }}"
                                                    class="nav-link">CCBRT Relation</a></li>
                                            <li class="nav-item"><a href="{{ route('language_knowledge.index') }}"
                                                    class="nav-link">Language</a></li>
                                        </ul>

                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active" id="family">
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button type="button" class="btn btn-primary mb-3"
                                                            data-toggle="modal" data-target="#addFamilyModal">
                                                            Add Family Data
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Modal for adding family data -->
                                                <div class="modal fade" id="addFamilyModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="addFamilyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST"
                                                                action="{{ route('family-details.addFamilyData') }}">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="addFamilyModalLabel">Add
                                                                        Family Data</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Full Name</label>
                                                                        <input type="text" class="form-control"
                                                                            name="familyData[0][full_name]"
                                                                            value="{{ old('familyData.0.full_name') }}"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Relationship</label>
                                                                        <input type="text" class="form-control"
                                                                            name="familyData[0][relationship]"
                                                                            value="{{ old('familyData.0.relationship') }}"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Mobile</label>
                                                                        <input type="text" class="form-control"
                                                                            name="familyData[0][phone_number]"
                                                                            value="{{ old('familyData.0.phone_number') }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Date of Birth</label>
                                                                        <input type="date" class="form-control"
                                                                            name="familyData[0][DOB]"
                                                                            value="{{ old('familyData.0.DOB') }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Occupation</label>
                                                                        <input type="text" class="form-control"
                                                                            name="familyData[0][occupation]"
                                                                            value="{{ old('familyData.0.occupation') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal for editing family data -->
                                                <div class="modal fade" id="editFamilyModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="editFamilyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" id="editFamilyForm" action="">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editFamilyModalLabel">Edit
                                                                        Family Data</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Full Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_full_name" name="full_name"
                                                                            value="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Relationship</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_relationship" name="relationship"
                                                                            value="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Mobile</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_phone_number" name="phone_number"
                                                                            value="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Date of Birth</label>
                                                                        <input type="date" class="form-control"
                                                                            id="edit_DOB" name="DOB" value=""
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Occupation</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_occupation" name="occupation"
                                                                            value="">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                                <h3>Family Details</h3>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Full Name</th>
                                                                <th>Relationship</th>
                                                                <th>Mobile</th>
                                                                <th>Date of Birth</th>
                                                                <th>Occupation</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($familyData as $detail)
                                                                <tr>
                                                                    <td>{{ $detail->full_name }}</td>
                                                                    <td>{{ $detail->relationship }}</td>
                                                                    <td>{{ $detail->phone_number }}</td>
                                                                    <td>{{ $detail->DOB }}</td>
                                                                    <td>{{ $detail->occupation }}</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-sm p-0 edit-family-btn"
                                                                            style="border: none; background: none;"
                                                                            title="Edit" data-toggle="modal"
                                                                            data-target="#editFamilyModal"
                                                                            data-id="{{ $detail->id }}"
                                                                            data-full_name="{{ $detail->full_name }}"
                                                                            data-relationship="{{ $detail->relationship }}"
                                                                            data-phone_number="{{ $detail->phone_number }}"
                                                                            data-dob="{{ $detail->DOB }}"
                                                                            data-occupation="{{ $detail->occupation }}">
                                                                            <i class="fas fa-edit text-primary"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-sm p-0"
                                                                            style="border: none; background: none;"
                                                                            title="Delete"
                                                                            onclick="confirmDelete({{ $detail->id }})">
                                                                            <i class="fas fa-trash-alt text-danger"></i>
                                                                        </button>

                                                                        <!-- Add this form for delete action -->
                                                                        <form id="delete-form-{{ $detail->id }}"
                                                                            method="POST"
                                                                            action="{{ route('family-details.destroy', $detail->id) }}"
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
                            <!-- Add other content for profile page here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 Confirmation Script -->
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the delete form
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        // Handle edit button click
        $(document).on('click', '.edit-family-btn', function() {
            var id = $(this).data('id');
            var full_name = $(this).data('full_name');
            var relationship = $(this).data('relationship');
            var phone_number = $(this).data('phone_number');
            var dob = $(this).data('dob');
            var occupation = $(this).data('occupation');

            // Set the form action to the appropriate route
            $('#editFamilyForm').attr('action', '/family-details/' + id);

            // Populate the modal with existing data
            $('#edit_full_name').val(full_name);
            $('#edit_relationship').val(relationship);
            $('#edit_phone_number').val(phone_number);
            $('#edit_DOB').val(dob);
            $('#edit_occupation').val(occupation);
        });
    </script>
@endsection
