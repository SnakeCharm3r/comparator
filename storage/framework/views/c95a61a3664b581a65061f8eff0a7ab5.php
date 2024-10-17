<?php $__env->startSection('breadcrumb'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <style>
                .custom-alert {
                    max-width: 500px;
                    /* Example for max width */
                    margin: 0 auto;
                    /* Center alert in its column */
                }
            </style>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="page-sub-header">
                            <h3 class="page-title">Dashboard</h3>
                        </div>
                    </div>

                    <div class="col-md-5 text-end">
                        <?php if($user->signature): ?>
                            <img src="data:image/png;base64,<?php echo e($user->signature); ?>" alt="User Signature"
                                style="max-width: 100%; height: auto; display: none;">
                        <?php else: ?>
                            <div class="alert alert-warning" role="alert">
                                Please Provide Your Digital
                                Signature <a href="<?php echo e(route('signature.index')); ?>"
                                    style="color: blue; text-decoration: none;">Click here</a>

                            </div>
                        <?php endif; ?>
                        <?php if(session('success')): ?>
                            <div id="success-alert" class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>

                        

                    </div>

                </div>
            </div>

            <div class="row">

                <?php
                    $filledFieldsWeight = 0;
                    $totalWeight = 100;

                    // Define the weights for each field
                    $weights = [
                        'professional_reg_number' => 30,
                        'marital_status' => 20,
                        'health_insurance' => 25,
                        'language' => 25,
                    ];

                    // Check each field and increment the filled fields weight if filled
                    if (!empty($user->professional_reg_number)) {
                        $filledFieldsWeight += $weights['professional_reg_number'];
                    }

                    if (!empty($user->marital_status)) {
                        $filledFieldsWeight += $weights['marital_status'];
                    }

                    if (!empty($user->health_insurance)) {
                        $filledFieldsWeight += $weights['health_insurance'];
                    }

                    if (!empty($language_knowledge->language)) {
                        $filledFieldsWeight += $weights['language'];
                    }

                    // Calculate the percentage filled
                    $percentageFilled = min($filledFieldsWeight, $totalWeight);
                ?>

                <?php if($percentageFilled < 50): ?>
                    <div class="progress" style="height: 20px; position: relative;">
                        <div class="progress-bar" role="progressbar" style="width: <?php echo e($percentageFilled); ?>%;"
                            aria-valuenow="<?php echo e($percentageFilled); ?>" aria-valuemin="0" aria-valuemax="100">
                            <?php echo e($percentageFilled); ?>%
                            <span
                                style="position: absolute; left: 0; right: 0; text-align: center; top: 50%; transform: translateY(-50%); font-size: 12px; color: rgb(0, 0, 0);">
                                User profile details filled percentage
                            </span>
                        </div>
                    </div>
                <?php endif; ?>
                <br><br>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header bg-warning text-white">
                                <i class="fas fa-tasks"></i> Pending Approvals
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">3</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header bg-success text-white">
                                <i class="fas fa-user-plus"></i> New Request This Month
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">16</h5>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-3 col-sm-6 col-12 mb-3">
                        <div class="card text-center shadow-sm">
                            <!-- Link to the Announcements page -->
                            <a href="<?php echo e(route('announcements.index')); ?>" class="text-decoration-none text-warning">
                                <div class="card-header">
                                    <i class="fas fa-exclamation-triangle"></i> Announcement
                                </div>
                            </a>

                            <!-- Body of the card showing the total count and new announcements -->
                            <div class="card-body">
                                

                                <!-- Fetch the count of new announcements using Eloquent within the Blade template -->
                                <?php
                                    $userLastViewed = auth()->user()->last_viewed_announcement;
                                    // Handle the null case by assuming no announcements have been viewed
                                    $newAnnouncementsCount = \App\Models\Announcement::when($userLastViewed, function (
                                        $query,
                                        $userLastViewed,
                                    ) {
                                        return $query->where('created_at', '>', $userLastViewed);
                                    })->count();
                                ?>

                                <?php if($newAnnouncementsCount > 0): ?>
                                    <div class="mt-2">
                                        <span class="badge bg-warning text-dark d-flex align-items-center">
                                            <strong><?php echo e($newAnnouncementsCount); ?></strong>
                                            <a href="<?php echo e(route('announcements.index')); ?>"
                                                class="ms-1 text-decoration-none text-dark">
                                                New
                                            </a>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-3 col-sm-6 col-12 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header custom-header">
                                <i class="fas fa-users"></i> Total Registered Users
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($totalUsers); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">Onboarding Checklist</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">Complete User Profile Information</li>
                                    <li class="list-group-item">Review Standard Operating Procedures (SOPs)</li>
                                    <li class="list-group-item">Provide Your Digital Signatue</li>
                                    <li class="list-group-item">Review CCBRT Policies</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">My Profile</h5>
                            </div>
                            <div class="card-body">
                                <?php if($user->signature): ?>
                                    <img src="data:image/png;base64,<?php echo e($user->signature); ?>" alt="User Signature"
                                        style="max-width: 40%; height: auto; margin-right: 20px; display: none;">
                                <?php else: ?>
                                    <a href="<?php echo e(route('signature.index')); ?>" class="btn btn-info mb-2">Digital
                                        Signature</a>
                                <?php endif; ?>

                                <a href="<?php echo e(route('policies.user')); ?>" class="btn btn-primary mb-2">CCBRT Policies</a>
                                <a href="<?php echo e(route('profile.index')); ?>" class="btn btn-success mb-2">Update Profile</a>
                                <a href="<?php echo e(route('sops.show')); ?>" class="btn btn-info mb-2">View SOPs</a>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FAMILY PC\Documents\GitHub\E-docs\resources\views/dashboard.blade.php ENDPATH**/ ?>