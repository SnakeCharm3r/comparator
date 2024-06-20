@extends('layouts.template')
@section('breadcrumb')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">ICT Access form</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p>Please fill out the following form.</p>
                            <form method="POST" action="#">
                                @csrf
                                <div class="row">
                                    <!-- Column 1 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="username">Username<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="{{ $user->username }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile_number">Mobile Number<span
                                                    style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="mobile_number"
                                                name="mobile_number" placeholder="e.g., 255699990000" pattern="[0-9]{1,13}"
                                                maxlength="13" title="Please enter a valid mobile number (up to 13 digits)"
                                                required>
                                        </div>


                                        <div class="form-group">
                                            <label for="openclinic_hms">User Category<span
                                                    style="color: red;">*</span></label>
                                            <select class="form-control" id="remark" name="remark" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->prv_name }}">{{ $privilege->prv_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="openclinic_hms">Aruti HR MIS<span
                                                    style="color: red;">*</span></label>
                                            <select class="form-control" id="remark" name="remark" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->prv_name }}">{{ $privilege->prv_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="starting_date">Starting Date</label>
                                            <input type="date" class="form-control" id="starting_date"
                                                name="starting_date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="remark">Remark<span style="color: red;">*</span></label>
                                            <select class="form-control" id="remark" name="remark" required>
                                                <option value="">Select an option</option>
                                                @foreach ($rmk as $remark)
                                                    <option value="{{ $remark->rmk_name }}">{{ $remark->rmk_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="remark">Aruti HR MIS<span style="color: red;">*</span></label>
                                            <select class="form-control" id="prv_name" name="prv_name" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->prv_name }}">{{ $privilege->prv_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">PABX<span style="color: red;">*</span></label>
                                            <select class="form-control" id="remark" name="remark" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->prv_name }}">{{ $privilege->prv_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <!-- Column 2 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name">First Name<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                value="{{ $user->fname }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="employee_id">Email</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $user->email }}" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="department">Department<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="department" name="dept_name"
                                                value="{{ $user->department->dept_name }}" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="openclinic_hms">Active Directory<span
                                                    style="color: red;">*</span></label>
                                            <select class="form-control" id="remark" name="remark" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->prv_name }}">{{ $privilege->prv_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ending_date">Ending Date</label>
                                            <input type="date" class="form-control" id="ending_date"
                                                name="ending_date">
                                        </div>
                                        <div class="form-group">
                                            <label for="employee_id">Employee ID</label>
                                            <input type="text" class="form-control" id="employee_id"
                                                name="employee_id" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="hardware">Hardware</span></label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware[]" value="Laptop computer"> Laptop
                                                            computer</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware[]" value="Desktop computer"> Desktop
                                                            computer</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware[]" value="Telephone"> Telephone</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column 3 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="last_name">Last Name<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                value="{{ $user->lname }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="employment_type">Employment Type<span
                                                    style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="employment_type"
                                                name="employment_type"
                                                value="{{ $user->employmentType->employment_type }}" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="openclinic_hms">NHIF Qualification</label>
                                            <select class="form-control" id="openclinic_hms" name="openclinic_hms"
                                                required>
                                                <option value="">Select an option</option>
                                                @foreach ($qualifications as $qualification)
                                                    <option value="{{ $qualification->name }}">{{ $qualification->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">HMIS Access</label>
                                            <select class="form-control" id="names" name="names"
                                                required>
                                                <option value="">Select an option</option>
                                                @foreach ($hmis as $hmi)
                                                    <option value="{{ $hmi->names }}">{{ $hmi->names }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">CCBRT Email</label>
                                            <select class="form-control" id="remark" name="remark" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->prv_name }}">{{ $privilege->prv_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">SAP ERP<span style="color: red;">*</span></label>
                                            <select class="form-control" id="remark" name="remark" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->prv_name }}">{{ $privilege->prv_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">Network Access VPN</label>
                                            <select class="form-control" id="remark" name="remark" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->prv_name }}">{{ $privilege->prv_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3"
                                    style="background-color: #00d084; border-color: #00d084;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('content')
@endsection
