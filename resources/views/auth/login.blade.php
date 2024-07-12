<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>eDOCS | Login</title>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/img/login.jpg" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <div style="text-align: center;">
                                <img src="assets/img/ccbrt.jpg" alt="CCBRT eDOCS Logo" style="max-width: 150px;">
                            </div>
                            <h1 style="text-align: center; font-family: 'Roboto', sans-serif; font-size: medium">CCBRT
                                eDOCS</h1><br>
                            @if ($errors->has('login_error'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('login_error') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login.handleLogin') }}"
                                class="login100-form validate-form">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Username <span class="login-danger">*</span></label>
                                    <input id="username" class="form-control" type="text" name="username"
                                        value="{{ old('username') }}" required>
                                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <span class="login-danger">*</span></label>
                                    <input id="password" class="form-control pass-input" type="password"
                                        name="password" required>
                                    <span class="profile-views feather-eye toggle-password"></span>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="forgotpass">
                                    <div class="remember-me">
                                        <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"
                                            style="color: #0f813c;"> Remember me
                                            <input type="checkbox" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <a href="#" style="color: #0f813c;">Forgot Password?</a>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit"
                                        style="background-color: #0f813c;">Login</button>
                                </div>
                            </form>

                            <p class="account-subtitle">Need an account? <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#userAgreementsModal" style="color: #0f813c;">Sign Up</a></p>
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
                    <p><strong>Child Protection Policy:</strong> This policy aims to ensure the protection and safety of
                        all children interacting with our services. We adhere to strict guidelines to prevent child
                        abuse and exploitation. Our staff are trained to recognize and respond to signs of abuse, and we
                        have measures in place to ensure the safety and privacy of children in our care.</p>
                    <p><strong>Privacy Policy:</strong> Your privacy is of utmost importance to us. We are committed to
                        safeguarding your personal information and ensuring that it is used responsibly. Our Privacy
                        Policy outlines the types of data we collect, how we use it, and the measures we take to protect
                        it. We do not share your personal information with third parties without your consent.</p>
                    <p><strong>Terms of Service:</strong> By using our services, you agree to comply with our terms and
                        conditions. These terms outline your rights and responsibilities when using our services,
                        including acceptable use, intellectual property rights, and limitations of liability. We
                        encourage you to read these terms carefully to understand your obligations and our commitment to
                        providing a safe and reliable service.</p>
                    <p><strong>Data Protection Policy:</strong> We are dedicated to protecting your data and ensuring
                        its security. Our Data Protection Policy details the procedures we follow to safeguard your
                        information from unauthorized access, disclosure, alteration, or destruction. We employ various
                        security measures, including encryption and secure data storage, to maintain the integrity and
                        confidentiality of your data.</p>
                    <p><strong>Acceptable Use Policy:</strong> This policy sets out the acceptable use of our services.
                        Users are expected to use our services responsibly and ethically. Prohibited activities include,
                        but are not limited to, unauthorized access to systems, distribution of harmful software, and
                        engaging in activities that infringe on the rights of others. Violations of this policy may
                        result in suspension or termination of services.</p>
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

    <script>
        document.getElementById('acceptCheckbox').addEventListener('change', function() {
            document.getElementById('acceptAgreements').disabled = !this.checked;
        });
    </script>




    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("acceptAgreements").addEventListener("click", function() {
                // Redirect to the registration page
                window.location.href = "{{ route('register') }}";
            });
        });
    </script>
</body>

</html>
