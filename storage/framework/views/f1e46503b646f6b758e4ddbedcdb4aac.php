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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <!-- Include SweetAlert2 -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                            <li class="nav-item"><a href="<?php echo e(route('user_profile.pass')); ?>"
                                                    class="nav-link">Password</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('family-details.index')); ?>"
                                                    class="active nav-link">Family Details</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('health-details.index')); ?>"
                                                    class=" nav-link">Health Details</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('ccbrt_relation.index')); ?>"
                                                    class="nav-link">CCBRT Relation</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('language_knowledge.index')); ?>"
                                                    class="nav-link">Language</a></li>
                                        </ul>

                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active" id="family">
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button type="button" class="btn btn-primary mb-3"
                                                            data-toggle="modal" data-target="#addFamilyModal">
                                                            Add Family Data
                                                        </button>
                                                    </div>
                                                </div>


                                                <div class="modal fade" id="addFamilyModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="addFamilyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST"
                                                                action="<?php echo e(route('family-details.addFamilyData')); ?>">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="addFamilyModalLabel">Add
                                                                        Family Data</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="fullName">Full Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="fullName" name="familyData[0][full_name]"
                                                                            value="<?php echo e(old('familyData.0.full_name')); ?>"
                                                                            placeholder="John Doe" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="relationship">Relationship</label>
                                                                        <input type="text" class="form-control"
                                                                            id="relationship"
                                                                            name="familyData[0][relationship]"
                                                                            value="<?php echo e(old('familyData.0.relationship')); ?>"
                                                                            placeholder="Brother" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="phoneNumber">Mobile</label>
                                                                        <input type="text" class="form-control"
                                                                            id="phoneNumber"
                                                                            name="familyData[0][phone_number]"
                                                                            value="<?php echo e(old('familyData.0.phone_number')); ?>"
                                                                            placeholder="0699 990 002">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="occupation">Occupation</label>
                                                                        <input type="text" class="form-control"
                                                                            id="occupation" name="familyData[0][occupation]"
                                                                            value="<?php echo e(old('familyData.0.occupation')); ?>"
                                                                            placeholder="Doctor">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nextOfKin">Next of Kin</label>
                                                                        <input type="checkbox" id="nextOfKin"
                                                                            name="familyData[0][next_of_kin]"
                                                                            value="1"
                                                                            <?php echo e(old('familyData.0.next_of_kin') ? 'checked' : ''); ?>>
                                                                        <small class="form-text text-muted">Check if this
                                                                            person is your Next of Kin.</small>
                                                                    </div>


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>



                                                <?php if(session('error')): ?>
                                                    <div class="alert alert-danger">
                                                        <?php echo e(session('error')); ?>

                                                    </div>
                                                <?php endif; ?>


                                                <!-- Modal for editing family data -->
                                                <div class="modal fade" id="editFamilyModal" tabindex="-1"
                                                    role="dialog" aria-labelledby="editFamilyModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" id="editFamilyForm" action="">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('PUT'); ?>
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editFamilyModalLabel">Edit
                                                                        Family Data</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Full Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_full_name" name="full_name"
                                                                            value="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Relationship</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_relationship" name="relationship"
                                                                            value="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Mobile</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_phone_number" name="phone_number"
                                                                            value="">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Occupation</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_occupation" name="occupation"
                                                                            value="">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Next of Kin</label>
                                                                        <input type="checkbox"
                                                                            name="familyData[0][next_of_kin]"
                                                                            value="1"
                                                                            <?php echo e(old('familyData.0.next_of_kin') ? 'checked' : ''); ?>>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                                <h3>Family Details</h3>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Full Name</th>
                                                                <th>Relationship</th>
                                                                <th>Mobile</th>
                                                                <th>Occupation</th>
                                                                <th>Next of Kin</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $familyData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($detail->full_name); ?></td>
                                                                    <td><?php echo e($detail->relationship); ?></td>
                                                                    <td><?php echo e($detail->phone_number); ?></td>
                                                                    <td><?php echo e($detail->occupation); ?></td>
                                                                    <td><?php echo e($detail->next_of_kin ? 'Yes' : 'No'); ?></td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-sm p-0 edit-family-btn"
                                                                            style="border: none; background: none;"
                                                                            title="Edit" data-toggle="modal"
                                                                            data-target="#editFamilyModal"
                                                                            data-id="<?php echo e($detail->id); ?>"
                                                                            data-full_name="<?php echo e($detail->full_name); ?>"
                                                                            data-relationship="<?php echo e($detail->relationship); ?>"
                                                                            data-phone_number="<?php echo e($detail->phone_number); ?>"
                                                                            data-next_of_kin="<?php echo e($detail->next_of_kin); ?>"
                                                                            data-occupation="<?php echo e($detail->occupation); ?>">
                                                                            <i class="fas fa-edit text-primary"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-sm p-0"
                                                                            style="border: none; background: none;"
                                                                            title="Delete"
                                                                            onclick="confirmDelete(<?php echo e($detail->id); ?>)">
                                                                            <i class="fas fa-trash-alt text-danger"></i>
                                                                        </button>

                                                                        <!-- Add this form for delete action -->
                                                                        <form id="delete-form-<?php echo e($detail->id); ?>"
                                                                            method="POST"
                                                                            action="<?php echo e(route('family-details.destroy', $detail->id)); ?>"
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
                            <!-- Add other content for profile page here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 Confirmation Script -->
    <script>
        function confirmDelete(id) {
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
                    // Submit the delete form
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        // Handle edit button click
        $(document).on('click', '.edit-family-btn', function() {
            var id = $(this).data('id');
            var full_name = $(this).data('full_name');
            var relationship = $(this).data('relationship');
            var phone_number = $(this).data('phone_number');
            var next_of_kin = $(this).data('next_of_kin');
            var occupation = $(this).data('occupation');

            // Set the form action to the appropriate route
            $('#editFamilyForm').attr('action', '/family-details/' + id);

            // Populate the modal with existing data
            $('#edit_full_name').val(full_name);
            $('#edit_relationship').val(relationship);
            $('#edit_phone_number').val(phone_number);
            $('#edit_next_of_kin').val(next_of_kin);
            $('#edit_occupation').val(occupation);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/family-details/index.blade.php ENDPATH**/ ?>