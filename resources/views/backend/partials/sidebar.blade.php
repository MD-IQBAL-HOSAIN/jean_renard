@push('style')
    <style>
        .nav-item a {
            font-size: 16px;
            font-weight: 500;
            color: #333;
            /* Dark text color */
            padding: 10px 15px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .nav-item a:hover {
            background-color: #f8f9fa;
            /* Light background on hover */
            color: #007bff;
            /* Blue text on hover */
        }

        .collapse-item {
            display: flex;
            align-items: center;
            padding: 8px 0;
        }

        .collapse-item i {
            color: #007bff;
            /* Icon color */
        }

        /* Spacing for list items inside collapse */
        .collapse-inner ul li {
            margin-bottom: 10px;
        }
    </style>
@endpush

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('adminDashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('adminDashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>


        <!-- CMS Section -->
        <div class="sidebar-heading text-uppercase text-muted">
            CMS
        </div>

    <li class="nav-item">
        <a class="nav-link collapsed d-flex align-items-center" href="#" data-bs-toggle="collapse"
            data-bs-target="#collapseCms" aria-expanded="false" aria-controls="collapseCms">
            <i class="fas fa-fw fa-calendar-plus me-2"></i> <!-- Calendar icon for Upcoming Album -->
            <span>Upcoming Album</span>
        </a>

        <!-- Collapse Content -->
        <div id="collapseCms" class="collapse" aria-labelledby="headingCms" data-bs-parent="#accordionSidebar">
            <div class="collapse-inner">
                <ul class="list-unstyled ms-4">
                    <li>
                        <a class="collapse-item text-dark d-flex align-items-center"
                            href="{{ route('upcomming.album.index') }}">
                            <i class="fas fa-fw fa-calendar-day me-2"></i>Upcoming Album
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    {{-- post start --}}
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('posts.index') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Posts</span></a>
    </li>

    {{-- Captative moment start --}}
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('captivating.index') }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Captative moment</span></a>
    </li>

    {{-- Album start --}}
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('album.index') }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Albums</span></a>
    </li>
    {{-- Contacts start --}}
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('contacts.index') }}">
            <i class="fas fa-fw fa-phone"></i>
            <span>Contacts</span></a>
    </li>
    {{-- Blog start --}}
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('blog.index') }}">
            <i class="fas fa-fw fa-blog"></i>
            <span>Blog</span></a>
    </li>

    <!-- Sidebar Section for Settings -->
    <div class="sidebar-heading text-uppercase text-muted">
        Settings
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed d-flex align-items-center" href="#" data-bs-toggle="collapse"
            data-bs-target="#collapseSettings" aria-expanded="false" aria-controls="collapseSettings">
            <i class="fas fa-fw fa-cogs me-2"></i> <!-- Gear icon for Settings -->
            <span>Settings</span>
        </a>

        <!-- Collapse Content -->
        <div id="collapseSettings" class="collapse" aria-labelledby="headingSettings" data-parent="#accordionSidebar">
            <div class="collapse-inner">
                <ul class="list-unstyled ms-4">
                    <li>
                        <a class="collapse-item text-dark" href="{{ route('system.index') }}">
                            <i class="fas fa-fw fa-sliders-h me-2"></i>System Settings
                        </a>
                    </li>
                    <li>
                        <a class="collapse-item text-dark" href="{{ route('logins') }}">
                            <i class="fas fa-fw fa-sign-in-alt me-2"></i>Login
                        </a>
                    </li>
                    <li>
                        <a class="collapse-item text-dark" href="{{ route('registers') }}">
                            <i class="fas fa-fw fa-user-plus me-2"></i>Register
                        </a>
                    </li>
                    <li>
                        <a class="collapse-item text-dark" href="{{ route('forgetpass') }}">
                            <i class="fas fa-fw fa-key me-2"></i>Forgot Password
                        </a>
                    </li>
                    <li>
                        <a class="collapse-item text-dark" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-fw fa-sign-out-alt me-2"></i>Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<!-- End of Sidebar -->
