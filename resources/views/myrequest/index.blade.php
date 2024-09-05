@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h4>My Requests</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead class="table-success">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Request Type</th>
                                                    <th>Approval Level</th>
                                                    <th>Status</th>
                                                    <th>Remark</th> <!-- Remark column -->
                                                    <th>Submitted</th>
                                                    <th>Approved Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $previousRequestId = null; // Initialize the variable here
                                                    $counter = 1; // Initialize counter for numbering
                                                @endphp

                                                {{-- Display ICT Forms --}}
                                                @foreach ($form as $aform)
                                                    @php
                                                        $approvalDetails = [];
                                                        foreach ($histories[$aform->id] as $ahistory) {
                                                            $roles = \App\Models\User::findOrFail($ahistory->attended_by)->roles;
                                                            foreach ($roles as $role) {
                                                                if ($role->name != 'requester') {
                                                                    $rang = 'warning'; // Default value
                                                                    $neno = 'Pending'; // Default value
                                                                    $rejectionReason = ''; // Default value for rejection reason

                                                                    if ($ahistory->status == 0) {
                                                                        $rang = 'warning';
                                                                        $neno = 'Pending';
                                                                    } elseif ($ahistory->status == 1) {
                                                                        $rang = 'success';
                                                                        $neno = 'Approved';
                                                                    } else {
                                                                        $rang = 'danger';
                                                                        $neno = 'Rejected';
                                                                        $rejectionReason = $ahistory->rejection_reason; // Fetch rejection reason
                                                                    }

                                                                    $approvalDetails[] = [
                                                                        'role' => $role->name,
                                                                        'status' => "<span class='badge bg-{$rang}'>{$neno}</span>",
                                                                        'rejectionReason' => $rejectionReason,
                                                                    ];
                                                                }
                                                            }
                                                        }
                                                    @endphp

                                                    @foreach ($approvalDetails as $detail)
                                                        <tr class="{{ $aform->id !== $previousRequestId ? 'request-row' : '' }}">
                                                            @if ($loop->first)
                                                                <td rowspan="{{ count($approvalDetails) }}">
                                                                    {{ $counter++ }} <!-- Display the counter value -->
                                                                </td>
                                                                <td rowspan="{{ count($approvalDetails) }}">
                                                                    ICT Access Form
                                                                </td>
                                                            @endif
                                                            <td>{{ $detail['role'] }}</td>
                                                            <td>{!! $detail['status'] !!}</td>
                                                            <td>
                                                                {{-- Only display the rejection reason if the status is Rejected --}}
                                                                @if ($detail['status'] == "<span class='badge bg-danger'>Rejected</span>")
                                                                    {{ $detail['rejectionReason'] }}
                                                                @endif
                                                            </td>
                                                            @if ($loop->first)
                                                                <td rowspan="{{ count($approvalDetails) }}">
                                                                    {{ $aform->created_at }}
                                                                </td>
                                                                <td rowspan="{{ count($approvalDetails) }}"></td>
                                                                <td rowspan="{{ count($approvalDetails) }}">
                                                                    <a href="{{ route('request.edit', $aform->id) }}" class="btn btn-rounded btn-outline-info">Modify</a>
                                                                    <form action="{{ route('request.destroy', $aform->id) }}" method="POST" style="display:inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-rounded btn-outline-danger">Revoke</button>
                                                                    </form>
                                                                </td>
                                                            @endif
                                                        </tr>

                                                        @php
                                                            $previousRequestId = $aform->id; // Update the variable after each iteration
                                                        @endphp
                                                    @endforeach
                                                @endforeach

                                                {{-- Display Clearance Forms --}}
                                                @foreach ($clearForm as $exit)
                                                    @php
                                                        $clearApprovalDetails = [];
                                                        foreach ($clearHistories[$exit->id] as $clearHistory) {
                                                            $roles = \App\Models\User::findOrFail($clearHistory->attended_by)->roles;
                                                            foreach ($roles as $role) {
                                                                if ($role->name != 'requester') {
                                                                    $rang = 'warning'; // Default value
                                                                    $neno = 'Pending'; // Default value
                                                                    $rejectionReason = ''; // Default value for rejection reason

                                                                    if ($clearHistory->status == 0) {
                                                                        $rang = 'warning';
                                                                        $neno = 'Pending';
                                                                    } elseif ($clearHistory->status == 1) {
                                                                        $rang = 'success';
                                                                        $neno = 'Approved';
                                                                    } else {
                                                                        $rang = 'danger';
                                                                        $neno = 'Rejected';
                                                                        $rejectionReason = $clearHistory->rejection_reason; // Fetch rejection reason
                                                                    }

                                                                    $clearApprovalDetails[] = [
                                                                        'role' => $role->name,
                                                                        'status' => "<span class='badge bg-{$rang}'>{$neno}</span>",
                                                                        'rejectionReason' => $rejectionReason,
                                                                    ];
                                                                }
                                                            }
                                                        }
                                                    @endphp

                                                    @foreach ($clearApprovalDetails as $detail)
                                                        <tr class="{{ $exit->id !== $previousRequestId ? 'request-row' : '' }}">
                                                            @if ($loop->first)
                                                                <td rowspan="{{ count($clearApprovalDetails) }}">
                                                                    {{ $counter++ }} <!-- Display the counter value -->
                                                                </td>
                                                                <td rowspan="{{ count($clearApprovalDetails) }}">
                                                                    Clearance Form
                                                                </td>
                                                            @endif
                                                            <td>{{ $detail['role'] }}</td>
                                                            <td>{!! $detail['status'] !!}</td>
                                                            <td>
                                                                {{-- Only display the rejection reason if the status is Rejected --}}
                                                                @if ($detail['status'] == "<span class='badge bg-danger'>Rejected</span>")
                                                                    {{ $detail['rejectionReason'] }}
                                                                @endif
                                                            </td>
                                                            @if ($loop->first)
                                                                <td rowspan="{{ count($clearApprovalDetails) }}">
                                                                    {{ $exit->created_at }}
                                                                </td>
                                                                <td rowspan="{{ count($clearApprovalDetails) }}"></td>
                                                                <td rowspan="{{ count($clearApprovalDetails) }}">
                                                                    <a href="{{ route('clearance.edit', $exit->id) }}" class="btn btn-rounded btn-outline-info">Modify</a>
                                                                    <form action="{{ route('request.destroy', $exit->id) }}" method="POST" style="display:inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-rounded btn-outline-danger">Revoke</button>
                                                                    </form>
                                                                </td>
                                                            @endif
                                                        </tr>

                                                        @php
                                                            $previousRequestId = $exit->id; // Update the variable after each iteration
                                                        @endphp
                                                    @endforeach
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
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }

        .badge {
            font-size: 0.875rem;
            padding: 0.5em 0.75em;
            border-radius: 0.2rem;
        }

        .request-row {
            border-top: 2px solid #333;
            /* Dark border to create a strong line */
        }
    </style>
    <script>
        new DataTable('#example');
    </script>
@endpush
