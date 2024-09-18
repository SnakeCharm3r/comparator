<?php $__env->startSection('breadcrumb'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">HMIS Access</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('employment.store')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="employment_type">Employment Type <span class="text-danger">*</span></label>
                                            <input type="text" name="employment_type" id="employment_type" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description <span class="text-danger">*</span></label>
                                            <input type="text" name="description" id="description" class="form-control" required>
                                        </div>
                                    </div>
                                  
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary" style="background-color: #00d084; border-color: #00d084;">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/employment-type/create.blade.php ENDPATH**/ ?>