@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Vendor Contracts</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('vendors.create') }}" class="btn btn-primary ml-auto">Add Vendor</a>
                </div>


                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Vendor Name</th>
                                <th>Business Owner</th>
                                <th>Legal Owner</th>
                                <th>Contract Type</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Contract Value</th>
                                <th>Overall Risk Score</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vendors as $vendor)
                                <tr>
                                    <td>{{ $vendor->name ?? 'N/A' }}</td>
                                    <td>{{ $vendor->business_owner ?? 'N/A' }}</td>
                                    <td>{{ $vendor->legal_owner ?? 'N/A' }}</td>
                                    <td>{{ $vendor->contract_type ?? 'N/A' }}</td>
                                    <td>{{ $vendor->status ?? 'N/A' }}</td>
                                    <td>{{ $vendor->start_date ? $vendor->start_date->format('d-m-Y') : 'N/A' }}</td>
                                    <td>{{ $vendor->end_date ? $vendor->end_date->format('d-m-Y') : 'N/A' }}</td>
                                    <td>{{ $vendor->contract_total_value ? '$' . number_format($vendor->contract_total_value, 2) : 'N/A' }}
                                    </td>
                                    <td>{{ $vendor->overall_risk_score ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('vendors.show', $vendor->id) }}"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('vendors.edit', $vendor->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this vendor?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">No vendors found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
