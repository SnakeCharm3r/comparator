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
                                                    data-bs-toggle="tab">Settings</a></li>
                                            <li class="nav-item"><a href="#policies" class="nav-link"
                                                    data-bs-toggle="tab">Policies</a></li>
                                            <li class="nav-item"><a href="#additionalInfo" class="nav-link"
                                                    data-bs-toggle="tab">Additional Info</a></li>
                                            <li class="nav-item"><a href="#security" class="nav-link"
                                                    data-bs-toggle="tab">Security</a></li>
                                            <li class="nav-item"><a href="#otherInfo" class="nav-link"
                                                    data-bs-toggle="tab">Other Info</a></li>
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
                                                                            value="{{ old('first_name', $user->fname) }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Middle Name</label>
                                                                        <input class="form-control" type="text"
                                                                            name="middle_name" placeholder="Middle Name"
                                                                            value="{{ old('middle_name', $user->mname) }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Last Name</label>
                                                                        <input class="form-control" type="text"
                                                                            name="last_name" placeholder="John Smith"
                                                                            value="{{ old('last_name', $user->lname) }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Username</label>
                                                                        <input class="form-control" type="text"
                                                                            name="username" placeholder="johnny.s"
                                                                            value="{{ old('username', $user->username) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <!-- Email Section -->
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input class="form-control" type="text"
                                                                            name="email" placeholder="user@example.com"
                                                                            value="{{ old('email', $user->email) }}">
                                                                    </div>
                                                                </div>
                                                                <!-- Password Change Section -->
                                                                <div class="col-12 col-md-6">
                                                                    <div class="tab-pane" id="security">
                                                                        <div class="col-12 mb-3">
                                                                            <div class="mb-2"><b>Change Password</b>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Current Password</label>
                                                                                <input class="form-control"
                                                                                    type="password"
                                                                                    name="current_password"
                                                                                    placeholder="••••••">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>New Password</label>
                                                                                <input class="form-control"
                                                                                    type="password" name="new_password"
                                                                                    placeholder="••••••">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Confirm Password</label>
                                                                                <input class="form-control"
                                                                                    type="password"
                                                                                    name="new_password_confirmation"
                                                                                    placeholder="••••••">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
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
                                            <div class="tab-pane" id="additionalInfo">
                                                <h3>Additional Info</h3>
                                                <p>Next of Kin: John Doe</p>
                                                <p>Other additional info goes here.</p>
                                            </div>

                                            <div class="tab-pane" id="otherInfo">
                                                <h3>Other Info</h3>
                                                <p>Other important info for the user goes here.</p>
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
