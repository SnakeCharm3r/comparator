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
                                <input type="hidden" name="userId" value="<?php echo e($user->id); ?>">

                                <div class="row">
                                    <!-- Column 1 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="openclinic_hms">Aruti HR MIS<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" id="privilegeId" name="aruti" required>
                                                <option value="" disabled selected> ---Select an option---</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(in_array($privilege->prv_name, ['User', 'Administrator', 'Super Administrator', 'HR Officer', 'HR Manager'])): ?>
                                                        <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="starting_date">Starting Date</label>
                                            <input type="date" class="form-control" id="starting_date" name="starting_date" required>
                                            <div id="error-message" style="color: red; display: none;"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ending_date">Ending Date</label>
                                            <input type="date" class="form-control" id="ending_date" name="ending_date" required>
                                            <div id="end-error-message" style="color: red; display: none;"></div>
                                        </div>

                                        <script>
                                            const today = new Date();
                                            const todayString = today.toISOString().split('T')[0]; // Format YYYY-MM-DD

                                            const startingDateInput = document.getElementById('starting_date');
                                            const endingDateInput = document.getElementById('ending_date');
                                            const startErrorMessage = document.getElementById('start-error-message');
                                            const endErrorMessage = document.getElementById('end-error-message');

                                            // Set the min attribute for the starting date
                                            startingDateInput.setAttribute('min', todayString);

                                            startingDateInput.addEventListener('input', function() {
                                                const selectedStartDate = new Date(startingDateInput.value);
                                                if (selectedStartDate < today) {
                                                    startErrorMessage.textContent = "Starting date cannot be in the past.";
                                                    startErrorMessage.style.display = 'block';
                                                    startingDateInput.setCustomValidity("Invalid date");
                                                } else {
                                                    startErrorMessage.style.display = 'none';
                                                    startingDateInput.setCustomValidity("");

                                                    // Set the minimum ending date to more than 3 months from the selected starting date
                                                    const minEndingDate = new Date(selectedStartDate);
                                                    minEndingDate.setMonth(selectedStartDate.getMonth() + 3);
                                                    const minEndingDateString = minEndingDate.toISOString().split('T')[0];
                                                    endingDateInput.setAttribute('min', minEndingDateString);

                                                    // Validate ending date immediately if already set
                                                    if (endingDateInput.value) {
                                                        validateEndingDate();
                                                    }
                                                }
                                            });

                                            endingDateInput.addEventListener('input', validateEndingDate);

                                            function validateEndingDate() {
                                                const selectedEndDate = new Date(endingDateInput.value);
                                                const minEndingDate = endingDateInput.getAttribute('min');

                                                if (selectedEndDate <= new Date(minEndingDate)) {
                                                    endErrorMessage.textContent = "Ending date must be more than 3 months after the starting date.";
                                                    endErrorMessage.style.display = 'block';
                                                    endingDateInput.setCustomValidity("Invalid date");
                                                } else if (startingDateInput.value && selectedEndDate <= new Date(startingDateInput.value)) {
                                                    endErrorMessage.textContent = "Ending date must be after the starting date.";
                                                    endErrorMessage.style.display = 'block';
                                                    endingDateInput.setCustomValidity("Invalid date");
                                                } else {
                                                    endErrorMessage.style.display = 'none';
                                                    endingDateInput.setCustomValidity("");
                                                }
                                            }
                                        </script>                                        <div class="form-group">
                                            <label for="openclinic_hms">SAP ERP<span class="text-danger">*</span></label>
                                            <select class="form-control" id="privilegeId" name="sap" required>
                                                <option value="" disabled selected> ---Select an option---</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(
                                                        $privilege->prv_name === 'User' ||
                                                            $privilege->prv_name === 'Administrator' ||
                                                            $privilege->prv_name === 'Finance' ||
                                                            $privilege->prv_name === 'Payroll Accountant' ||
                                                            $privilege->prv_name === 'CFO' ||
                                                            $privilege->prv_name === 'HR' ||
                                                            $privilege->prv_name === 'HR Manager' ||
                                                            $privilege->prv_name === 'HR Biodata' ||
                                                            $privilege->prv_name === 'Director of HR COO'): ?>
                                                        <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="openclinic_hms">PABX<span class="text-danger">*</span></label>
                                            <select class="form-control" id="pbax" name="pbax" required>
                                                <option value="" disabled selected>---Select an option---</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($privilege->prv_name === 'User' || $privilege->prv_name === 'Administrator'): ?>
                                                        <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>


                                    </div>

                                    <!-- Column 2 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="openclinic_hms">Active Directory<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" id="privilegeId" name="active_drt" required>
                                                <option value="" disabled selected> ---Select an option---</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($privilege->prv_name === 'User' || $privilege->prv_name === 'Administrator'): ?>
                                                        <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="hardware">Hardware</label>
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
                                                            Desktop computer</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware_request[]" value="Telephone">
                                                            Telephone</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware_request[]" value="Drive">
                                                            External Drive</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="network_folder">Network Folder</label>
                                                    <select class="form-control" name="network_folder" required>
                                                        <option value="" disabled selected>Select a network folder</option>
                                                        <option value="Academy">Academy</option>
                                                        <option value="HR">HR</option>
                                                        <option value="ICT & Business Application">ICT & Business Application</option>
                                                        <option value="Insurances Validated Master">Insurances Validated Master</option>
                                                        <option value="LAB">LAB</option>
                                                        <option value="Mendeley">Mendeley</option>
                                                        <option value="Procurement">Procurement</option>
                                                        <option value="Q&S">Q&S</option>
                                                        <option value="SOP">SOP</option>
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label>Network Folder Access</label>
                                                    <div class="d-flex">
                                                        <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(in_array($privilege->prv_name, ['Read', 'Write', 'Full Access'])): ?>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="folder_privilege"
                                                                        id="privilege_<?php echo e($privilege->id); ?>"value="<?php echo e($privilege->id); ?>"
                                                                        required>
                                                                    <label class="form-check-label"
                                                                        for="privilege_<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?></label>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="openclinic_hms">OpenClinic HMIS Access</label>
                                                    <select class="form-control" id="hmisId" name="hmisId" required>
                                                        <option value="" disabled selected> ---Select an option---</option>
                                                        <?php $__currentLoopData = $hmis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hmi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($hmi->id); ?>"><?php echo e($hmi->names); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Column 3 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="openclinic_hms">NHIF Qualification</label>
                                            <select class="form-control" id="nhifId" name="nhifId" required>
                                                <option value="" disabled selected> ---Select an option---</option>
                                                <?php $__currentLoopData = $qualifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($qualification->id); ?>"><?php echo e($qualification->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="openclinic_hms">Network Access VPN</label>
                                            <select class="form-control" id="VPN" name="VPN" required>
                                                <option value="" disabled selected> ---Select an option---</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($privilege->prv_name === 'User' || $privilege->prv_name === 'Administrator'): ?>
                                                        <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="openclinic_hms">CCBRT Email</label>
                                            <select class="form-control" id="privilegeId" name="privilegeId" required>
                                                <option value="" disabled selected> ---Select an option---</option>
                                                <?php $__currentLoopData = $privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($privilege->prv_name === 'User' || $privilege->prv_name === 'Administrator'): ?>
                                                        <option value="<?php echo e($privilege->id); ?>"><?php echo e($privilege->prv_name); ?>

                                                        </option>
                                                    <?php endif; ?>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/ict-access-form/index.blade.php ENDPATH**/ ?>