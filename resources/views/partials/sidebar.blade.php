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

                {{-- Dashboard --}}
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span> Dashboard</span></a>
                </li>
                <li class="submenu {{ request()->is('form*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-file-alt"></i> <span>Request Forms</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('form*') ? 'display: block;' : '' }}">
                        {{-- Always display these links --}}
                        <li><a href="{{ route('form.index') }}"
                                class="{{ request()->routeIs('form.index') ? 'active' : '' }}">ICT Access Form</a></li>

                        <li><a href="{{ route('clearance.index') }}"
                                class="{{ request()->routeIs('clearance.*') ? 'active' : '' }}">
                                Clearance Forms
                            </a></li>

                        {{-- <li><a href="{{ route('hr.index') }}"
                                class="{{ request()->routeIs('hr.index') ? 'active' : '' }}">Human Resouce Form</a></li> --}}
                        {{-- <li><a href="{{ route('data.index') }}"
                                class="{{ request()->routeIs('data.index') ? 'active' : '' }}">Data Security Form
                            </a></li> --}}
                        {{-- <li><a href="{{ route('change.index') }}"
                                class="{{ request()->routeIs('change.index') ? 'active' : '' }}">Change Request
                                Form</a>
                        </li> --}}
                        {{-- <li><a href="{{ route('card.index') }}"
                                class="{{ request()->routeIs('card.index') ? 'active' : '' }}">ID Card Request Form</a>
                        </li> --}}
                        {{-- <li><a href="{{ route('hslb.index') }}"
                                class="{{ request()->routeIs('hslb.index') ? 'active' : '' }}">HESLB</a>
                        </li> --}}
                    </ul>
                </li>


                {{-- Requests --}}
                @can('view requests')
                    <li class="submenu {{ request()->is('requests/*') ? 'active' : '' }}">
                        <a href="#"><i class="fas fa-tasks"></i> <span>User Requests</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="{{ request()->is('requests/*') ? 'display: block;' : '' }}">
                            @can('view my requests')
                                <li><a href="{{ route('request.index') }}"
                                        class="{{ request()->routeIs('request.index') ? 'active' : '' }}">My Requests</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan


                <li class="submenu {{ request()->is('announcements/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-bullhorn"></i> <span>Announcements</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('announcements/*') ? 'display: block;' : '' }}">
                        <li><a href="{{ route('announcements.index') }}"
                                class="{{ request()->routeIs('announcements.index') ? 'active' : '' }}">All
                                Announcements</a></li>
                    </ul>
                </li>




                {{-- Policies and SoPs --}}
                <li
                    class="treeview {{ request()->routeIs('policies.index') || request()->routeIs('sops.index') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-file-invoice"></i>
                        <span>Policies and SoPs</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul
                        style="{{ request()->routeIs('policies.index') || request()->routeIs('sops.index') ? 'display: block;' : '' }}">
                        <li>
                            <a href="{{ route('policies.index') }}"
                                class="{{ request()->routeIs('policies.index') ? 'active' : '' }}">
                                <span>Policies</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('sops.index') }}"
                                class="{{ request()->routeIs('sops.index') ? 'active' : '' }}">
                                <span>SoPs</span>
                            </a>
                        </li>
                    </ul>
                </li>


                @can('approve requests')
                    <li class="{{ request()->routeIs('requestapprove.index') ? 'active' : '' }}">
                        <a href="{{ route('requestapprove.index') }}">
                            <i class="fas fa-check"></i> <span>Approve User Requests
                                @if (DB::table('work_flow_histories')->where('attended_by', Auth::user()->id)->where('status', 0)->count() > 0)
                                    <span class="badge badge-pill badge-primary badge-blink">
                                        {{ DB::table('work_flow_histories')->where('attended_by', Auth::user()->id)->where('status', 0)->count() }}
                                    </span>
                                @endif
                            </span>
                        </a>
                    </li>
                @endcan

                <li
                    class="treeview {{ request()->routeIs('employee.index', 'signature.index', 'employee.details', 'users.signatures') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-user"></i>
                        <span>User Details</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul
                        style="{{ request()->routeIs('employee.index', 'signature.index', 'employee.details', 'users.signatures') ? 'display: block;' : '' }}">
                        <li>
                            <a href="{{ route('employee.index') }}"
                                class="{{ request()->routeIs('employee.index') ? 'active' : '' }}">
                                <span>Employee Details</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('signature.index') }}"
                                class="{{ request()->routeIs('signature.index') ? 'active' : '' }}">
                                <span>Create Signature</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.signatures') }}"
                                class="{{ request()->routeIs('users.signatures') ? 'active' : '' }}">
                                <span>Users Signatures</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li
                    class="treeview {{ request()->routeIs('vendors.index') || request()->routeIs('vendors.create') || request()->routeIs('vendors.show') || request()->routeIs('vendors.edit') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-briefcase"></i>
                        <span>Vendor Contracts</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul
                        style="{{ request()->routeIs('vendors.index') || request()->routeIs('vendors.create') || request()->routeIs('vendors.show') || request()->routeIs('vendors.edit') ? 'display: block;' : '' }}">
                        <li>
                            <a href="{{ route('vendors.index') }}"
                                class="{{ request()->routeIs('vendors.index') ? 'active' : '' }}">
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
                        style="{{ request()->routeIs('department.index') || request()->routeIs('nhif.index') || request()->routeIs('hmis.index') || request()->routeIs('remark.index') || request()->routeIs('privilege.index') || request()->routeIs('employment.index') ? 'display: block;' : '' }}">

                        @can('view departments')
                            <li class="{{ request()->routeIs('department.index') ? 'active' : '' }}">
                                <a href="{{ route('department.index') }}">
                                    <span>Departments</span>
                                </a>
                            </li>
                        @endcan
                        <li class="{{ request()->routeIs('job-titles.index') ? 'active' : '' }}">
                            <a href="{{ route('job_titles.index') }}">
                                <span>Job Titles</span>
                            </a>
                        </li>
                        @can('view nhif')
                            <li class="{{ request()->routeIs('nhif.index') ? 'active' : '' }}">
                                <a href="{{ route('nhif.index') }}">
                                    <span>NHIF Qualifications</span>
                                </a>
                            </li>
                        @endcan

                        @can('view hmis')
                            <li class="{{ request()->routeIs('hmis.index') ? 'active' : '' }}">
                                <a href="{{ route('hmis.index') }}">
                                    <span>HMIS Access</span>
                                </a>
                            </li>
                        @endcan

                        {{-- @can('view remarks')
                            <li class="{{ request()->routeIs('remark.index') ? 'active' : '' }}">
                                <a href="{{ route('remark.index') }}">
                                    <span>Remark</span>
                                </a>
                            </li>
                        @endcan --}}

                        @can('view user category')
                            <li class="{{ request()->routeIs('privilege.index') ? 'active' : '' }}">
                                <a href="{{ route('privilege.index') }}">
                                    <span>User Category</span>
                                </a>
                            </li>
                        @endcan

                        @can('view employment type')
                            <li class="{{ request()->routeIs('employment.index') ? 'active' : '' }}">
                                <a href="{{ route('employment.index') }}">
                                    <span>Employment Type</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>


                {{-- User Management --}}
                @role('super-admin|admin|it')
                    <li class="submenu {{ request()->is('user-management*') ? 'active' : '' }}">
                        <a href="#"><i class="fas fa-users-cog"></i> <span>User Management</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="{{ request()->is('user-management*') ? 'display: block;' : '' }}">
                            @can('assign roles')
                                <li><a href="{{ route('users.index') }}"
                                        class="{{ request()->routeIs('users.index') ? 'active' : '' }}">Assign Roles</a></li>
                            @endcan
                            @can('manage roles')
                                <li><a href="{{ route('role.index') }}"
                                        class="{{ request()->routeIs('role.index') ? 'active' : '' }}">Manage Roles</a></li>
                            @endcan
                            @can('manage permissions')
                                <li><a href="{{ route('permission.index') }}"
                                        class="{{ request()->routeIs('permission.index') ? 'active' : '' }}">Permission</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endrole

                {{-- Settings --}}
                @can('view settings')
                    <li class="submenu {{ request()->is('settings*') ? 'active' : '' }}">
                        <a href="#"><i class="fas fa-cog"></i> <span>Settings</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="{{ request()->is('settings*') ? 'display: block;' : '' }}">
                            @can('view logs')
                                <li><a href="#" class="{{ request()->routeIs('logs.index') ? 'active' : '' }}">User
                                        Activity Logs</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
