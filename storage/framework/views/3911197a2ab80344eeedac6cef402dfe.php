<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="page-header mb-4"
                            style="padding: 15px; background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                            <h3 class="page-title mb-0">Employee Exit Form</h3>
                        </div>

                        <div class="form-container p-4 border rounded shadow-sm">
                            <form action="<?php echo e(route('clearance.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="userId" value="<?php echo e($user->id); ?>">

                                <!-- Section I: Staff Details -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section I: Staff
                                    Details</h4>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name"><strong>First Name:</strong></label>
                                            <input type="text" class="form-control" id="first_name"
                                                value="<?php echo e(Auth::user()->fname); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="last_name"><strong>Last Name:</strong></label>
                                            <input type="text" class="form-control" id="last_name"
                                                value="<?php echo e(Auth::user()->lname); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="job_title"><strong>Job Title:</strong></label>
                                            <input type="text" class="form-control" id="job_title"
                                                value="<?php echo e(Auth::user()->job_title); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="department"><strong>Department:</strong></label>
                                            <input type="text" class="form-control" id="department"
                                                value="<?php echo e(Auth::user()->department->dept_name); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date"><strong>Date:</strong></label>
                                            <input type="date" class="form-control" id="date" name="date"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section II A: Items Collection -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section II A:
                                    Collect the Following Items by Last Day of Work</h4>
                                
                                <table class="table mb-4">
                                    <tbody>
                                        <tr>
                                            <td><strong>CCBRT Identification Card</strong></td>
                                            <td>
                                                <input type="text" name="ccbrt_id_card" value="<?php echo e(old('ccbrt_id_card')); ?>" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>CCBRT Name Tag</strong></td>
                                            <td>
                                                <input type="text" name="ccbrt_name_tag" value="<?php echo e(old('ccbrt_name_tag')); ?>" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>NHIF Cards (Including dependents’ cards)</strong></td>
                                            <td>
                                                <input type="text" name="nhif_cards" value="<?php echo e(old('nhif_cards')); ?>" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Work Permit Cancelled (for non-Tanzanian)</strong></td>
                                            <td>
                                                <input type="checkbox" name="work_permit_cancelled" value="1" <?php echo e(old('work_permit_cancelled') ? 'checked' : ''); ?>>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Residence Permit Cancelled (for non-Tanzanian)</strong></td>
                                            <td>
                                                <input type="checkbox" name="residence_permit_cancelled" value="1" <?php echo e(old('residence_permit_cancelled') ? 'checked' : ''); ?>>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Section II B: Finance Confirmation -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section II B:
                                    Finance to Confirm</h4>
                                <table class="table mb-4">
                                    <tbody>
                                        <tr>
                                            <td><strong>Repaid advance on Salary?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="repaid_salary_advance" value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="repaid_salary_advance" value="N/A"> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Staff informed Finance of outstanding loan balances?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="loan_balances_informed" value="Yes">
                                                    Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="loan_balances_informed" value="N/A">
                                                    N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Repaid any outstanding imprest?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="repaid_outstanding_imprest"
                                                        value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="repaid_outstanding_imprest"
                                                        value="N/A"> N/A
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Section II C: Items Collection -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section II C:
                                    Collect the Following Items by Last Day of Work</h4>
                                <table class="table mb-4">
                                    <tbody>
                                        <tr>
                                            <td><strong>Changing Room Keys</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="changing_room_keys" value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="changing_room_keys" value="N/A"> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Office Keys</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="office_keys" value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="office_keys" value="N/A"> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mobile Phone</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="mobile_phone" value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="mobile_phone" value="N/A"> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Camera</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="camera" value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="camera" value="N/A"> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>CCBRT Uniforms</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="ccbrt_uniforms" value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="ccbrt_uniforms" value="N/A"> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Office Car Keys</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="office_car_keys" value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="office_car_keys" value="N/A"> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Any other CCBRT items given (Please specify)</strong></td>
                                            <td>
                                                <input type="text" class="form-control" name="other_items">
                                            </td>
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
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="laptop_returned" value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="laptop_returned" value="No"> No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Access Card MW & Private Clinic Returned?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="access_card_returned" value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="access_card_returned" value="No"> No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Domain Account Disabled?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="domain_account_disabled" value="Yes">
                                                    Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="domain_account_disabled" value="No">
                                                    No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email Account Disabled?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="email_account_disabled" value="Yes">
                                                    Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="email_account_disabled" value="No">
                                                    No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Telephone Pin Code Disabled?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="telephone_pin_disabled" value="Yes">
                                                    Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="telephone_pin_disabled" value="No">
                                                    No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>OpenClinic Account Disabled?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="openclinic_account_disabled"
                                                        value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="openclinic_account_disabled"
                                                        value="No"> No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>SAP Account Disabled?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="sap_account_disabled" value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="sap_account_disabled" value="No"> No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Aruti Account Disabled?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="aruti_account_disabled" value="Yes">
                                                    Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="aruti_account_disabled" value="No">
                                                    No
                                                </label>
                                            </td>
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

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/clearance/index.blade.php ENDPATH**/ ?>