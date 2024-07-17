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
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('search.requests') }}" method="GET" class="form-inline">
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="query" class="form-control form-control-sm"
                                                placeholder="Search...">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-search fa-xs"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table table-hover table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Request Type</th>
                                            <th>Status</th>
                                            <th>Submitted</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- {{dd($pending)}} --}}
                                        @foreach ($pending as $index => $pending)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                @if ($pending->ict_request_resource_id)
                                                    <td>
                                                         ICT Access Form
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge text-dark {{ $pending->status == 1 ? 'bg-success' : 'bg-warning' }} font-size-11">
                                                            {{ $pending->status == 1 ? 'Approved' : 'Pending' }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $pending->attend_date }}</td>
                                                    <td>
                                                        <button href="#" class="btn btn-primary btn-sm" title="View"
                                                            onclick="showForm({{ $pending->ict_request_resource_id }})">
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
    function showForm(id) {
        var url = '/show_form/' + id;
        window.location.href = url;
    }
</script>
