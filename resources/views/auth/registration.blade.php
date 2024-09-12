@include('includes.head')
@include('sweetalert::alert')

{{-- <div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox row">
                <div class="col-md-12">
                    <div class="signup-container">
                        <h1>Register</h1>
                    </div>
                    <form id="registrationForm" action="{{ route('register.handleRegistration') }}" method="POST"
                        onsubmit="return validatePassword()">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">
                                        Please fill in your names as they appear in your National Identification Number
                                        (NIN).
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fname">First Name <span class="login-danger">*</span></label>
                                    <input class="form-control" id="fname" type="text" name="fname" required
                                        placeholder="e.g., John" aria-describedby="nameHelp">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mname">Middle Name <span class="login-danger">*</span></label>
                                    <input class="form-control" id="mname" type="text" name="mname" required
                                        placeholder="e.g., Juma" aria-describedby="nameHelp">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lname">Last Name <span class="login-danger">*</span></label>
                                    <input class="form-control" id="lname" type="text" name="lname" required
                                        placeholder="e.g., Doe" aria-describedby="nameHelp">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="username">Username <span class="login-danger">*</span></label>
                                    <input class="form-control" id="username" type="text" name="username" required
                                        placeholder="e.g., Juma">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Personal Email Account<span
                                            class="login-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" required
                                        placeholder="e.g., abc@gmail.com"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                        title="Please enter a valid email address in the format: abc@example.com">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dob">Date of Birth <span class="login-danger">*</span></label>
                                    <input class="form-control" id="dob" type="date" name="DOB" required>
                                </div>
                            </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var today = new Date();
                                    var minDate = new Date();

                                    minDate.setFullYear(today.getFullYear() - 18);
                                    minDate.setMonth(today.getMonth());
                                    minDate.setDate(today.getDate());

                                    var yyyy = minDate.getFullYear();
                                    var mm = ('0' + (minDate.getMonth() + 1)).slice(-2);
                                    var dd = ('0' + minDate.getDate()).slice(-2);
                                    var minDateString = yyyy + '-' + mm + '-' + dd;

                                    document.getElementById('dob').setAttribute('max', minDateString);
                                });
                            </script>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone">Phone Number <span class="login-danger">*</span></label>
                                    <input class="form-control" id="phone" type="tel" name="mobile" required
                                        placeholder="e.g., 0699 990 002" pattern="[+]?[0-9]{10,15}"
                                        title="Phone number should be between 10 to 15 digits and may start with a '+'.">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input class="form-control pass-input" type="password" name="password"
                                        id="password" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm Password <span class="login-danger">*</span></label>
                                    <input class="form-control pass-input" type="password" name="password_confirmation"
                                        id="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Department <span class="login-danger">*</span></label>
                                    <select class="form-control" name="deptId" required>
                                        <option value="">-----Select-----</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->dept_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input class="form-control" id="job_title" type="text" name="job_title"
                                        placeholder="e.g., Doctor">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Employment Type<span class="login-danger">*</span></label>
                                    <select class="form-control" name="employment_typeId" required>
                                        <option value="">-----Select-----</option>
                                        @foreach ($employmentTypes as $employmentType)
                                            <option value="{{ $employmentType->id }}">
                                                {{ $employmentType->employment_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
</div> --}}

