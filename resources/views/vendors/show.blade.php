@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Header with Logo -->
            <div class="page-header d-flex justify-content-between align-items-center">
                {{-- <div>
                    <img src="{{ asset('path_to_logo/logo.png') }}" alt="Logo" style="height: 60px;">
                </div> --}}
                <div>
                    <h3 class="page-title text-center">Vendor Details</h3>
                </div>
                <div>
                    <!-- Empty div to balance the layout -->
                </div>
            </div>

            <!-- Vendor Information Section -->
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Vendor Information</h5>
                    <a href="{{ route('vendors.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Business Owner</th>
                                <td>{{ $vendor->business_owner }}</td>
                            </tr>
                            <tr>
                                <th>Contact Person</th>
                                <td>{{ $vendor->contact_person }}</td>
                            </tr>
                            <tr>
                                <th>Telephone Number</th>
                                <td>{{ $vendor->telephone_number }}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{ $vendor->email_address }}</td>
                            </tr>
                            <tr>
                                <th>Physical Address</th>
                                <td>{{ $vendor->physical_address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Contract Details Section -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Contract Details</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Contract Total Value</th>
                                <td>{{ $vendor->contract_total_value }}</td>
                            </tr>
                            <tr>
                                <th>Duration (Years)</th>
                                <td>{{ $vendor->duration_years }}</td>
                            </tr>
                            <tr>
                                <th>Likelihood Rating</th>
                                <td>{{ $vendor->likelihood_rating }}</td>
                            </tr>
                            <tr>
                                <th>Impact Rating</th>
                                <td>{{ $vendor->impact_rating }}</td>
                            </tr>
                            <tr>
                                <th>Overall Risk Score</th>
                                <td>{{ $vendor->overall_risk_score }}</td>
                            </tr>
                            @if ($vendor->contract_file)
                                <tr>
                                    <th>Contract File</th>
                                    <td>
                                        <a href="{{ Storage::url($vendor->contract_file) }}" class="btn btn-info"
                                            target="_blank">Download</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
