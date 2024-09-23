<?php echo $__env->make('includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="<?php echo e(asset('assets/img/login.jpg')); ?>" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">

                        <!-- Logo Section -->
                        <div style="text-align: center;">
                            <img src="<?php echo e(asset('assets/img/ccbrt.jpg')); ?>" alt="CCBRT eDOCS Logo"
                                style="max-width: 150px;">
                        </div>

                        <!-- Title Section -->
                        <h1
                            style="text-align: center; font-family: 'Roboto', sans-serif; font-size: medium; color: #0f813c;">
                            CCBRT eDOCS
                        </h1>

                        <h1 style=" font-family: 'Roboto', sans-serif; font-size: large; color: #0f813c;">Reset
                            Password</h1>

                        <!-- Reset Password Form -->
                        <form action="<?php echo e(route('password.forgetPassChange')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Enter your registered email address <span class="login-danger">*</span></label>
                                <input class="form-control" type="email" name="email" required>
                                <span class="profile-views"><i class="fas fa-envelope"></i></span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Reset My Password</button>
                            </div>
                        </form>

                        <!-- Login Button -->
                        <form action="<?php echo e(route('login')); ?>" method="GET">
                            <div class="form-group mb-0">
                                <button class="btn btn-primary primary-reset btn-block" type="submit">Login</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<?php /**PATH D:\Projects\E-docs\resources\views/auth/forget.blade.php ENDPATH**/ ?>