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

                <x-nav-link href="/pengaduan" :active="request()->is('/pengaduan')" ti="map-exclamation">Pengaduan</x-nav-link>
                <x-nav-link href="/Color" :active="request()->is('/Color')" ti="color-swatch">Color</x-nav-link>
                <x-nav-link href="/Icons" :active="request()->is('/Icons')" ti="plant-2">Icons</x-nav-link>

                <li class="pc-item pc-caption">
                    <label>Other</label>
                    <i class="ti ti-brand-chrome"></i>
                </li>

                <li class="pc-item pc-hasmenu pc-trigger active">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-menu"></i></span>
                        <span class="pc-mtext">Menu levels</span>
                        <span class="pc-arrow"></span>
                    </a>

                    <ul class="pc-submenu" style="display: block; box-sizing: border-box;">

                        <li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">Level 2.2<span class="pc-arrow"></span></a>
                            <ul class="pc-submenu" style="display: none; transition-property: height, margin, padding; transition-duration: 200ms; box-sizing: border-box; height: 0px; overflow: hidden; padding-top: 0px; padding-bottom: 0px; margin-top: 0px; margin-bottom: 0px;">
                                <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                                <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                                <li class="pc-item pc-hasmenu">
                                    <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"></span></a>
                                    <ul class="pc-submenu" style="display: none;">
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="pc-item pc-hasmenu pc-trigger">
                            <a href="#!" class="pc-link">Level 2.3<span class="pc-arrow"></span></a>
                            <ul class="pc-submenu" style="display: block; box-sizing: border-box;">
                                <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                                <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                                <li class="pc-item pc-hasmenu pc-trigger">
                                    <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow">></span></a>
                                    <ul class="pc-submenu" style="display: block; box-sizing: border-box;">
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                        <li class="pc-item active"><a class="pc-link" href="#!">Level 4.2</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </li>
            </ul>

        </div>
    </div>
</nav>
