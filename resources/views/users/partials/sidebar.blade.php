<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">Magicians</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.dashboard') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('data.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">My info</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('payrolls.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">My payrols</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
