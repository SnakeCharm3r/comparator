@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            {{-- <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">My Requests</h3>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row position-relative">
                                <div class="col-md-12">
                                    <a href="{{ route('request.create') }}"
                                        class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2 create-btn">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
<!-- {{dd($form)}} -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h4>My Requests</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>Request Type</th>
                                                    <th>Approval Levels</th>
                                                    <th>Submitted</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $form as $aform)
                                                <tr>
                                                    <td><i class="fas fa-calendar-alt"></i> Leave Request</td>
                                                    <td>
                                                        <ul class="list-unstyled mb-0">
                                                            <li><strong>HR:</strong> <span
                                                                    class="badge bg-warning text-dark">Pending</span></li>
                                                            <li><strong>Line Manager:</strong> <span
                                                                    class="badge bg-secondary text-white">N/A</span></li>
                                                        </ul>
                                                    </td>
                                                    <td>{{ date('Y-m-d H:i:s', strtotime('2024-06-27 09:00:00')) }}</td>
                                                </tr>
                                                @endforeach
                                                <!-- <tr>
                                                    <td><i class="fas fa-laptop"></i> Equipment Request</td>
                                                    <td>
                                                        <ul class="list-unstyled mb-0">
                                                            <li><strong>IT:</strong> <span
                                                                    class="badge bg-success text-white">Approved</span></li>
                                                            <li><strong>Line Manager:</strong> <span
                                                                    class="badge bg-secondary text-white">N/A</span></li>
                                                        </ul>
                                                    </td>
                                                    <td>{{ date('Y-m-d H:i:s', strtotime('2024-05-15 14:30:00')) }}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-key"></i> ICT Access Form</td>
                                                    <td>
                                                        <ul class="list-unstyled mb-0">
                                                            <li><strong>IT:</strong> <span
                                                                    class="badge bg-success text-white">Approved</span></li>
                                                            <li><strong>HR:</strong> <span
                                                                    class="badge bg-danger text-white">Rejected</span></li>
                                                        </ul>
                                                    </td>
                                                    <td>{{ date('Y-m-d H:i:s', strtotime('2024-04-02 16:45:00')) }}</td>
                                                </tr> -->
                                                <!-- Additional requests can be added here -->
                                            </tbody>
                                        </table>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row position-relative">
                                <div class="col-md-12">
                                    <a href="{{ route('request.create') }}"
                                        class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2 create-btn">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h4>My Requests</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>Request Type</th>
                                                    <th>Approval Levels</th>
                                                    <th>Status</th>
                                                    <th>Submitted</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($userRequests as $request)
                                                    <tr>
                                                        <td>{{ $request['request_type'] }}</td>
                                                        <td>
                                                            <ul class="list-unstyled mb-0">
                                                                @foreach ($request['approval_levels'] as $level)
                                                                    <li>{{ $level['name'] }}:
                                                                        <span class="badge {{ $level['status_class'] }}">
                                                                            {{ $level['status'] }}
                                                                        </span>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>{{ $request['status'] }}</td>
                                                        <td>{{ $request['submitted_at']->format('M d, Y') }}</td>
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
            </div> --}}


        </div>
    </div>
@endsection
