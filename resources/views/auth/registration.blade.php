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
    <div class="modal-dialog" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userAgreementsModalLabel">User Agreements and Policies</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card shadow-sm">
                    <div class="tab-pane">
                        <div id="policy-container">
                            <!-- Display only one policy at a time -->
                            @if ($policies->isNotEmpty())
                                <div class="policy-item">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <img src="{{ asset('assets/img/ccbrt.JPG') }}" alt="CCBRT Logo"
                                                        style="height: 50px;">
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
                        <div class="mt-4">
                            <button id="prev-policy" class="btn btn-primary" disabled>Back</button>
                            <button id="next-policy" class="btn btn-primary"
                                {{ $policies->count() > 1 ? '' : 'disabled' }}>Next</button>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            let currentPolicyIndex = 0;
                            const policies = @json($policies);
                            const totalPolicies = policies.length;
                            const prevButton = document.getElementById('prev-policy');
                            const nextButton = document.getElementById('next-policy');
                            const policyContainer = document.getElementById('policy-container');

                            function updatePolicy() {
                                if (totalPolicies > 0) {
                                    const policy = policies[currentPolicyIndex];
                                    policyContainer.innerHTML = `
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2">
                                                                <img src="{{ asset('assets/img/ccbrt.JPG') }}" alt="CCBRT Logo" style="height: 50px;">
                                                                <strong>${currentPolicyIndex + 1}. ${policy.title}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                ${policy.content}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                       
                                            `;

                                    prevButton.disabled = currentPolicyIndex === 0;
                                    nextButton.disabled = currentPolicyIndex === totalPolicies - 1;
                                }
                            }

                            prevButton.addEventListener('click', function() {
                                if (currentPolicyIndex > 0) {
                                    currentPolicyIndex--;
                                    updatePolicy();
                                }
                            });

                            nextButton.addEventListener('click', function() {
                                if (currentPolicyIndex < totalPolicies - 1) {
                                    currentPolicyIndex++;
                                    updatePolicy();
                                }
                            });

                            updatePolicy(); // Initialize with the first policy
                        });
                    </script>
                </div>


                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" id="acceptCheckbox">
                    <label class="form-check-label" for="acceptCheckbox">
                        I have read and accept the User Agreements and Policies.
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="acceptAgreements" disabled>Next</button>
            </div>
        </div>
    </div>
</div>

<!-- Signature Modal -->
<div class="modal fade" id="signatureModal" tabindex="-1" aria-labelledby="signatureModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signatureModalLabel">Provide Your Signature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <canvas id="signaturePad" style="border:1px solid #000;"></canvas>
                <button type="button" class="btn btn-secondary" id="clearSignature">Clear</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="submitSignature">Submit</button>
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
        var modal = new bootstrap.Modal(document.getElementById('signatureModal'));
        modal.show();
    });

    document.getElementById('submitSignature').addEventListener('click', function() {
        document.getElementById('signatureModal').querySelector('.btn-close').click();
        document.getElementById('registrationForm').submit();
    });

    function validateAge() {
        const dob = document.querySelector('input[name="DOB"]').value;
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

    // Signature Pad
    const canvas = document.getElementById('signaturePad');
    const signaturePad = canvas.getContext('2d');
    let drawing = false;

    // Set the pen color to blue
    signaturePad.strokeStyle = 'blue';

    canvas.addEventListener('mousedown', function(e) {
        drawing = true;
        signaturePad.beginPath();
        signaturePad.moveTo(e.offsetX, e.offsetY);
    });

    canvas.addEventListener('mousemove', function(e) {
        if (drawing) {
            signaturePad.lineTo(e.offsetX, e.offsetY);
            signaturePad.stroke();
        }
    });

    canvas.addEventListener('mouseup', function() {
        drawing = false;
    });

    document.getElementById('clearSignature').addEventListener('click', function() {
        signaturePad.clearRect(0, 0, canvas.width, canvas.height);
    });
</script>
