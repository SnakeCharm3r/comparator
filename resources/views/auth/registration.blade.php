@include('includes.head')
<div class="content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card comman-shadow">
                <div class="card-body">
                <form method="POST" action="{{ route('register.handleRegistration') }}" enctype="multipart/form-data">
                  @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title employee-info">Employee Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>First Name <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter First Name" name="fname">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Middle Name <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Middle Name" name="mname">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Last Name <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Last Name" name="lname">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Username <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Username" name="username">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Gender <span class="login-danger">*</span></label>
                                    <select class="form-control select" name="gender">
                                        <option>Select Gender</option>
                                        <option>Female</option>
                                        <option>Male</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Marital Status <span class="login-danger">*</span></label>
                                    <select class="form-control select" name="marital_status">
                                        <option>Select Marital Status</option>
                                        <option>Married</option>
                                        <option>Single</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms calendar-icon">
                                    <label>Date Of Birth <span class="login-danger">*</span></label>
                                    <input class="form-control datetimepicker" type="text" name="DOB" placeholder="DD-MM-YYYY" required>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Job Title </label>
                                    <input class="form-control" type="text" placeholder="Enter Job Title" name="job_title">
                                </div>
                            </div>


                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Religion <span class="login-danger">*</span></label>
                                    <select class="form-control select" name="religion">
                                        <option>Please Select Religion </option>
                                        <option>Islamic</option>
                                        <option>Christian</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>E-Mail <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Email Address" name="email">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Home address <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Home Address" name="home_address">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>District<span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Your District" name="district">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Professional Registration Number <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Your Professional Reg number" name="professional_reg_number">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Placde of Birth <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Your Place of birth" name="place_of_birth">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>House Number <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Your House Number" name="house_no">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Street <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Street " name="street">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Domicile <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter your area of domicile" name="domicile">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Nida number <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Nida Number" name="NIN">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Nssf Number<span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter NSSF Number" name="nssf_no">
                                </div>
                            </div>


                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Departments <span class="login-danger">*</span></label>
                                    <select class="form-control select" name="deptId">
                                        <option value="">Please Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->dept_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Employment Types <span class="login-danger">*</span></label>
                                    <select class="form-control select" name="employment_typeId">
                                        <option value="">Please Select Employment Type</option>
                                        @foreach ($employmentTypes as $employmentType)
                                            <option value="{{ $employmentType->id }}">{{ $employmentType->employment_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Phone </label>
                                    <input class="form-control" type="text" placeholder="Enter Phone Number" name="mobile">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group students-up-files">
                                    <label>Upload CV</label>
                                    <div class="uplod">
                                        <label class="file-upload image-upbtn mb-0">
                                            Choose File <input type="file">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.scripts')
