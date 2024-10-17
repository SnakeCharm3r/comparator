<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.min.css" />

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">My Requests To Approve</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card card-body p-3">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-bordered display">
                                <thead class="table-success">
                                    <tr>
                                        <th>#</th>
                                        <th>Request Type</th>
                                        <th>Requester Name</th>
                                        <th>Submitted Date</th>
                                        <th>Status</th>
                                        <th>Approved Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $pending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i); ?></td>
                                            <td>ICT Access Form</td>
                                            <td><?php echo e($pendingRequest->requester_name); ?></td>
                                            <td><?php echo e($pendingRequest->attend_date); ?></td>
                                            <td>
                                                <?php if($pendingRequest->status == 0): ?>
                                                    <span class="badge bg-warning text-dark font-size-11">Pending</span>
                                                <?php elseif($pendingRequest->status == 1): ?>
                                                    <span class="badge bg-success text-dark font-size-11">Approved</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($pendingRequest->status == 1): ?>
                                                    <?php echo e(\Carbon\Carbon::parse($pendingRequest->updated_at)->format('d F Y')); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button href="#" class="btn btn-primary btn-sm" title="View"
                                                    onclick="showForm('ict', <?php echo e($pendingRequest->ict_request_resource_id); ?>)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php $__currentLoopData = $clear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clearRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i); ?></td>
                                            <td>Clearance Form</td>
                                            <td><?php echo e($clearRequest->requester_name); ?></td>
                                            <td><?php echo e($clearRequest->attend_date); ?></td>
                                            <td>
                                                <?php if($clearRequest->status == 0): ?>
                                                    <span class="badge bg-warning text-dark font-size-11">Pending</span>
                                                <?php elseif($clearRequest->status == 1): ?>
                                                    <span class="badge bg-success text-dark font-size-11">Approved</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($clearRequest->status == 1): ?>
                                                    <?php echo e(\Carbon\Carbon::parse($clearRequest->updated_at)->format('d F Y')); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button href="#" class="btn btn-primary btn-sm" title="View"
                                                    onclick="showForm('clearance', <?php echo e($clearRequest->requested_resource_id); ?>)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [
                [3, 'desc']
            ] // Optionally set default column ordering, here assuming date is in the 4th column
        });
    });

    function showForm(type, id) {
        var url = '';
        if (type === 'ict') {
            url = '/show_form/' + id;
        } else if (type === 'clearance') {
            url = '/clearance_forms/' + id;
        }
        window.location.href = url;
    }
</script>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FAMILY PC\Documents\GitHub\E-docs\resources\views/requestapprove/index.blade.php ENDPATH**/ ?>