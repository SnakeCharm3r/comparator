{{-- @extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Add New Vendor</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('vendors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Vendor Name</label>
                                    <input type="text" name="business_owner" id="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="contact_person">Contact Person</label>
                                    <input type="text" name="contact_person" id="contact_person"
                                        class="form-control @error('contact_person') is-invalid @enderror"
                                        value="{{ old('contact_person') }}" required>
                                    @error('contact_person')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="telephone_number" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email_address" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Physical Address</label>
                                    <input type="text" name="physical_address" id="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address') }}" required>
                                    @error('address')
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
                                        step="0.01" value="{{ old('contract_total_value') }}">
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
                                        value="{{ old('duration_years') }}">
                                    @error('duration_years')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="likelihood_rating">Likelihood Rating</label>
                                    <input type="number" name="likelihood_rating" id="likelihood_rating"
                                        class="form-control @error('likelihood_rating') is-invalid @enderror"
                                        value="{{ old('likelihood_rating') }}">
                                    @error('likelihood_rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="impact_rating">Impact Rating</label>
                                    <input type="number" name="impact_rating" id="impact_rating"
                                        class="form-control @error('impact_rating') is-invalid @enderror"
                                        value="{{ old('impact_rating') }}">
                                    @error('impact_rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="overall_risk_score">Overall Risk Score</label>
                                    <input type="number" name="overall_risk_score" id="overall_risk_score"
                                        class="form-control @error('overall_risk_score') is-invalid @enderror"
                                        value="{{ old('overall_risk_score') }}">
                                    @error('overall_risk_score')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Save Vendor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Add New Vendor</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('vendors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_owner">Vendor Name</label>
                                    <input type="text" name="business_owner" id="business_owner"
                                        class="form-control @error('business_owner') is-invalid @enderror"
                                        value="{{ old('business_owner') }}" required>
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
                                        value="{{ old('contact_person') }}" required>
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
                                        value="{{ old('telephone_number') }}" required>
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
                                        value="{{ old('email_address') }}" required>
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
                                        value="{{ old('physical_address') }}" required>
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
                                        step="0.01" value="{{ old('contract_total_value') }}">
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
                                        value="{{ old('duration_years') }}">
                                    @error('duration_years')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="likelihood_rating">Likelihood Rating</label>
                                    <input type="number" name="likelihood_rating" id="likelihood_rating"
                                        class="form-control @error('likelihood_rating') is-invalid @enderror"
                                        value="{{ old('likelihood_rating') }}" min="1" max="5" required>
                                    @error('likelihood_rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="impact_rating">Impact Rating</label>
                                    <input type="number" name="impact_rating" id="impact_rating"
                                        class="form-control @error('impact_rating') is-invalid @enderror"
                                        value="{{ old('impact_rating') }}" min="1" max="5" required>
                                    @error('impact_rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="overall_risk_score">Overall Risk Score</label>
                                    <input type="number" name="overall_risk_score" id="overall_risk_score"
                                        class="form-control @error('overall_risk_score') is-invalid @enderror"
                                        value="{{ old('overall_risk_score') }}" readonly>
                                    @error('overall_risk_score')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Save Vendor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('likelihood_rating').addEventListener('input', calculateRiskScore);
        document.getElementById('impact_rating').addEventListener('input', calculateRiskScore);

        function calculateRiskScore() {
            const likelihood = parseInt(document.getElementById('likelihood_rating').value);
            const impact = parseInt(document.getElementById('impact_rating').value);

            if (!isNaN(likelihood) && !isNaN(impact)) {
                const riskScore = likelihood * impact;
                document.getElementById('overall_risk_score').value = riskScore;
            }
        }
    </script>
@endsection
