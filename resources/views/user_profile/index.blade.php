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
                                            <li class="nav-item"><a href="{{ route('profile.index') }}" class="active nav-link"
                                                    data-bs-toggle="tab">User Info</a></li>
                                            <li class="nav-item"><a href="#security" class="nav-link"
                                                    data-bs-toggle="tab">Password</a></li>
                                            <li class="nav-item"><a href="{{ route('family-details.index') }}"
                                                    class="nav-link">Family Details</a></li>
                                            <li class="nav-item"><a href="{{ route('health-details.index') }}"
                                                    class="nav-link">Health Details</a></li>
                                            <li class="nav-item"><a href="{{ route('relation-details.index') }}"
                                                    class="nav-link">CCBRT Reation</a></li>
                                            <li class="nav-item"><a href="{{ route('language_knowledge.index') }}" 
                                                class="nav-link">Language</a> </li>
                                                    
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
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Date of Birth</label>
                                                                        <input class="form-control" type="date"
                                                                            name="DOB"
                                                                            value="{{ old('dob', $user->dob) }}"readonly>
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
                                                                        <label for="marital-status">Marital Status:</label>
                                                                        <select id="marital-status" class="form-control">
                                                                            <option value="">Select Marital Status
                                                                            </option>
                                                                            <option value="single">Single</option>
                                                                            <option value="married">Married</option>
                                                                            <option value="divorced">Divorced</option>
                                                                            <option value="widowed">Widowed</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <!-- Email Section -->
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Region</label>
                                                                        <input type="text" class="form-control"
                                                                            name="region">
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>District</label>
                                                                        <input type="text" class="form-control"
                                                                            name="district">
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Street</label>
                                                                        <input type="text" class="form-control"
                                                                            name="street">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>House Number</label>
                                                                        <input type="text" class="form-control"
                                                                            name="house_no">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Home Address</label>
                                                                        <input type="text" class="form-control"
                                                                            name="home_address">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Domicile</label>
                                                                        <input type="text" class="form-control"
                                                                            name="domicile">
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Religion</label>
                                                                        <input type="text" class="form-control"
                                                                            name="religion">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Professional Reg Number</label>
                                                                        <input type="text"
                                                                            class="form-control"name="professional_reg_number">
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>National Identification Number</label>
                                                                        <input type="text"
                                                                            class="form-control"name="national_Identification_number">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-secondary me-2" type="button"
                                                                onclick="redirectToEditProfile({{ $user->id }})">Edit</button>

                                                        </div>
                                                    </div>

                                                    <script>
                                                        function redirectToEditProfile(userId) {
                                                            window.location.href = `/profile/edit/${userId}`;
                                                        }
                                                    </script>


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

                                            {{-- <div class="tab-pane" id="Health_Details">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Physical Disability</label>
                                                                <input type="text" class="form-control"
                                                                    name="physical_disability">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Blood Group</label>
                                                                <input type="text" class="form-control"
                                                                    name="blood_group">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Illness History</label>
                                                                <textarea class="form-control" name="illness_history"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Health Insurance</label>
                                                                <input type="text" class="form-control"
                                                                    name="health_insurance">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Insurance Name</label>
                                                                <input type="text" class="form-control"
                                                                    name="insurer_name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Insurance Number</label>
                                                                <input type="text" class="form-control"
                                                                    name="insurer_no">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Allergies</label>
                                                                <textarea class="form-control" name="allergies"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-secondary me-2"
                                                                type="button">Edit</button>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div> --}}

                                            {{-- <div class="tab-pane" id="family">
                                                <div class="tab-pane" id="family">
                                                    <div class="row">
                                                        <!-- Family Details Table -->
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
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <!-- Add Family Details Form -->
                                                        <div class="col-md-4">
                                                            <h3>Add Family Details</h3>
                                                            <form action="{{ route('familyData.addFamilyData') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="userId"
                                                                    value="{{ $user->id }}">
                                                                <div id="familyDataContainer">
                                                                    <div class="family-member">
                                                                        <div class="form-group">
                                                                            <label>Full Name</label>
                                                                            <input type="text" class="form-control"
                                                                                name="familyData[0][full_name]" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Relationship</label>
                                                                            <input type="text" class="form-control"
                                                                                name="familyData[0][relationship]"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Mobile</label>
                                                                            <input type="text" class="form-control"
                                                                                name="familyData[0][phone_number]"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Date of Birth</label>
                                                                            <input type="date" class="form-control"
                                                                                name="familyData[0][DOB]" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Occupation</label>
                                                                            <input type="text" class="form-control"
                                                                                name="familyData[0][occupation]">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-secondary"
                                                                    id="addFamilyMember">Add Another Family Member</button>
                                                                <button type="submit" class="btn btn-primary">Add Family
                                                                    Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div> --}}

                                            {{-- <script>
                                                    $(document).ready(function() {
                                                        let familyMemberIndex = 1;
                                                        $('#addFamilyMember').click(function() {
                                                            let familyMemberHtml = `
                                                                <div class="family-member mt-3">
                                                                    <hr>
                                                                    <div class="form-group">
                                                                        <label>Full Name</label>
                                                                        <input type="text" class="form-control" name="familyData[${familyMemberIndex}][full_name]" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Relationship</label>
                                                                        <input type="text" class="form-control" name="familyData[${familyMemberIndex}][relationship]" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Mobile</label>
                                                                        <input type="text" class="form-control" name="familyData[${familyMemberIndex}][phone_number]" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Date of Birth</label>
                                                                        <input type="date" class="form-control" name="familyData[${familyMemberIndex}][DOB]" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Occupation</label>
                                                                        <input type="text" class="form-control" name="familyData[${familyMemberIndex}][occupation]">
                                                                    </div>
                                                                </div>
                                                            `;
                                                            $('#familyDataContainer').append(familyMemberHtml);
                                                            familyMemberIndex++;
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                            {{-- <div class="tab-pane" id="CCBRT_Relation">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Names</label>
                                                                <input type="text" class="form-control"
                                                                    name="names">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Relation</label>
                                                                <input type="text" class="form-control"
                                                                    name="relation">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Department</label>
                                                                <input type="text" class="form-control"
                                                                    name="department">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Position</label>
                                                                <input type="text" class="form-control"
                                                                    name="position">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-secondary me-2"
                                                                type="button">Edit</button>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div> --}}

                                            <div class="tab-pane" id="language">
                                                <form action="#">
                                                    <div class="row language-item">
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label>Language</label>
                                                                <input type="text" class="form-control"
                                                                    name="language">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label>Speaking</label>
                                                                <input type="text" class="form-control"
                                                                    name="speaking">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label>Reading</label>
                                                                <input type="text" class="form-control"
                                                                    name="reading">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label>Writing</label>
                                                                <input type="text" class="form-control"
                                                                    name="writing">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-secondary me-2"
                                                                type="button">Edit</button>

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
