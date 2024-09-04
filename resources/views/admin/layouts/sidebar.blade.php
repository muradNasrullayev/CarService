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

    <!-- Nav Item - Service -->
    <li class="nav-item {{ request()->routeIs('admin.service.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.service.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data-fill" viewBox="0 0 16 16">
                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>
            </svg>
            <span>Service</span>
        </a>
    </li>


    <li class="nav-item {{ request()->routeIs('admin.client') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.client') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
            </svg>
            <span>Clients</span>
        </a>
    </li>


    {{--    <li class="nav-item  {{ request()->routeIs('admin.contacts.index','admin.contacts.create', 'admin.contacts.store',--}}
    {{--            'admin.contacts.update','admin.contacts.show','admin.contacts.edit')? 'active' : '' }}">--}}
    {{--        <a class="nav-link" href="{{ route('admin.contacts.index') }}">--}}
    {{--            <i class="fas fa-fw fa-chart-area"></i>--}}
    {{--            <span>Contact</span>--}}
    {{--        </a>--}}
    {{--    </li>--}}

    {{--    <li class="nav-item  {{ request()->routeIs('admin.settings.index','admin.settings.create', 'admin.settings.store',--}}
    {{--            'admin.settings.update','admin.settings.show','admin.settings.edit')? 'active' : '' }}">--}}
    {{--        <a class="nav-link" href="{{ route('admin.settings.index') }}">--}}
    {{--            <i class="fas fa-fw fa-chart-area"></i>--}}
    {{--            <span>Setting</span>--}}
    {{--        </a>--}}
    {{--    </li>--}}
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

    <!-- Nav Item - Clients -->


</ul>
<!-- End of Sidebar -->
