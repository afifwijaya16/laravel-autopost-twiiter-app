<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
    <i class="fa fa-home nav-icon text-dark"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('post.index') }}" class="nav-link {{ request()->is('post') ? 'active' : '' }}">
    <i class="fas fa-th nav-icon text-dark"></i>
        <p>Post</p>
    </a>
</li>