<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link bg-primary">
        <img src="https://www.unukaltim.ac.id/wp-content/uploads/2019/12/logo-twitter-png-47448.png?w=640" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Autopost</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                @include('templateAdminLTE.sidebar.admin')
            </ul>
        </nav>
    </div>
</aside>