<div class="main-wrapper login-body" style="background-color: hsl(0, 0%, 100%);">

    <div class="login-wrapper" style="background-color: #eff8f3;">
        <div class="container">
            <div class="loginbox row justify-content-center">
                <div class="col-md-10">
                    <div class="signup-container text-center">
                        <h1 style="font-size: 2rem; color: #333;">Register Your Account</h1>
                    </div>

                    <form id="registrationForm" action="{{ route('register.handleRegistration') }}" method="POST"
                        onsubmit="return validatePassword()">
                        @csrf

                        <div class="alert alert-info" role="alert" style="background-color: #eaf3fc; color: #0f813c;">
                            Please fill in your names as they appear on your National Identification Number (NIDA).
                        </div>

                        <!-- Name Fields -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fname">First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="fname" type="text" name="fname" required
                                        placeholder="e.g., John" aria-describedby="nameHelp"
                                        style="border-color: #ced4da;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mname">Middle Name <span class="text-danger"></span></label>
                                    <input class="form-control" id="mname" type="text" name="mname" required
                                        placeholder="e.g., Juma" aria-describedby="nameHelp"
                                        style="border-color: #ced4da;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lname">Last Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="lname" type="text" name="lname" required
                                        placeholder="e.g., Doe" aria-describedby="nameHelp"
                                        style="border-color: #ced4da;">
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="row">
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="username">Username <span class="text-danger">*</span></label>
                                    <input class="form-control" id="username" type="text" name="username" required
                                        placeholder="e.g., Juma.Doe" style="border-color: #ced4da;">
                                </div>
                            </div> --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Professional Number</label>
                                    <input class="form-control" type="text" name="professional_reg_number"
                                        placeholder="e.g., 12345678" style="border-color: #ced4da;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger"></span></label>
                                    <input class="form-control" type="email" name="email" required
                                        placeholder="e.g., abc@gmail.com"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                        title="Please enter a valid email address." style="border-color: #ced4da;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dob">Date of Birth <span class="text-danger">*</span></label>
                                    <input class="form-control" id="dob" type="date" name="DOB" required
                                        style="border-color: #ced4da;">
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var today = new Date();
                                var minDate = new Date(today.setFullYear(today.getFullYear() - 18));
                                var minDateString = minDate.toISOString().split('T')[0];
                                document.getElementById('dob').setAttribute('max', minDateString);
                            });
                        </script>

                        <!-- More Fields -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone">Phone Number <span class="text-danger">*</span></label>
                                    <input class="form-control" id="phone" type="tel" name="mobile" required
                                        placeholder="e.g., 699 990 002" style="border-color: #ced4da;">
                                    <input type="hidden" id="country_code" name="country_code">
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var input = document.querySelector("#phone");
                                    var countryCodeInput = document.querySelector("#country_code");

                                    var iti = intlTelInput(input, {
                                        initialCountry: "tz", // Set Tanzania as the default country
                                        nationalMode: true, // Allows the user to enter national format
                                        autoPlaceholder: "polite", // Provides a placeholder based on country
                                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // Utility script for formatting and validation
                                    });

                                    // Set the hidden input with the country code whenever the user changes the phone number or the country
                                    input.addEventListener('change', function() {
                                        countryCodeInput.value = iti.getSelectedCountryData().dialCode;
                                    });

                                    // Also set the hidden input when the page loads
                                    countryCodeInput.value = iti.getSelectedCountryData().dialCode;
                                });
                            </script>


                            <!-- Include the CSS file for intl-tel-input -->
                            <link rel="stylesheet"
                                href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
                            <!-- Include the JS files for intl-tel-input -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input class="form-control pass-input" type="password" name="password"
                                        id="password" required style="border-color: #ced4da;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm Password <span class="text-danger">*</span></label>
                                    <input class="form-control pass-input" type="password"
                                        name="password_confirmation" id="password_confirmation" required
                                        style="border-color: #ced4da;">
                                </div>
                            </div>
                        </div>

                        <!-- Department and Job Details -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                    <select class="form-control" name="deptId" required
                                        style="border-color: #ced4da;">
                                        <option value="">---Select---</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->dept_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input class="form-control" id="job_title" type="text" name="job_title"
                                        placeholder="e.g., Doctor" style="border-color: #ced4da;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Employment Type <span class="text-danger">*</span></label>
                                    <select class="form-control" name="employment_typeId" required
                                        style="border-color: #ced4da;">
                                        <option value="">---Select---</option>
                                        @foreach ($employmentTypes as $employmentType)
                                            <option value="{{ $employmentType->id }}">
                                                {{ $employmentType->employment_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->




                        <!-- Agreements and Submission -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p style="color: #666;">By clicking Sign Up, you agree to our
                                    <a href="path_to_terms" style="color: #0f813c;">Terms</a> and
                                    <a href="path_to_privacy_policy" style="color: #0f813c;">Privacy Policy</a>.
                                </p>
                                <button class="btn btn-primary" type="button" id="openAgreementsModal"
                                    style="background-color: #0f813c; border-color: #0f813c;">Sign Up</button>
                                <p style="color: #666;">Already registered? <a href="{{ route('login') }}"
                                        style="color: #0f813c;">Login here</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- User Agreements Modal -->
<div class="modal fade" id="userAgreementsModal" tabindex="-1" aria-labelledby="userAgreementsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userAgreementsModalLabel">User Agreements and Policies</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card shadow-sm">
                    <div class="tab-pane">
                        <div id="policy-container" class="table-responsive">
                            <!-- Display only one policy at a time -->
                            @if ($policies->isNotEmpty())
                                <div class="policy-item">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <img src="{{ asset('assets/img/ccbrt.JPG') }}" alt="CCBRT Logo"
                                                        class="img-fluid" style="max-height: 50px;">
                                                    <strong id="policy-title">{{ $policies[0]->title }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    {!! $policies[0]->content !!}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button id="prev-policy" class="btn btn-primary" disabled>Back</button>
                            <button id="next-policy" class="btn btn-primary"
                                {{ $policies->count() > 1 ? '' : 'disabled' }}>Next</button>
                        </div>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="acceptCheckbox">
                        <label class="form-check-label" for="acceptCheckbox">
                            I have read and accept the User Agreements and Policies.
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="acceptAgreements" disabled>Submit</button>
            </div>
        </div>
    </div>
</div>


<style>
    @media (max-width: 768px) {
        .modal-dialog {
            max-width: 95%;
            margin: 1.75rem auto;
        }

        .modal-body {
            padding: 10px;
        }

        .modal-footer {
            padding: 10px;
        }

        #policy-container table {
            font-size: 14px;
        }

        .btn {
            font-size: 14px;
            padding: 8px 12px;
        }
    }
</style>


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

    document.addEventListener("DOMContentLoaded", function() {
        var policies = @json($policies); // Convert Laravel policies collection to JavaScript array
        var currentPolicyIndex = 0;

        function updatePolicyDisplay() {
            if (policies.length > 0) {
                var policy = policies[currentPolicyIndex];
                document.getElementById('policy-title').textContent = policy.title;
                document.querySelector('#policy-container tbody').innerHTML = `
                <tr>
                    <td colspan="2">
                        <img src="{{ asset('assets/img/ccbrt.JPG') }}" alt="CCBRT Logo" style="height: 50px;">
                        <strong id="policy-title">${policy.title}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">${policy.content}</td>
                </tr>
            `;
            }

            // Disable/enable buttons based on the current policy index
            document.getElementById('prev-policy').disabled = currentPolicyIndex === 0;
            document.getElementById('next-policy').disabled = currentPolicyIndex === policies.length - 1;
        }

        document.getElementById('next-policy').addEventListener('click', function() {
            if (currentPolicyIndex < policies.length - 1) {
                currentPolicyIndex++;
                updatePolicyDisplay();
            }
        });

        document.getElementById('prev-policy').addEventListener('click', function() {
            if (currentPolicyIndex > 0) {
                currentPolicyIndex--;
                updatePolicyDisplay();
            }
        });

        // Initial display
        updatePolicyDisplay();
    });

    document.getElementById('acceptAgreements').addEventListener('click', function() {
        if (document.getElementById('acceptCheckbox').checked) {
            document.getElementById('userAgreementsModal').querySelector('.btn-close').click();
            document.getElementById('registrationForm').submit();
        } else {
            alert('You must accept the User Agreements and Policies to register.');
        }
    });


    function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password_confirmation").value;

        if (password !== confirmPassword) {
            alert("Passwords do not match. Please try again.");
            return false;
        }

        return validateAge();
    }

    function validateAge() {
        const dob = document.querySelector('input[name="DOB"]').value;
        const dobDate = new Date(dob);
        const today = new Date();
        let age = today.getFullYear() - dobDate.getFullYear();
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
