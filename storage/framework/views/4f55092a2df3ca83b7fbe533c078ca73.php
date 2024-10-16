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
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h4>My Requests</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead class="table-success">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Request Type</th>
                                                    <th>Approval Level</th>
                                                    <th>Status</th>
                                                    <th>Remark</th> <!-- Remark column -->
                                                    <th>Submitted</th>
                                                    <th>Approved Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $previousRequestId = null; // Initialize the variable here
                                                    $counter = 1; // Initialize counter for numbering
                                                ?>

                                                
                                                <?php $__currentLoopData = $form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aform): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $approvalDetails = [];
                                                        foreach ($histories[$aform->id] as $ahistory) {
                                                            $roles = \App\Models\User::findOrFail(
                                                                $ahistory->attended_by,
                                                            )->roles;
                                                            foreach ($roles as $role) {
                                                                if ($role->name != 'requester') {
                                                                    $rang = 'warning'; // Default value
                                                                    $neno = 'Pending'; // Default value
                                                                    $rejectionReason = ''; // Default value for rejection reason

                                                                    if ($ahistory->status == 0) {
                                                                        $rang = 'warning';
                                                                        $neno = 'Pending';
                                                                    } elseif ($ahistory->status == 1) {
                                                                        $rang = 'success';
                                                                        $neno = 'Approved';
                                                                    } else {
                                                                        $rang = 'danger';
                                                                        $neno = 'Rejected';
                                                                        $rejectionReason = $ahistory->rejection_reason; // Fetch rejection reason
                                                                    }

                                                                    $approvalDetails[] = [
                                                                        'role' => $role->name,
                                                                        'status' => "<span class='badge bg-{$rang}'>{$neno}</span>",
                                                                        'rejectionReason' => $rejectionReason,
                                                                    ];
                                                                }
                                                            }
                                                        }
                                                    ?>

                                                    <?php $__currentLoopData = $approvalDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr
                                                            class="<?php echo e($aform->id !== $previousRequestId ? 'request-row' : ''); ?>">
                                                            <?php if($loop->first): ?>
                                                                <td rowspan="<?php echo e(count($approvalDetails)); ?>">
                                                                    <?php echo e($counter++); ?> <!-- Display the counter value -->
                                                                </td>
                                                                <td rowspan="<?php echo e(count($approvalDetails)); ?>">
                                                                    ICT Access Form
                                                                </td>
                                                            <?php endif; ?>
                                                            <td><?php echo e($detail['role']); ?></td>
                                                            <td><?php echo $detail['status']; ?></td>
                                                            <td>
                                                                
                                                                <?php if($detail['status'] == "<span class='badge bg-danger'>Rejected</span>"): ?>
                                                                    <?php echo e($detail['rejectionReason']); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <?php if($loop->first): ?>
                                                                <td rowspan="<?php echo e(count($approvalDetails)); ?>">
                                                                    <?php echo e($aform->created_at); ?>

                                                                </td>
                                                                <td rowspan="<?php echo e(count($approvalDetails)); ?>"></td>
                                                                <td rowspan="<?php echo e(count($approvalDetails)); ?>">


                                                                    
                                                                </td>
                                                            <?php endif; ?>
                                                        </tr>

                                                        <?php
                                                            $previousRequestId = $aform->id; // Update the variable after each iteration
                                                        ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                

                                                <?php $__currentLoopData = $clearForm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $clearApprovalDetails = [];
                                                        foreach ($clearHistories[$exit->id] as $clearHistory) {
                                                            $roles = \App\Models\User::findOrFail(
                                                                $clearHistory->attended_by,
                                                            )->roles;
                                                            foreach ($roles as $role) {
                                                                if ($role->name != 'requester') {
                                                                    $rang = 'warning'; // Default value
                                                                    $neno = 'Pending'; // Default value
                                                                    $rejectionReason = ''; // Default value for rejection reason

                                                                    if ($clearHistory->status == 0) {
                                                                        $rang = 'warning';
                                                                        $neno = 'Pending';
                                                                    } elseif ($clearHistory->status == 1) {
                                                                        $rang = 'success';
                                                                        $neno = 'Approved';
                                                                    } else {
                                                                        $rang = 'danger';
                                                                        $neno = 'Rejected';
                                                                        $rejectionReason =
                                                                            $clearHistory->rejection_reason; // Fetch rejection reason
                                                                    }

                                                                    $clearApprovalDetails[] = [
                                                                        'role' => $role->name,
                                                                        'status' => "<span class='badge bg-{$rang}'>{$neno}</span>",
                                                                        'rejectionReason' => $rejectionReason,
                                                                    ];
                                                                }
                                                            }
                                                        }
                                                    ?>

                                                    <?php $__currentLoopData = $clearApprovalDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr
                                                            class="<?php echo e($exit->id !== $previousRequestId ? 'request-row' : ''); ?>">
                                                            <?php if($loop->first): ?>
                                                                <td rowspan="<?php echo e(count($clearApprovalDetails)); ?>">
                                                                    <?php echo e($counter++); ?> <!-- Display the counter value -->
                                                                </td>
                                                                <td rowspan="<?php echo e(count($clearApprovalDetails)); ?>">
                                                                    Clearance Form
                                                                </td>
                                                            <?php endif; ?>
                                                            <td><?php echo e($detail['role']); ?></td>
                                                            <td><?php echo $detail['status']; ?></td>
                                                            <td>
                                                                
                                                                <?php if($detail['status'] == "<span class='badge bg-danger'>Rejected</span>"): ?>
                                                                    <?php echo e($detail['rejectionReason']); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <?php if($loop->first): ?>
                                                                <td rowspan="<?php echo e(count($clearApprovalDetails)); ?>">
                                                                    <?php echo e($exit->created_at); ?>

                                                                </td>
                                                                <td rowspan="<?php echo e(count($clearApprovalDetails)); ?>"></td>
                                                                <td rowspan="<?php echo e(count($clearApprovalDetails)); ?>">
                                                                    <a href="<?php echo e(route('clearance.edit', $exit->id)); ?>"
                                                                        class="btn btn-rounded btn-outline-info">Modify</a>
                                                                    <form
                                                                        action="<?php echo e(route('request.destroy', $exit->id)); ?>"
                                                                        method="POST" style="display:inline-block;">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('DELETE'); ?>
                                                                        
                                                                    </form>
                                                                </td>
                                                            <?php endif; ?>
                                                        </tr>

                                                        <?php
                                                            $previousRequestId = $exit->id; // Update the variable after each iteration
                                                        ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }

        .badge {
            font-size: 0.875rem;
            padding: 0.5em 0.75em;
            border-radius: 0.2rem;
        }

        .request-row {
            border-top: 2px solid #333;
            /* Dark border to create a strong line */
        }
    </style>
    <script>
        new DataTable('#example');
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/myrequest/index.blade.php ENDPATH**/ ?>