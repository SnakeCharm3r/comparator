<?php $__env->startSection('content'); ?>
    <!-- Include Quill's CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

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
                            <form action="<?php echo e(route('policies.store')); ?>" method="POST" onsubmit="return submitForm()">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="content">Description</label>
                                    <div id="editor-container" style="height: 250px;"></div>
                                    <input type="hidden" id="content" name="content">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Create Policy</button>
                                    <a href="<?php echo e(route('policies.index')); ?>" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Quill and Bootstrap JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var toolbarOptions = [
                ['undo', 'redo'], // Undo/Redo
                [{
                    'header': [1, 2, 3, false]
                }], // Header options
                [{
                    'size': ['small', false, 'large', 'huge']
                }], // Custom font sizes
                ['bold', 'italic'], // Bold and Italic
                [{
                    'align': []
                }], // Text alignment
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }], // Lists
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }], // Indent/outdent
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }], // Superscript/Subscript
                ['link', 'image'], // Link and image
                [{
                    'color': []
                }, {
                    'background': []
                }], // Color and background
                ['clean'], // Clear formatting
                ['more'] // "..." for more options (custom implementation)
            ];

            var quill = new Quill('#editor-container', {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions
                }
            });

            // Function to handle form submission
            window.submitForm = function() {
                var content = document.querySelector('input[name=content]');
                // Extracting and storing the Quill editor's HTML content
                content.value = quill.root.innerHTML;
                return true;
            }
        });
    </script>

    <style>
        .ql-more-options {
            display: none;
        }

        .ql-more {
            font-weight: bold;
            cursor: pointer;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/policies/create.blade.php ENDPATH**/ ?>