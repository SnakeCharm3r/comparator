<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Explanations for ID Card Regulations and Passport Photo Upload -->
                            <div class="row">
                                <div class="col-md-8">
                                    <h5>ID Card Regulations</h5>
                                    <p>1. All employees must wear their ID cards at all times within the office premises.</p>
                                    <p>2. ID cards must be presented upon request by security personnel.</p>
                                    <p>3. Lost or stolen ID cards must be reported immediately to the HR department.</p>
                                    <p>4. ID cards are property of the company and must be returned upon termination of employment.</p>
                                    <p>5. Tampering with or altering ID cards is strictly prohibited.</p>
                                    <p>6. Misuse of ID cards may result in disciplinary action.</p>
                                    <p>7. Employees are responsible for the safekeeping of their ID cards.</p>
                                    <p>8. ID cards are non-transferable and should not be used by anyone other than the assigned employee.</p>
                                    <p>9. Temporary ID cards will be issued to visitors and must be returned upon departure.</p>
                                    <p>10. Replacement of lost ID cards may incur a fee.</p>
                                    <p>11. Damaged ID cards should be reported for replacement.</p>
                                    <p>12. Any suspicious activity related to ID cards should be reported to security immediately.</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Upload Passport Photo</h5>
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-3">
                                            <label for="passport_photo" class="form-label">Passport Photo</label>
                                            <input type="file" class="form-control" id="passport_photo" name="passport_photo" accept="image/*" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Upload Photo</button>
                                    </form>
                                </div>
                            </div>

                            <!-- ID Card Request Form -->
                            <form action="#" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Requester Information</h5>
                                        <div class="mb-3">
                                            <label for="full_name" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="department" class="form-label">Department</label>
                                            <input type="text" class="form-control" id="department" name="department" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <input type="text" class="form-control" id="category" name="category" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="signature" class="form-label">Signature</label>
                                            <input type="text" class="form-control" id="signature" name="signature" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="date" name="date" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>HR Review</h5>
                                        <div class="mb-3">
                                            <label for="employee_code" class="form-label">Employee Code</label>
                                            <input type="text" class="form-control" id="employee_code" name="employee_code" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="hr_name" class="form-label">Name of HR Reviewer</label>
                                            <input type="text" class="form-control" id="hr_name" name="hr_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="hr_signature" class="form-label">HR Signature</label>
                                            <input type="text" class="form-control" id="hr_signature" name="hr_signature" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit Request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/card/index.blade.php ENDPATH**/ ?>