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
                            <h3 class="page-title">NHIF Form</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row position-relative">
                                <div class="col-md-12">
                                    <a href="<?php echo e(route('nhif.create')); ?>"
                                        class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2 create-btn">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $nhif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nhifs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($nhifs->name); ?></td>
                                            <td><?php echo e($nhifs->status); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('nhif.edit', $nhifs->id)); ?>" class="btn btn-sm edit-btn"
                                                    data-id="<?php echo e($nhifs->id); ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button
                                                    onclick="deleteConfirmation('<?php echo e(route('nhif.destroy', $nhifs->id)); ?>')"
                                                    class="btn btn-sm btn-delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-<?php echo e($nhifs->id); ?>"
                                                    action="<?php echo e(route('nhif.destroy', $nhifs->id)); ?>" method="POST"
                                                    style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
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
    <script>
        function deleteConfirmation(urlToRedirect) {
            swal({
                    title: "Are you sure to delete?",
                    text: "You will not be able to revert this!",
                    icon: "warning",
                    buttons: ["Cancel", "Delete"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('delete-form-' + urlToRedirect.split('/').pop()).submit();
                    } else {
                        swal("Your record is safe!");
                    }
                });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/nhif/index.blade.php ENDPATH**/ ?>