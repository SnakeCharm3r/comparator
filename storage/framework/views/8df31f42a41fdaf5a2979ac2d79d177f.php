<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">ICT Access Form</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p>Please fill out the following form.</p>

                            <form method="POST" action="<?php echo e(route('form.store')); ?>">

                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <!-- Column 1 -->
                                    <input type="hidden" name="userId" value="<?php echo e($user->id); ?>">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="username">Username<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="<?php echo e($user->username); ?>" readonly>
                                        </div>


                                        <div class="form-group">
                                            <label for="mobile">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile"
                                                value="<?php echo e($user->mobile); ?>" readonly>
                                        </div>


                                        <div class="form-group">
                                            <label for="openclinic_hms">User Category<span
                                                    style="color: red;">*</span></label>
                                            <select class="form-control" id="privilegeId" name="privilegeId" required>
                                                <option value="">Select an option</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="openclinic_hms">Aruti HR MIS<span
                                                    style="color: red;">*</span></label>
                                            <select class="form-control" id="aruti" name="aruti" required>
                                                <option value="">Select an option</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="starting_date">Starting Date</label>
                                            <input type="date" class="form-control" id="starting_date"
                                                name="starting_date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="remark">Remark<span style="color: red;">*</span></label>
                                            <select class="form-control" id="remark" name="remarkId" required>
                                                <option value="">Select an option</option>
                                                <?php $__currentLoopData = $rmk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($remark->id); ?>"><?php echo e($remark->rmk_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">PABX<span style="color: red;">*</span></label>
                                            <select class="form-control" id="pbax" name="pbax" required>
                                                <option value="">Select an option</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                    </div>

                                    <!-- Column 2 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name">First Name<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                value="<?php echo e($user->fname); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="employee_id">Email</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="<?php echo e($user->email); ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="department">Department<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="department" name="dept_name"
                                                value="<?php echo e($user->department->dept_name); ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="openclinic_hms">Active Directory<span
                                                    style="color: red;">*</span></label>
                                            <select class="form-control" id="privilegeId" name="active_drt" required>
                                                <option value="">Select an option</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ending_date">Ending Date</label>
                                            <input type="date" class="form-control" id="ending_date"
                                                name="ending_date">
                                        </div>
                                        <div class="form-group">
                                            <label for="employee_id">Employee ID</label>
                                            <input type="text" class="form-control" id="employee_id"
                                                name="employee_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="hardware">Hardware</span></label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware_request[]" value="Laptop computer"> Laptop
                                                            computer</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware_request[]" value="Desktop computer">
                                                            Desktop
                                                            computer</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware_request[]" value="Telephone">
                                                            Telephone</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column 3 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="last_name">Last Name<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                value="<?php echo e($user->lname); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="employment_type">Employment Type<span
                                                    style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="employment_type"
                                                name="employment_type"
                                                value="<?php echo e($user->employmentType->employment_type); ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="openclinic_hms">NHIF Qualification</label>
                                            <select class="form-control" id="nhifId" name="nhifId" required>
                                                <option value="">Select an option</option>
                                                <?php $__currentLoopData = $qualifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($qualification->id); ?>"><?php echo e($qualification->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">HMIS Access</label>
                                            <select class="form-control" id="hmisId" name="hmisId" required>
                                                <option value="">Select an option</option>
                                                <?php $__currentLoopData = $hmis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hmi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($hmi->id); ?>"><?php echo e($hmi->names); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">CCBRT Email</label>
                                            <select class="form-control" id="privilegeId" name="privilegeId" required>
                                                <option value="">Select an option</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">SAP ERP<span style="color: red;">*</span></label>
                                            <select class="form-control" id="privilegeId" name="sap" required>
                                                <option value="">Select an option</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="openclinic_hms">Network Access VPN</label>
                                            <select class="form-control" id="VPN" name="VPN" required>
                                                <option value="">Select an option</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>


                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3"
                                    style="background-color: #00d084; border-color: #00d084;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FAMILY PC\Documents\GitHub\E-docs\resources\views/ict-access-form/index.blade.php ENDPATH**/ ?>