@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">HESLB Declaration Details</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="loan_status">Loan Status</label>
                                <input id="loan_status" type="text" class="form-control"
                                    value="{{ $declaration->loan_status }}" readonly>
                            </div>

                            @if ($declaration->loan_status == 'has_loan')
                                <div class="form-group">
                                    <label for="form_iv_index_no">Form IV Index No.</label>
                                    <input id="form_iv_index_no" type="text" class="form-control"
                                        value="{{ $declaration->form_iv_index_no }}" readonly>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="name">Name (Staff)</label>
                                <input id="name" type="text" class="form-control"
                                    value="{{ $declaration->user->username }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="signature">Signature</label>
                                <input id="signature" type="text" class="form-control"
                                    value="{{ $declaration->signature }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input id="date" type="text" class="form-control" value="{{ $declaration->date }}"
                                    readonly>
                            </div>

                            @if ($declaration->hr_comment)
                                <div class="form-group">
                                    <label for="hr_comment">HR Comment</label>
                                    <textarea id="hr_comment" class="form-control" rows="3" readonly>{{ $declaration->hr_comment }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="hr_member">HR Member</label>
                                    <input id="hr_member" type="text" class="form-control"
                                        value="{{ $declaration->user->name }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="hr_signature">HR Signature</label>
                                    <input id="hr_signature" type="text" class="form-control"
                                        value="{{ $declaration->hr_signature }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="hr_date">HR Date</label>
                                    <input id="hr_date" type="text" class="form-control"
                                        value="{{ $declaration->hr_date }}" readonly>
                                </div>
                            @endif

                            <a href="{{ route('hslb.index') }}" class="btn btn-secondary">Back</a>
                            <a href="{{ route('hslb.edit', $declaration->id) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
