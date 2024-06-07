<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="submenu active">
                    <a href="#"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="feather-grid"></i> <span> User Management</span> <span
                            class="menu-arrow active"></span></a>
                    <ul>
                        <li><a href="{{ route('form.index') }}" class="">ICT Access Form</a></li>
                        <li><a href="{{ route('form.index') }}">Add New User</a></li>
                        <li><a href="{{ route('form.index') }}"> Manage User Roles</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="settings.html"><i class="fas fa-cog"></i> <span>Settings</span><span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('form.index') }}"> User Activity Logs</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>