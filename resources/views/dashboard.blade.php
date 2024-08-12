@extends('layouts.template')

@section('breadcrumb')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (isset($showAlert) && $showAlert)
                    <div class="alert alert-info" role="alert">
                        Please complete your profile details including user details, family details, and health details.
                        This is important for our records.
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header bg-warning text-white">
                                <i class="fas fa-tasks"></i> Pending Approvals
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">3</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header bg-success text-white">
                                <i class="fas fa-user-plus"></i> New Request This Month
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">16</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header bg-danger text-white">
                                <i class="fas fa-exclamation-triangle"></i> Urgent Issues
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">2</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header custom-header">
                                <i class="fas fa-users"></i> Total Registered Users
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">170</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Left Column: Line Chart for Percentage of Requests -->
                    <div class="col-md-6 col-12">
                        <div class="chart-container" style="height: 300px;">
                            <canvas id="requestChart"></canvas>
                        </div>
                    </div>

                    <!-- Right Column: Radar Chart for Delays -->
                    <div class="col-md-6 col-12">
                        <div class="chart-container" style="height: 300px;">
                            <canvas id="delayChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">Onboarding Checklist</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">Fill Personal Information Form</li>
                                    <li class="list-group-item">Submit Tax Documents</li>
                                    <li class="list-group-item">Complete Orientation Training</li>
                                    <li class="list-group-item">Setup Direct Deposit</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">My Profile</h5>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn btn-primary mb-2">Update Profile</a>
                                <a href="#" class="btn btn-success mb-2">Update Profile</a>
                                <a href="#" class="btn btn-info mb-2">Update Profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CCBRT Policies -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="tab-pane">
                                <div class="row mt-4">
                                    <div class="col-12">
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
                                                                        alt="CCBRT Logo" style="height: 50px;">
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
                                                            <span style="text-decoration: underline; margin-right: 20px;">
                                                                {{ $user->fname }} {{ $user->lname }}
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
                                            <button id="prev-policy" class="btn btn-primary" disabled>Back</button>
                                            <button id="next-policy" class="btn btn-primary"
                                                {{ $policies->count() > 1 ? '' : 'disabled' }}>Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    let currentPolicyIndex = 0;
                                    const policies = @json($policies);
                                    const totalPolicies = policies.length;
                                    const prevButton = document.getElementById('prev-policy');
                                    const nextButton = document.getElementById('next-policy');
                                    const policyContainer = document.getElementById('policy-container');

                                    function updatePolicy() {
                                        if (totalPolicies > 0) {
                                            const policy = policies[currentPolicyIndex];
                                            policyContainer.innerHTML = `
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2">
                                                                <img src="{{ asset('assets/img/ccbrt.JPG') }}" alt="CCBRT Logo" style="height: 50px;">
                                                                <strong>${currentPolicyIndex + 1}. ${policy.title}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                ${policy.content}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="mt-4">
                                                    <p>
                                                        <strong>Names:</strong>
                                                        <span style="text-decoration: underline; margin-right: 20px;">
                                                            {{ $user->fname }} {{ $user->lname }}
                                                        </span>
                                                        <strong>Signature:</strong>
                                                        @if ($user->signature)
                                                            <img src="data:image/png;base64,{{ $user->signature }}" alt="User Signature" style="max-width: 40%; height: auto; margin-right: 20px;">
                                                        @else
                                                            <span style="text-decoration: underline; margin-right: 20px;">______________________________</span>
                                                        @endif
                                                        <strong>Date:</strong>
                                                        <span style="text-decoration: underline;">
                                                            {{ $user->created_at->format('d-m-Y') }}
                                                        </span>
                                                    </p>
                                                </div>
                                            `;

                                            prevButton.disabled = currentPolicyIndex === 0;
                                            nextButton.disabled = currentPolicyIndex === totalPolicies - 1;
                                        }
                                    }

                                    prevButton.addEventListener('click', function() {
                                        if (currentPolicyIndex > 0) {
                                            currentPolicyIndex--;
                                            updatePolicy();
                                        }
                                    });

                                    nextButton.addEventListener('click', function() {
                                        if (currentPolicyIndex < totalPolicies - 1) {
                                            currentPolicyIndex++;
                                            updatePolicy();
                                        }
                                    });

                                    updatePolicy();
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
