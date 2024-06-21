@extends('layouts.template')
@section('breadcrumb')
@include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">IT Access Form</h3>
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
                                    <input type="hidden" name="userId" value="{{ $user->id }}">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="username">Username<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="{{ $user->username }}" readonly>
                                        </div>


                                        <div class="form-group">
                                            <label for="mobile">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile"
                                                value="{{ $user->mobile }}" readonly>
                                        </div>


                                        <div class="form-group">
                                            <label for="openclinic_hms">User Category<span
                                                    style="color: red;">*</span></label>
                                            <select class="form-control" id="privilegeId" name="privilegeId" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="openclinic_hms">Aruti HR MIS<span
                                                    style="color: red;">*</span></label>
                                            <select class="form-control" id="aruti" name="aruti" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
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
                                            <select class="form-control" id="remark" name="remarkId" required>
                                                <option value="">Select an option</option>
                                                @foreach ($rmk as $remark)
                                                    <option value="{{ $remark->id }}">{{ $remark->rmk_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="remark">Aruti HR MIS<span style="color: red;">*</span></label>
                                            <select class="form-control" id="aruti" name="aruti" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="openclinic_hms">PABX<span style="color: red;">*</span></label>
                                            <select class="form-control" id="pbax" name="pbax" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
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
                                            <select class="form-control" id="privilegeId" name="active_drt" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
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
                                                name="employee_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="hardware">Hardware</span></label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware_request[]" value="Laptop computer"> Laptop
                                                            computer</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware_request[]" value="Desktop computer">
                                                            Desktop
                                                            computer</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware_request[]" value="Telephone">
                                                            Telephone</label>
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
                                            <select class="form-control" id="nhifId" name="nhifId" required>
                                                <option value="">Select an option</option>
                                                @foreach ($qualifications as $qualification)
                                                    <option value="{{ $qualification->id }}">{{ $qualification->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">HMIS Access</label>
                                            <select class="form-control" id="hmisId" name="hmisId" required>
                                                <option value="">Select an option</option>
                                                @foreach ($hmis as $hmi)
                                                    <option value="{{ $hmi->id }}">{{ $hmi->names }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">CCBRT Email</label>
                                            <select class="form-control" id="privilegeId" name="privilegeId" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">SAP ERP<span style="color: red;">*</span></label>
                                            <select class="form-control" id="privilegeId" name="sap" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">Network Access VPN</label>
                                            <select class="form-control" id="VPN" name="VPN" required>
                                                <option value="">Select an option</option>
                                                @foreach ($privileges as $privilege)
                                                    <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
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
