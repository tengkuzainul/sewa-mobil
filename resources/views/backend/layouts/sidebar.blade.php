<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('home') ? 'active' : 'collapsed' }}" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-award-fill"></i></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ request()->is('cars') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('cars') }}" class="{{ request()->is('cars') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Cars</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            <a class="nav-link {{ request()->is('massage') ? 'active' : 'collapsed' }}" href="{{ route('massage') }}">
                <i class="bi bi-chat-left-dots-fill"></i>
                <span>Massage</span>
            </a>
        </li>
    </ul>

</aside>
