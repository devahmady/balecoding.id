<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar"
                    class="nav-link nav-link-lg
                                collapse-btn"> <i
                        data-feather="align-justify"></i></a>
            </li>
            <li>
                <a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a>
            </li>
            <li>
                <a href="/" class="nav-link">
                    <button class="btn btn-info text-danger">
                        <i class="fas fa-home text-danger"></i> BACK TO HOME
                    </button>
                </a>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link nav-link-lg message-toggle"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                <span class="badge headerBadge1">
                    {{ auth()->user()->unreadNotifications()->count() }}</span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">

                    @foreach (auth()->user()->unreadNotifications as $notification)
                        <a href="#" class="dropdown-item">
                            <span class="dropdown-item-avatar text-white"> <img alt="image"
                                    src="assets/img/users/user-1.png" class="rounded-circle">
                            </span>
                            <span class="dropdown-item-desc">
                                <span class="message-user">
                                    {{ $notification->data['username'] }}
                                </span>
                                <span class="time messege-text">Mengomentari Postingan anda</span>
                                <span class="time">{{ $notification->created_at->diffForHumans() }}</span>

                            </span>


                        </a>
                    @endforeach
                </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                    src="{{ asset('assets') }}/img/icon.png" class="user-img-radious-style"> <span
                    class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">Welcome Back {{ Auth::user()->name }}</div>
                @can('admin')
                    <a href="/backend/user" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile
                    </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                        Activities
                    </a> <a href="/backend/user/create" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                        Settings
                    </a>
                @endcan
                <div class="dropdown-divider"></div>
                <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    {{ __('Logout') }} class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="/frontend/auth/logout" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
