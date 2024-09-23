@include('includes.head')
@include('sweetalert::alert')

<div class="main-wrapper login-body" style="background-color: hsl(0, 0%, 100%);">

    <div class="login-wrapper" style="background-color: #eff8f3;">
        <div class="container">
            <div class="loginbox row justify-content-center">
                <div class="col-md-10">
                    <div class="signup-container text-center">
                        <h1 style="font-size: 2rem; color: #0f813c;">Register Your Account</h1>
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

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Professional Number</label>
                                    <input class="form-control" type="text" name="professional_reg_number"
                                        placeholder="e.g., 12345678" style="border-color: #ced4da;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" id="email" required
                                        placeholder="e.g., abc@gmail.com"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                        title="Please enter a valid email address." style="border-color: #ced4da;">
                                    <small id="email-message" class="text-danger"></small>
                                </div>
                            </div>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $('#email').on('input', function() {
                                    let email = $(this).val();
                                    let emailMessage = $('#email-message');

                                    if (email.length > 0) {
                                        $.ajax({
                                            url: '{{ route('check.email') }}',
                                            method: 'POST',
                                            data: {
                                                email: email,
                                                _token: '{{ csrf_token() }}' // Add CSRF token for Laravel
                                            },
                                            success: function(response) {
                                                if (response.exists) {
                                                    emailMessage.text('This email is already in use.');
                                                } else {
                                                    emailMessage.text('');
                                                }
                                            },
                                            error: function() {
                                                emailMessage.text('Unable to check the email at the moment.');
                                            }
                                        });
                                    } else {
                                        emailMessage.text('');
                                    }
                                });
                            </script>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dob">Date of Birth <span class="text-danger">*</span></label>
                                    <input class="form-control" id="dob" type="date" name="DOB" required
                                        style="border-color: #ced4da;">
                                </div>
                            </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var dobInput = document.getElementById('dob');

                                    var today = new Date();
                                    var minDate = new Date(today.setFullYear(today.getFullYear() - 18));
                                    var minDateString = minDate.toISOString().split('T')[0];

                                    dobInput.setAttribute('max', minDateString);

                                    dobInput.addEventListener('change', function() {
                                        var selectedDate = new Date(dobInput.value);
                                        if (selectedDate > minDate) {
                                            alert("You must be at least 18 years old!");
                                            dobInput.value = ""; // Clear the invalid date
                                        }
                                    });
                                });
                            </script>

                        </div>



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
                                        nationalMode: false, // Allows the user to enter the full international format
                                        autoPlaceholder: "polite", // Provides a placeholder based on country
                                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // Utility script for formatting and validation
                                    });

                                    function updateCountryCode() {
                                        var selectedCountryCode = iti.getSelectedCountryData().dialCode;
                                        countryCodeInput.value = selectedCountryCode;

                                        // Automatically update the phone input with the country code if it's not already there
                                        if (!input.value.startsWith("+" + selectedCountryCode)) {
                                            input.value = "+" + selectedCountryCode + " " + input.value.replace(/^(\+\d+\s*)?/, '');
                                        }
                                    }

                                    // Event listeners
                                    input.addEventListener('countrychange', updateCountryCode); // Update when the country is changed
                                    input.addEventListener('change', updateCountryCode); // Update when the phone input is changed
                                    input.addEventListener('keyup', updateCountryCode); // Update on keyup in case of manual changes

                                    updateCountryCode();
                                });
                            </script>

                            <link rel="stylesheet"
                                href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
                            <!-- Include the JS files for intl-tel-input -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input class="form-control pass-input" type="password" name="password"
                                        placeholder="*********" id="password" required
                                        style="border-color: #ced4da;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm Password <span class="text-danger">*</span></label>
                                    <input class="form-control pass-input" type="password"
                                        name="password_confirmation" placeholder="*********"
                                        id="password_confirmation" required style="border-color: #ced4da;">
                                    <small id="password-message" class="text-danger"></small>
                                </div>
                            </div>

                            <script>
                                const password = document.getElementById('password');
                                const passwordConfirmation = document.getElementById('password_confirmation');
                                const message = document.getElementById('password-message');

                                function checkPasswordMatch() {
                                    if (password.value !== passwordConfirmation.value) {
                                        message.textContent = "Passwords do not match!";
                                    } else {
                                        message.textContent = "";
                                    }
                                }

                                password.addEventListener('input', checkPasswordMatch);
                                passwordConfirmation.addEventListener('input', checkPasswordMatch);
                            </script>

                        </div>

                        <!-- Department and Job Details -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                    <select class="form-control" name="deptId" id="deptId" required
                                        style="border-color: #ced4da;">
                                        <option value="">---Select Department---</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->dept_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <select class="form-control" id="job_title" name="job_title"
                                        style="border-color: #ced4da;">
                                        <option value="">---Select Job Title---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Employment Type<span class="login-danger">*</span></label>
                                    <select class="form-control" name="employment_typeId" required>
                                        <option value="">----Select----</option>
                                        @foreach ($employmentTypes as $employmentType)
                                            <option value="{{ $employmentType->id }}">
                                                {{ $employmentType->employment_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#deptId').change(function() {
                            var deptId = $(this).val();
                            var jobTitleSelect = $('#job_title');

                            // Clear existing options
                            jobTitleSelect.empty();
                            jobTitleSelect.append();

                            if (deptId) {
                                $.ajax({
                                    url: '/job-titles/' + deptId,
                                    method: 'GET',
                                    success: function(data) {

                                        console.log(data);
                                        // Populate job title dropdown
                                        $.each(data, function(index, jobTitle) {
                                            jobTitleSelect.append('<option value="' + jobTitle.id +
                                                '">' + jobTitle.job_title + '</option>');
                                        });
                                    },
                                    error: function() {
                                        // Handle errors
                                        alert('Failed to fetch job titles.');
                                    }
                                });
                            }
                        });
                    });
                </script>
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

    document.getElementById('acceptCheckbox').disabled = true; // Disable the checkbox initially

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

            // Enable checkbox only when on the last policy
            document.getElementById('acceptCheckbox').disabled = currentPolicyIndex < policies.length - 1;
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

{{-- <script>
    document.getElementById('openAgreementsModal').addEventListener('click', function() {
        var form = document.getElementById('registrationForm');
        if (form.checkValidity()) {
            var modal = new bootstrap.Modal(document.getElementById('userAgreementsModal'));
            modal.show();
        } else {
            form.reportValidity();
        }
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

        // If it's the last policy, enable the checkbox and accept button
        if (currentPolicyIndex === policies.length - 1) {
            document.getElementById('acceptCheckbox').disabled = false;
        }
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

    // Initially disable the checkbox until the user sees all policies
    document.getElementById('acceptCheckbox').disabled = true;

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

</script> --}}
