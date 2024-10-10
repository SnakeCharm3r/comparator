<!-- resources/views/profile/show.blade.php -->

{{-- @extends('layouts.template')

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
                                                                    style="max-width: 160px; height: 140px; #ccc; padding: 1px; object-fit: cover;">
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
                                            <li class="nav-item"><a href="{{ route('policies.user') }}"
                                                    class="nav-link">Policies</a></li>
                                            <li class="nav-item"><a href="{{ route('user_profile.pass') }}"
                                                    class="nav-link">Password</a></li>
                                            <li class="nav-item"><a href="{{ route('family-details.index') }}"
                                                    class="nav-link">Family Details</a></li>
                                            <li class="nav-item"><a href="{{ route('health-details.index') }}"
                                                    class="nav-link">Health Details</a></li>
                                            <li class="nav-item"><a href="{{ route('ccbrt_relation.index') }}"
                                                    class="nav-link">CCBRT Reation</a></li>
                                            <li class="nav-item"><a href="{{ route('language_knowledge.index') }}"
                                                    class="nav-link">Language</a> </li>
                                        </ul>
                                            <div class="col">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" style="width: 200px;">User Information
                                                            </th>
                                                            <td><strong>Details</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Names</th>
                                                            <td>{{ $user->fname }} {{ $user->mname }}
                                                                {{ $user->lname }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Username</th>
                                                            <td>{{ $user->username }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td>{{ $user->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Date of Birth</th>
                                                            <td>{{ $user->DOB }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">District</th>
                                                            <td>{{ $user->district }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Marital Status</th>
                                                            <td>{{ $user->marital_status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Box No</th>
                                                            <td>{{ $user->box_no }} </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Plot No</th>
                                                            <td>{{ $user->plot_no }} </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Popular Landmark</th>
                                                            <td>{{ $user->popular_landmark }} </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Home Address</th>
                                                            <td>{{ $user->home_address }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Domicile</th>
                                                            <td>{{ $user->domicile }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Religion</th>
                                                            <td>{{ $user->religion }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">House Number</th>
                                                            <td>{{ $user->house_no }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Region</th>
                                                            <td>{{ $user->region }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Street</th>
                                                            <td>{{ $user->street }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Professional Reg Number</th>
                                                            <td>{{ $user->professional_reg_number }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Identification Numbers</th>
                                                            <td>{{ $user->national_Identification_number }}
                                                                {{ $user->nssf_no }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="text-end">
                                                    <button class="btn btn-secondary me-2"
                                                        onclick="redirectToEditProfile({{ $user->id }})">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function redirectToEditProfile(userId) {
                                                window.location.href = `/profile/edit/${userId}`;
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
@endsection --}}
{{-- @extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">User Profile</h3>
                    </div>
                </div>
            </div>

            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

            <div class="container">
                <div class="row flex-lg-nowrap">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3 text-center">
                                            <div class="mx-auto" style="width: 140px;">
                                                <div class="d-flex justify-content-center align-items-center rounded"
                                                    style="height: 140px; background-color: rgb(233, 236, 239);">
                                                    @if ($user->profile_picture)
                                                        <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                                            alt="Profile Picture" class="img-fluid rounded-circle"
                                                            style="max-width: 140px; height: 140px; border: 2px solid #ccc; padding: 5px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('assets/img/icon.png') }}"
                                                            alt="Default User Icon" class="img-fluid rounded-circle"
                                                            style="max-width: 160px; height: 140px; padding: 1px; object-fit: cover;">
                                                    @endif

                                                    <form id="profilePictureForm"
                                                        action="{{ route('profile.update.picture') }}" method="POST"
                                                        enctype="multipart/form-data" style="display: none;">
                                                        @csrf
                                                        <input type="file" class="form-control" id="profile_picture"
                                                            name="profile_picture" accept="image/*"
                                                            onchange="handleProfilePictureChange(this)">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
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
                                        </div>

                                        <script>
                                            function handleProfilePictureChange(input) {
                                                document.getElementById('profilePictureForm').submit();
                                            }
                                        </script>
                                    </div>

                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="{{ route('profile.index') }}" class="active nav-link">User Info</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('policies.user') }}" class="nav-link">Policies</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('user_profile.pass') }}" class="nav-link">Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('family-details.index') }}" class="nav-link">Family
                                                Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('health-details.index') }}" class="nav-link">Health
                                                Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('ccbrt_relation.index') }}" class="nav-link">CCBRT
                                                Relation</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('language_knowledge.index') }}" class="nav-link">Language</a>
                                        </li>
                                    </ul>

                                    <div class="mt-4">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">User Information</th>
                                                    <td><strong>Details</strong></td>
                                                </tr>
                                                @foreach ([
        'Names' => $user->fname . ' ' . $user->mname . ' ' . $user->lname,
        'Username' => $user->username,
        'Email' => $user->email,
        'Date of Birth' => $user->DOB,
        'District' => $user->district,
        'Marital Status' => $user->marital_status,
        'Box No' => $user->box_no,
        'Plot No' => $user->plot_no,
        'Popular Landmark' => $user->popular_landmark,
        'Home Address' => $user->home_address,
        'Domicile' => $user->domicile,
        'Religion' => $user->religion,
        'House Number' => $user->house_no,
        'Region' => $user->region,
        'Street' => $user->street,
        'Professional Reg Number' => $user->professional_reg_number,
        'Identification Numbers' => $user->national_Identification_number . ' ' . $user->nssf_no,
    ] as $label => $value)
                                                    <tr>
                                                        <th scope="row">{{ $label }}</th>
                                                        <td>{{ $value }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="text-end">
                                            <button class="btn btn-secondary me-2"
                                                onclick="redirectToEditProfile({{ $user->id }})">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function redirectToEditProfile(userId) {
                    window.location.href = `/profile/edit/${userId}`;
                }
            </script>
        </div>
    </div>
@endsection --}}

@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">User Profile</h3>
                    </div>
                </div>
            </div>

            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

            <div class="container">
                <div class="row flex-lg-nowrap">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <!-- Profile Picture Section -->
                                        <div class="col-12 col-sm-auto mb-3 text-center">
                                            <div class="mx-auto" style="width: 140px;">
                                                <div class="d-flex justify-content-center align-items-center rounded"
                                                    style="height: 140px; background-color: rgb(233, 236, 239);">
                                                    @if ($user->profile_picture)
                                                        <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                                            alt="Profile Picture" class="img-fluid rounded-circle"
                                                            style="max-width: 140px; height: 140px; border: 2px solid #ccc; padding: 5px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('assets/img/icon.png') }}"
                                                            alt="Default User Icon" class="img-fluid rounded-circle"
                                                            style="max-width: 160px; height: 140px; padding: 1px; object-fit: cover;">
                                                    @endif

                                                    <form id="profilePictureForm"
                                                        action="{{ route('profile.update.picture') }}" method="POST"
                                                        enctype="multipart/form-data" style="display: none;">
                                                        @csrf
                                                        <input type="file" class="form-control" id="profile_picture"
                                                            name="profile_picture" accept="image/*"
                                                            onchange="handleProfilePictureChange(this)">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- User Info Section -->
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
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
                                        </div>

                                        <script>
                                            function handleProfilePictureChange(input) {
                                                document.getElementById('profilePictureForm').submit();
                                            }
                                        </script>
                                    </div>

                                    <!-- Navigation Tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="{{ route('profile.index') }}" class="active nav-link">User Info</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('policies.user') }}" class="nav-link">Policies</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('user_profile.pass') }}" class="nav-link">Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('family-details.index') }}" class="nav-link">Family
                                                Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('health-details.index') }}" class="nav-link">Health
                                                Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('ccbrt_relation.index') }}" class="nav-link">CCBRT
                                                Relation</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('language_knowledge.index') }}" class="nav-link">Language</a>
                                        </li>
                                    </ul>

                                    <!-- User Details Table -->
                                    <div class="mt-4">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th colspan="2" class="text-center">Personal Information</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">Names</th>
                                                    <td>{{ $user->fname . ' ' . $user->mname . ' ' . $user->lname }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Username</th>
                                                    <td>{{ $user->username }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Date of Birth</th>
                                                    <td>{{ $user->DOB }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Marital Status</th>
                                                    <td>{{ $user->marital_status }}</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" class="text-center">Address Information</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">District</th>
                                                    <td>{{ $user->district }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Box No</th>
                                                    <td>{{ $user->box_no }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Plot No</th>
                                                    <td>{{ $user->plot_no }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Popular Landmark</th>
                                                    <td>{{ $user->popular_landmark }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Home Address</th>
                                                    <td>{{ $user->home_address }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Domicile</th>
                                                    <td>{{ $user->domicile }}</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" class="text-center">Professional Information</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Professional Reg Number</th>
                                                    <td>{{ $user->professional_reg_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Identification Numbers</th>
                                                    <td>{{ $user->national_Identification_number . ' ' . $user->nssf_no }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <!-- Update Button -->
                                        <div class="text-end">
                                            <button class="btn btn-secondary me-2"
                                                onclick="redirectToEditProfile({{ $user->id }})">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function redirectToEditProfile(userId) {
                    window.location.href = `/profile/edit/${userId}`;
                }
            </script>
        </div>
    </div>
@endsection
