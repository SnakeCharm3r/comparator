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
                                                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile_number">Mobile Number<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="e.g., 255699990000" pattern="[0-9]{1,13}" maxlength="13" title="Please enter a valid mobile number (up to 13 digits)" required>
                                                <small class="text-muted">Enter digits only,10 up to 13 numbers.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="hardware">Hardware <span class="required-field">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" class="hardware-checkbox" name="hardware[]" value="Laptop computer"> Laptop computer</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" class="hardware-checkbox" name="hardware[]" value="Desktop computer"> Desktop computer</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" class="hardware-checkbox" name="hardware[]" value="Telephone"> Telephone</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <small class="form-text text-muted">You can select up to 2 options.</small>
                                            </div>

                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    var checkboxes = document.querySelectorAll('.hardware-checkbox');
                                                    var max = 2;
                                                    checkboxes.forEach(function(checkbox) {
                                                        checkbox.addEventListener('change', function() {
                                                            var checkedCount = document.querySelectorAll('.hardware-checkbox:checked').length;
                                                            if (checkedCount > max) {
                                                                this.checked = false;
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>

                                            <div class="form-group">
                                                <label for="starting_date">Starting Date<span style="color: red;">*</span></label>
                                                <input type="date" class="form-control" id="starting_date" name="starting_date" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="openclinic_hms">User Privilege<span style="color: red;">*</span></label>
                                                <select class="form-control" id="openclinic_hms" name="openclinic_hms" required>
                                                    <option value="">Select an option</option>
                                                    <option value="Medical Record">Normal User</option>
                                                    <option value="Medical Record">Administrator</option>
                                                    <option value="Medical Record">Super Administrator</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Column 2 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="first_name">First Name<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->fname }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="employee_id">Email<span style="color: red;">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="department">Department<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="department" name="department" value="{{ $user->department->dept_name }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile_number">Active Directory</label>
                                                <input type="text" class="form-control" id="mobile_number" name="mobile_number" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="ending_date">Ending Date<span style="color: red;">*</span></label>
                                                <input type="date" class="form-control" id="ending_date" name="ending_date">
                                            </div>
                                            <div class="form-group">
                                                <label for="employee_id">Employee ID</label>
                                                <input type="text" class="form-control" id="employee_id" name="employee_id" required>
                                            </div>
                                        </div>

                                        <!-- Column 3 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_name">Last Name<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->lname }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="employment_type">Employment Type<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="employment_type" name="employment_type" value="{{ $user->employmentType->employment_type }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="openclinic_hms">NHIF Qualification</label>
                                                <select class="form-control" id="openclinic_hms" name="openclinic_hms" required>
                                                    <option value="">Select an option</option>
                                                    <option value="Medical Record">Medical Record</option>
                                                    <option value="Medical Record & General Billing">Medical Record & General Billing</option>
                                                    <option value="Nurses Anesthesia">Nurses Anesthesia</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="openclinic_hms">OpenClinic HMIS</label>
                                                <select class="form-control" id="openclinic_hms" name="openclinic_hms" required>
                                                    <option value="">Select an option</option>
                                                    <option value="Medical Record">Medical Record</option>
                                                    <option value="Medical Record & General Billing">Medical Record & General Billing</option>
                                                    <option value="Nurses Anesthesia">Nurses Anesthesia</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="openclinic_hms">Remark<span style="color: red;">*</span></label>
                                                <select class="form-control" id="openclinic_hms" name="openclinic_hms" required>
                                                    <option value="">Select an option</option>
                                                    <option value="Medical Record">Grant</option>
                                                    <option value="Medical Record">Revoke</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
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

