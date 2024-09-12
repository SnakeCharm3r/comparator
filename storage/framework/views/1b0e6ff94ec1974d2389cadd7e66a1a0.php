<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">User Profile</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row flex-lg-nowrap">
                    <div class="col">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('profile.index')); ?>" class="nav-link">User Info</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('policies.user')); ?>" class="nav-link">Policies</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('user_profile.pass')); ?>"
                                                    class="nav-link active">Password</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('family-details.index')); ?>" class="nav-link">Family
                                                    Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('health-details.index')); ?>" class="nav-link">Health
                                                    Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('ccbrt_relation.index')); ?>" class="nav-link">CCBRT
                                                    Reation</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('language_knowledge.index')); ?>"
                                                    class="nav-link">Language</a>
                                            </li>
                                        </ul>
                                        <br>
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-md-8">
                                                    <div class="card">
                                                        <div class="card-header"><?php echo e(__('Change Password')); ?></div>
                                                        <div class="card-body">
                                                            <?php if(session('error')): ?>
                                                                <div class="alert alert-danger" role="alert">
                                                                    <?php echo e(session('error')); ?>

                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if(session('success')): ?>
                                                                <div class="alert alert-success" role="alert">
                                                                    <?php echo e(session('success')); ?>

                                                                </div>
                                                            <?php endif; ?>

                                                            <form method="POST"
                                                                action="<?php echo e(route('change.password.update')); ?>">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('PUT'); ?>

                                                                <div class="mb-3">
                                                                    <label for="current_password"
                                                                        class="form-label"><?php echo e(__('Current Password')); ?></label>
                                                                    <input id="current_password" type="password"
                                                                        class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                        name="current_password" required
                                                                        autocomplete="current-password">
                                                                    <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <div class="invalid-feedback">
                                                                            <?php echo e($message); ?>

                                                                        </div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="new_password"
                                                                        class="form-label"><?php echo e(__('New Password')); ?></label>
                                                                    <input id="new_password" type="password"
                                                                        class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                        name="new_password" required
                                                                        autocomplete="new-password">
                                                                    <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <div class="invalid-feedback">
                                                                            <?php echo e($message); ?>

                                                                        </div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="new_password_confirmation"
                                                                        class="form-label"><?php echo e(__('Confirm New Password')); ?></label>
                                                                    <input id="new_password_confirmation" type="password"
                                                                        class="form-control"
                                                                        name="new_password_confirmation" required
                                                                        autocomplete="new-password">
                                                                </div>

                                                                <div class="text-center">
                                                                    <button type="submit"
                                                                        class="btn btn-primary"><?php echo e(__('Change Password')); ?></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/user_profile/pass.blade.php ENDPATH**/ ?>