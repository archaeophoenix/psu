<header class="pc-header">
    <div class="header-wrapper">
        <!-- [Mobile Media Block] start -->
        <div class="container position-sticky z-index-sticky" style="margin-top: -12px;">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                        <div class="menu-toggle">
                            @auth
                            <a href="#" class="pc-head-link ms-0" id="sidebar-hide" style="padding: 0 35px;">
                                <i class="ti ti-menu-2"></i>
                            </a>
                            @endauth
                        </div>
                        <div class="container-fluid px-0">
                            <a class="navbar-brand font-weight-bolder ms-sm-3" rel="tooltip" title="Si Peta PSU" data-placement="bottom">
                                <img id="logo-psu" src="{{ asset('public/assets/images/favicon.png') }}" class="img-fluid logo-lg" alt="Si PETA PSU"> Si PETA PSU </a>
                            <button class="navbar-toggler shadow-none ms-md-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon mt-2">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </span>
                            </button>
                            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation" style="background: white;">
                                <ul class="navbar-nav navbar-nav-hover mx-auto" style="font-family: 'Bebas Neue', sans-serif; text-transform: uppercase; letter-spacing: 1px; padding: 15px 20px;">
                                    <li class="nav-item dropdown dropdown-hover mx-2">
                                        <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="#beranda"> Beranda </a>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover mx-2">
                                        <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="#peta"> Peta </a>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover mx-2">
                                        <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="#statis"> Statistik </a>
                                    </li>
                                    {{-- <li class="nav-item dropdown dropdown-hover mx-2">
                                        <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="#laporan"> Pengaduan </a>
                                    </li> --}}
                                    <li class="nav-item dropdown dropdown-hover mx-2">
                                        <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="#info"> Artikel </a>
                                    </li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li class="dropdown pc-h-item header-user-profile">
                                        @auth
                                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                                            href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside"
                                            aria-expanded="false">
                                            <img src="{{ asset('public/assets/images/user/user.avif') }}" alt="user-image" class="user-avtar">
                                            <span>{{ Auth::user()->name }}</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                                            <div class="dropdown-header">
                                                <div class="d-flex mb-1">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ asset('public/assets/images/user/user.avif') }}" alt="user-image"
                                                            class="user-avtar wid-35">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1">{{ Auth::user()->name }}</h6>
                                                        <span>{{ Auth::user()->username }}</span>
                                                    </div>
                                                    <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                        <button type="submit" class="pc-head-link bg-transparent"><i class="ti ti-power text-danger"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            <a class="pc-head-link dropdown-toggle arrow-none me-0" href="{{ route('login') }}" role="button" aria-haspopup="false" aria-expanded="false">
                                                <img src="{{ asset('public/assets/images/user/user.avif') }}" alt="user-image" class="user-avtar">
                                                <span>Login</span>
                                            </a>
                                        @endauth
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div>
    </div>

</header>
