<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Carousels -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.carousels.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Carousel</span></a>
    </li>

    <!-- new Item Expert -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.expert.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Expert</span></a>
    </li>

    <!-- new Item Testimonial -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.testimonial.index')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Testimonial</span></a>
    </li>

    <!-- new Item Advantages -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.advantage.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Advantage</span></a>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
