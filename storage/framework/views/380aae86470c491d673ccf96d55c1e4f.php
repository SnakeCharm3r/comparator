<?php $__env->startSection('breadcrumb'); ?>
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h1 class="h4 mb-0">Edit Announcement</h1>
                        </div>

                        <div class="card-body">
                            <!-- Edit Announcement Form -->
                            <form action="<?php echo e(route('announcements.update', $announcement->id)); ?>" method="POST"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" required
                                        value="<?php echo e(old('title', $announcement->title)); ?>"
                                        placeholder="Enter the announcement title">
                                </div>

                                

                                <div class="form-group mb-3">
                                    <label for="pdf">Upload PDF (optional)</label>
                                    <input type="file" name="pdf" id="pdf" class="form-control" accept=".pdf">

                                    <?php if($announcement->pdf_path): ?>
                                        <div class="mt-2">
                                            <a href="<?php echo e(Storage::url($announcement->pdf_path)); ?>" class="btn btn-success"
                                                target="_blank">
                                                <i class="fas fa-file-pdf"></i> View Current PDF
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="<?php echo e(route('announcements.index')); ?>" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/announcements/edit.blade.php ENDPATH**/ ?>