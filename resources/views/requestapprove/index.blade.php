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
                                            <th>Status</th>
                                            <th>Submitted</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- {{dd($pending)}} --}}
                                        @foreach ($pending as $pending)
                                            <tr>
                                                @if ($pending->ict_request_resource_id)
                                                    <td>
                                                        <i class="fas fa-key"></i> ICT Access Form
                                                    </td>
                                                    <td>
                                                        <span class=" badge text-dark {{$pending->status==1 ? 'bg-success':'bg-warning'}} font-size-11">
                                                            {{ $pending->status==1 ? 'Approved' : 'Pending' }}
                                                            </span>
                                                    </td>
                                                    <td>{{$pending->attend_date}}</td>
                                                    <td>
                                                        <button href="#" class="btn btn-primary btn-sm" title="View" onclick="showForm({{$pending->ict_request_resource_id}})">
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
    </div>
@endsection

<script type="text/javascript">
    function showForm(id){
        var url = '/show_form/' + id;

        window.location.href = url;
    }
</script>


