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
                                                            @if ($user->profile_picture)
                                                                <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                                                    alt="Profile Picture" class="img-fluid rounded-circle"
                                                                    style="max-width: 140px; height: 140px; border: 2px solid #ccc; padding: 5px; object-fit: cover;">
                                                            @else
                                                                <img src="{{ asset('assets/img/icon.png') }}"
                                                                    alt="Default User Icon" class="img-fluid rounded-circle"
                                                                    style="max-width: 150px; height: 140px; border: 1px solid #ccc; padding: 1px; object-fit: cover;">
                                                            @endif
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
                                                    class="active nav-link" data-bs-toggle="tab">User Info</a></li>
                                            <li class="nav-item"><a href="#" class="nav-link">Password</a></li>
                                            <li class="nav-item"><a href="{{ route('family-details.index') }}"
                                                    class="nav-link">Family Details</a></li>
                                            <li class="nav-item"><a href="{{ route('health-details.index') }}"
                                                    class="nav-link">Health Details</a></li>
                                            <li class="nav-item"><a href="{{ route('ccbrt_relation.index') }}"
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
                                                                            value="{{ old('dob', $user->DOB) }}"readonly>
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
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>NSSF Number</label>
                                                                        <input type="text"
                                                                            class="form-control"name="nssf_no">
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


                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Title</th>
                                                                            <th>Actions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($policies as $policy)
                                                                            <tr>
                                                                                <td>{{ $policy->title }}</td>
                                                                                <td class="text-center">
                                                                                    <!-- View PDF Icon -->
                                                                                    <a href="javascript:void(0);"
                                                                                        onclick="viewPDF('{{ asset('storage/' . $policy->pdf_path) }}')">
                                                                                        <i class="fas fa-eye text-info fs-5 me-3"
                                                                                            title="View PDF"></i>
                                                                                    </a>

                                                                                    <!-- Edit Icon -->
                                                                                    <a
                                                                                        href="{{ route('policies.edit', $policy->id) }}">
                                                                                        <i class="fas fa-edit text-primary fs-5 me-3"
                                                                                            title="Edit"></i>
                                                                                    </a>

                                                                                    <!-- Delete Icon -->
                                                                                    <form
                                                                                        action="{{ route('policies.destroy', $policy->id) }}"
                                                                                        method="POST"
                                                                                        style="display:inline;"
                                                                                        onsubmit="return confirm('Are you sure you want to delete this policy?');">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit"
                                                                                            style="border: none; background: none; padding: 0;">
                                                                                            <i class="fas fa-trash text-danger fs-5"
                                                                                                title="Delete"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>

                                                                <script>
                                                                    function viewPDF(url) {
                                                                        window.open(url, '_blank');
                                                                    }
                                                                </script>

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
