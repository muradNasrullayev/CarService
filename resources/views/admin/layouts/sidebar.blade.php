<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>


    <!-- Nav Item - Carousels -->
    <li class="nav-item {{ request()->routeIs('admin.carousels.index','admin.carousels.create', 'admin.carousels.store',
            'admin.carousels.update','admin.carousels.show','admin.carousels.edit')? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.carousels.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Carousel</span>
        </a>
    </li>

    <!-- new Item Expert -->
    <li class="nav-item {{ request()->routeIs('admin.expert.index','admin.expert.create', 'admin.expert.store',
            'admin.expert.update','admin.expert.show','admin.expert.edit')? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.expert.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Expert</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.advantage.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Advantage</span></a>
    </li>

    <li class="nav-item  {{ request()->routeIs('admin.testimonial.index','admin.testimonial.create', 'admin.testimonial.store',
            'admin.testimonial.update','admin.testimonial.show','admin.testimonial.edit')? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.testimonial.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Testimonial</span>
        </a>
    </li>

        <li class="nav-item  {{ request()->routeIs('admin.contact.index','admin.contact.edit')? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.contact.index') }}">
    <i class="fas fa-fw fa-address-book"></i>
                <span>Contact</span>
            </a>
        </li>

        <li class="nav-item  {{ request()->routeIs('admin.setting.index','admin.setting.update')? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.setting.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span>
            </a>
        </li>



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
