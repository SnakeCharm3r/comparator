@extends('nav.app')

@section('content')

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                  
                </li>
                <li class="submenu active">
                    <a href="#"><i class="fas fa-graduation-cap"></i> <span> Forms</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="students.html">Change Request Form</a></li>
                        <li><a href="student-details.html">ICT Access Form</a></li>
                        <li><a href="add-student.html" class="active">Change Management Form</a></li>
                        <li><a href="edit-student.html">HR Clearance and Exit Form</a></li>
                    </ul>
                </li>
  
        </div>
    </div>
</div>

@endsection