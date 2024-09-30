<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">User Profile</h3>
                        </div>
                    </div>
                </div>
            </div>

            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
            <div class="container">
                <div class="row flex-lg-nowrap">
                    <div class="col">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="card">
                                    <div class="card-body">

                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="<?php echo e(route('profile.index')); ?>"
                                                    class="nav-link">User Info</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('policies.user')); ?>"
                                                    class="nav-link">Policies</a></li>
                                            <li class="nav-item"><a href="#security" class="nav-link"
                                                    data-bs-toggle="tab">Password</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('family-details.index')); ?>"
                                                    class="nav-link">Family Details</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('health-details.index')); ?>"
                                                    class="nav-link">Health Details</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('ccbrt_relation.index')); ?>"
                                                    class="active nav-link">CCBRT Relation</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('language_knowledge.index')); ?>"
                                                    class="nav-link">Language</a></li>
                                        </ul>

                                        <!-- Button to trigger modal -->
                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#addRelationModal">
                                                    Add CCBRT Relation
                                                </button>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="addRelationModal" tabindex="-1" role="dialog"
                                            aria-labelledby="addRelationModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addRelationModalLabel">Add CCBRT
                                                            Relation Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST"
                                                            action="<?php echo e(route('ccbrt_relation.addRelationData')); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="userId"
                                                                value="<?php echo e(Auth::id()); ?>">
                                                            <div class="form-group">
                                                                <label>Names</label>
                                                                <input type="text" class="form-control" name="names"
                                                                    value="<?php echo e(old('names')); ?>" placeholder="John Doe">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Relation</label>
                                                                <input type="text" class="form-control" name="relation"
                                                                    value="<?php echo e(old('relation')); ?>"
                                                                    placeholder="e.g., Colleague, Brother">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Department</label>
                                                                <select class="form-control" name="department">
                                                                    <option value="">Select Department</option>
                                                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($department->id); ?>"
                                                                            <?php echo e(old('department') == $department->id ? 'selected' : ''); ?>>
                                                                            <?php echo e($department->dept_name); ?>

                                                                        </option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Position</label>
                                                                <input type="text" class="form-control" name="position"
                                                                    value="<?php echo e(old('position')); ?>"
                                                                    placeholder="e.g., Manager, Doctor">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Add Relation
                                                                    Data</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Edit Relation Modal -->
                                        <div class="modal fade" id="editRelationModal" tabindex="-1" role="dialog"
                                            aria-labelledby="editRelationModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editRelationModalLabel">Edit CCbRT
                                                            Relation Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" id="editRelationForm" action="">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PUT'); ?>
                                                            <input type="hidden" name="userId"
                                                                value="<?php echo e(Auth::id()); ?>">
                                                            <div class="form-group">
                                                                <label>Names</label>
                                                                <input type="text" class="form-control"
                                                                    id="edit_names" name="names" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Relation</label>
                                                                <input type="text" class="form-control"
                                                                    id="edit_relation" name="relation" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Department</label>
                                                                <select class="form-control" id="edit_department"
                                                                    name="department">
                                                                    <option value="">Select Department</option>
                                                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($department->id); ?>">
                                                                            <?php echo e($department->dept_name); ?>

                                                                        </option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Position</label>
                                                                <input type="text" class="form-control"
                                                                    id="edit_position" name="position" value="">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Existing Relations Table -->
                                        <div class="row">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3>Existing Relations</h3>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Names</th>
                                                                    <th>Relation</th>
                                                                    <th>Department</th>
                                                                    <th>Position</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $__currentLoopData = $relations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td><?php echo e($relation->names); ?></td>
                                                                        <td><?php echo e($relation->relation); ?></td>
                                                                        <td><?php echo e($relation->department_name); ?></td>
                                                                        <td><?php echo e($relation->position); ?></td>
                                                                        <td>
                                                                            <!-- Edit button -->
                                                                            <button type="button"
                                                                                class="btn btn-sm p-0 edit-relation-btn"
                                                                                style="border: none; background: none;"
                                                                                title="Edit" data-bs-toggle="modal"
                                                                                data-bs-target="#editRelationModal"
                                                                                data-id="<?php echo e($relation->id); ?>"
                                                                                data-names="<?php echo e($relation->names); ?>"
                                                                                data-relation="<?php echo e($relation->relation); ?>"
                                                                                data-department="<?php echo e($relation->department); ?>"
                                                                                data-position="<?php echo e($relation->position); ?>">
                                                                                <i class="fas fa-edit text-warning"></i>
                                                                            </button>

                                                                            <!-- Delete button -->
                                                                            <form
                                                                                action="<?php echo e(route('ccbrt_relation.destroy', $relation->id)); ?>"
                                                                                method="POST" style="display: inline;"
                                                                                class="delete-form">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('DELETE'); ?>
                                                                                <button type="button"
                                                                                    class="btn text-danger delete-btn"
                                                                                    title="Delete">
                                                                                    <i class="fas fa-trash-alt"
                                                                                        style="cursor: pointer;"></i>
                                                                                </button>
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

                                        <!-- Required Dependencies -->
                                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                        <!-- SweetAlert2 JavaScript -->
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                // Handle delete button click
                                                document.querySelectorAll('.delete-btn').forEach(button => {
                                                    button.addEventListener('click', function(event) {
                                                        event.preventDefault(); // Prevent default button behavior

                                                        const form = this.closest('form');

                                                        Swal.fire({
                                                            title: 'Are you sure?',
                                                            text: "You won't be able to revert this!",
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: 'Yes, delete it!',
                                                            cancelButtonText: 'No, cancel!',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                // Submit the form
                                                                form.submit();
                                                            }
                                                        });
                                                    });
                                                });

                                                // Handle edit button click
                                                document.querySelectorAll('.edit-relation-btn').forEach(button => {
                                                    button.addEventListener('click', function() {
                                                        const id = this.getAttribute('data-id');
                                                        const names = this.getAttribute('data-names');
                                                        const relation = this.getAttribute('data-relation');
                                                        const department = this.getAttribute('data-department');
                                                        const position = this.getAttribute('data-position');

                                                        // Set the form action to the appropriate route
                                                        $('#editRelationForm').attr('action', '/ccbrt_relation/' + id);

                                                        // Populate the modal with existing data
                                                        $('#edit_names').val(names);
                                                        $('#edit_relation').val(relation);
                                                        $('#edit_department').val(department);
                                                        $('#edit_position').val(position);
                                                    });
                                                });
                                            });
                                        </script>

                                    </div>
                                </div>
                            </div>
                            <!-- Add other content for profile page here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/ccbrt_relation/index.blade.php ENDPATH**/ ?>