<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Employment Type </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if(auth()->user()->hasAnyRole('hr', 'super-admin')): ?>
                                <div class="row position-relative">
                                    <div class="col-md-12">
                                        <a href="<?php echo e(route('employment.create')); ?>"
                                            class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2"
                                            style="background-color: #61ce70; border-color: #61ce70;">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $emp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($employments->employment_type); ?></td>
                                            <td><?php echo e($employments->description); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('employment.edit', $employments->id)); ?>"
                                                    class="btn btn-sm edit-btn" data-id="<?php echo e($employments->id); ?>"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="<?php echo e(route('employment.destroy', $employments->id)); ?>"
                                                    method="POST" style="display: inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/employment-type/index.blade.php ENDPATH**/ ?>