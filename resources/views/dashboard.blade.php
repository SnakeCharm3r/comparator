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
                @if (isset($showAlert) && $showAlert)
                    <div class="alert alert-info" role="alert">
                        Please complete your profile details including user details, family details, and health details.
                        This is important for our records.
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header bg-warning text-white">
                                <i class="fas fa-tasks"></i> Pending Approvals
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">3</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header bg-success text-white">
                                <i class="fas fa-user-plus"></i> New Request This Month
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">16</h5>
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

                    <div class="col-md-3">
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
                <br>
                <div class="row">
                    <!-- Left Column: Line Chart for Percentage of Requests -->
                    <div class="col-md-6">
                        <div class="chart-container" style="height: 400px;">
                            <canvas id="requestChart"></canvas>
                        </div>
                    </div>

                    <!-- Right Column: Radar Chart for Delays -->
                    <div class="col-md-6">
                        <div class="chart-container" style="height: 400px;">
                            <canvas id="delayChart"></canvas>
                        </div>
                    </div>

                    <!-- Chart.js Library and Script -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var data = {
                            labels: ["ICT Access Form", "Change Request Form", "Clearance Form", "HR Form"],
                            datasets: [{
                                label: 'Percentage of Requests',
                                data: [45, 30, 15, 10], // Replace with actual percentage data
                                borderColor: ["#007bff", "#28a745", "#ffc107", "#dc3545"],
                                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                                borderWidth: 2,
                                fill: true
                            }]
                        };

                        var delayData = {
                            labels: ['Line Manager', 'HR', 'IT'],
                            datasets: [{
                                label: 'Delay Levels',
                                data: [2, 1, 3], // Replace with actual delay levels (1 = low delay, 3 = high delay)
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 2,
                                pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                                pointBorderColor: '#fff',
                                pointHoverBackgroundColor: '#fff',
                                pointHoverBorderColor: 'rgba(54, 162, 235, 1)'
                            }]
                        };

                        var options = {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        callback: function(value) {
                                            return value + '%'; // Adjust formatting as needed
                                        }
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        };

                        var ctx1 = document.getElementById('requestChart').getContext('2d');
                        var myLineChart = new Chart(ctx1, {
                            type: 'line',
                            data: data,
                            options: options
                        });

                        var ctx2 = document.getElementById('delayChart').getContext('2d');
                        var myDelayChart = new Chart(ctx2, {
                            type: 'radar',
                            data: delayData,
                            options: {
                                elements: {
                                    line: {
                                        borderWidth: 3
                                    }
                                },
                                scales: {
                                    r: {
                                        min: 0,
                                        max: 4, // Adjust maximum delay level as needed
                                        ticks: {
                                            stepSize: 1
                                        }
                                    }
                                },
                                plugins: {
                                    legend: {
                                        position: 'top'
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(tooltipItem) {
                                                return 'Delay Level: ' + tooltipItem.raw.toFixed(2);
                                            }
                                        }
                                    }
                                }
                            }
                        });

                        // Function to update chart size based on its container
                        function updateChartSize() {
                            var chartContainers = document.querySelectorAll('.chart-container');
                            chartContainers.forEach(function(container) {
                                var canvas = container.querySelector('canvas');
                                canvas.width = container.clientWidth;
                                canvas.height = container.clientHeight;
                            });

                            // Redraw both charts after resizing
                            myLineChart.resize();
                            myDelayChart.resize();
                        }

                        // Update chart size initially and on window resize
                        updateChartSize();
                        window.addEventListener('resize', updateChartSize);
                    </script>
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
                                <h4>CCBRT Policies and SoPs</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($policies as $policy)
                                            <tr>
                                                <td>{{ $policy->title }}</td>
                                                <td class="text-center" style="width: 140px;">
                                                    <!-- View and Download Buttons -->
                                                    <a href="{{ asset('storage/' . $policy->pdf_path) }}" target="_blank"
                                                        class="btn btn-primary btn-sm mr-1" title="View PDF">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
                                                    <a href="{{ asset('storage/' . $policy->pdf_path) }}"
                                                        class="btn btn-secondary btn-sm" download title="Download PDF">
                                                        <i class="fas fa-download"></i> Download
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('content')
@endsection

@section('scripts')
@endsection
