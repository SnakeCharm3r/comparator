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
                        <li><a href="{{ route('hr.index') }}"
                                class="{{ request()->routeIs('hr.index') ? 'active' : '' }}">Human Resouce Form</a></li>
                        <li><a href="{{ route('data.index') }}"
                                class="{{ request()->routeIs('data.index') ? 'active' : '' }}">Data Security Form
                            </a></li>
                        <li><a href="{{ route('change.index') }}"
                                class="{{ request()->routeIs('change.index') ? 'active' : '' }}">Change Request
                                Form</a>
                        </li>
                        <li><a href="{{ route('card.index') }}"
                                class="{{ request()->routeIs('card.index') ? 'active' : '' }}">ID Card Request Form</a>
                        </li>
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


                @can('view my requests')
                    <li class="{{ request()->routeIs('policies.index') ? 'active' : '' }}">
                        <a href="{{ route('policies.index') }}"><i class="fas fa-file-invoice"></i>
                            <span>Policies and SoPs</span>
                        </a>
                    </li>
                @endcan

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


                {{-- Departments --}}
                @can('view departments')
                    <li class="{{ request()->routeIs('department.index') ? 'active' : '' }}">
                        <a href="{{ route('department.index') }}"><i class="fas fa-building"></i>
                            <span>Departments</span></a>
                    </li>
                @endcan
                {{-- Users --}}
                {{-- @can('view users')
                <li class="{{ request()->routeIs('viewuser.index') ? 'active' : '' }}">
                    <a href="{{ route('viewuser.index') }}"><i class="fas fa-users"></i>
                        <span>Users</span></a>
                </li>
                @endcan --}}


                {{-- NHIF --}}
                @can('view nhif')
                    <li class="{{ request()->routeIs('nhif.index') ? 'active' : '' }}">
                        <a href="{{ route('nhif.index') }}"><i class="fas fa-medkit"></i> <span>NHIF
                                Qualifications</span></a>
                    </li>
                @endcan

                <li
                    class="treeview {{ request()->routeIs('employee.index') || request()->routeIs('signature.index') || request()->routeIs('employee.details') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-user"></i>
                        <span>User Details</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul
                        style="{{ request()->routeIs('employee.index') || request()->routeIs('signature.index') || request()->routeIs('employee.details') ? 'display: block;' : '' }}">
                        <li>
                            <a href="{{ route('employee.index') }}"
                                class="{{ request()->routeIs('employee.index') ? 'active' : '' }}">
                                <span>Employee Details</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('signature.index') }}"
                                class="{{ request()->routeIs('signature.index') ? 'active' : '' }}">
                                <span>User Signature</span>
                            </a>
                        </li>
                    </ul>
                </li>


                {{-- HMIS --}}
                @can('view hmis')
                    <li class="{{ request()->routeIs('hmis.index') ? 'active' : '' }}">
                        <a href="{{ route('hmis.index') }}"><i class="fas fa-user-md"></i> <span>HMIS Access</span></a>
                    </li>
                @endcan

                {{-- Remarks --}}
                @can('view remarks')
                    <li class="{{ request()->routeIs('remark.index') ? 'active' : '' }}">
                        <a href="{{ route('remark.index') }}"><i class="fas fa-comments"></i> <span>Remark</span></a>
                    </li>
                @endcan

                {{-- User Category --}}
                @can('view user category')
                    <li class="{{ request()->routeIs('privilege.index') ? 'active' : '' }}">
                        <a href="{{ route('privilege.index') }}"><i class="fas fa-user-shield"></i> <span>User
                                Category</span></a>
                    </li>
                @endcan

                {{-- Employment Type --}}
                @can('view employment type')
                    <li class="{{ request()->routeIs('employment.index') ? 'active' : '' }}">
                        <a href="{{ route('employment.index') }}"><i class="fas fa-briefcase"></i> <span>Employment
                                Type</span></a>
                    </li>
                @endcan

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
