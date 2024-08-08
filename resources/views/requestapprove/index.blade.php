@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.min.css" />

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
                    <div class="card card-body p-3">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-bordered display">
                                <thead class="table-success">
                                    <tr>
                                        <th>#</th>
                                        <th>Request Type</th>
                                        <th>Requester Name</th>
                                        <th>Submitted Date</th>
                                        <th>Status</th>
                                        <th>Approved Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($pending as $pending)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            @if ($pending->ict_request_resource_id)
                                                <td>ICT Access Form</td>
                                                <td>{{ $pending->requester_name  }}</td>
                                                <td>{{ $pending->attend_date }}</td>
                                                <td>
                                                    @if ($pending->status == 0)
                                                        <span class="badge bg-warning text-dark font-size-11">Pending</span>
                                                    @elseif ($pending->status == 1)
                                                        <span
                                                            class="badge bg-success text-dark font-size-11">Approved</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($pending->status == 1)
                                                        {{ \Carbon\Carbon::parse($pending->updated_at)->format('d F Y') }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <button href="#" class="btn btn-primary btn-sm" title="View"
                                                        onclick="showForm({{ $pending->ict_request_resource_id }})">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </td>
                                            @endif
                                        </tr>
                                        <?php $i++; ?>
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });

    function showForm(id) {
        var url = '/show_form/' + id;
        window.location.href = url;
    }
</script>
