<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Policies</h4>
                            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'hr|admin|super-admin')): ?>
                                <a href="<?php echo e(route('policies.create')); ?>" class="btn btn-primary float-right">
                                    <i class="fas fa-plus me-2"></i> Create Policy
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <?php $__currentLoopData = $policies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="policy-item mb-4">
                                    <h5><?php echo e($policy->title); ?></h5>

                                    <div class="policy-content">
                                        <?php echo $policy->content; ?>

                                    </div>

                                    <?php if (\Illuminate\Support\Facades\Blade::check('role', 'hr|admin|super-admin')): ?>
                                        <a href="<?php echo e(route('policies.edit', $policy->id)); ?>" class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="<?php echo e(route('policies.destroy', $policy->id)); ?>" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this policy?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                                <hr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .policy-content ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .policy-content ol {
            list-style-type: decimal;
            padding-left: 20px;
        }

        .policy-content p {
            margin-bottom: 1rem;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/policies/index.blade.php ENDPATH**/ ?>