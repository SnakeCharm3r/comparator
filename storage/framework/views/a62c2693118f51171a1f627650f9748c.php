

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Edit SOP</h5>
                        </div>
                        <br>
                        <div class="container">
                            <form action="<?php echo e(route('sops.update', $sop->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="<?php echo e($sop->title); ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="department">Department</label>
                                    <select class="form-control" name="deptId" required>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($department->id); ?>"
                                                <?php echo e($department->id == $sop->deptId ? 'selected' : ''); ?>>
                                                <?php echo e($department->dept_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="pdf_path">PDF</label>
                                    <input type="file" class="form-control" id="pdf_path" name="pdf_path">
                                    <?php if($sop->pdf_path): ?>
                                        <a href="<?php echo e(asset('storage/' . $sop->pdf_path)); ?>" target="_blank"
                                            class="btn btn-link mt-2">View Current PDF</a>
                                    <?php endif; ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Update SOP</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/sops/edit.blade.php ENDPATH**/ ?>