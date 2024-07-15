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
                                                    <th>Submitted</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($form as $aform)
                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-calendar-alt"></i>
                                                            @if ($aform->ict_request_resource_id)
                                                                ICT Access Form
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <ul class="list-unstyled mb-0">
                                                                {{-- Display histories for the current form --}}
                                                                @foreach ($histories[$aform->id] as $ahistory)
                                                                    @php
                                                                        $roles = \App\Models\User::findOrFail($ahistory->attended_by)->roles;
                                                                        $rang = 'warning'; // Default value for $rang
                                                                        $neno = ''; // Default value for $neno

                                                                        // Determine $rang and $neno based on $ahistory->status
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
                                                                    @endphp

                                                                    @foreach ($roles as $role)
                                                                    @if($role->name!='requester')
                                                                        <li>
                                                                            <strong>{{ $role->name }}:</strong>
                                                                            <span class="requester bg-{{ $rang }} text-dark">{{ $neno }}</span>
                                                                        </li>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>{{ $aform->created_at }}</td>
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





        </div>
    </div>
@endsection
