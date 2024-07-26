@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
@endsection
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">My Requests To Approve</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="GET" class="form-inline">
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="query" id="searchInput"
                                                class="form-control form-control-sm" placeholder="Search...">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-search fa-xs"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table id="requestsTable" class="table table-hover table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Request Type</th>
                                        <th>Requester Name</th>
                                        <th>Submitted Date</th>
                                        <th>Status</th>
                                        <th>Approved Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending as $request)
                                        <tr>
                                            @if ($request->ict_request_resource_id)
                                                <td>ICT Access Form</td>
                                                <td>{{ $request->username }}</td>
                                                <td>{{ $request->attend_date }}</td>
                                                <td>
                                                    @if ($request->status == 0)
                                                        <span class="badge bg-warning text-dark font-size-11">Pending</span>
                                                    @elseif ($request->status == 1)
                                                        <span
                                                            class="badge bg-success text-dark font-size-11">Approved</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($request->status == 1)
                                                        {{ \Carbon\Carbon::parse($request->updated_at)->format('d F Y') }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <button href="#" class="btn btn-primary btn-sm" title="View"
                                                        onclick="showForm({{ $request->ict_request_resource_id }})">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </td>
                                            @endif
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
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#requestsTable').DataTable({
                "pageLength": 5, // Show only 5 records per page
                "lengthMenu": [5, 10, 25, 50, 75, 100],
                "searching": true, // Enable the search box
            });
        });

        function showForm(id) {
            var url = '/show_form/' + id;
            window.location.href = url;
        }
    </script>
@endsection
