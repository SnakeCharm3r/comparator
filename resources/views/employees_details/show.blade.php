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
                                                            style="max-width: 140px; height: 140px; padding: 5px; object-fit: cover;">
                                                        <a href="{{ asset('storage/' . $user->profile_picture) }}" download
                                                            class="btn btn-primary"
                                                            style="position: absolute; bottom: 10px; right: 10px; padding: 5px 10px;">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    @else
                                                        <img src="{{ asset('assets/img/icon.png') }}"
                                                            alt="Default User Icon" class="img-fluid rounded-circle"
                                                            style="max-width: 140px; height: 140px; padding: 1px; object-fit: cover;">
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $user->fname }}
                                                    {{ $user->mname }} {{ $user->lname }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#" class="active nav-link">User Info</a></li>
                                    </ul>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Department</th>
                                                        <th>Job Title</th>
                                                        <th>CCBRT Code</th>
                                                        <th>Professional Reg Number</th>
                                                        <th>NSSF No</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $user->department->dept_name }}</td>
                                                        <td>{{ $user->job_title }}</td>
                                                        <td>{{ $user->ccb_code }}</td>
                                                        <td>{{ $user->professional_reg_number }}</td>
                                                        <td>{{ $user->nssf_no }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-primary"
                                                                data-bs-toggle="modal" data-bs-target="#editModal"
                                                                onclick="populateEditForm({{ $user->id }})">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal" tabindex="-1"
                                                aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit User Details
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="editForm" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="dept_name"
                                                                        class="form-label">Department</label>
                                                                    <input type="text" class="form-control"
                                                                        id="dept_name" name="department">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="job_title" class="form-label">Job
                                                                        Title</label>
                                                                    <input type="text" class="form-control"
                                                                        id="job_title" name="job_title">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="ccb_code" class="form-label">CCBRT
                                                                        Code</label>
                                                                    <input type="text" class="form-control"
                                                                        id="ccb_code" name="ccb_code">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="professional_reg_number"
                                                                        class="form-label">Professional Reg Number</label>
                                                                    <input type="text" class="form-control"
                                                                        id="professional_reg_number"
                                                                        name="professional_reg_number">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nssf_no" class="form-label">NSSF No</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nssf_no" name="nssf_no">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Include Bootstrap JS and Popper.js -->
                                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                                            <script>
                                                function populateEditForm(userId) {
                                                    fetch(`/employee/${userId}`)
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            console.log('Fetched user data:', data); // For debugging

                                                            // Populate the form with fetched data
                                                            document.getElementById('dept_name').value = data.department;
                                                            document.getElementById('job_title').value = data.job_title;
                                                            document.getElementById('ccb_code').value = data.ccb_code;
                                                            document.getElementById('professional_reg_number').value = data.professional_reg_number;
                                                            document.getElementById('nssf_no').value = data.nssf_no;

                                                            // Set the form action to the correct URL
                                                            document.getElementById('editForm').action = `/employee/${userId}`;

                                                            // Show the modal
                                                            var editModal = new bootstrap.Modal(document.getElementById('editModal'));
                                                            editModal.show();
                                                        })
                                                        .catch(error => console.error('Error fetching user data:', error));
                                                }
                                            </script>

                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="card shadow-sm">
                                                <div class="tab-pane">
                                                    <div class="row mt-4">
                                                        <div class="col-md-12">
                                                            <h4 style="margin-left: 10px;">CCBRT Policies</h4>
                                                            <div id="policy-container">
                                                                <!-- Display only one policy at a time -->
                                                                @if ($policies->isNotEmpty())
                                                                    <div class="policy-item">
                                                                        <table class="table table-bordered">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2">
                                                                                        <img src="{{ asset('assets/img/ccbrt.JPG') }}"
                                                                                            alt="CCBRT Logo"
                                                                                            style="height: 50px;">
                                                                                        <strong
                                                                                            id="policy-title">{{ $policies[0]->title }}</strong>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2">
                                                                                        {!! $policies[0]->content !!}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="mt-4">
                                                                            <p style="margin-left: 20px;">
                                                                                <strong>Names:</strong>
                                                                                <span
                                                                                    style="text-decoration: underline; margin-right: 20px;">
                                                                                    {{ $user->fname }}
                                                                                    {{ $user->lname }}
                                                                                </span>
                                                                                <strong>Signature:</strong>
                                                                                @if ($user->signature)
                                                                                    <img src="data:image/png;base64,{{ $user->signature }}"
                                                                                        alt="User Signature"
                                                                                        style="max-width: 40%; height: auto; margin-right: 20px;">
                                                                                @else
                                                                                    <span
                                                                                        style="text-decoration: underline; margin-right: 20px;">______________________________</span>
                                                                                @endif
                                                                                <strong>Date:</strong>
                                                                                <span style="text-decoration: underline;">
                                                                                    {{ $user->created_at->format('d-m-Y') }}
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4">
                                                                <button id="prev-policy" class="btn btn-primary"
                                                                    disabled>Back</button>
                                                                <button id="next-policy" class="btn btn-primary"
                                                                    {{ $policies->count() > 1 ? '' : 'disabled' }}>Next</button>

                                                                <!-- Form to handle the download -->
                                                                <form method="GET"
                                                                    action="{{ route('download.policy') }}"
                                                                    style="float: right;">
                                                                    <input type="hidden" name="policy_id"
                                                                        value="{{ $policies[0]->id }}">
                                                                    <button type="submit" class="btn btn-success"
                                                                        {{ $policies->isEmpty() ? 'disabled' : '' }}>
                                                                        <i class="fas fa-download"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            let currentPolicyIndex = 0;
                                            const policies = @json($policies); // Pass PHP variable to JavaScript
                                            const totalPolicies = policies.length;

                                            function updatePolicy(index) {
                                                if (totalPolicies > 0) {
                                                    document.getElementById('policy-title').textContent = policies[index].title;
                                                    document.querySelector('#policy-container table tbody').innerHTML = `
                                                    <tr>
                                                        <td colspan="2">
                                                            <img src="{{ asset('assets/img/ccbrt.JPG') }}" alt="CCBRT Logo" style="height: 50px;">
                                                            <strong id="policy-title">${policies[index].title}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">${policies[index].content}</td>
                                                    </tr>
                                                `;
                                                    document.querySelector('input[name="policy_id"]').value = policies[index].id;

                                                    document.getElementById('prev-policy').disabled = (index === 0);
                                                    document.getElementById('next-policy').disabled = (index === totalPolicies - 1);
                                                }
                                            }

                                            document.getElementById('prev-policy').addEventListener('click', function() {
                                                if (currentPolicyIndex > 0) {
                                                    currentPolicyIndex--;
                                                    updatePolicy(currentPolicyIndex);
                                                }
                                            });

                                            document.getElementById('next-policy').addEventListener('click', function() {
                                                if (currentPolicyIndex < totalPolicies - 1) {
                                                    currentPolicyIndex++;
                                                    updatePolicy(currentPolicyIndex);
                                                }
                                            });

                                            // Initialize the display with the first policy
                                            updatePolicy(currentPolicyIndex);
                                        });
                                    </script>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
