<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
<!--begin::Sidebar Brand-->
<div class="sidebar-brand">
    <!--begin::Brand Link-->
    <a href="./index.html" class="brand-link">
    <!--begin::Brand Image-->
    <img
        src="{{asset('adminlte/assets/img/AdminLTELogo.png')}}"
        alt="AdminLTE Logo"
        class="brand-image opacity-75 shadow"
    />
    <!--end::Brand Image-->
    <!--begin::Brand Text-->
    <span class="brand-text fw-light">AdminPanel</span>
    <!--end::Brand Text-->
    </a>
    <!--end::Brand Link-->
</div>
<!--end::Sidebar Brand-->
<!--begin::Sidebar Wrapper-->
<div class="sidebar">
    <div class="sidebar-wrapper">
    <nav class="mt-2">
    <!--begin::Sidebar Menu-->
    <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="navigation"
        aria-label="Main navigation"
        data-accordion="false"
        id="navigation"
    >
        <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="nav-icon bi bi-speedometer"></i>
                <p>
                Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
        <a href="{{route('admin.companies.list')}}" class="nav-link {{ request()->routeIs('admin.companies.list') ? 'active' : '' }}">
            <i class="nav-icon bi bi-palette"></i>
            <p>Companies</p>
        </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.users.list')}}" class="nav-link {{ request()->routeIs('admin.users.list') ? 'active' : '' }}">
                <i class="nav-icon bi bi-box-seam-fill"></i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon bi bi-clipboard-fill"></i>
                <p>Skills</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon bi bi-tree-fill"></i>
                <p>Vacancies</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Applications</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon bi bi-table"></i>
                <p>Inquiries</p>
            </a>
        </li>
    </ul>
    <!--end::Sidebar Menu-->
    </nav>
</div>
<!--end::Sidebar Wrapper-->
</aside>