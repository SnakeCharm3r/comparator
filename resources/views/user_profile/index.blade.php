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
                                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $user->username }}
                                                        </h4>
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
                                            <li class="nav-item"><a href="#settings" class="active nav-link"
                                                    data-bs-toggle="tab">User Info</a></li>

                                            <li class="nav-item"><a href="#security" class="nav-link"
                                                    data-bs-toggle="tab">Password</a></li>
                                            <li class="nav-item"><a href="#family" class="nav-link"
                                                    data-bs-toggle="tab">Family Details</a></li>
                                            <li class="nav-item"><a href="#policies" class="nav-link"
                                                    data-bs-toggle="tab">Policies</a></li>
                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active" id="settings">
                                                <form action="#" method="POST" class="form" novalidate="">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>First Name</label>
                                                                        <input class="form-control" type="text"
                                                                            name="first_name" placeholder="John Smith"
                                                                            value="{{ old('first_name', $user->fname) }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Middle Name</label>
                                                                        <input class="form-control" type="text"
                                                                            name="middle_name" placeholder="Middle Name"
                                                                            value="{{ old('middle_name', $user->mname) }}"readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Last Name</label>
                                                                        <input class="form-control" type="text"
                                                                            name="last_name" placeholder="John Smith"
                                                                            value="{{ old('last_name', $user->lname) }}"readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <!-- Email Section -->
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Username</label>
                                                                        <input class="form-control" type="text"
                                                                            name="username" placeholder="johnny.s"
                                                                            value="{{ old('username', $user->username) }}"readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input class="form-control" type="text"
                                                                            name="email" placeholder="user@example.com"
                                                                            value="{{ old('email', $user->email) }}"readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Mobile Number</label>
                                                                        <input type="text"
                                                                            class="form-control"readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <!-- Email Section -->
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Date of Birth</label>
                                                                        <input type="text"
                                                                            class="form-control"readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Place of Birth</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Marital Status:</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <!-- Email Section -->
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Region</label>
                                                                        <select class="form-control" name="religion">
                                                                            <option value="" disabled selected>Select
                                                                                your religion</option>
                                                                            <option value="islam">Mwanza</option>
                                                                            <option value="hinduism">Dar es Salaam</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>District</label>
                                                                        <select class="form-control" name="district">
                                                                            <option value="" disabled selected>Select
                                                                                your district</option>
                                                                            <option value="dar_es_salaam_ilala">Ilala
                                                                            </option>
                                                                            <option value="dar_es_salaam_kinondoni">
                                                                                Kinondoni</option>
                                                                            <option value="dar_es_salaam_temeke">Temeke
                                                                            </option>
                                                                            <option value="dar_es_salaam_ubungo">Ubungo
                                                                            </option>
                                                                            <option value="dar_es_salaam_kigamboni">
                                                                                Kigamboni</option>
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Street</label>
                                                                        <select class="form-control" name="street">
                                                                            <option value="" disabled selected>Select
                                                                                your street</option>
                                                                            <option value="street1">Msasani</option>
                                                                            <option value="street2">Namanga</option>
                                                                            <!-- Add more options as needed -->
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <!-- Email Section -->

                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Religion</label>
                                                                        <select class="form-control" name="religion">
                                                                            <option value="" disabled selected>Select
                                                                                your religion</option>
                                                                            <option value="christianity">Christianity
                                                                            </option>
                                                                            <option value="islam">Islam</option>
                                                                            <option value="hinduism">Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Professional Reg Number</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>National Identification Number</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-secondary me-2"
                                                                type="button">Edit</button>
                                                            <button class="btn btn-primary" type="submit">Save
                                                                Changes</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="tab-pane" id="policies">
                                                <div class="row mt-4">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3>CCBRT Policies</h3>
                                                                <div class="accordion" id="policyAccordion">
                                                                    @foreach ($policies as $policy)
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="heading-{{ $policy->id }}">
                                                                                <button class="accordion-button collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#collapse-{{ $policy->id }}"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="collapse-{{ $policy->id }}">
                                                                                    {{ $policy->title }}
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapse-{{ $policy->id }}"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="heading-{{ $policy->id }}"
                                                                                data-bs-parent="#policyAccordion">
                                                                                <div class="accordion-body">
                                                                                    <div>{!! $policy->content !!}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="family">
                                                <form action="#">
                                                    <div class="row">
                                                        <!-- Next of Kin 1 -->
                                                        <div class="col-md-6">
                                                            <h5>Next of Kin 1</h5>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>First Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="next_of_kin1_first_name"
                                                                            placeholder="First Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Last Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="next_of_kin1_last_name"
                                                                            placeholder="Last Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Email:</label>
                                                                        <input type="email" class="form-control"
                                                                            name="next_of_kin1_email" placeholder="Email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Phone:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="next_of_kin1_phone" placeholder="Phone">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Relationship:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="next_of_kin1_relationship"
                                                                            placeholder="Relationship">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Next of Kin 2 -->
                                                        <div class="col-md-6">
                                                            <h5>Next of Kin 2</h5>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>First Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="next_of_kin2_first_name"
                                                                            placeholder="First Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Last Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="next_of_kin2_last_name"
                                                                            placeholder="Last Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Email:</label>
                                                                        <input type="email" class="form-control"
                                                                            name="next_of_kin2_email" placeholder="Email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Phone:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="next_of_kin2_phone" placeholder="Phone">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Relationship:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="next_of_kin2_relationship"
                                                                            placeholder="Relationship">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>First Person to Contact in Case of Emergency:</label>
                                                                <select class="form-control" name="emergency_contact">
                                                                    <option value="" disabled selected>Select
                                                                        Emergency Contact</option>
                                                                    <option value="next_of_kin1">Next of Kin 1</option>
                                                                    <option value="next_of_kin2">Next of Kin 2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-secondary me-2"
                                                                type="button">Edit</button>
                                                            <button class="btn btn-primary" type="submit">Save
                                                                Changes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>



                                            <div class="tab-pane" id="security">
                                                <!-- Password Change Section -->
                                                <div class="row">
                                                    <div class="col-12 col-md-4">
                                                        <div class="tab-pane" id="security">
                                                            <div class="col-12 mb-3">
                                                                <div class="mb-3"><b>Change Password</b>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Current Password</label>
                                                                    <input class="form-control" type="password"
                                                                        name="current_password" placeholder="••••••">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>New Password</label>
                                                                    <input class="form-control" type="password"
                                                                        name="new_password" placeholder="••••••">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Confirm Password</label>
                                                                    <input class="form-control" type="password"
                                                                        name="new_password_confirmation"
                                                                        placeholder="••••••">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col d-flex justify-content-end">
                                                                        <button class="btn btn-secondary me-2"
                                                                            type="button">Edit</button>
                                                                        <button class="btn btn-primary"
                                                                            type="submit">Save
                                                                            Changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
