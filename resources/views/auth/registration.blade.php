@include('includes.head')
@include('sweetalert::alert')
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox row">
                <div class="col-md-12">
                    <div class="signup-container">
                        <h1>Register</h1>
                        <p class="account-subtitle">Enter details to create your account</p>
                    </div>
                    <form id="registrationForm" action="{{ route('register.handleRegistration') }}" method="POST"
                        onsubmit="return validateAge()">
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
                                    <label>Middle Name <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" name="mname" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" name="lname" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Username <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" name="username" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date of Birth <span class="login-danger">*</span></label>
                                    <input class="form-control" type="date" name="DOB" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" name="mobile" required>
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
                                            <option value="{{ $employmentType->id }}">
                                                {{ $employmentType->employment_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Professional Number</label>
                                    <input class="form-control" type="text" name="professional_reg_number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <p>By clicking Sign Up, you agree to our <a href="path_to_terms">Terms</a>, <a
                                            href="path_to_privacy_policy">Privacy Policy</a>.</p>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-block" type="button" id="openAgreementsModal"
                                        style="background-color: #0f813c; color: white;">Sign Up</button>
                                </div>

                                <div class="text-center">
                                    <span>Already registered?</span> <a href="{{ route('login') }}"
                                        style="color: #0f813c;">Login here</a>
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

<!-- User Agreements Modal -->
<div class="modal fade" id="userAgreementsModal" tabindex="-1" aria-labelledby="userAgreementsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userAgreementsModalLabel">User Agreements and Policies</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Child Protection Policy:</strong> This policy aims to ensure the protection and safety of all
                    children interacting with our services. We adhere to strict guidelines to prevent child abuse and
                    exploitation. Our staff are trained to recognize and respond to signs of abuse, and we have measures
                    in place to ensure the safety and privacy of children in our care.</p>
                <p><strong>Privacy Policy:</strong> Your privacy is of utmost importance to us. We are committed to
                    safeguarding your personal information and ensuring that it is used responsibly. Our Privacy Policy
                    outlines the types of data we collect, how we use it, and the measures we take to protect it. We do
                    not share your personal information with third parties without your consent.</p>
                <p><strong>Terms of Service:</strong> By using our services, you agree to comply with our terms and
                    conditions. These terms outline your rights and responsibilities when using our services, including
                    acceptable use, intellectual property rights, and limitations of liability. We encourage you to read
                    these terms carefully to understand your obligations and our commitment to providing a safe and
                    reliable service.</p>
                <p><strong>Data Protection Policy:</strong> We are dedicated to protecting your data and ensuring its
                    security. Our Data Protection Policy details the procedures we follow to safeguard your information
                    from unauthorized access, disclosure, alteration, or destruction. We employ various security
                    measures, including encryption and secure data storage, to maintain the integrity and
                    confidentiality of your data.</p>
                <p><strong>Acceptable Use Policy:</strong> This policy sets out the acceptable use of our services.
                    Users are expected to use our services responsibly and ethically. Prohibited activities include, but
                    are not limited to, unauthorized access to systems, distribution of harmful software, and engaging
                    in activities that infringe on the rights of others. Violations of this policy may result in
                    suspension or termination of services.</p>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" id="acceptCheckbox">
                    <label class="form-check-label" for="acceptCheckbox">
                        I have read and accept the User Agreements and Policies.
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="acceptAgreements" disabled>I Accept</button>
            </div>
        </div>
    </div>
</div>

@include('includes.scripts')

<script>
    document.getElementById('openAgreementsModal').addEventListener('click', function() {
        var form = document.getElementById('registrationForm');
        if (form.checkValidity()) {
            var modal = new bootstrap.Modal(document.getElementById('userAgreementsModal'));
            modal.show();
        } else {
            form.reportValidity();
        }
    });

    document.getElementById('acceptCheckbox').addEventListener('change', function() {
        document.getElementById('acceptAgreements').disabled = !this.checked;
    });

    document.getElementById('acceptAgreements').addEventListener('click', function() {
        document.getElementById('userAgreementsModal').querySelector('.btn-close').click();
        document.getElementById('registrationForm').submit();
    });

    function validateAge() {
        const dob = document.querySelector('input[name="dob"]').value;
        const dobDate = new Date(dob);
        const today = new Date();
        const age = today.getFullYear() - dobDate.getFullYear();
        const monthDifference = today.getMonth() - dobDate.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < dobDate.getDate())) {
            age--;
        }
        if (age < 18) {
            alert("You must be at least 18 years old to register.");
            return false;
        }
        return true;
    }
</script>
