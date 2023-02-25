<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="{{asset('assets')}}/img/icon.png" class="header-logo" /> <span
                class="logo-name">CMS</span>
        </a>
    </div>
    <ul class="sidebar-menu">

        {{-- <li class="dropdown {{ Request::is('dashboard/home/index') ? 'active' : '' }}">
            <a href="/dashboard/home/index" "><i data-feather="monitor"></i><span>Home</span></a>
        </li> --}}
        <li class="dropdown ">
            <a href="/dashboard/forums/forum" class="menu-toggle nav-link">
                <i class="fas fa-book-open"></i><span>Form Diskus</span></a>
        </li>
        @can('admin')
            <li class="menu-header">Main</li>
            <li class="dropdown {{ Request::is('dashboard/home/index') ? 'active' : '' }}">
                <a href="/dashboard/home/index" "><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown ">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i class="fas fa-book-open"></i><span>Modul Berita</span></a>
                <ul class="dropdown-menu ">
                    <li><a class="nav-link " href="/dashboard/blog">Data Berita</a></li>
                    <li><a class="nav-link" href="/dashboard/category">Data Kategory</a></li>
                    <li><a class="nav-link" href="/dashboard/download">Data Download</a></li>
                </ul>
            </li>
            <li class="dropdown ">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i class="fas fa-book-open"></i><span>Support</span></a>
                <ul class="dropdown-menu ">
                    <li><a class="nav-link " href="/dashboard/support">Data Support</a></li>
                </ul>
            </li>
           
        @endcan

    </ul>
</aside>
