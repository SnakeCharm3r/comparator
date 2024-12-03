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

                    @if (session('error_message'))
                        <div class="alert alert-danger">
                            {{ session('error_message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Please fix the following issues:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


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
                                        title="Please enter a valid email address. Format: name@example.com"
                                        style="border-color: #ced4da;" oninput="validateEmail()">
                                    <small id="email-message" class="text-danger" style="visibility: hidden;">Invalid
                                        email address format.</small>
                                </div>
                            </div>

                            <script>
                                function validateEmail() {
                                    const emailInput = document.getElementById('email');
                                    const message = document.getElementById('email-message');
                                    const regex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;

                                    if (!regex.test(emailInput.value)) {
                                        message.style.visibility = 'visible';
                                        message.innerText = 'Invalid email address format.';
                                        emailInput.style.borderColor = 'red';
                                    } else {
                                        message.style.visibility = 'hidden';
                                        emailInput.style.borderColor = '#ced4da';
                                    }
                                }
                            </script>





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
            nationalMode: false,  // Allows the user to enter the full international format
            autoPlaceholder: "polite", // Provides a placeholder based on country
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // Utility script for formatting and validation
        });

        function updateCountryCode() {
            var selectedCountryCode = iti.getSelectedCountryData().dialCode;
            countryCodeInput.value = selectedCountryCode;

            // Check if the phone input already starts with the country code
            var currentPhoneNumber = input.value.trim();
            var cleanPhoneNumber = currentPhoneNumber.replace(/^\+?\d+\s*/, ''); // Remove existing country code

            // Update the phone input with the country code if it's not already there
           // input.value = "+" + selectedCountryCode + " " + cleanPhoneNumber;
        }

        // Event listeners
        input.addEventListener('countrychange', updateCountryCode); // Update when the country is changed
        input.addEventListener('change', updateCountryCode);        // Update when the phone input is changed
        input.addEventListener('keyup', updateCountryCode);         // Update on keyup in case of manual changes

        updateCountryCode(); // Initial call to set the country code on page load
    });

</script>

                            <link rel="stylesheet"
                                href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
                            <!-- Include the JS files for intl-tel-input -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input class="form-control pass-input" type="password" name="password"
                                        placeholder="*********" id="password" required
                                        style="border-color: #ced4da;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control pass-input" type="password"
                                        name="password_confirmation" placeholder="*********"
                                        id="password_confirmation" required style="border-color: #ced4da;">
                                    <small id="password-message" class="text-danger"></small>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const password = document.getElementById('password');
                                    const passwordConfirmation = document.getElementById('password_confirmation');
                                    const message = document.getElementById('password-message');
                                    const signUpButton = document.getElementById('openAgreementsModal');

                                    signUpButton.addEventListener('click', function(event) {
                                        if (password.value !== passwordConfirmation.value) {
                                            message.textContent = "Passwords do not match! Please correct them.";
                                            passwordConfirmation.focus();
                                            event.preventDefault(); // Prevent the modal from opening
                                        } else {
                                            message.textContent = ""; // Clear message if passwords match

                                            // Show the agreements modal only if passwords match
                                            var modal = new bootstrap.Modal(document.getElementById('userAgreementsModal'));
                                            modal.show();
                                        }
                                    });
                                });
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
                                    <select class="form-control" id="job_title" name="job_title" required
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
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="starting_date">Starting Date</label>
                                    <input type="date" class="form-control" id="starting_date" name="starting_date" required>
                                    <div id="error-message" style="color: red; display: none;"></div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="ending_date">Ending Date</label>
                                    <input type="date" class="form-control" id="ending_date" name="ending_date" required>
                                    <div id="end-error-message" style="color: red; display: none;"></div>
                                </div>
                            </div>
                            <script>
                                const today = new Date();
                                const todayString = today.toISOString().split('T')[0]; // Format YYYY-MM-DD

                                const startingDateInput = document.getElementById('starting_date');
                                const endingDateInput = document.getElementById('ending_date');
                                const startErrorMessage = document.getElementById('start-error-message');
                                const endErrorMessage = document.getElementById('end-error-message');

                                // Set the min attribute for the starting date
                                startingDateInput.setAttribute('min', todayString);

                                startingDateInput.addEventListener('input', function() {
                                    const selectedStartDate = new Date(startingDateInput.value);
                                    if (selectedStartDate < today) {
                                        startErrorMessage.textContent = "Starting date cannot be in the past.";
                                        startErrorMessage.style.display = 'block';
                                        startingDateInput.setCustomValidity("Invalid date");
                                    } else {
                                        startErrorMessage.style.display = 'none';
                                        startingDateInput.setCustomValidity("");

                                        // Set the minimum ending date to more than 3 months from the selected starting date
                                        const minEndingDate = new Date(selectedStartDate);
                                        minEndingDate.setMonth(selectedStartDate.getMonth() + 3);
                                        const minEndingDateString = minEndingDate.toISOString().split('T')[0];
                                        endingDateInput.setAttribute('min', minEndingDateString);

                                        // Validate ending date immediately if already set
                                        if (endingDateInput.value) {
                                            validateEndingDate();
                                        }
                                    }
                                });

                                endingDateInput.addEventListener('input', validateEndingDate);

                                function validateEndingDate() {
                                    const selectedEndDate = new Date(endingDateInput.value);
                                    const minEndingDate = endingDateInput.getAttribute('min');

                                    if (selectedEndDate <= new Date(minEndingDate)) {
                                        endErrorMessage.textContent = "Ending date must be more than 3 months after the starting date.";
                                        endErrorMessage.style.display = 'block';
                                        endingDateInput.setCustomValidity("Invalid date");
                                    } else if (startingDateInput.value && selectedEndDate <= new Date(startingDateInput.value)) {
                                        endErrorMessage.textContent = "Ending date must be after the starting date.";
                                        endErrorMessage.style.display = 'block';
                                        endingDateInput.setCustomValidity("Invalid date");
                                    } else {
                                        endErrorMessage.style.display = 'none';
                                        endingDateInput.setCustomValidity("");
                                    }
                                }
                            </script>
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
                                                    <img src="{{ asset('assets/img/ccbrt.jpg') }}" alt="CCBRT Logo"
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

                    <div class="form-check mt-3" id="accept-container" style="display: none;">
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

            // Show the checkbox only when on the last policy
            if (currentPolicyIndex === policies.length - 1) {
                document.getElementById('accept-container').style.display = 'block'; // Show checkbox
            } else {
                document.getElementById('accept-container').style.display = 'none'; // Hide checkbox
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

        // Initial display
        updatePolicyDisplay();
    });

    // Enable the submit button only if the checkbox is checked
    document.getElementById('acceptCheckbox').addEventListener('change', function() {
        document.getElementById('acceptAgreements').disabled = !this.checked;
    });

    // Handle the submit button click
    document.getElementById('acceptAgreements').addEventListener('click', function() {
        if (document.getElementById('acceptCheckbox').checked) {
            document.getElementById('userAgreementsModal').querySelector('.btn-close').click();
            document.getElementById('registrationForm').submit();
        } else {
            alert('You must accept the User Agreements and Policies to register.');
        }
    });
</script>
