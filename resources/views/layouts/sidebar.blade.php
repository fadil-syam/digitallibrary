<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Perpustakaan Digital</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ ($active === "home") ? 'active' : ''}}">
        <a class="nav-link" href="/">
            <i class="bi bi-house-door-fill"></i>
            <span>Home</span>
        </a>
    </li>
    <li class="nav-item {{ ($active === "categories") ? 'active' : ''}}">
        <a class="nav-link" href="/categories">
            <i class="bi bi-filter-circle-fill"></i>
            <span>Categori Buku</span></a>
    </li>
    <li class="nav-item {{ ($active === "borrows") ? 'active' : ''}}">
        <a class="nav-link" href="/borrows">
            <i class="bi bi-book-fill"></i>
            <span>Pinjaman Saya</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="bi bi-chat-left-dots-fill"></i>
            <span>Ulasan Saya</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dropdown Divider -->
    <div class="dropdown-divider"></div>

    <!-- Nav Item - Create -->
    <li class="nav-item {{ ($active === "create") ? 'active' : ''}}">
        <a class="nav-link" href="/create">
            <i class="fas fa-fw fa-plus"></i>
            <span>Data Buku</span>
        </a>
    </li>

    <!-- Nav Item - Rekap -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="bi bi-arrow-down"></i>
            <span>Rekap</span>
        </a>
    </li>

</ul>

