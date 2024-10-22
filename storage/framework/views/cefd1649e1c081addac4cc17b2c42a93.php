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
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="<?php echo e(route('profile.index')); ?>"
                                                    class="nav-link">User Info</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('policies.user')); ?>"
                                                    class="active nav-link">Policies</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('user_profile.pass')); ?>"
                                                    class="nav-link">Password</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('family-details.index')); ?>"
                                                    class="nav-link">Family Details</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('health-details.index')); ?>"
                                                    class=" nav-link">Health Details</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('ccbrt_relation.index')); ?>"
                                                    class="nav-link">CCBRT Reation</a></li>
                                            <li class="nav-item"><a href="<?php echo e(route('language_knowledge.index')); ?>"
                                                    class="nav-link">Language</a> </li>

                                        </ul>
                                        <div class="tab-pane">
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <h4>CCBRT Policies</h4>
                                                    <div id="policy-container">
                                                        <!-- Display only one policy at a time -->
                                                        <?php if($policies->isNotEmpty()): ?>
                                                            <div class="policy-item">
                                                                <table class="table table-bordered">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <img src="<?php echo e(asset('assets/img/ccbrt.jpg')); ?>"
                                                                                    alt="CCBRT Logo" style="height: 50px;">
                                                                                <strong
                                                                                    id="policy-title"><?php echo e($policies[0]->title); ?></strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <?php echo $policies[0]->content; ?>

                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div class="mt-4">
                                                                    <p>
                                                                        <strong>Names:</strong>
                                                                        <span
                                                                            style="text-decoration: underline; margin-right: 20px;">
                                                                            <?php echo e($user->fname); ?> <?php echo e($user->lname); ?>

                                                                        </span>
                                                                        <strong>Signature:</strong>
                                                                        <?php if($user->signature): ?>
                                                                            <img src="data:image/png;base64,<?php echo e($user->signature); ?>"
                                                                                alt="User Signature"
                                                                                style="max-width: 40%; height: auto; margin-right: 20px;">
                                                                        <?php else: ?>
                                                                            <span
                                                                                style="text-decoration: underline; margin-right: 20px;">______________________________</span>
                                                                        <?php endif; ?>
                                                                        <strong>Date:</strong>
                                                                        <span style="text-decoration: underline;">
                                                                            <?php echo e($user->created_at->format('d-m-Y')); ?>

                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="mt-4">
                                                        <button id="prev-policy" class="btn btn-primary"
                                                            disabled>Back</button>
                                                        <button id="next-policy" class="btn btn-primary"
                                                            <?php echo e($policies->count() > 1 ? '' : 'disabled'); ?>>Next</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                let currentPolicyIndex = 0;
                                                const policies = <?php echo json_encode($policies, 15, 512) ?>;
                                                const totalPolicies = policies.length;
                                                const prevButton = document.getElementById('prev-policy');
                                                const nextButton = document.getElementById('next-policy');
                                                const policyContainer = document.getElementById('policy-container');

                                                function updatePolicy() {
                                                    if (totalPolicies > 0) {
                                                        const policy = policies[currentPolicyIndex];
                                                        policyContainer.innerHTML = `
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <img src="<?php echo e(asset('assets/img/ccbrt.jpg')); ?>" alt="CCBRT Logo" style="height: 50px;">
                                                                            <strong>${currentPolicyIndex + 1}. ${policy.title}</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            ${policy.content}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="mt-4">
                                                                <p>
                                                                    <strong>Names:</strong>
                                                                    <span style="text-decoration: underline; margin-right: 20px;">
                                                                        <?php echo e($user->fname); ?> <?php echo e($user->lname); ?>

                                                                    </span>
                                                                    <strong>Signature:</strong>
                                                                    <?php if($user->signature): ?>
                                                                        <img src="data:image/png;base64,<?php echo e($user->signature); ?>" alt="User Signature" style="max-width: 40%; height: auto; margin-right: 20px;">
                                                                    <?php else: ?>
                                                                        <span style="text-decoration: underline; margin-right: 20px;">______________________________</span>
                                                                    <?php endif; ?>
                                                                    <strong>Date:</strong>
                                                                    <span style="text-decoration: underline;">
                                                                        <?php echo e($user->created_at->format('d-m-Y')); ?>

                                                                    </span>
                                                                </p>
                                                            </div>
                                                        `;

                                                        prevButton.disabled = currentPolicyIndex === 0;
                                                        nextButton.disabled = currentPolicyIndex === totalPolicies - 1;
                                                    }
                                                }

                                                prevButton.addEventListener('click', function() {
                                                    if (currentPolicyIndex > 0) {
                                                        currentPolicyIndex--;
                                                        updatePolicy();
                                                    }
                                                });

                                                nextButton.addEventListener('click', function() {
                                                    if (currentPolicyIndex < totalPolicies - 1) {
                                                        currentPolicyIndex++;
                                                        updatePolicy();
                                                    }
                                                });

                                                updatePolicy(); // Initialize with the first policy
                                            });
                                        </script>



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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/policies/user.blade.php ENDPATH**/ ?>