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
                            {{-- <div class="row position-relative">
                                <div class="col-md-12">
                                    <a href="{{ route('request.create') }}"
                                        class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2 create-btn">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div> --}}
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
                                                    <th>Submitted</th>
                                                    <th>Approved Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $previousRequestId = null;
                                                    $counter = 1; // Initialize counter for numbering
                                                @endphp

                                                @foreach ($form as $aform)
                                                    @php
                                                        $approvalDetails = [];
                                                        foreach ($histories[$aform->id] as $ahistory) {
                                                            $roles = \App\Models\User::findOrFail(
                                                                $ahistory->attended_by,
                                                            )->roles;
                                                            foreach ($roles as $role) {
                                                                if ($role->name != 'requester') {
                                                                    $rang = 'warning'; // Default value
                                                                    $neno = 'Pending'; // Default value

                                                                    if ($ahistory->status == 0) {
                                                                        $rang = 'warning';
                                                                        $neno = 'Pending';
                                                                    } elseif ($ahistory->status == 1) {
                                                                        $rang = 'success';
                                                                        $neno = 'Approved';
                                                                    } else {
                                                                        $rang = 'danger';
                                                                        $neno = 'Rejected';
                                                                    }

                                                                    $approvalDetails[] = [
                                                                        'role' => $role->name,
                                                                        'status' => "<span class='badge bg-{$rang}'>{$neno}</span>",
                                                                    ];
                                                                }
                                                            }
                                                        }
                                                    @endphp

                                                    @foreach ($approvalDetails as $detail)
                                                        <tr
                                                            class="{{ $aform->id !== $previousRequestId ? 'request-row' : '' }}">
                                                            @if ($loop->first)
                                                                <td rowspan="{{ count($approvalDetails) }}">
                                                                    {{ $counter++ }} <!-- Display the counter value -->
                                                                </td>
                                                                <td rowspan="{{ count($approvalDetails) }}">
                                                                    @if ($aform->ict_request_resource_id)
                                                                        ICT Access Form
                                                                    @endif
                                                                </td>
                                                                <td>{{ $detail['role'] }}</td>
                                                                <td>{!! $detail['status'] !!}</td>
                                                                <td rowspan="{{ count($approvalDetails) }}">
                                                                    {{ $aform->created_at }}</td>
                                                            @else
                                                                <td>{{ $detail['role'] }}</td>
                                                                <td>{!! $detail['status'] !!}</td>
                                                            @endif
                                                        </tr>

                                                        @php
                                                            $previousRequestId = $aform->id;
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
@endpush
