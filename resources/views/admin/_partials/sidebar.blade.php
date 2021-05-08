<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if (route('admin.dashboard') === $currentUrl) active @endif">
        <a class="nav-link py-2" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span>
        </a>
    </li>

    {{-- Content Management --}}
    @if ($loggedUser->hasAnyPermission(['posts.browse', 'pages.browse']))
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Content Management') }}
        </div>

        <!-- Nav Item -->
        <li class="nav-item">
            <a class="nav-link py-2" href="charts.html">
                <i class="fas fa-fw fa-thumbtack"></i>
                <span>{{ __('Posts') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item">
            <a class="nav-link py-2" href="charts.html">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>{{ __('Pages') }}</span>
            </a>
        </li>
    @endif

    {{-- Administration --}}
    @if ($loggedUser->hasAnyPermission(['users.browse', 'roles.browse']))
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Administration') }}
        </div>

        <!-- Nav Item -->
        @if ($loggedUser->can('users.browse'))
        <li class="nav-item @if (route('admin.users.index') === $currentUrl) active @endif">
            <a class="nav-link py-2" href="{{ route('admin.users.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>{{ __('Users Management') }}</span>
            </a>
        </li>
        @endif

        <!-- Nav Item -->
        @if ($loggedUser->can('roles.browse'))
        <li class="nav-item @if (route('admin.roles.index') === $currentUrl) active @endif">
            <a class="nav-link py-2" href="{{ route('admin.roles.index') }}">
                <i class="fas fa-fw fa-user-tag"></i>
                <span>{{ __('Roles Management') }}</span>
            </a>
        </li>
        @endif

    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>