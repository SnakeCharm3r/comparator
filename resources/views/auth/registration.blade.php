@include('includes.head')

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox row">
                    <div class="col-md-12">
                        <div class="signup-container">
                            <h1>Register </h1>
                            <p class="account-subtitle">Enter details to create your account</p>
                    
                        </div>
                        
                        <form action="{{ route('register.handleRegistration') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="fname" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="lname" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Username <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="username" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email <span class="login-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Password <span class="login-danger">*</span></label>
                                        <input class="form-control pass-input" type="password" name="password" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Department <span class="login-danger">*</span></label>
                                        <select class="form-control" name="deptId" required>
                                            <option value="">Select Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->dept_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input class="form-control" type="text" name="job_title">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employment Type <span class="login-danger">*</span></label>
                                        <select class="form-control" name="employment_typeId" required>
                                            <option value="">Select Employment Type</option>
                                            @foreach ($employmentTypes as $employmentType)
                                                <option value="{{ $employmentType->id }}">{{ $employmentType->employment_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary btn-block" type="submit" style="background-color: #0f813c; color: white;">Register</button>
                                    </div>
                                    
                                    <div class="text-center">
                                        <span>Already registered?</span> <a href="{{ route('login') }}" style="color: #0f813c;">Login here</a>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </form>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('includes.scripts')

