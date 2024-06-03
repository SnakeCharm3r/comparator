<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>CCBRT - EDOCs</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset ('assets/plugins/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset ('assets/plugins/feather/feather.css')}}">

    <link rel="stylesheet" href="{{asset ('assets/plugins/icons/flags/flags.css')}}">

    <link rel="stylesheet" href="{{asset ('assets/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- CSS2 -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('assets2/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/plugins/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/plugins/icons/flags/flags.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/plugins/select2/css/select2.min.css')}}">


</head>


<div class="header">

    <div class="header-left">

    </div>

    <div class="menu-toggle">
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>
    </div>

    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>


    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>


    <ul class="nav user-menu">


        <li class="nav-item dropdown noti-dropdown me-2">
            <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                <img src="assets/img/icons/header-icon-05.svg" alt="">
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">

                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-13.jpg">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Mercury Software Inc</span> added a new product <span class="noti-title">Apple MacBook Pro</span></p>
                                        <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>

        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list">
                <img src="assets/img/icons/header-icon-04.svg" alt="">
            </a>
        </li>

        <li class="nav-item dropdown has-arrow new-user-menus">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Soeng Souy">
                    <div class="user-text">
                    @if(Auth::check())
                            <h6>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h6>
                            <p class="text-muted mb-0">{{ Auth::user()->job_title }}</p>
                        @else
                            <h6>Guest</h6>
                            <p class="text-muted mb-0">Not logged in</p>
                        @endif
                    </div>
                </span>
            </a>
            <div class="dropdown-menu">
                @if(Auth::check())
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h6>
                            <p class="text-muted mb-0">{{ Auth::user()->job_title }}</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{route('profile')}}">My Profile</a>
                    <a class="dropdown-item" href="inbox.html">Inbox</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                @else
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                @endif
            </div>
        </li>

    </ul>

</div>