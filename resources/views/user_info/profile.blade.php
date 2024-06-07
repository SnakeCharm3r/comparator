@extends('layouts.template')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
                            </a>
                        </div>
                        <div class="col ms-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ $user->fname }} {{ $user->lname }}</h4>
                            <h6 class="text-muted">{{ $user->job_title }}</h6>
                            <div class="user-Location"><i class="fas fa-map-marker-alt"></i> {{ $user->home_address }}</div>
                            <div class="about-text"></div>
                        </div>
                        <div class="col-auto profile-btn">
                            <a href="" class="btn btn-primary">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <div class="tab-pane fade show active" id="per_details_tab">

                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Personal Details</span>
                                            <a class="edit-link" data-bs-toggle="modal" href="#edit_personal_details"><i class="far fa-edit me-1"></i>Edit</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-9">{{ $user->fname }} {{ $user->lname }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">User Name</p>
                                            <p class="col-sm-9">{{ $user->username }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Date of Birth</p>
                                            <p class="col-sm-9">{{ $user->DOB }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email </p>
                                            <p class="col-sm-9">{{ $user->email }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Mobile</p>
                                            <p class="col-sm-9">{{ $user->mobile }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Address</p>
                                            <p class="col-sm-9 mb-0">{{ $user->home_address }},<br>
                                            {{ $user->district }},<br>
                                            {{ $user->house_no }},<br>
                                            {{ $user->street }}.</p>
                                        </div>

                                        <!-- Display Next of Kin Details if available -->
                                        @if($nextOfKins->isNotEmpty())
                                            <div class="row mt-4">
                                                <div class="col-sm-12">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Next of Kin</span>
                                                        <a class="edit-link" data-bs-toggle="modal" href="#edit_next_of_kin"><i class="far fa-edit me-1"></i>Edit</a>
                                                    </h5>
                                                    @foreach($nextOfKins as $kin)
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Full Name</p>
                                                            <p class="col-sm-9">{{ $kin->full_name }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Relationship</p>
                                                            <p class="col-sm-9">{{ $kin->relationship }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Mobile</p>
                                                            <p class="col-sm-9">{{ $kin->mobile }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Address</p>
                                                            <p class="col-sm-9">{{ $kin->address }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Email</p>
                                                            <p class="col-sm-9">{{ $kin->email }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Occupation</p>
                                                            <p class="col-sm-9">{{ $kin->occupation }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <!-- Button to show hidden form -->
                                            <div class="row mt-4">
                                                <div class="col-sm-12 text-center">
                                                    <button id="show-form-btn" class="btn btn-primary">Click here to add next of kins</button>
                                                </div>
                                            </div>

                                            <!-- Hidden form -->
                                            <div id="next-of-kin-form" style="display: none;" class="mt-4">
                                                <form action="{{ route('nextOfKins.addNextOfKins') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="userId" value="{{ $user->id }}">

                                                    <div class="mb-3">
                                                        <label for="full_name" class="form-label">Full Name</label>
                                                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="relationship" class="form-label">Relationship</label>
                                                        <input type="text" class="form-control" id="relationship" name="relationship" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mobile" class="form-label">Mobile</label>
                                                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="address" name="address">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="occupation" class="form-label">Occupation</label>
                                                        <input type="text" class="form-control" id="occupation" name="occupation">
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Add Next of Kin</button>
                                                </form>
                                            </div>
                                        @endif


                                        <!-- Display Family Data Details if available -->
                                        @if($familyData->isNotEmpty())
                                            <div class="row mt-4">
                                                <div class="col-sm-12">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Family Data</span>
                                                        <a class="edit-link" data-bs-toggle="modal" href="#edit_next_of_kin"><i class="far fa-edit me-1"></i>Edit</a>
                                                    </h5>
                                                    @foreach($familyData as $fami)
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Full Name</p>
                                                            <p class="col-sm-9">{{ $fami->full_name }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Relationship</p>
                                                            <p class="col-sm-9">{{ $fami->relationship }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Mobile</p>
                                                            <p class="col-sm-9">{{ $fami->mobile }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Address</p>
                                                            <p class="col-sm-9">{{ $fami->address }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Email</p>
                                                            <p class="col-sm-9">{{ $fami->email }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Occupation</p>
                                                            <p class="col-sm-9">{{ $fami->occupation }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <!-- Button to show hidden form -->
                                            <div class="row mt-4">
                                                <div class="col-sm-12 text-center">
                                                    <button id="show-form-btn" class="btn btn-primary">Click here to add family members</button>
                                                </div>
                                            </div>

                                            <!-- Hidden form -->
                                            <div id="family-data-form" style="display: none;" class="mt-4">
                                                <form action="{{ route('familyData.addFamilyData') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="userId" value="{{ $user->id }}">
                                                    <div id="family-members-container">
                                                        <!-- Family member input fields will be added here by JavaScript -->
                                                    </div>
                                                    <button type="button" id="add-member-btn" class="btn btn-success">Add Another Member</button>
                                                    <button type="submit" class="btn btn-primary">Save Family Data</button>
                                                </form>
                                            </div>
                                        @endif

                                        <!-- Display Health Details if available -->
                                        @if($healthDetails->isNotEmpty())
                                            <div class="row mt-4">
                                                <div class="col-sm-12">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Health Details</span>
                                                        <a class="edit-link" data-bs-toggle="modal" href="#edit_health"><i class="far fa-edit me-1"></i>Edit</a>
                                                    </h5>
                                                    @foreach($healthDetails as $health)
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Physical Disability</p>
                                                            <p class="col-sm-9">{{ $health->physical_disability }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Blood group</p>
                                                            <p class="col-sm-9">{{ $health->blood_group }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Illness history</p>
                                                            <p class="col-sm-9">{{ $health->illness_history }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Health Insurance</p>
                                                            <p class="col-sm-9">{{ $health->health_insurance }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Insurer name</p>
                                                            <p class="col-sm-9">{{ $health->insur_name }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Insurer number</p>
                                                            <p class="col-sm-9">{{ $health->insur_no }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Allergies</p>
                                                            <p class="col-sm-9">{{ $health->allergies }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <!-- Button to show hidden form -->
                                            <div class="row mt-4">
                                                <div class="col-sm-12 text-center">
                                                    <button id="show-form-btn" class="btn btn-primary">Click here to add health details</button>
                                                </div>
                                            </div>

                                            <!-- Hidden form -->
                                            <div id="health-form" style="display: none;" class="mt-4">
                                                <form action="{{ route('healthDetails.addHealthData') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="userId" value="{{ $user->id }}">

                                                    <div class="mb-3">
                                                        <label for="physical_disability" class="form-label">Physical Disability</label>
                                                        <input type="text" class="form-control" id="physical_disability" name="physical_disability" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="blood_group" class="form-label">blood group</label>
                                                        <input type="text" class="form-control" id="blood_group" name="blood_group" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="illness_history" class="form-label">illness history</label>
                                                        <input type="text" class="form-control" id="illness_history" name="illness_history" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="health_insurance" class="form-label">health insurance</label>
                                                        <input type="text" class="form-control" id="health_insurance" name="health_insurance">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">insurer name</label>
                                                        <input type="email" class="form-control" id="insur_name" name="insur_name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="insur_no" class="form-label">insurer number</label>
                                                        <input type="text" class="form-control" id="insur_no" name="insur_no">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="allergies" class="form-label">allergies</label>
                                                        <input type="text" class="form-control" id="allergies" name="allergies">
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Add Health Details</button>
                                                </form>
                                            </div>
                                        @endif

                                          <!-- Display Next of Kin Details if available -->

                                          @if($ccbrtRelation->isNotEmpty())
                                            <div class="row mt-4">
                                                <div class="col-sm-12">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Ccbrt Relation</span>
                                                        <a class="edit-link" data-bs-toggle="modal" href="#edit_ccbrt_relation"><i class="far fa-edit me-1"></i>Edit</a>
                                                    </h5>
                                                    @foreach($ccbrtRelation as $relate)
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0"> Names</p>
                                                            <p class="col-sm-9">{{ $relate->names }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Relationship</p>
                                                            <p class="col-sm-9">{{ $relate->relation }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Position</p>
                                                            <p class="col-sm-9">{{ $relate->position }}</p>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Department</p>
                                                            <p class="col-sm-9">{{ $kin->department }}</p>
                                                        </div>

                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <!-- Button to show hidden form -->
                                            <div class="row mt-4">
                                                <div class="col-sm-12 text-center">
                                                    <button id="show-form-btn" class="btn btn-primary">Click here to add Ccbrt relation</button>
                                                </div>
                                            </div>

                                            <!-- Hidden form -->
                                            <div id="ccbrt-relation-form" style="display: none;" class="mt-4">
                                                <form action="{{ route('ccbrtRelation.addRelation') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="userId" value="{{ $user->id }}">

                                                    <div class="mb-3">
                                                        <label for="names" class="form-label">Names</label>
                                                        <input type="text" class="form-control" id="names" name="names" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="relations" class="form-label">Relation</label>
                                                        <input type="text" class="form-control" id="relation" name="relations" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="department" class="form-label">Department</label>
                                                        <input type="text" class="form-control" id="department" name="department" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="position" class="form-label">Position</label>
                                                        <input type="text" class="form-control" id="position" name="position">
                                                    </div>


                                                    <button type="submit" class="btn btn-success">Add Ccbrt Relation</button>
                                                </form>
                                            </div>
                                        @endif

 <!-- Display Language Details if available -->
@if($languageData->isNotEmpty())
    <div class="row mt-4">
        <div class="col-sm-12">
            <h5 class="card-title d-flex justify-content-between">
                <span>Language Knowledge</span>
                <a class="edit-link" data-bs-toggle="modal" href="#edit_language"><i class="far fa-edit me-1"></i>Edit</a>
            </h5>
            @foreach($languageData as $lang)
                <div class="row mb-2">
                    <p class="col-sm-3 text-muted text-sm-end mb-0">Language</p>
                    <p class="col-sm-9">{{ $lang->language }}</p>
                </div>
                <div class="row mb-2">
                    <p class="col-sm-3 text-muted text-sm-end mb-0">Speaking</p>
                    <p class="col-sm-9">{{ $lang->speaking }}</p>
                </div>
                <div class="row mb-2">
                    <p class="col-sm-3 text-muted text-sm-end mb-0">Reading</p>
                    <p class="col-sm-9">{{ $lang->reading }}</p>
                </div>
                <div class="row mb-2">
                    <p class="col-sm-3 text-muted text-sm-end mb-0">Writing</p>
                    <p class="col-sm-9">{{ $lang->writing }}</p>
                </div>
            @endforeach
        </div>
    </div>
@else
    <!-- Button to show hidden form -->
    <div class="row mt-4">
        <div class="col-sm-12 text-center">
            <button id="show-language-form-btn" class="btn btn-primary">Click here to add languages</button>
        </div>
    </div>

    <!-- Hidden form -->
    <div id="languages-form" style="display: none;" class="mt-4">
        <form action="{{ route('languageData.addLanguage') }}" method="POST">
            @csrf
            <input type="hidden" name="userId" value="{{ $user->id }}">
            <div id="language-members-container">
                <!-- Language input fields will be added here by JavaScript -->
            </div>
            <button type="button" id="add-language-btn" class="btn btn-success">Add Another Language</button>
            <button type="submit" class="btn btn-primary">Save Languages</button>
        </form>
    </div>
@endif




                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                    <div id="password_tab" class="tab-pane fade">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Change Password</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form>
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </form>
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

<script>
    document.getElementById('show-form-btn').addEventListener('click', function() {
        var form = document.getElementById('next-of-kin-form');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });

    document.getElementById('show-form-btn').addEventListener('click', function() {
        var form = document.getElementById('health-form');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });

    document.getElementById('show-form-btn').addEventListener('click', function() {
        var form = document.getElementById('ccbrt-relation-form');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });

    document.addEventListener('DOMContentLoaded', function() {
    const maxMembers = 5;
    const minMembers = 1;
    const container = document.getElementById('family-members-container');
    const addButton = document.getElementById('add-member-btn');
    let memberCount = 0;

    function addMember() {
        if (memberCount < maxMembers) {
            memberCount++;
            const memberFields = `
                <div class="family-member">
                    <h6>Family Member ${memberCount}</h6>
                    <div class="mb-3">
                        <label for="full_name_${memberCount}" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="full_name_${memberCount}" name="familyData[${memberCount - 1}][full_name]" required>
                    </div>
                    <div class="mb-3">
                        <label for="relationship_${memberCount}" class="form-label">Relationship</label>
                        <input type="text" class="form-control" id="relationship_${memberCount}" name="familyData[${memberCount - 1}][relationship]" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number_${memberCount}" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="phone_number_${memberCount}" name="familyData[${memberCount - 1}][phone_number]">
                    </div>
                    <div class="mb-3">
                        <label for="DOB_${memberCount}" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="DOB_${memberCount}" name="familyData[${memberCount - 1}][DOB]">
                    </div>

                    <div class="mb-3">
                        <label for="occupation_${memberCount}" class="form-label">Occupation</label>
                        <input type="text" class="form-control" id="occupation_${memberCount}" name="familyData[${memberCount - 1}][occupation]">
                    </div>
                    <button type="button" class="btn btn-danger remove-member-btn">Remove</button>
                    <hr>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', memberFields);
            updateRemoveButtons();
        }
      }

     function updateRemoveButtons() {
        const removeButtons = document.querySelectorAll('.remove-member-btn');
        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                if (memberCount > minMembers) {
                    button.parentElement.remove();
                    memberCount--;
                }
            });
        });
          }

    document.getElementById('show-form-btn').addEventListener('click', function() {
        document.getElementById('family-data-form').style.display = 'block';
        for (let i = 0; i < minMembers; i++) {
            addMember();
        }
    });

    addButton.addEventListener('click', function() {
        addMember();
      });
 });


 // Language form members management
 document.addEventListener('DOMContentLoaded', function() {
        const languageMaxMembers = 5;
        const languageMinMembers = 1;
        const languageContainer = document.getElementById('language-members-container');
        const languageAddButton = document.getElementById('add-language-btn');
        let languageMemberCount = 0;

        function addLanguageMember() {
            if (languageMemberCount < languageMaxMembers) {
                languageMemberCount++;
                const memberFields = `
                    <div class="language-member">
                        <h6>Language Knowledge ${languageMemberCount}</h6>
                        <div class="mb-3">
                            <label for="language_${languageMemberCount}" class="form-label">Language</label>
                            <input type="text" class="form-control" id="language_${languageMemberCount}" name="languageData[${languageMemberCount - 1}][language]" required>
                        </div>
                        <div class="mb-3">
                            <label for="speaking_${languageMemberCount}" class="form-label">Speaking</label>
                            <input type="text" class="form-control" id="speaking_${languageMemberCount}" name="languageData[${languageMemberCount - 1}][speaking]" required>
                        </div>
                        <div class="mb-3">
                            <label for="reading_${languageMemberCount}" class="form-label">Reading</label>
                            <input type="text" class="form-control" id="reading_${languageMemberCount}" name="languageData[${languageMemberCount - 1}][reading]">
                        </div>
                        <div class="mb-3">
                            <label for="writing_${languageMemberCount}" class="form-label">Writing</label>
                            <input type="text" class="form-control" id="writing_${languageMemberCount}" name="languageData[${languageMemberCount - 1}][writing]">
                        </div>
                        <button type="button" class="btn btn-danger remove-member-btn">Remove</button>
                        <hr>
                    </div>
                `;
                languageContainer.insertAdjacentHTML('beforeend', memberFields);
                updateLanguageRemoveButtons();
            }
        }

        function updateLanguageRemoveButtons() {
            const removeButtons = document.querySelectorAll('.remove-member-btn');
            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (languageMemberCount > languageMinMembers) {
                        button.parentElement.remove();
                        languageMemberCount--;
                    }
                });
            });
        }

        document.getElementById('show-language-form-btn').addEventListener('click', function() {
            document.getElementById('languages-form').style.display = 'block';
            for (let i = 0; i < languageMinMembers; i++) {
                addLanguageMember();
            }
        });

        languageAddButton.addEventListener('click', function() {
            addLanguageMember();
        });
    });



</script>

@endsection
