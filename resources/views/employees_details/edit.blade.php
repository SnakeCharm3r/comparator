@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
@endsection

@section('content')
    <div class="container">
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit User Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employees_details.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" id="department" name="department"
                                    value="{{ $user->department }}" required>
                            </div>
                            <div class="form-group">
                                <label for="job_title">Job Title</label>
                                <input type="text" class="form-control" id="job_title" name="job_title"
                                    value="{{ $user->job_title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="ccb_code">CCBRT Code</label>
                                <input type="text" class="form-control" id="ccb_code" name="ccb_code"
                                    value="{{ $user->ccb_code }}" required>
                            </div>
                            <div class="form-group">
                                <label for="professional_reg_number">Professional Reg Number</label>
                                <input type="text" class="form-control" id="professional_reg_number"
                                    name="professional_reg_number" value="{{ $user->professional_reg_number }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nssf_no">NSSF No</label>
                                <input type="text" class="form-control" id="nssf_no" name="nssf_no"
                                    value="{{ $user->nssf_no }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('employees_details.show', $user->id) }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
