<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Standard Operating Procedures (SOPs)</h5>
                            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'hr|line-manager|admin|super-admin')): ?>
                                <a href="<?php echo e(route('sops.create')); ?>" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i> Create SOP
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Title</th>
                                        
                                        <th class="text-center" style="width: 160px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $sops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($sop->title); ?></td>
                                            
                                            <td class="text-center">
                                                <!-- View PDF Icon -->
                                                <?php if($sop->pdf_path): ?>
                                                    <a href="<?php echo e(asset('storage/' . $sop->pdf_path)); ?>" target="_blank"
                                                       class="btn btn-warning btn-sm mx-1" title="View PDF">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                <?php endif; ?>
                            
                                                <!-- Role-based actions (edit/delete) -->
                                                <?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', '|line-manager|admin|super-admin')): ?>
                                                    <!-- Edit Icon -->
                                                    <a href="<?php echo e(route('sops.edit', $sop->id)); ?>"
                                                       class="btn btn-success btn-sm mx-1" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                            
                                                    <!-- Delete Icon -->
                                                    <form action="<?php echo e(route('sops.destroy', $sop->id)); ?>" method="POST" style="display:inline;"
                                                          onsubmit="return confirm('Are you sure you want to delete this SOP?');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1" title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FAMILY PC\Documents\GitHub\E-docs\resources\views/sops/index.blade.php ENDPATH**/ ?>