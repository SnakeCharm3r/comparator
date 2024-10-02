@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Header -->
            <div class="page-header d-flex justify-content-between align-items-center">
                <h3 class="page-title text-center">Edit Vendor</h3>
                <a href="{{ route('vendors.index') }}" class="btn btn-secondary">Back to List</a>
            </div>

            <!-- Vendor Edit Form -->
            <div class="card mt-4">
                <div class="card-body">
                    <form action="{{ route('vendors.update', $vendor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_owner">Business Owner</label>
                                    <input type="text" name="business_owner" id="business_owner"
                                        class="form-control @error('business_owner') is-invalid @enderror"
                                        value="{{ old('business_owner', $vendor->business_owner) }}" required>
                                    @error('business_owner')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="contact_person">Contact Person</label>
                                    <input type="text" name="contact_person" id="contact_person"
                                        class="form-control @error('contact_person') is-invalid @enderror"
                                        value="{{ old('contact_person', $vendor->contact_person) }}" required>
                                    @error('contact_person')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="telephone_number">Phone</label>
                                    <input type="text" name="telephone_number" id="telephone_number"
                                        class="form-control @error('telephone_number') is-invalid @enderror"
                                        value="{{ old('telephone_number', $vendor->telephone_number) }}" required>
                                    @error('telephone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email_address">Email Address</label>
                                    <input type="email" name="email_address" id="email_address"
                                        class="form-control @error('email_address') is-invalid @enderror"
                                        value="{{ old('email_address', $vendor->email_address) }}" required>
                                    @error('email_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="physical_address">Physical Address</label>
                                    <input type="text" name="physical_address" id="physical_address"
                                        class="form-control @error('physical_address') is-invalid @enderror"
                                        value="{{ old('physical_address', $vendor->physical_address) }}" required>
                                    @error('physical_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contract_file">Contract File (PDF, DOC, DOCX)</label>
                                    <input type="file" name="contract_file" id="contract_file"
                                        class="form-control @error('contract_file') is-invalid @enderror">
                                    @if ($vendor->contract_file)
                                        <a href="{{ Storage::url($vendor->contract_file) }}" class="btn btn-info mt-2"
                                            target="_blank">View Current Contract</a>
                                    @endif
                                    @error('contract_file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="contract_total_value">Contract Total Value</label>
                                    <input type="number" name="contract_total_value" id="contract_total_value"
                                        class="form-control @error('contract_total_value') is-invalid @enderror"
                                        step="0.01" value="{{ old('contract_total_value', $vendor->contract_total_value) }}">
                                    @error('contract_total_value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="duration_years">Duration (Years)</label>
                                    <input type="number" name="duration_years" id="duration_years"
                                        class="form-control @error('duration_years') is-invalid @enderror"
                                        value="{{ old('duration_years', $vendor->duration_years) }}">
                                    @error('duration_years')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="likelihood_rating">Likelihood Rating</label>
                                    <input type="number" name="likelihood_rating" id="likelihood_rating"
                                        class="form-control @if($vendor->likelihood_rating <= 3) table-success @elseif($vendor->likelihood_rating <= 6) table-warning @else table-danger @endif @error('likelihood_rating') is-invalid @enderror"
                                        value="{{ old('likelihood_rating', $vendor->likelihood_rating) }}">
                                    @error('likelihood_rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="impact_rating">Impact Rating</label>
                                    <input type="number" name="impact_rating" id="impact_rating"
                                        class="form-control @if($vendor->impact_rating <= 3) table-success @elseif($vendor->impact_rating <= 6) table-warning @else table-danger @endif @error('impact_rating') is-invalid @enderror"
                                        value="{{ old('impact_rating', $vendor->impact_rating) }}">
                                    @error('impact_rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="overall_risk_score">Overall Risk Score</label>
                                    <input type="number" name="overall_risk_score" id="overall_risk_score"
                                        class="form-control @if($vendor->overall_risk_score <= 3) table-success @elseif($vendor->overall_risk_score <= 6) table-warning @else table-danger @endif @error('overall_risk_score') is-invalid @enderror"
                                        value="{{ old('overall_risk_score', $vendor->overall_risk_score) }}">
                                    @error('overall_risk_score')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Update Vendor</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
