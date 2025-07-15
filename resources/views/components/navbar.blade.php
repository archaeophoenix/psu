<nav class="pc-sidebar pc-sidebar-hide">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="assets/images/favicon.png" class="img-fluid logo-lg" alt="logo"> Si PETA PSU
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <x-nav-link href="/dashboard" :active="request()->is('/')" ti="dashboard">Dashboard</x-nav-link>

                <li class="pc-item pc-caption">
                    <label>Layanan</label>
                    <i class="ti ti-dashboard"></i>
                </li>

                <x-nav-link href="/peta" :active="request()->is('/peta')" ti="map">Peta</x-nav-link>
                <x-nav-link href="/pengaduan" :active="request()->is('/pengaduan')" ti="map-route">Data Pengaduan</x-nav-link>
                <x-nav-link href="/form-pengaduan" :active="request()->is('/form-pengaduan')" ti="route">Buat Pengaduan</x-nav-link>

                <li class="pc-item pc-caption">
                    <label>Informasi</label>
                    <i class="ti ti-dashboard"></i>
                </li>

                <x-nav-link href="/artikel" :active="request()->is('/artikel')" ti="article-filled-filled">Artikel</x-nav-link>
                <x-nav-link href="/form-artikel" :active="request()->is('/form-artikel')" ti="playlist-add">Buat Artikel</x-nav-link>

                <li class="pc-item pc-caption">
                    <label>User</label>
                    <i class="ti ti-dashboard"></i>
                </li>

                <x-nav-link href="/pengguna" :active="request()->is('/pengguna')" ti="users">Data Pengguna</x-nav-link>

            </ul>

        </div>
    </div>
</nav>
