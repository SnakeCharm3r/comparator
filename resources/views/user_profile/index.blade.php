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
                                                    {{-- <div class="text-sm-right ml-auto">
                                                        <div class="text-muted"><small>Joined 09 July 2024</small></div>
                                                    </div> --}}
                                                    <div class="text-sm-right ml-auto">
                                                        <div class="text-muted">
                                                            <small>Joined {{ $user->created_at->format('d F Y') }}</small>
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
                                        <br>
                                        <div class="row">
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
                                                            <td>{{ $user->DOB }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Marital Status</th>
                                                            <td>{{ $user->marital_status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Address</th>
                                                            <td>{{ $user->region }} {{ $user->district }}
                                                                {{ $user->street }} {{ $user->house_no }}</td>
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
                                                            <th scope="row">Marital Status</th>
                                                            <td>{{ $user->marital_status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Home Address</th>
                                                            <td>{{ $user->home_address }}</td>
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
                        <!-- Add other content for profile page here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
