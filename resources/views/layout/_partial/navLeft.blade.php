<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        @php
            $currentRoute = request()->segment(1) ?? 'dashboard';
        @endphp
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if($currentRoute && $currentRoute == 'dashboard') active @endif"  aria-current="page" href="/">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($currentRoute && $currentRoute == 'students') active @endif" href="/students">
                    <span data-feather="file"></span>
                    Students
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($currentRoute && $currentRoute == 'products') active @endif" href="/products">
                    <span data-feather="file"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($currentRoute && $currentRoute == 'departments') active @endif" href="/departments">
                    <span data-feather="file"></span>
                    Departments
                </a>
            </li>
        </ul>
    </div>
</nav>
