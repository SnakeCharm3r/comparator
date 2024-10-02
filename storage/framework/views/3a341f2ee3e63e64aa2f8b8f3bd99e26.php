<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Header with Logo -->
            <div class="page-header d-flex justify-content-between align-items-center">
                <h3 class="page-title text-center">Vendor Details</h3>
                <a href="<?php echo e(route('vendors.index')); ?>" class="btn btn-secondary">Back to List</a>
            </div>

            <!-- Vendor Information Section -->
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Vendor Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Business Owner</th>
                                <td><?php echo e($vendor->business_owner); ?></td>
                            </tr>
                            <tr>
                                <th>Contact Person</th>
                                <td><?php echo e($vendor->contact_person); ?></td>
                            </tr>
                            <tr>
                                <th>Telephone Number</th>
                                <td><?php echo e($vendor->telephone_number); ?></td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td><?php echo e($vendor->email_address); ?></td>
                            </tr>
                            <tr>
                                <th>Physical Address</th>
                                <td><?php echo e($vendor->physical_address); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Contract Details Section -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Contract Details</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Contract Total Value</th>
                                <td><?php echo e($vendor->contract_total_value); ?></td>
                            </tr>
                            <tr>
                                <th>Duration (Years)</th>
                                <td><?php echo e($vendor->duration_years); ?></td>
                            </tr>
                            <tr>
                                <th>Likelihood Rating</th>
                                <td
                                    class="<?php if($vendor->likelihood_rating <= 3): ?> table-success <?php elseif($vendor->likelihood_rating <= 6): ?> table-warning <?php else: ?> table-danger <?php endif; ?>">
                                    <?php echo e($vendor->likelihood_rating); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Impact Rating</th>
                                <td
                                    class="<?php if($vendor->impact_rating <= 3): ?> table-success <?php elseif($vendor->impact_rating <= 6): ?> table-warning <?php else: ?> table-danger <?php endif; ?>">
                                    <?php echo e($vendor->impact_rating); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Overall Risk Score</th>
                                <td
                                    class="<?php if($vendor->overall_risk_score <= 3): ?> table-success <?php elseif($vendor->overall_risk_score <= 6): ?> table-warning <?php else: ?> table-danger <?php endif; ?>">
                                    <?php echo e($vendor->overall_risk_score); ?>

                                </td>
                            </tr>
                            <?php if($vendor->contract_file): ?>
                                <tr>
                                    <th>Contract File</th>
                                    <td>
                                        <a href="<?php echo e(Storage::url($vendor->contract_file)); ?>" class="btn btn-info"
                                            target="_blank">Download Contract</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/vendors/show.blade.php ENDPATH**/ ?>