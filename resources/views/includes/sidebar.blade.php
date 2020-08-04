<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ url('/') }}/assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="#sidebarDashboards" data-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboards </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Data Master</li>

                <li>
                    <a href="{{ route('brands.index') }}">
                        <i class="mdi mdi-tag-multiple-outline"></i>
                        <span> Brands </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('kategori-barang.index') }}">
                        <i class="mdi mdi-notebook-multiple"></i>
                        <span> Category </span>
                    </a>
                </li>


                <li>
                    <a href="#sidebarEcommerce" data-toggle="collapse">
                        <i class="fe-box"></i>
                        <span> Barang </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="ecommerce-dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('barang.index') }}">Products</a>
                            </li>
                            <li>
                                <a href="{{ route('barang.create') }}">Tambah Barang</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#suppliers" data-toggle="collapse">
                        <i class="fas fa-users"></i>
                        <span> Supplier </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="suppliers">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('suppliers.create') }}">Tambah Supplier</a>
                            </li>
                            <li>
                                <a href="{{ route('suppliers.index') }}">Daftar Supplier</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarDashboards" data-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span> Profile </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarDashboards" data-toggle="collapse">
                        <i class="far fa-chart-bar"></i>
                        <span> Report </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarDashboards" data-toggle="collapse">
                        <i class="fas fa-cogs"></i>
                        <span> Setting </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
