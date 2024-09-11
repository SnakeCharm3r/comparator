@extends('layouts.template')

@section('breadcrumb')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <style>
                .custom-alert {
                    max-width: 500px;
                    /* Example for max width */
                    margin: 0 auto;
                    /* Center alert in its column */
                }
            </style>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="page-sub-header">
                            <h3 class="page-title">Dashboard</h3>
                        </div>
                    </div>

                    <div class="col-md-5 text-end">
                        @if ($user->signature)
                            <img src="data:image/png;base64,{{ $user->signature }}" alt="User Signature"
                                style="max-width: 100%; height: auto; display: none;">
                        @else
                            <div class="alert alert-warning" role="alert">
                                Please Provide Your Digital
                                Signature <a href="{{ route('signature.index') }}"
                                    style="color: blue; text-decoration: none;">Click here</a>

                            </div>
                        @endif
                        @if (session('success'))
                            <div id="success-alert" class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Select the alert element
                                var alert = document.getElementById('success-alert');

                                // If the alert exists, set a timeout to hide it after 4 seconds (4000 ms)
                                if (alert) {
                                    setTimeout(function() {
                                        alert.style.transition = 'opacity 1s ease';
                                        alert.style.opacity = '0';

                                        // After transition, hide the alert completely
                                        setTimeout(function() {
                                            alert.style.display = 'none';
                                        }, 1000);
                                    }, 4000);
                                }
                            });
                        </script>

                    </div>

                </div>
            </div>

            <div class="row">

                @php
                    $filledFieldsWeight = 0;
                    $totalWeight = 100;

                    // Define the weights for each field
                    $weights = [
                        'professional_reg_number' => 30,
                        'marital_status' => 20,
                        'health_insurance' => 25,
                        'language' => 25,
                    ];

                    // Check each field and increment the filled fields weight if filled
                    if (!empty($user->professional_reg_number)) {
                        $filledFieldsWeight += $weights['professional_reg_number'];
                    }

                    if (!empty($user->marital_status)) {
                        $filledFieldsWeight += $weights['marital_status'];
                    }

                    if (!empty($user->health_insurance)) {
                        $filledFieldsWeight += $weights['health_insurance'];
                    }

                    if (!empty($language_knowledge->language)) {
                        $filledFieldsWeight += $weights['language'];
                    }

                    // Calculate the percentage filled
                    $percentageFilled = min($filledFieldsWeight, $totalWeight);
                @endphp

                @if ($percentageFilled < 50)
                    <div class="progress" style="height: 20px; position: relative;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $percentageFilled }}%;"
                            aria-valuenow="{{ $percentageFilled }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $percentageFilled }}%
                            <span
                                style="position: absolute; left: 0; right: 0; text-align: center; top: 50%; transform: translateY(-50%); font-size: 12px; color: rgb(0, 0, 0);">
                                User profile details filled percentage
                            </span>
                        </div>
                    </div>
                @endif
                <br><br>
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

                    {{-- <div class="col-md-3 col-sm-6 col-12 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header text-warning ">
                                <i class="fas fa-exclamation-triangle"></i> Urgent Announcement
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">2</h5>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-md-3 col-sm-6 col-12 mb-3">
                        <div class="card text-center shadow-sm">
                            <a href="{{ route('announcements.index') }}" class="text-decoration-none text-warning">
                                <div class="card-header">
                                    <i class="fas fa-exclamation-triangle"></i> Urgent Announcement
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="{{ route('announcements.index') }}" class="card-title text-decoration-none">
                                    {{ $announcements->count() }}
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6 col-12 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header custom-header">
                                <i class="fas fa-users"></i> Total Registered Users
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $totalUsers }}</h5>
                            </div>
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
                                    <li class="list-group-item">Complete User Profile Information</li>
                                    <li class="list-group-item">Review Standard Operating Procedures (SOPs)</li>
                                    <li class="list-group-item">Provide Your Digital Signatue</li>
                                    <li class="list-group-item">Review CCBRT Policies</li>
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
                                @if ($user->signature)
                                    <img src="data:image/png;base64,{{ $user->signature }}" alt="User Signature"
                                        style="max-width: 40%; height: auto; margin-right: 20px; display: none;">
                                @else
                                    <a href="{{ route('signature.index') }}" class="btn btn-info mb-2">Digital
                                        Signature</a>
                                @endif

                                <a href="{{ route('policies.user') }}" class="btn btn-primary mb-2">CCBRT Policies</a>
                                <a href="{{ route('profile.index') }}" class="btn btn-success mb-2">Update Profile</a>
                                <a href="{{ route('sops.show') }}" class="btn btn-info mb-2">View SOPs</a>

                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <div class="col-12 col-lg-12 col-xl-12 d-flex">
                    <div class="card flex-fill comman-shadow">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title">Form Requests Trend</h5>
                            <ul class="chart-list-out">
                                <li><span class="circle-blue"></span>ICT Access Form</li>
                                <li><span class="circle-green"></span>Clearance Form</li>
                                <li><span class="circle-yellow"></span>Change Request Form</li>
                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <canvas id="formRequestsLineChart"></canvas>
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var ctx = document.getElementById('formRequestsLineChart').getContext('2d');
                        var formRequestsLineChart = new Chart(ctx, {
                            type: 'line', // Line chart type
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                    'Jul'
                                ], // Replace with dynamic labels
                                datasets: [{
                                    label: 'ICT Access Form',
                                    data: [30, 45, 60, 70, 50, 65, 80], // Replace with dynamic data
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    fill: true
                                }, {
                                    label: 'Clearance Form',
                                    data: [20, 35, 55, 60, 45, 70, 90], // Replace with dynamic data
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    fill: true
                                }, {
                                    label: 'Change Request Form',
                                    data: [10, 25, 40, 50, 30, 60, 70], // Replace with dynamic data
                                    borderColor: 'rgba(255, 159, 64, 1)',
                                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                                    fill: true
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(tooltipItem) {
                                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    x: {
                                        beginAtZero: true
                                    },
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
