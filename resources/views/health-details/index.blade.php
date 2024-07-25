<!-- resources/views/profile/show.blade.php -->

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
                                            <li class="nav-item"><a href="#security" class="nav-link"
                                                    data-bs-toggle="tab">Password</a></li>
                                            <li class="nav-item"><a href="{{ route('family-details.index') }}"
                                                    class="nav-link">Family Details</a></li>
                                            <li class="nav-item"><a href="{{ route('health-details.index') }}"
                                                    class="active nav-link">Health Details</a></li>
                                            <li class="nav-item"><a href="{{ route('ccbrt_relation.index') }}"
                                                    class="nav-link">CCBRT Reation</a></li>
                                            <li class="nav-item"><a href="{{ route('language_knowledge.index') }}"
                                                    class="nav-link">Language</a> </li>

                                        </ul>
                                        <div class="mt-4">

                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#addHealthModal">
                                                        Add Health Detail
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Modal for adding health details -->
                                            <div class="modal fade" id="addHealthModal" tabindex="-1"
                                                aria-labelledby="addHealthModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="addHealthModalLabel">Add Health
                                                                Detail</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <!-- Health details form -->
                                                            <form id="healthDetailsForm"
                                                                action="{{ route('health-details.addHealthData') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="userId"
                                                                    value="{{ Auth::id() }}">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Physical Disability</label>
                                                                            <input type="text" class="form-control"
                                                                                name="physical_disability"
                                                                                value="{{ old('physical_disability') }}">
                                                                            @error('physical_disability')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Blood Group</label>
                                                                            <select class="form-control" name="blood_group">
                                                                                <option value="">Select Blood Group
                                                                                </option>
                                                                                <option value="A+"
                                                                                    {{ old('blood_group') == 'A+' ? 'selected' : '' }}>
                                                                                    A+</option>
                                                                                <option value="A-"
                                                                                    {{ old('blood_group') == 'A-' ? 'selected' : '' }}>
                                                                                    A-</option>
                                                                                <option value="B+"
                                                                                    {{ old('blood_group') == 'B+' ? 'selected' : '' }}>
                                                                                    B+</option>
                                                                                <option value="B-"
                                                                                    {{ old('blood_group') == 'B-' ? 'selected' : '' }}>
                                                                                    B-</option>
                                                                                <option value="AB+"
                                                                                    {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>
                                                                                    AB+</option>
                                                                                <option value="AB-"
                                                                                    {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>
                                                                                    AB-</option>
                                                                                <option value="O+"
                                                                                    {{ old('blood_group') == 'O+' ? 'selected' : '' }}>
                                                                                    O+</option>
                                                                                <option value="O-"
                                                                                    {{ old('blood_group') == 'O-' ? 'selected' : '' }}>
                                                                                    O-</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Illness History</label>
                                                                            <textarea class="form-control" name="illness_history">{{ old('illness_history') }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Health Insurance</label>
                                                                            <select name="health_insurance"
                                                                                class="form-control">
                                                                                <option value="" disabled selected>
                                                                                    Select an option</option>
                                                                                <option value="yes"
                                                                                    {{ old('health_insurance') == 'yes' ? 'selected' : '' }}>
                                                                                    Yes</option>
                                                                                <option value="no"
                                                                                    {{ old('health_insurance') == 'no' ? 'selected' : '' }}>
                                                                                    No</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Insurance Name</label>
                                                                            <input type="text" class="form-control"
                                                                                name="insur_name"
                                                                                value="{{ old('insur_name') }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Insurance Number</label>
                                                                            <input type="text" class="form-control"
                                                                                name="insur_no"
                                                                                value="{{ old('insur_no') }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Allergies</label>
                                                                            <textarea class="form-control" name="allergies">{{ old('allergies') }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Health details table (existing data) -->
                                            <div class="mt-4">
                                                <h4>Health Details</h4>
                                                <table class="table table-bordered" id="healthDetailsTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Physical Disability</th>
                                                            <th>Blood Group</th>
                                                            <th>Illness History</th>
                                                            <th>Health Insurance</th>
                                                            <th>Insurance Name</th>
                                                            <th>Insurance Number</th>
                                                            <th>Allergies</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Loop through user's health details here -->
                                                        @foreach ($healthDetails as $health)
                                                            <tr>
                                                                <td>{{ $health->physical_disability }}</td>
                                                                <td>{{ $health->blood_group }}</td>
                                                                <td>{{ $health->illness_history }}</td>
                                                                <td>{{ $health->health_insurance }}</td>
                                                                <td>{{ $health->insur_name }}</td>
                                                                <td>{{ $health->insur_no }}</td>
                                                                <td>{{ $health->allergies }}</td>
                                                                <td>
                                                                    <a href="{{ route('health-details.edit', $health->id) }}"
                                                                        class="btn btn-sm p-0"style="border: none; background: none;"
                                                                        title="Edit">
                                                                        <i class="fas fa-edit text-primary"></i>
                                                                    </a>

                                                                    {{-- <form
                                                                        action="{{ route('health-details.delete', $health->id) }}"
                                                                        method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm p-0"
                                                                            style="border: none; background: none;"
                                                                            title="Delete">
                                                                            <i class="fas fa-trash-alt text-danger"></i>
                                                                        </button>
                                                                    </form> --}}


                                                                    <form
                                                                        action="{{ route('health-details.delete', $health->id) }}"
                                                                        method="POST" style="display:inline;"
                                                                        class="delete-health-form">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm p-0"
                                                                            style="border: none; background: none;"
                                                                            title="Delete">
                                                                            <i class="fas fa-trash-alt text-danger"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
                                        <script>
                                            $(document).ready(function() {
                                                // Handle form submission using AJAX
                                                $('#healthDetailsForm').submit(function(e) {
                                                    e.preventDefault(); // Prevent form submission
                                                    var formData = $(this).serialize(); // Serialize form data

                                                    $.ajax({
                                                        type: 'POST',
                                                        url: $(this).attr('action'),
                                                        data: formData,
                                                        success: function(response) {
                                                            // Clear form inputs
                                                            $('#healthDetailsForm')[0].reset();
                                                            // Close modal
                                                            $('#addHealthModal').modal('hide');
                                                            // Update table with new data
                                                            updateHealthDetailsTable(
                                                                response); // Assuming response contains the new health detail HTML
                                                        },
                                                        error: function(xhr, status, error) {
                                                            console.error(xhr.responseText);
                                                            alert('Error occurred. Please try again.');
                                                        }
                                                    });
                                                });

                                                // Function to update health details table
                                                function updateHealthDetailsTable(newHealthDetailHtml) {
                                                    $('#healthDetailsTable tbody').append(newHealthDetailHtml);
                                                }
                                            });
                                        </script>

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
@endsection
