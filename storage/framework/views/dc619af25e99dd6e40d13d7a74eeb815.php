<?php $__env->startSection('breadcrumb'); ?>
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <!-- Create Announcement Button -->
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h1 class="h4 mb-0">Announcements</h1>
                            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'super-admin|admin|hr')): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-announcement')): ?>
                                <a href="<?php echo e(route('announcements.create')); ?>" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add Announcement
                                </a>
                                <?php endif; ?>
                                <?php endif; ?>
                        </div>


                        <!-- Announcements List -->
                        <?php if($announcements->isEmpty()): ?>
                            <div class="card-body text-center">
                                <p class="lead">No announcements available.</p>
                            </div>
                        <?php else: ?>
                            <!-- Grouped Collapsible Announcements -->
                            <div class="accordion" id="announcementAccordion">
                                <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading<?php echo e($announcement->id); ?>">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($announcement->id); ?>"
                                                aria-expanded="false" aria-controls="collapse<?php echo e($announcement->id); ?>">
                                                <?php echo e($announcement->title); ?>

                                            </button>
                                        </h2>

                                        <div id="collapse<?php echo e($announcement->id); ?>" class="accordion-collapse collapse"
                                            aria-labelledby="heading<?php echo e($announcement->id); ?>"
                                            data-bs-parent="#announcementAccordion">
                                            <div class="accordion-body">
                                                <p class="mb-2"><?php echo e($announcement->content); ?></p>
                                                <small class="text-muted">
                                                    By <?php echo e($announcement->user->username ?? 'Unknown'); ?> on
                                                    <?php echo e($announcement->created_at->format('M d, Y')); ?>

                                                </small>
                                                <div class="mt-3">
                                                    <?php if($announcement->pdf_path): ?>
                                                        <!-- Link to view or download PDF -->
                                                        <a href="<?php echo e(Storage::url($announcement->pdf_path)); ?>"
                                                            class="btn btn-success" target="_blank">
                                                            <i class="fas fa-file-pdf"></i> View PDF
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-announcement')): ?>
                                                        <a href="<?php echo e(route('announcements.edit', $announcement->id)); ?>"
                                                            class="btn btn-warning ml-2">
                                                            <i class="fas fa-pencil-alt"></i> Edit
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-announcement')): ?>
                                                        <!-- Delete Announcement Form -->
                                                        <form action="<?php echo e(route('announcements.destroy', $announcement->id)); ?>"
                                                            method="POST" class="d-inline ml-2">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this announcement?')">
                                                                <i class="fas fa-trash-alt"></i> Delete
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/announcements/index.blade.php ENDPATH**/ ?>