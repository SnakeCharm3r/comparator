

<div class="container">
    <h1>Reset Password</h1>
    <form action="<?php echo e(route('password.update')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="token" value="<?php echo e($token); ?>">

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
</div>
<?php /**PATH D:\Projects\E-docs\resources\views/auth/reset.blade.php ENDPATH**/ ?>