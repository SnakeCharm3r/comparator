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
        <div class="login-wrapper" style="background-color: #eff8f3;">
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
                            <h1
                                style="text-align: center; font-family: 'Roboto', sans-serif; font-size: medium; color: #0f813c;">
                                CCBRT eDOCS
                            </h1>
                            <br>
                            <?php if($errors->has('login_error')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e($errors->first('login_error')); ?>

                                </div>
                            <?php endif; ?>
                            <form method="POST" action="<?php echo e(route('login.handleLogin')); ?>"
                                class="login100-form validate-form">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="username">Username <span class="login-danger">*</span></label>
                                    <input id="username" class="form-control" type="text" name="username"
                                        value="<?php echo e(old('username')); ?>" placeholder="Fisrt Name.Last Name" required>
                                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password <span class="login-danger">*</span></label>
                                    <input id="password" class="form-control pass-input" type="password"
                                        name="password" placeholder="*************" required>
                                    <span class="profile-views feather-eye toggle-password"></span>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

                            <p class="account-subtitle">Need an account? <a href="<?php echo e(route('register')); ?>"
                                    style="color: #0f813c;">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
<?php /**PATH D:\Projects\E-docs\resources\views/auth/login.blade.php ENDPATH**/ ?>