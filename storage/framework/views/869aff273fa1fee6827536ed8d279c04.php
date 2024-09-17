<style>
    /* Custom CSS for Blinking Badge */
    .badge-blink {
        animation: blink 1s infinite;
    }

    @keyframes blink {

        0%,
        100% {
            opacity: 1;
            background-color: #ff5733;
        }

        50% {
            opacity: 0;
            background-color: #ff0000;
        }
    }
</style>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                
                <li class="<?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-tachometer-alt"></i> <span> Dashboard</span></a>
                </li>
                <li class="submenu <?php echo e(request()->is('form*') ? 'active' : ''); ?>">
                    <a href="#"><i class="fas fa-file-alt"></i> <span>Request Forms</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="<?php echo e(request()->is('form*') ? 'display: block;' : ''); ?>">
                        
                        <li><a href="<?php echo e(route('form.index')); ?>"
                                class="<?php echo e(request()->routeIs('form.index') ? 'active' : ''); ?>">ICT Access Form</a></li>

                        <li><a href="<?php echo e(route('clearance.index')); ?>"
                                class="<?php echo e(request()->routeIs('clearance.*') ? 'active' : ''); ?>">
                                Clearance Forms
                            </a></li>

                        
                        
                        
                        
                        
                    </ul>
                </li>


                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view requests')): ?>
                    <li class="submenu <?php echo e(request()->is('requests/*') ? 'active' : ''); ?>">
                        <a href="#"><i class="fas fa-tasks"></i> <span>User Requests</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="<?php echo e(request()->is('requests/*') ? 'display: block;' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view my requests')): ?>
                                <li><a href="<?php echo e(route('request.index')); ?>"
                                        class="<?php echo e(request()->routeIs('request.index') ? 'active' : ''); ?>">My Requests</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>


                <li class="submenu <?php echo e(request()->is('announcements/*') ? 'active' : ''); ?>">
                    <a href="#"><i class="fas fa-bullhorn"></i> <span>Announcements</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="<?php echo e(request()->is('announcements/*') ? 'display: block;' : ''); ?>">
                        <li><a href="<?php echo e(route('announcements.index')); ?>"
                                class="<?php echo e(request()->routeIs('announcements.index') ? 'active' : ''); ?>">All
                                Announcements</a></li>
                    </ul>
                </li>




                
                <li
                    class="treeview <?php echo e(request()->routeIs('policies.index') || request()->routeIs('sops.index') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fas fa-file-invoice"></i>
                        <span>Policies and SoPs</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul
                        style="<?php echo e(request()->routeIs('policies.index') || request()->routeIs('sops.index') ? 'display: block;' : ''); ?>">
                        <li>
                            <a href="<?php echo e(route('policies.index')); ?>"
                                class="<?php echo e(request()->routeIs('policies.index') ? 'active' : ''); ?>">
                                <span>Policies</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('sops.index')); ?>"
                                class="<?php echo e(request()->routeIs('sops.index') ? 'active' : ''); ?>">
                                <span>SoPs</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve requests')): ?>
                    <li class="<?php echo e(request()->routeIs('requestapprove.index') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('requestapprove.index')); ?>">
                            <i class="fas fa-check"></i> <span>Approve User Requests
                                <?php if(DB::table('work_flow_histories')->where('attended_by', Auth::user()->id)->where('status', 0)->count() > 0): ?>
                                    <span class="badge badge-pill badge-primary badge-blink">
                                        <?php echo e(DB::table('work_flow_histories')->where('attended_by', Auth::user()->id)->where('status', 0)->count()); ?>

                                    </span>
                                <?php endif; ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>

                <li
                    class="treeview <?php echo e(request()->routeIs('employee.index', 'signature.index', 'employee.details', 'users.signatures') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fas fa-user"></i>
                        <span>User Details</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul
                        style="<?php echo e(request()->routeIs('employee.index', 'signature.index', 'employee.details', 'users.signatures') ? 'display: block;' : ''); ?>">
                        <li>
                            <a href="<?php echo e(route('employee.index')); ?>"
                                class="<?php echo e(request()->routeIs('employee.index') ? 'active' : ''); ?>">
                                <span>Employee Details</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('signature.index')); ?>"
                                class="<?php echo e(request()->routeIs('signature.index') ? 'active' : ''); ?>">
                                <span>Create Signature</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('users.signatures')); ?>"
                                class="<?php echo e(request()->routeIs('users.signatures') ? 'active' : ''); ?>">
                                <span>Users Signatures</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li
                    class="treeview <?php echo e(request()->routeIs('vendors.index') || request()->routeIs('vendors.create') || request()->routeIs('vendors.show') || request()->routeIs('vendors.edit') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fas fa-briefcase"></i>
                        <span>Vendor Contracts</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul
                        style="<?php echo e(request()->routeIs('vendors.index') || request()->routeIs('vendors.create') || request()->routeIs('vendors.show') || request()->routeIs('vendors.edit') ? 'display: block;' : ''); ?>">
                        <li>
                            <a href="<?php echo e(route('vendors.index')); ?>"
                                class="<?php echo e(request()->routeIs('vendors.index') ? 'active' : ''); ?>">
                                <span>Vendor List</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Category Management -->
                <li class="treeview">
                    <a href="#">
                        <i class="fas fa-tasks"></i>
                        <span>Manage Category</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul
                        style="<?php echo e(request()->routeIs('department.index') || request()->routeIs('nhif.index') || request()->routeIs('hmis.index') || request()->routeIs('remark.index') || request()->routeIs('privilege.index') || request()->routeIs('employment.index') ? 'display: block;' : ''); ?>">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view departments')): ?>
                            <li class="<?php echo e(request()->routeIs('department.index') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('department.index')); ?>">
                                    <span>Departments</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="<?php echo e(request()->routeIs('job-titles.index') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('job_titles.index')); ?>">
                                <span>Job Titles</span>
                            </a>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view nhif')): ?>
                            <li class="<?php echo e(request()->routeIs('nhif.index') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('nhif.index')); ?>">
                                    <span>NHIF Qualifications</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view hmis')): ?>
                            <li class="<?php echo e(request()->routeIs('hmis.index') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('hmis.index')); ?>">
                                    <span>HMIS Access</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view user category')): ?>
                            <li class="<?php echo e(request()->routeIs('privilege.index') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('privilege.index')); ?>">
                                    <span>User Category</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view employment type')): ?>
                            <li class="<?php echo e(request()->routeIs('employment.index') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('employment.index')); ?>">
                                    <span>Employment Type</span>
                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>


                
                <?php if (\Illuminate\Support\Facades\Blade::check('role', 'super-admin|admin|it')): ?>
                    <li class="submenu <?php echo e(request()->is('user-management*') ? 'active' : ''); ?>">
                        <a href="#"><i class="fas fa-users-cog"></i> <span>User Management</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="<?php echo e(request()->is('user-management*') ? 'display: block;' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign roles')): ?>
                                <li><a href="<?php echo e(route('users.index')); ?>"
                                        class="<?php echo e(request()->routeIs('users.index') ? 'active' : ''); ?>">Assign Roles</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage roles')): ?>
                                <li><a href="<?php echo e(route('role.index')); ?>"
                                        class="<?php echo e(request()->routeIs('role.index') ? 'active' : ''); ?>">Manage Roles</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage permissions')): ?>
                                <li><a href="<?php echo e(route('permission.index')); ?>"
                                        class="<?php echo e(request()->routeIs('permission.index') ? 'active' : ''); ?>">Permission</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view settings')): ?>
                    <li class="submenu <?php echo e(request()->is('settings*') ? 'active' : ''); ?>">
                        <a href="#"><i class="fas fa-cog"></i> <span>Settings</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="<?php echo e(request()->is('settings*') ? 'display: block;' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view logs')): ?>
                                <li><a href="#" class="<?php echo e(request()->routeIs('logs.index') ? 'active' : ''); ?>">User
                                        Activity Logs</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH D:\Projects\E-docs\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>