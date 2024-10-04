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
            <div class="container">
                <div class="row flex-lg-nowrap">
                    <div class="col">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="e-profile">
                                            <div class="row">
                                                <div class="col-12 col-sm-auto mb-3">
                                                    <div class="mx-auto" style="width: 140px;">
                                                        <div class="d-flex justify-content-center align-items-center rounded"
                                                            style="height: 140px; background-color: rgb(233, 236, 239); position: relative;">
                                                            <img src="<?php echo e(asset('storage/' . $user->profile_picture)); ?>"
                                                                alt="Profile Picture" class="img-fluid rounded-circle"
                                                                style="max-width: 140px; height: 140px; border: 2px solid #ccc; padding: 5px; object-fit: cover;">
                                                            <form id="profilePictureForm"
                                                                action="<?php echo e(route('profile.update.picture')); ?>"
                                                                method="POST" enctype="multipart/form-data"
                                                                style="display: none;">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="file" class="form-control"
                                                                    id="profile_picture" name="profile_picture"
                                                                    accept="image/*"
                                                                    onchange="handleProfilePictureChange(this)">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo e($user->username); ?>

                                                        </h4>
                                                        <p class="mb-0"><?php echo e($user->email); ?></p>
                                                        <p class="mb-0"><?php echo e($user->department->name); ?></p>
                                                        <div class="mt-2">
                                                            <button class="btn btn-primary" type="button"
                                                                onclick="document.getElementById('profile_picture').click()">
                                                                <i class="fa fa-fw fa-camera"></i>
                                                                <span>Change Photo</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="text-sm-right ml-auto">
                                                        <div class="text-muted"><small>Joined 09 July 2024</small></div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function handleProfilePictureChange(input) {
                                                        document.getElementById('profilePictureForm').submit();
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#settings" class="active nav-link"
                                                    data-bs-toggle="tab">User Info</a></li>
                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active" id="settings">
                                                <form action="<?php echo e(route('profile.update', $user->id)); ?>" method="POST"
                                                    class="form" novalidate="">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                    <input type="hidden" name="deptId" value="<?php echo e($user->deptId); ?>">
                                                    <input type="hidden" name="employment_typeId"
                                                        value="<?php echo e($user->employment_typeId); ?>">
                                                    <input type="hidden" name="job_title" value="<?php echo e($user->job_title); ?>">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>First Name</label>
                                                                        <input class="form-control" type="text"
                                                                            name="fname" placeholder="John Smith"
                                                                            value="<?php echo e(old('fname', $user->fname)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Middle Name</label>
                                                                        <input class="form-control" type="text"
                                                                            name="mname" placeholder="Middle Name"
                                                                            value="<?php echo e(old('mname', $user->mname)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Last Name</label>
                                                                        <input class="form-control" type="text"
                                                                            name="lname" placeholder="John Smith"
                                                                            value="<?php echo e(old('lname', $user->lname)); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Username</label>
                                                                        <input class="form-control" type="text"
                                                                            name="username" placeholder="johnny.s"
                                                                            value="<?php echo e(old('username', $user->username)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input class="form-control" type="text"
                                                                            name="email" placeholder="user@example.com"
                                                                            value="<?php echo e(old('email', $user->email)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Mobile Number</label>
                                                                        <input class="form-control" type="text"
                                                                            name="mobile" placeholder="123-456-7890"
                                                                            value="<?php echo e(old('mobile', $user->mobile)); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Date of Birth</label>
                                                                        <input class="form-control" type="date"
                                                                            name="DOB"
                                                                            value="<?php echo e(old('DOB', $user->DOB)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Place of Birth</label>
                                                                        <input class="form-control" type="text"
                                                                            name="place_of_birth"
                                                                            value="<?php echo e(old('place_of_birth', $user->place_of_birth)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="marital-status">Marital Status:</label>
                                                                        <select id="marital-status" class="form-control"
                                                                            name="marital_status">
                                                                            <option value="">Select Marital Status
                                                                            </option>
                                                                            <option value="single"
                                                                                <?php echo e(old('marital_status', $user->marital_status) == 'single' ? 'selected' : ''); ?>>
                                                                                Single</option>
                                                                            <option value="married"
                                                                                <?php echo e(old('marital_status', $user->marital_status) == 'married' ? 'selected' : ''); ?>>
                                                                                Married</option>
                                                                            <option value="divorced"
                                                                                <?php echo e(old('marital_status', $user->marital_status) == 'divorced' ? 'selected' : ''); ?>>
                                                                                Divorced</option>
                                                                            <option value="widowed"
                                                                                <?php echo e(old('marital_status', $user->marital_status) == 'widowed' ? 'selected' : ''); ?>>
                                                                                Widowed</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Region</label>
                                                                        <input class="form-control" type="text"
                                                                            name="region" placeholder="Region"
                                                                            value="<?php echo e(old('region', $user->region)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>District</label>
                                                                        <input class="form-control" type="text"
                                                                            name="district" placeholder="District"
                                                                            value="<?php echo e(old('district', $user->district)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Street</label>
                                                                        <input class="form-control" type="text"
                                                                            name="street" placeholder="Street"
                                                                            value="<?php echo e(old('street', $user->street)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>House Number</label>
                                                                        <input class="form-control" type="text"
                                                                            name="house_no" placeholder="House Number"
                                                                            value="<?php echo e(old('house_no', $user->house_no)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Home Address</label>
                                                                        <input class="form-control" type="text"
                                                                            name="home_address" placeholder="Home Address"
                                                                            value="<?php echo e(old('home_address', $user->home_address)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Domicile</label>
                                                                        <input class="form-control" type="text"
                                                                            name="domicile" placeholder="Domicile"
                                                                            value="<?php echo e(old('domicile', $user->domicile)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Religion</label>
                                                                        <input class="form-control" type="text"
                                                                            name="religion" placeholder="Religion"
                                                                            value="<?php echo e(old('religion', $user->religion)); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Professional Reg Number</label>
                                                                        <input class="form-control" type="text"
                                                                            name="professional_reg_number"
                                                                            placeholder="Professional Reg Number"
                                                                            value="<?php echo e(old('professional_reg_number', $user->professional_reg_number)); ?>">
                                                                    </div>
                                                                </div>
                                                             <!-- Include jQuery and InputMask -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo e(asset('node_modules/jquery.inputmask/dist/min/jquery.inputmask.min.js')); ?>"></script>

<div class="col-12 col-md-4">
    <div class="form-group">
        <label>National Identification Number (NIDA)</label>
        <input class="form-control" type="text"
               name="NIN"
               placeholder="e.g. 19501007-11101-00001-26"
               value="<?php echo e(old('NIN', $user->NIN)); ?>"
               pattern="\d{8}-\d{5}-\d{5}-\d{2}"
               title="Format: 19501007-11101-00001-26"
               maxlength="23">
    </div>
</div>

<!-- InputMask initialization script -->
<script>
    $(document).ready(function(){
        $('input[name="NIN"]').inputmask({
            mask: "99999999-99999-99999-99",  // Set the format for NIDA
            placeholder: " ",                // Placeholder for empty fields
            definitions: {
                '9': {                         // Restrict to digits only
                    validator: "[0-9]"
                }
            },
            clearIncomplete: true              // Prevent partial entries from being submitted
        });
    });
</script>




                                                                <div class="col-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>NSSF Number</label>
                                                                        <input class="form-control" type="text"
                                                                            name="nssf_no" placeholder="NSSF Number"
                                                                            value="<?php echo e(old('nssf_no', $user->nssf_no)); ?>">
                                                                    </div>
                                                                </div>

                                                                



                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <a href="#" class="btn btn-secondary"
                                                                onclick="goBack()">Back</a>
                                                            <button class="btn btn-primary ml-2" type="submit">Save
                                                                Changes</button>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function redirectToEditProfile(userId) {
                                                            window.location.href = `/profile/edit/${userId}`;
                                                        }
                                                    </script>
                                                    <script>
                                                        function goBack() {
                                                            window.history.back();
                                                        }
                                                    </script>
                                                </form>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/user_profile/edit.blade.php ENDPATH**/ ?>