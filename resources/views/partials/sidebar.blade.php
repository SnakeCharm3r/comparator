<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="submenu active">
                    <a href="{{ route('dashboard') }}"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="feather-grid"></i> <span> Forms</span> <span class="menu-arrow active"></span></a>
                    <ul>
                        <li><a href="{{ route('form.index') }}">ICT Access Form</a></li>
                        <li><a href="{{ route('hr.index') }}">HR</a></li>
                        <li><a href="{{ route('form.index') }}">Clearance Form</a></li>
                    </ul>
                </li>


                <li><a href="{{ route('department.index') }}"><i class="feather-grid"></i> <span> Departments</span></a></li>
                <li><a href="{{ route('nhif.index') }}"><i class="feather-grid"></i> <span> NHIF Qualifications</span></a></li>
                <li><a href="{{ route('hmis.index') }}"><i class="feather-grid"></i> <span> MHIS Access</span></a></li>
                <li><a href="{{ route('remark.index') }}"><i class="feather-grid"></i> <span> Remark</span></a></li>
                <li><a href="{{ route('privilege.index') }}"><i class="feather-grid"></i> <span> Privilege level</span></a></li>
                <li><a href="{{ route('employment.index') }}"><i class="feather-grid"></i> <span>Employment Type</span></a></li>




                <li class="submenu">
                    <a href="#"><i class="feather-grid"></i> <span> User Management</span> <span class="menu-arrow active"></span></a>
                    <ul>
                        <li><a href="{{ route('form.index') }}">Add New User</a></li>
                        <li><a href="{{ route('form.index') }}"> Manage User Roles</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fas fa-cog"></i> <span>Settings</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('form.index') }}"> User Activity Logs</a></li>
                    </ul>
                </li>
                @endunless
                
                
            </ul>
        </div>
    </div>
</div>
