
@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">HESLB Loan Declaration Form</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('hslb.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="loan_status">Loan Status</label>
                                    <select id="loan_status" name="loan_status" class="form-control" required>
                                        <option value="" disabled selected>Select your loan status</option>
                                        <option value="has_loan">I have an outstanding loan from HESLB</option>
                                        <option value="no_loan">I have no outstanding loan from HESLB</option>
                                    </select>
                                </div>

                                <div id="loan_details" style="display:none;">
                                    <div class="form-group">
                                        <label for="form_iv_index_no">Form IV Index No.</label>
                                        <input id="form_iv_index_no" type="text" class="form-control @error('form_iv_index_no') is-invalid @enderror"
                                            name="form_iv_index_no" value="{{ old('form_iv_index_no') }}">
                                        @error('form_iv_index_no')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name (Staff)</label>
                                    <input id="name" type="text" class="form-control" name="username"
                                        value="{{ auth()->user()->username }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="signature">Signature</label>
                                    <input id="signature" type="text" class="form-control @error('signature') is-invalid @enderror" name="signature" value="{{ old('signature') }}" required>
                                    @error('signature')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required>
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('loan_status').addEventListener('change', function() {
                var loanDetails = document.getElementById('loan_details');
                if (this.value === 'has_loan') {
                    loanDetails.style.display = 'block';
                } else {
                    loanDetails.style.display = 'none';
                }
            });
        </script>
    @endpush
@endsection
