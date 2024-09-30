<?php $__env->startSection('content'); ?>
    <!-- Include Summernote's CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Create Policy</h5>
                        </div>
                        <br>
                        <div class="container">
                            <form action="<?php echo e(route('policies.update', $policy->id)); ?>" method="POST"
                                onsubmit="return submitForm()">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="<?php echo e(old('title', $policy->title)); ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="content">Description</label>
                                    <!-- Summernote Textarea -->
                                    <textarea id="summernote" name="content" class="form-control"><?php echo e(old('content', $policy->content)); ?></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Update Policy</button>
                                    <a href="<?php echo e(route('policies.index')); ?>" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Summernote and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>



    <script>
        $('#summernote').summernote({
            height: 250, // Set editor height
            minHeight: null, // Set minimum height
            maxHeight: null, // Set maximum height
            focus: true, // Set focus to editable area after initializing summernote
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/policies/edit.blade.php ENDPATH**/ ?>