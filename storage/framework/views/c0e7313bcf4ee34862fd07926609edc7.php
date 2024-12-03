<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'hr|admin|super-admin')): ?>
                                <a href="<?php echo e(route('policies.create')); ?>" class="btn btn-primary float-right">
                                    <i class="fas fa-plus me-2"></i> Create Policy
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $policies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($policy->title); ?></td>
                                            <td class="text-center" style="width: 140px;">
                                                <!-- View Icon -->
                                                <a href="javascript:void(0);"
                                                    onclick="viewDescription('<?php echo e($policy->title); ?>', '<?php echo e(urlencode($policy->content)); ?>')"
                                                    class="btn btn-sm p-0" title="View Description">
                                                    <i class="fas fa-eye text-info"></i>
                                                </a>

                                                <?php if (\Illuminate\Support\Facades\Blade::check('role', 'hr|admin|super-admin')): ?>
                                                    <!-- Edit Icon -->
                                                    <a href="<?php echo e(route('policies.edit', $policy->id)); ?>"
                                                        class="btn btn-sm p-0 mx-1" title="Edit">
                                                        <i class="fas fa-edit text-success"></i>
                                                    </a>

                                                    <!-- Delete Icon -->
                                                    <form action="<?php echo e(route('policies.destroy', $policy->id)); ?>" method="POST"
                                                        style="display:inline;"
                                                        onsubmit="return confirm('Are you sure you want to delete this policy?');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-sm p-0"
                                                            style="border: none; background: none;" title="Delete">
                                                            <i class="fas fa-trash-alt text-danger"></i>
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

        <!-- Description Modal -->
        <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="descriptionModalLabel">Policy Description</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="descriptionContent">
                        <!-- Policy title and content will be loaded here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewDescription(title, content) {
            // Decode the content to avoid issues with special characters
            let decodedContent = decodeURIComponent(content);

            // Replace the `+` characters with spaces
            decodedContent = decodedContent.replace(/\+/g, ' ');

            // Set the title and content in the modal, allowing the content to be rendered as HTML
            document.getElementById('descriptionContent').innerHTML = '<h5>' + title + '</h5>' + decodedContent;

            // Show the modal
            var descriptionModal = new bootstrap.Modal(document.getElementById('descriptionModal'));
            descriptionModal.show();
        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FAMILY PC\Documents\GitHub\E-docs\resources\views/policies/index.blade.php ENDPATH**/ ?>