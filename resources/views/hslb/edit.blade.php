@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Edit HESLB Declaration</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('hslb.update', $declaration->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="loan_status">Loan Status</label>
                                    <select id="loan_status" name="loan_status" class="form-control" required>
                                        <option value="has_loan"
                                            {{ $declaration->loan_status == 'has_loan' ? 'selected' : '' }}>I have an
                                            outstanding loan from HESLB</option>
                                        <option value="no_loan"
                                            {{ $declaration->loan_status == 'no_loan' ? 'selected' : '' }}>I have no
                                            outstanding loan from HESLB</option>
                                    </select>
                                </div>

                                <div id="loan_details"
                                    style="{{ $declaration->loan_status == 'has_loan' ? 'display:block;' : 'display:none;' }}">
                                    <div class="form-group">
                                        <label for="form_iv_index_no">Form IV Index No.</label>
                                        <input id="form_iv_index_no" type="text"
                                            class="form-control @error('form_iv_index_no') is-invalid @enderror"
                                            name="form_iv_index_no"
                                            value="{{ old('form_iv_index_no', $declaration->form_iv_index_no) }}">
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
                                    <input id="signature" type="text"
                                        class="form-control @error('signature') is-invalid @enderror" name="signature"
                                        value="{{ old('signature', $declaration->signature) }}" required>
                                    @error('signature')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input id="date" type="date"
                                        class="form-control @error('date') is-invalid @enderror" name="date"
                                        value="{{ old('date', $declaration->date) }}" required>
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HR Confirmation Section -->
            <div class="row mt-4">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-body">
                            <h3>HR Confirmation</h3>
                            <form method="POST" action="{{ route('hslb.hrConfirm', $declaration->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="hr_comment">Comment</label>
                                    <textarea id="hr_comment" class="form-control @error('hr_comment') is-invalid @enderror" name="hr_comment"
                                        rows="3">{{ old('hr_comment', $declaration->hr_comment) }}</textarea>
                                    @error('hr_comment')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="hr_member">HR Member</label>
                                    <input id="hr_member" type="text" class="form-control" name="hr_member"
                                        value="{{ old('hr_member', auth()->user()->name) }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="hr_signature">Signature</label>
                                    <input id="hr_signature" type="text"
                                        class="form-control @error('hr_signature') is-invalid @enderror" name="hr_signature"
                                        value="{{ old('hr_signature', $declaration->hr_signature) }}" required>
                                    @error('hr_signature')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="hr_date">Date</label>
                                    <input id="hr_date" type="date"
                                        class="form-control @error('hr_date') is-invalid @enderror" name="hr_date"
                                        value="{{ old('hr_date', $declaration->hr_date) }}" required>
                                    @error('hr_date')
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
