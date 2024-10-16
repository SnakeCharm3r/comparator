<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Departments</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row position-relative">
                                <?php
                                $user = auth()->user();
                                $roles = ['hr', 'admin', 'super-admin'];
                            ?>

                            <?php if($user && $user->hasAnyRole($roles)): ?>
                                <div class="col-md-12">
                                    <a href="<?php echo e(route('department.create')); ?>"
                                        class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2"
                                        style="background-color: #61ce70; border-color: #61ce70;">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            <?php endif; ?>

                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Head Of Department</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($department->dept_name); ?></td>
                                            <td><?php echo e($department->head_of_department ?? 'N/A'); ?></td>
                                            <td><?php echo e($department->description); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('department.edit', $department->dept_id)); ?>"
                                                    class="btn btn-sm edit-btn" data-id="<?php echo e($department->dept_id); ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>









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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/department/index.blade.php ENDPATH**/ ?>