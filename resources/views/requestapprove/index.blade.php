@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">My Requests</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Request Type</th>
                                            <th>Stage</th>
                                            <th>Status</th>
                                            <th>Submitted</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><i class="fas fa-calendar-alt"></i> Leave Request</td>
                                            <td>HR</td>
                                            <td>Pending</td>
                                            <td>Jun 27, 2024</td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                              
                                            </td>
                                        </tr>
                                        
                                        
                                        <!-- Additional demo rows can be added here -->
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
