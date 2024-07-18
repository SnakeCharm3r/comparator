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
                                    <div class="e-profile">
                                        <div class="row">
                                            <div class="col-12 col-sm-auto mb-3">
                                                <div class="mx-auto" style="width: 140px;">
                                                    <div class="d-flex justify-content-center align-items-center rounded"
                                                        style="height: 140px; background-color: rgb(233, 236, 239); position: relative;">
                                                        <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                                            alt="Profile Picture" class="img-fluid rounded-circle"
                                                            style="max-width: 140px; height: 140px; border: 2px solid #ccc; padding: 5px; object-fit: cover;">
                                                        <form id="profilePictureForm"
                                                            action="{{ route('profile.update.picture') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            style="display: none;">
                                                            @csrf
                                                            <input type="file" class="form-control"
                                                                id="profile_picture" name="profile_picture"
                                                                accept="image/*"
                                                                onchange="handleProfilePictureChange(this)">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $user->username }}</h4>
                                                    <p class="mb-0">{{ $user->email }}</p>
                                                    <p class="mb-0">{{ $user->department->name }}</p>
                                                    <div class="mt-2">
                                                        <button class="btn btn-primary" type="button"
                                                            onclick="document.getElementById('profile_picture').click()">
                                                            <i class="fa fa-fw fa-camera"></i>
                                                            <span>Change Photo</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="text-sm-right ml-auto">
                                                    <div class="text-muted"><small>Joined 09 July 2024</small></div>
                                                </div>
                                            </div>
                                            <script>
                                                function handleProfilePictureChange(input) {
                                                    document.getElementById('profilePictureForm').submit();
                                                }
                                            </script>
                                        </div>
                                    </div>

                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="{{ route('profile.index') }}"
                                                class="nav-link">User Info</a></li>
                                        <li class="nav-item"><a href="#security" class="nav-link"
                                                data-bs-toggle="tab">Password</a></li>
                                        <li class="nav-item"><a href="{{ route('family-details.index') }}"
                                                class="active nav-link">Family Details</a></li>
                                        <li class="nav-item"><a href="{{ route('health-details.index') }}"
                                                class=" nav-link">Health Details</a></li>
                                        <li class="nav-item"><a href="{{ route('ccbrt_relation.index') }}"
                                                class="nav-link">CCBRT Reation</a></li>
                                        <li class="nav-item"><a href="{{ route('language_knowledge.index') }}"
                                                class="nav-link">Language</a> </li>

                                        <li class="nav-item"><a href="#policies" class="nav-link"
                                                data-bs-toggle="tab">Policies</a></li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active" id="family">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h3>Family Details</h3>
                                                    @if (session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                    @endif
                                                    <table class="table table-bordered">
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
                                                                    <form action="{{ route('family-details.destroy', $detail->id) }}"
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
                                                <div class="col-md-4">
                                                    <h3>Add Family Details</h3>
                                                    <form action="{{ route('family-details.addFamilyData') }}"
                                                        method="POST">
                                                        @csrf
                                                        <div id="familyDataContainer">
                                                            <div class="family-member">
                                                                <div class="form-group">
                                                                    <label>Full Name</label>
                                                                    <input type="text" class="form-control"
                                                                        name="familyData[0][full_name]" required
                                                                        value="{{ old('familyData.0.full_name') }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Relationship</label>
                                                                    <input type="text" class="form-control"
                                                                        name="familyData[0][relationship]" required
                                                                        value="{{ old('familyData.0.relationship') }}">
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
                                                                        name="familyData[0][DOB]" required
                                                                        value="{{ old('familyData.0.DOB') }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Occupation</label>
                                                                    <input type="text" class="form-control"
                                                                        name="familyData[0][occupation]"
                                                                        value="{{ old('familyData.0.occupation') }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Add Family
                                                            Data</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Add other tab contents here -->
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
