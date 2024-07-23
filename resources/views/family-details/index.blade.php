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
            <!-- jQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <!-- Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
                                                    class="nav-link">CCBRT Reation</a></li>
                                            <li class="nav-item"><a href="{{ route('language_knowledge.index') }}"
                                                    class="nav-link">Language</a> </li>
                                        </ul>

                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active" id="family">
                                                <!-- Button to trigger modal -->
                                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                                                    data-target="#addFamilyModal">
                                                    Add Family Data
                                                </button>

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

                                                <hr>

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
                                                                        <form
                                                                            action="{{ route('family-details.destroy', $detail->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-danger"
                                                                                onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
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
@endsection
