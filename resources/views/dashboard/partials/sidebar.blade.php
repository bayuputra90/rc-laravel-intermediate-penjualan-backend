<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">AdminKit</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item @if(request()->is('/*')) active @endif">
                <a class="sidebar-link" href="{{ url('/') }}">
                    <i class="align-middle" data-feather="home"></i>
                    <span class="align-middle">Home</span>
                </a>
            </li>

            <li class="sidebar-header">
                Management
            </li>
            <li class="sidebar-item @if(request()->is('user*')) active @endif">
                <a class="sidebar-link" href="{{ route('user.index') }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">User</span>
                </a>
            </li>

            <li class="sidebar-header">
                Data
            </li>
            <li class="sidebar-item @if(request()->is('product*')) active @endif">
                <a class="sidebar-link" href="{{ url('product') }}">
                    <i class="align-middle" data-feather="package"></i>
                    <span class="align-middle">Product</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
