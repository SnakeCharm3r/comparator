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
                                    @foreach ($pending as $pendingRequest)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>ICT Access Form</td>
                                            <td>{{ $pendingRequest->requester_name }}</td>
                                            <td>{{ $pendingRequest->attend_date }}</td>
                                            <td>
                                                @if ($pendingRequest->status == 0)
                                                    <span class="badge bg-warning text-dark font-size-11">Pending</span>
                                                @elseif ($pendingRequest->status == 1)
                                                    <span class="badge bg-success text-dark font-size-11">Approved</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($pendingRequest->status == 1)
                                                    {{ \Carbon\Carbon::parse($pendingRequest->updated_at)->format('d F Y') }}
                                                @endif
                                            </td>
                                            <td>
                                                <button href="#" class="btn btn-primary btn-sm" title="View"
                                                    onclick="showForm('ict', {{ $pendingRequest->ict_request_resource_id }})">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach

                                    @foreach ($clear as $clearRequest)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>Clearance Form</td>
                                            <td>{{ $clearRequest->requester_name }}</td>
                                            <td>{{ $clearRequest->attend_date }}</td>
                                            <td>
                                                @if ($clearRequest->status == 0)
                                                    <span class="badge bg-warning text-dark font-size-11">Pending</span>
                                                @elseif ($clearRequest->status == 1)
                                                    <span class="badge bg-success text-dark font-size-11">Approved</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($clearRequest->status == 1)
                                                    {{ \Carbon\Carbon::parse($clearRequest->updated_at)->format('d F Y') }}
                                                @endif
                                            </td>
                                            <td>
                                                <button href="#" class="btn btn-primary btn-sm" title="View"
                                                    onclick="showForm('clearance', {{ $clearRequest->requested_resource_id }})">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
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
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [
                [3, 'desc']
            ] // Optionally set default column ordering, here assuming date is in the 4th column
        });
    });

    function showForm(type, id) {
        var url = '';
        if (type === 'ict') {
            url = '/show_form/' + id;
        } else if (type === 'clearance') {
            url = '/clearance_forms/' + id;
        }
        window.location.href = url;
    }
</script>
