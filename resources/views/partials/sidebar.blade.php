<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                {{-- <li class="menu-title">
                    <span>Main Menu</span>
                </li> --}}
                @can('view dashboard')
                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span> Dashboard</span></a>
                    </li>
                @endcan

                @can('view forms')
                    <li class="submenu {{ request()->is('form*') ? 'active' : '' }}">
                        <a href="#"><i class="fas fa-file-alt"></i> <span> Forms</span> <span
                                class="menu-arrow {{ request()->is('form*') ? 'active' : '' }}"></span></a>
                        <ul style="{{ request()->is('form*') ? 'display: block;' : '' }}">

                            <li><a href="{{ route('form.index') }}"
                                    class="{{ request()->routeIs('form.index') ? 'active' : '' }}">ICT Access Form</a></li>

                            <li><a href="{{ route('hr.index') }}"
                                    class="{{ request()->routeIs('hr.index') ? 'active' : '' }}">HR Clearance and Exit
                                    Form</a></li>

                            <li><a href="{{ route('data.index') }}"
                                    class="{{ request()->routeIs('data.index') ? 'active' : '' }}">Data Security
                                    Agreement</a></li>

                            <li><a href="{{ route('change.index') }}"
                                    class="{{ request()->routeIs('change.index') ? 'active' : '' }}">Change Management</a>
                            </li>

                        </ul>
                    </li>
                @endcan

                @can('view requests')
                    <li class="submenu {{ request()->is('request*') ? 'active' : '' }}">
                        <a href="#"><i class="fas fa-file-alt"></i> <span>Requests</span> <span
                                class="menu-arrow {{ request()->is('request*') ? 'active' : '' }}"></span></a>
                        <ul style="{{ request()->is('request*') ? 'display: block;' : '' }}">    
                     <li><a href="{{ route('request.index') }}"
                                        class="{{ request()->routeIs('request.index') ? 'active' : '' }}">My Requests</a></li>
                     <li><a href="{{ route('requestapprove.index') }}"
                    class="{{ request()->routeIs('requestapprove.index') ? 'active' : '' }}">Requests Approval</a></li>
                        </ul>
                    </li>
                @endcan

                @can('view departments')
                    <li class="{{ request()->routeIs('department.index') ? 'active' : '' }}">
                        <a href="{{ route('department.index') }}"><i class="fas fa-building"></i> <span>
                                Departments</span></a>
                    </li>
                @endcan

                @can('view nhif')
                    <li class="{{ request()->routeIs('nhif.index') ? 'active' : '' }}">
                        <a href="{{ route('nhif.index') }}"><i class="fas fa-medkit"></i> <span> NHIF
                                Qualifications</span></a>
                    </li>
                @endcan

                @can('view hmis')
                    <li class="{{ request()->routeIs('hmis.index') ? 'active' : '' }}">
                        <a href="{{ route('hmis.index') }}"><i class="fas fa-user-md"></i> <span> HMIS Access</span></a>
                    </li>
                @endcan

                @can('view remarks')
                    <li class="{{ request()->routeIs('remark.index') ? 'active' : '' }}">
                        <a href="{{ route('remark.index') }}"><i class="fas fa-comments"></i> <span> Remark</span></a>
                    </li>
                @endcan

                @can('view user category')
                    <li class="{{ request()->routeIs('privilege.index') ? 'active' : '' }}">
                        <a href="{{ route('privilege.index') }}"><i class="fas fa-user-shield"></i> <span> User
                                Category</span></a>
                    </li>
                @endcan

                @can('view employment type')
                    <li class="{{ request()->routeIs('employment.index') ? 'active' : '' }}">
                        <a href="{{ route('employment.index') }}"><i class="fas fa-briefcase"></i> <span> Employment
                                Type</span></a>
                    </li>
                @endcan

                @role('super-admin|admin|hr|it|line-manager|acting-line-manager')
                    <li class="submenu {{ request()->is('user-management*') ? 'active' : '' }}">
                        <a href="#"><i class="fas fa-users-cog"></i> <span> User Management</span> <span
                                class="menu-arrow {{ request()->is('user-management*') ? 'active' : '' }}"></span></a>
                        <ul style="{{ request()->is('user-management*') ? 'display: block;' : '' }}">
                            @can('assign roles')
                                <li>
                                    <a href="{{ route('users.index') }}"
                                        class="{{ request()->routeIs('users.index') ? 'active' : '' }}">Assign Roles</a>
                                </li>
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

                @can('view settings')
                    <li class="submenu {{ request()->is('settings*') ? 'active' : '' }}">
                        <a href="#"><i class="fas fa-cog"></i> <span> Settings</span> <span
                                class="menu-arrow {{ request()->is('settings*') ? 'active' : '' }}"></span></a>
                        <ul style="{{ request()->is('settings*') ? 'display: block;' : '' }}">
                            @can('view logs')
                                <li><a href="#" class="{{ request()->routeIs('logs.index') ? 'active' : '' }}">User
                                        Activity Logs</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
