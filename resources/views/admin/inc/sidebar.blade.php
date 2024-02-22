<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>
            
                <li class="{{ request()->is('admin') ? 'mm-active' : '' }}">
                    <a href="/admin/" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>{{ __('common.title.dashboard') }}</span>
                    </a>
                </li>
            
                @if (Auth::user()->isAdmin())
                <li class="menu-title">{{ __('common.title.institution') }}</li>
            
                <li class="{{ request()->is('admin/rooms/*') ? 'mm-active' : '' }}">
                    <a href="/admin/rooms" class="waves-effect">
                        <i class="fas fa-door-closed"></i>
                        <span>{{ __('common.title.rooms') }}</span>
                    </a>
                </li>
                @endif
            </ul>
            
        </div>
        <!-- Sidebar -->
    </div>
</div>