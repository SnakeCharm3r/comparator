<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.0/css/buttons.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Vendor Contracts</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <?php if(auth()->user()->hasAnyRole(['hr', 'super-admin', 'admin'])): ?>
                        <a href="<?php echo e(route('vendors.create')); ?>" class="btn btn-primary ml-auto">Add Vendor</a>
                    <?php endif; ?>
                </div>

                <div class="card card-body p-3">
                    <div class="table-responsive">
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Vendor Name</th>
                                    <th>Business Owner</th>
                                    <th>Phone Number</th>
                                    <th>Physical Address</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Risk Score</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($vendor->business_owner ?? 'N/A'); ?></td>
                                        <td><?php echo e($vendor->contact_person ?? 'N/A'); ?></td>
                                        <td><?php echo e($vendor->telephone_number ?? 'N/A'); ?></td>
                                        <td><?php echo e($vendor->physical_address ?? 'N/A'); ?></td>
                                        <td><?php echo e($vendor->duration_years ?? 'N/A'); ?></td>
                                        <td><?php echo e($vendor->status ?? 'N/A'); ?></td>
                                        <td style="background-color: 
                                            <?php if($vendor->overall_risk_score <= 6): ?>
                                                #DFF2BF; /* Light Green for Low Risk */
                                            <?php elseif($vendor->overall_risk_score >= 7 && $vendor->overall_risk_score <= 14): ?>
                                                #FFC107; /* Yellow for Medium Risk */
                                            <?php elseif($vendor->overall_risk_score >= 15 && $vendor->overall_risk_score <= 25): ?>
                                                #FF6F61; /* Red for High Risk */
                                            <?php else: ?>
                                                #FFFFFF; /* Default White for N/A */
                                            <?php endif; ?>">
                                            <?php echo e($vendor->overall_risk_score ?? 'N/A'); ?>

                                        </td>
                                        <td>
                                            <!-- View Icon -->
                                            <a href="<?php echo e(route('vendors.show', $vendor->id)); ?>" class="btn btn-info btn-sm"
                                                title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <?php if(auth()->user()->hasAnyRole(['hr', 'super-admin', 'admin'])): ?>
                                            <!-- Edit Icon -->
                                            <a href="<?php echo e(route('vendors.edit', $vendor->id)); ?>"
                                                class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Delete Icon -->
                                            <form action="<?php echo e(route('vendors.destroy', $vendor->id)); ?>" method="POST"
                                                style="display:inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this vendor?');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="10" class="text-center">No vendors found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.print.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.0/js/dataTables.buttons.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.dataTables.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.html5.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

            <script>
                new DataTable('#example', {
                    dom: 'Bfrtip',
                    buttons: ['csv', 'pdf']
                });
            </script>
        </div>
    </div>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FAMILY PC\Documents\GitHub\E-docs\resources\views/vendors/index.blade.php ENDPATH**/ ?>