@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.0/css/buttons.dataTables.css" />

    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
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


                <div class="card card-body p-3">
                    <div class="table-responsive">
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Vendor Name</th>
                                    <th>Business Owner</th>
                                    <th>Phone Number</th>
                                    <th>Physical Address</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Risk Score</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($vendors as $vendor)
                                    <tr>
                                        <td>{{ $vendor->business_owner ?? 'N/A' }}</td>
                                        <td>{{ $vendor->contact_person ?? 'N/A' }}</td>
                                        <td>{{ $vendor->telephone_number ?? 'N/A' }}</td>
                                        <td>{{ $vendor->physical_address ?? 'N/A' }}</td>
                                        <td>{{ $vendor->duration_years ?? 'N/A' }}</td>
                                        <td>{{ $vendor->Status ?? 'N/A' }}</td>
                                        <td>{{ $vendor->overall_risk_score ?? 'N/A' }}</td>
                                        <td>
                                            <!-- View Icon -->
                                            <a href="{{ route('vendors.show', $vendor->id) }}" class="btn btn-info btn-sm"
                                                title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Edit Icon -->
                                            <a href="{{ route('vendors.edit', $vendor->id) }}"
                                                class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Delete Icon -->
                                            <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this vendor?');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.print.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.0/js/dataTables.buttons.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.dataTables.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.html5.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

            <script>
                new DataTable('#example', {
                    layout: {
                        topStart: {
                            buttons: ['csv', 'pdf']
                        }
                    }
                });
            </script>
        </div>
    </div>
    </div>
@endsection
