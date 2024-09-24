<div class="header">

    <div class="header-left">
        <a href="#" class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
        </a>
        <a href="#" class="logo logo-small">
            <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
        </a>
    </div>

    <div class="menu-toggle">
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars" style="background-color: #61ce70; padding: 12px; border-radius: 5px;"></i>
        </a>
    </div>

    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars" style="background-color: #61ce70; padding: 12px; border-radius: 5px;"></i>
    </a>
    <ul class="nav user-menu">
        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list">
                <img src="{{ asset('assets/img/icons/header-icon-04.svg') }}" alt="">
            </a>
        </li>

        <li class="nav-item dropdown has-arrow new-user-menus">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    @if (auth()->user()->profile_picture)
                        <img class="rounded-circle" src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                            width="31" alt="Soeng Souy">
                    @else
                        <img class="rounded-circle" src="{{ asset('assets/img/icon.png') }}" alt="Default User Icon"
                            style="max-width: 160px; height: 38px; padding: 1px; object-fit: cover;">
                    @endif
                    <div class="user-text">
                        @if (Auth::check())
                            <h6>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h6>
                            <p class="text-muted mb-0">{{ Auth::user()->jobTitle ? Auth::user()->jobTitle->job_title : 'No job title' }}</p>
                        @else
                            <h6>Guest</h6>
                            <p class="text-muted mb-0">Not logged in</p>
                        @endif
                    </div>

                </span>
            </a>
            <div class="dropdown-menu">
                @if (Auth::check())
                    <a class="dropdown-item" href="{{ route('profile.index') }}">My Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                @else
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                @endif
            </div>
        </li>

    </ul>
</div>
