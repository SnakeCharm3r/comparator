<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Standard Operating Procedures (SOPs)</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Title</th>
                                        <th>Department</th>
                                        <th class="text-center" style="width: 100px;">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $sops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($sop->title); ?></td>
                                            <td><?php echo e($sop->dept_name); ?></td>
                                            <td class="text-center">
                                                <?php if($sop->pdf_path): ?>
                                                    <a href="<?php echo e(asset('storage/' . $sop->pdf_path)); ?>" target="_blank"
                                                        class="btn btn-warning btn-sm" title="View PDF">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                <?php endif; ?>
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/sops/show.blade.php ENDPATH**/ ?>