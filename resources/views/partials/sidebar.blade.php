<style>
    /* Custom CSS for Blinking Badge */
    .badge-blink {
        animation: blink 1s infinite;
    }

    @keyframes blink {
        0%, 100% {
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
                {{-- Main Menu --}}

                {{-- Dashboard --}}
                {{-- @can('view dashboard')
                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span> Dashboard</span></a>
                    </li>
                @endcan --}}
                {{-- Dashboard --}}
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span> Dashboard</span></a>
                </li>


                {{-- Forms --}}
                {{-- @can('view forms')
                    <li class="submenu {{ request()->is('form*') ? 'active' : '' }}">
                        <a href="#"><i class="fas fa-file-alt"></i> <span> Forms</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="{{ request()->is('form*') ? 'display: block;' : '' }}">
                            @can('view ict access form')
                                <li><a href="{{ route('form.index') }}"
                                        class="{{ request()->routeIs('form.index') ? 'active' : '' }}">ICT Access Form</a></li>
                            @endcan
                            @can('view hr clearance form')
                                <li><a href="{{ route('hr.index') }}"
                                        class="{{ request()->routeIs('hr.index') ? 'active' : '' }}">HR Clearance and Exit
                                        Form</a></li>
                            @endcan
                            @can('view data security agreement')
                                <li><a href="{{ route('data.index') }}"
                                        class="{{ request()->routeIs('data.index') ? 'active' : '' }}">Data Security
                                        Agreement</a></li>
                            @endcan
                            @can('view change management')
                                <li><a href="{{ route('change.index') }}"
                                        class="{{ request()->routeIs('change.index') ? 'active' : '' }}">Change Management</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan --}}
                {{-- Forms --}}
                <li class="submenu {{ request()->is('form*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-file-alt"></i> <span> Forms</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('form*') ? 'display: block;' : '' }}">
                        {{-- Always display these links --}}
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
                        <li><a href="{{ route('card.index') }}"
                                class="{{ request()->routeIs('card.index') ? 'active' : '' }}">Id Card Request</a>
                        </li>

                        {{-- Display additional forms based on permissions --}}
                        {{-- @can('view forms')
                            @can('view ict access form')
                                <li><a href="{{ route('form.index') }}"
                                        class="{{ request()->routeIs('form.index') ? 'active' : '' }}">ICT Access Form</a></li>
                            @endcan
                            @can('view hr clearance form')
                                <li><a href="{{ route('hr.index') }}"
                                        class="{{ request()->routeIs('hr.index') ? 'active' : '' }}">HR Clearance and Exit
                                        Form</a></li>
                            @endcan
                            @can('view data security agreement')
                                <li><a href="{{ route('data.index') }}"
                                        class="{{ request()->routeIs('data.index') ? 'active' : '' }}">Data Security
                                        Agreement</a></li>
                            @endcan
                            @can('view change management')
                                <li><a href="{{ route('change.index') }}"
                                        class="{{ request()->routeIs('change.index') ? 'active' : '' }}">Change Management</a>
                                </li>
                            @endcan
                        @endcan --}}
                    </ul>
                </li>


                {{-- Requests --}}
                @can('view requests')
                    <li class="submenu {{ request()->is('request*') ? 'active' : '' }}">
                        <a href="#"><i class="fas fa-file-alt"></i> <span>Requests</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="{{ request()->is('request*') ? 'display: block;' : '' }}">
                            @can('view my requests')
                                <li><a href="{{ route('request.index') }}"
                                        class="{{ request()->routeIs('request.index') ? 'active' : '' }}">My Requests</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                {{-- Requests Approval --}}
                @can('approve requests')
                    <li class="{{ request()->routeIs('requestapprove.index') ? 'active' : '' }}">
                        <a href="{{ route('requestapprove.index') }}"><i class="fas fa-file-alt"></i> <span>Requests
                                Approval
                                @if(DB::table('work_flow_histories')->where('attended_by',Auth::user()->id)->where('status',0)->count() >0)
                                <span class="badge badge-pill badge-primary badge-blink">
                                    {{DB::table('work_flow_histories')->where('attended_by',Auth::user()->id)->where('status',0)->count()}}
                                </span>
                                @endif
                            </span> </a>
                    </li>
                @endcan




                {{-- Departments --}}
                @can('view departments')
                    <li class="{{ request()->routeIs('department.index') ? 'active' : '' }}">
                        <a href="{{ route('department.index') }}"><i class="fas fa-building"></i>
                            <span>Departments</span></a>
                    </li>
                @endcan

                {{-- NHIF --}}
                @can('view nhif')
                    <li class="{{ request()->routeIs('nhif.index') ? 'active' : '' }}">
                        <a href="{{ route('nhif.index') }}"><i class="fas fa-medkit"></i> <span>NHIF
                                Qualifications</span></a>
                    </li>
                @endcan

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
