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


        <!-- CMS -->
        <div class="sidebar-heading">
            CMS
        </div>

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagess"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-calendar-plus"></i>
            <span>Upcomming Album</span>
        </a>
        <div id="collapsePagess" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="">
                <ul>
                    <a class="collapse-item text-white ml-8" style="text-decoration: none; " href="{{ route('upcomming.album.index') }}">Upcomming Album</a>
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



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Settings -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span>
        </a>
        <div id="collapsePages" style="background-color: bisque; border-radius: 10px;" class="collapse"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('logins') }}">Login</a>
                <a class="collapse-item" href="{{ route('registers') }}">Register</a>
                <a class="collapse-item" href="{{ route('forgetpass') }}">Forgot Password</a>
                <a class="collapse-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
