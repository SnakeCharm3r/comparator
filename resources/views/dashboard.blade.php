@extends('layouts.template')

@section('breadcrumb')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-header bg-warning text-white">
                            <i class="fas fa-tasks"></i> Pending Approvals
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">5</h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-user-plus"></i> New Request This Week
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">33</h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i> Urgent Issues
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">2</h5>
                        </div>
                    </div>
                </div>
                <!-- Key Metrics Cards -->
                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-header custom-header">
                            <i class="fas fa-users"></i> Total Registered Users
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">50</h5>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Onboarding and Self-Service -->
            <div class="row mt-4">
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">My Profile</h5>
                        </div>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary">Update Profile</a>
                            <a href="#" class="btn btn-success">Update Profile</a>
                            <a href="#" class="btn btn-info">Update Profile</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CCBRT Policies -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h4>CCBRT Policies</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Policy Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Code of Conduct</td>
                                        <td>Guidelines on acceptable behavior and workplace ethics.</td>
                                        <td>
                                            <a href="{{ asset('policies/code_of_conduct.pdf') }}"
                                                class="btn btn-primary btn-sm" target="_blank">View</a>
                                            <a href="{{ asset('policies/code_of_conduct.pdf') }}"
                                                class="btn btn-secondary btn-sm" download>Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HR Policy</td>
                                        <td>Details on HR practices, employee benefits, and grievance procedures.</td>
                                        <td>
                                            <a href="{{ asset('policies/hr_policy.pdf') }}" class="btn btn-primary btn-sm"
                                                target="_blank">View</a>
                                            <a href="{{ asset('policies/hr_policy.pdf') }}" class="btn btn-secondary btn-sm"
                                                download>Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>IT Security Policy</td>
                                        <td>Instructions on maintaining IT security and data protection.</td>
                                        <td>
                                            <a href="{{ asset('policies/it_security_policy.pdf') }}"
                                                class="btn btn-primary btn-sm" target="_blank">View</a>
                                            <a href="{{ asset('policies/it_security_policy.pdf') }}"
                                                class="btn btn-secondary btn-sm" download>Download</a>
                                        </td>
                                    </tr>
                                    <!-- Additional policies can be added here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My Requests -->


            <!-- Announcements -->
            {{-- <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">Announcements</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">New employees are required to complete their onboarding
                                    checklist.</li>
                                <li class="list-group-item">Current employees can submit clearance requests online.</li>
                                <li class="list-group-item">Submit any change requests or updates through the e-DOCS.</li>
                                <!-- Additional announcements can be added here -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('content')
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx1 = document.getElementById('employeeDistributionChart').getContext('2d');
            var employeeDistributionChart = new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: ['IT', 'HR', 'Finance', 'Operations'],
                    datasets: [{
                        data: [12, 15, 8, 15],
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    }
                }
            });

            var ctx2 = document.getElementById('requestsOverTimeChart').getContext('2d');
            var requestsOverTimeChart = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    datasets: [{
                        label: 'Requests',
                        data: [3, 7, 4, 5, 2],
                        backgroundColor: 'rgba(78, 115, 223, 0.05)',
                        borderColor: 'rgba(78, 115, 223, 1)',
                        pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                        pointBorderColor: 'rgba(78, 115, 223, 1)',
                        pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                        pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Day of the Week'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Number of Requests'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
