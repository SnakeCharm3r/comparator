<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="page-header"
                                style="padding: 5px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                                <div class="row">
                                    <div class="page-sub-header"
                                        style="display: flex; flex-direction: column; align-items: flex-start;">
                                        <!-- Previous Approval Section -->
                                        <p style="font-size: 14px; color: #6c757d;">
                                            <strong>Previous Approval:</strong>
                                            <?php
                                                $forwardedBy = \App\Models\User::find($clearance->forwarded_by);
                                            ?>
                                            <?php echo e($forwardedBy ? $forwardedBy->fname . ' ' . $forwardedBy->lname : 'N/A'); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>

                        <div class="form-container p-4 border rounded shadow-sm">
                            <!-- Section I: Staff Details -->
                            <h4 class="section-title mb-4"
                                style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section I: Staff
                                Details</h4>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="first_name"><strong>First Name:</strong></label>
                                        <input type="text" class="form-control" id="first_name"
                                            value="<?php echo e($clearance->fname); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_name"><strong>Last Name:</strong></label>
                                        <input type="text" class="form-control" id="last_name"
                                            value="<?php echo e($clearance->lname); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="job_title"><strong>Job Title:</strong></label>
                                        <input type="text" class="form-control" id="job_title"
                                            value="<?php echo e($clearance->job_title); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="department"><strong>Department:</strong></label>
                                        <input type="text" class="form-control" id="department"
                                            value="<?php echo e($clearance->dept_name); ?>" readonly>
                                    </div>
                                </div>
                                
                            </div>

                            <!-- Section II A: Items Collection -->
                            <h4 class="section-title mb-4"
                                style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section II A:
                                Items Collected by Last Day of Work</h4>
                            <table class="table mb-4">
                                <tbody>
                                    <tr>
                                        <td><strong>CCBRT Identification Card</strong></td>
                                        <td><?php echo e($clearance->ccbrt_id_card); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>CCBRT Name Tag</strong></td>
                                        <td><?php echo e($clearance->ccbrt_name_tag); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>NHIF Cards (Including dependents’ cards)</strong></td>
                                        <td><?php echo e($clearance->nhif_cards); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Work Permit Cancelled (for non-Tanzanian)</strong></td>
                                        <td><?php echo e($clearance->work_permit_cancelled); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Residence Permit Cancelled (for non-Tanzanian)</strong></td>
                                        <td><?php echo e($clearance->residence_permit_cancelled); ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Section II B: Finance Confirmation -->
                            <h4 class="section-title mb-4"
                                style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section II B:
                                Finance Confirmation</h4>
                            <table class="table mb-4">
                                <tbody>
                                    <tr>
                                        <td><strong>Repaid advance on Salary?</strong></td>
                                        <td><?php echo e($clearance->repaid_salary_advance); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Staff informed Finance of outstanding loan balances?</strong></td>
                                        <td><?php echo e($clearance->loan_balances_informed); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Repaid any outstanding imprest?</strong></td>
                                        <td><?php echo e($clearance->repaid_outstanding_imprest); ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Section II C: Items Collection -->
                            <h4 class="section-title mb-4"
                                style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section II C:
                                Items Collected by Last Day of Work</h4>
                            <table class="table mb-4">
                                <tbody>
                                    <tr>
                                        <td><strong>Changing Room Keys</strong></td>
                                        <td><?php echo e($clearance->changing_room_keys); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Office Keys</strong></td>
                                        <td><?php echo e($clearance->office_keys); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mobile Phone</strong></td>
                                        <td><?php echo e($clearance->mobile_phone); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Camera</strong></td>
                                        <td><?php echo e($clearance->camera); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>CCBRT Uniforms</strong></td>
                                        <td><?php echo e($clearance->ccbrt_uniforms); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Office Car Keys</strong></td>
                                        <td><?php echo e($clearance->office_car_keys); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Any other CCBRT items given (Please specify)</strong></td>
                                        <td><?php echo e($clearance->other_items); ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Section III: ICT Checklist -->
                            <h4 class="section-title mb-4"
                                style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section III: ICT
                                Checklist</h4>
                            <table class="table mb-4">
                                <tbody>
                                    <tr>
                                        <td><strong>Laptop/iPad & Accessories & Gate Pass Returned?</strong></td>
                                        <td><?php echo e($clearance->laptop_returned); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Access Card MW & Private Clinic Returned?</strong></td>
                                        <td><?php echo e($clearance->access_card_returned); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Domain Account Disabled?</strong></td>
                                        <td><?php echo e($clearance->domain_account_disabled); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email Account Disabled?</strong></td>
                                        <td><?php echo e($clearance->email_account_disabled); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Telephone Pin Code Disabled?</strong></td>
                                        <td><?php echo e($clearance->telephone_pin_disabled); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>OpenClinic Account Disabled?</strong></td>
                                        <td><?php echo e($clearance->openclinic_account_disabled); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>SAP Account Disabled?</strong></td>
                                        <td><?php echo e($clearance->sap_account_disabled); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Aruti Account Disabled?</strong></td>
                                        <td><?php echo e($clearance->aruti_account_disabled); ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Section IV: Declaration -->
                            <h4 class="section-title mb-4"
                                style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section IV:
                                Declaration</h4>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><strong>Staff Declaration:</strong></label>
                                        <p>To the best of my knowledge, I have returned all items in my possession
                                            belonging to CCBRT. I understand that failure to return items issued, could
                                            affect sums of money due to me as my final salary.</p>
                                    </div>
                                </div>
                            </div>

                              <!-- Action Buttons -->
                              <div class="buttons-container"
                              style="margin-top: 15px; display: flex; justify-content: flex-end; gap: 10px; padding-right: 3%;">
                              <button type="button" class="btn btn-success"
                                  onclick="approveClearanceForm('<?php echo e($clearance->access_id); ?>')">Approve</button>
                              <button type="button" class="btn btn-danger"
                                  onclick="rejectForm('<?php echo e($clearance->access_id); ?>')">Reject</button>
                              <button type="button" class="btn btn-primary" onclick="generatePDF()">Download</button>
                          </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
                          function approveClearanceForm(access_id) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            Swal.fire({
                                title: 'Are you sure?',
                                text: "Do you want to approve this form?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Yes, approve it!',
                                cancelButtonText: 'No, cancel!',
                                reverseButtons: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        method: 'POST',
                                        url: '/approve_clearform',
                                        data: {
                                            access_id: access_id
                                        },
                                        success: function(response) {
                                            Swal.fire({
                                                title: 'Approved!',
                                                text: 'Form has been approved.',
                                                icon: 'success',
                                                confirmButtonText: 'OK'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '/requestapprove';
                                                }
                                            });
                                        },
                                        error: function(xhr, status, error) {
                                            console.error('Error:', error);
                                            Swal.fire('Error!', 'Failed to approve form.', 'error');
                                        }
                                    });
                                } else if (result.dismiss === Swal.DismissReason.cancel) {
                                    Swal.fire('Cancelled', 'The form was not approved :)', 'error');
                                }
                            });
                        }



    function rejectForm(access_id) {
        Swal.fire({

            text: "Please provide a reason for rejection:",
            input: 'textarea',
            inputPlaceholder: 'Enter your reason here...',
            showCancelButton: true,
            confirmButtonText: 'Reject',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to provide a reason!'
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const reason = result.value;

                $.ajax({
                    method: 'POST',
                    url: '/reject_form',
                    data: {
                        access_id: access_id,
                        reason: reason
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Rejected!',
                            text: 'Form has been rejected.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/requestapprove';
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        Swal.fire('Error!', 'Failed to reject form.', 'error');
                    }
                });
            }
        });
    }
        </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        .form-check-input {
            width: 20px;
            height: 20px;
            margin: 0;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .table td {
            vertical-align: middle;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/exit_form.blade.php ENDPATH**/ ?>