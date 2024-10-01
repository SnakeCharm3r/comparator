<!-- resources/views/profile/show.blade.php -->



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
                                                            <?php if($user->profile_picture): ?>
                                                                <img src="<?php echo e(asset('storage/' . $user->profile_picture)); ?>"
                                                                    alt="Profile Picture" class="img-fluid rounded-circle"
                                                                    style="max-width: 140px; height: 140px; border: 2px solid #ccc; padding: 5px; object-fit: cover;">
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('assets/img/icon.png')); ?>"
                                                                    alt="Default User Icon" class="img-fluid rounded-circle"
                                                                    style="max-width: 160px; height: 140px; #ccc; padding: 1px; object-fit: cover;">
                                                            <?php endif; ?>


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
                                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo e($user->username); ?></h4>
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
                                                    
                                                    


                                                </div>
                                                <script>
                                                    function handleProfilePictureChange(input) {
                                                        document.getElementById('profilePictureForm').submit();
                                                    }
                                                </script>
                                            </div>

                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="<?php echo e(route('profile.index')); ?>"
                                                    class="active nav-link" data-bs-toggle="tab">User Info</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('policies.user')); ?>"
                                                    class="nav-link">Policies</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('user_profile.pass')); ?>"
                                                    class="nav-link">Password</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('family-details.index')); ?>"
                                                    class="nav-link">Family Details</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('health-details.index')); ?>"
                                                    class="nav-link">Health Details</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('ccbrt_relation.index')); ?>"
                                                    class="nav-link">CCBRT Reation</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('language_knowledge.index')); ?>"
                                                    class="nav-link">Language</a> </li>


                                        </ul>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" style="width: 200px;">User Information
                                                            </th>
                                                            <td><strong>Details</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Names</th>
                                                            <td><?php echo e($user->fname); ?> <?php echo e($user->mname); ?>

                                                                <?php echo e($user->lname); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Username</th>
                                                            <td><?php echo e($user->username); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td><?php echo e($user->email); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Date of Birth</th>
                                                            <td><?php echo e($user->DOB); ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">District</th>
                                                            <td><?php echo e($user->district); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Marital Status</th>
                                                            <td><?php echo e($user->marital_status); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Box No</th>
                                                            <td><?php echo e($user->box_no); ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Plot No</th>
                                                            <td><?php echo e($user->plot_no); ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Popular Landmark</th>
                                                            <td><?php echo e($user->popular_landmark); ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Home Address</th>
                                                            <td><?php echo e($user->home_address); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Domicile</th>
                                                            <td><?php echo e($user->domicile); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Religion</th>
                                                            <td><?php echo e($user->religion); ?></td>
                                                        </tr>

                                                        
                                                        <tr>
                                                            <th scope="row">House Number</th>
                                                            <td><?php echo e($user->house_no); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Region</th>
                                                            <td><?php echo e($user->region); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Street</th>
                                                            <td><?php echo e($user->street); ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Professional Reg Number</th>
                                                            <td><?php echo e($user->professional_reg_number); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Identification Numbers</th>
                                                            <td><?php echo e($user->national_Identification_number); ?>

                                                                <?php echo e($user->nssf_no); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="text-end">
                                                    <button class="btn btn-secondary me-2"
                                                        onclick="redirectToEditProfile(<?php echo e($user->id); ?>)">Update</button>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            function redirectToEditProfile(userId) {
                                                window.location.href = `/profile/edit/${userId}`;
                                            }
                                        </script>


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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/user_profile/index.blade.php ENDPATH**/ ?>