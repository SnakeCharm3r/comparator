<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">Job Titles</h3>
                            <?php if(auth()->user()->hasRole('hr')): ?>
                                <a href="<?php echo e(route('job_titles.create')); ?>" class="btn btn-primary">Add Job Title</a>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Department</th>
                                            <?php if(auth()->user()->hasRole('hr')): ?>
                                                <th>Actions</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $jobTitles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobTitle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($jobTitle->id); ?></td>
                                                <td><?php echo e($jobTitle->job_title); ?></td>
                                                <td><?php echo e($jobTitle->department->dept_name); ?></td>
                                                <?php if(auth()->user()->hasRole('hr')): ?>
                                                    <td>
                                                        <a href="<?php echo e(route('job_titles.edit', $jobTitle)); ?>"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="<?php echo e(route('job_titles.destroy', $jobTitle)); ?>"
                                                            method="POST" style="display:inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </td>
                                                <?php endif; ?>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FAMILY PC\Documents\GitHub\E-docs\resources\views/job_titles/index.blade.php ENDPATH**/ ?>