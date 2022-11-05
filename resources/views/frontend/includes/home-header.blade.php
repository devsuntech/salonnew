        <header class="header-area header-spacing">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-4">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('storage/frontend/assets/img/SalonNme-01.png.png') }}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-8 col-8 text-right">
                        <!-- <div class="d-none d-lg-inline-block">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul id="menu-main-menu">
                                        <li class="has-dropdown">
                                            <a href="index.html">Home</a>
                                            <ul class="sub-menu">
                                            <li><a href="index.html">Home Style 1</a></li>
                                            <li><a href="index-2.html">Home Style 2</a></li>
                                            <li><a href="index-3.html">Home Style 3</a></li>
                                        </ul>
                                        </li>
                                        <li><a href="about.html">About</a></li>
                                        <li class="has-dropdown"><a href="listings-grid-right-sidebar.html">Salons</a>
                                            <ul class="sub-menu">
                                            <li class="has-dropdown"><a href="listings-grid-right-sidebar.html">Grid Layout</a>
                                                <ul class="sub-menu">
                                                    <li><a href="listings-grid-left-sidebar.html">Grid Left Sidebar</a></li>
                                                    <li><a href="listings-grid-right-sidebar.html">Grid Right Sidebar</a></li>
                                                    <li><a href="listings-three-column-grid-right-sidebar.html">Three Column Right Sidebar</a></li>
                                                    <li><a href="listings-three-column-grid-left-sidebar.html">Three Column Left Sidebar</a></li>
                                                    <li><a href="listings-grid-full-width.html">Grid Full Width</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-dropdown"><a href="listings-list-full-width.html">List Layout</a>
                                                <ul class="sub-menu">
                                                    <li><a href="listings-list-with-sidebar-right.html">Right Sidebar</a></li>
                                                    <li><a href="listings-list-with-sidebar-left.html">List Left Sidebar</a></li>
                                                    <li><a href="listings-list-full-width.html">List Full Width</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-dropdown"><a href="listings-half-screen-map-list.html">Map Layout</a>
                                                <ul class="sub-menu">
                                                    <li><a href="listings-half-screen-map-grid.html">Map With Grid</a></li>
                                                    <li><a href="listings-half-screen-map-list.html">Map With List</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="listing-details.html">Listing Details</a></li>
                                        </ul>
                                        </li>
                                        <li class="has-dropdown"><a href="news.html">Blogs</a>
                                            <ul class="sub-menu">
                                            <li><a href="news.html">News</a></li>
                                            <li><a href="shop-details.html">News Details</a></li>
                                        </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div> -->
                        <div class="d-inline-block ">
                            @auth
                                @if(Auth::user()->user_type=='customer')
                                    <div class="header-btn">
                                        <a href="{{ route('user.profile') }}">
                                            Profile <i class="far fa-user"></i>
                                        </a>
                                    </div>
                                @elseif(Auth::user()->user_type=='admin')
                                     <div class="header-btn">
                                        <a href="{{ route('admin.dashboard') }}">
                                            Dashboard <i class="far fa-user"></i>
                                        </a>
                                     </div>
                                @elseif(Auth::user()->user_type=='vendor')
                                     <div class="header-btn">
                                        <a href="{{ route('vendor.dashboard') }}">
                                            Dashboard <i class="far fa-user"></i>
                                        </a>
                                     </div>
                                @endif
                            @else
                            <div class="header-btn">
                                <a href="{{ route('vendor.login') }}">
                                    Salon Login <i class="far fa-plus"></i>
                                </a>
                            </div>
                            <div class="header-btn">
                                <a href="{{ route('customer.login') }}">
                                    Customer Login <i class="far fa-plus"></i>
                                </a>
                            </div>
                            @endif
                            <div class="sidebar-open open-mobile-menu ml-15 d-none d-lg-inline-block">
                                <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="24px">
                                        <path fill-rule="evenodd" fill="rgb(24, 27, 29)"
                                            d="M22.375,12.635 L8.250,12.635 C7.905,12.635 7.625,12.350 7.625,12.000 C7.625,11.649 7.905,11.365 8.250,11.365 L22.375,11.365 C22.720,11.365 23.000,11.649 23.000,12.000 C23.000,12.350 22.720,12.635 22.375,12.635 ZM22.375,3.746 L8.250,3.746 C7.905,3.746 7.625,3.461 7.625,3.111 C7.625,2.760 7.905,2.476 8.250,2.476 L22.375,2.476 C22.720,2.476 23.000,2.760 23.000,3.111 C23.000,3.461 22.720,3.746 22.375,3.746 ZM3.062,24.000 C1.371,24.000 0.000,22.607 0.000,20.888 C0.000,19.170 1.371,17.777 3.062,17.777 C4.754,17.777 6.125,19.170 6.125,20.888 C6.125,22.607 4.754,24.000 3.062,24.000 ZM3.062,19.047 C2.061,19.047 1.250,19.872 1.250,20.888 C1.250,21.905 2.061,22.730 3.062,22.730 C4.063,22.730 4.875,21.905 4.875,20.888 C4.875,19.872 4.063,19.047 3.062,19.047 ZM3.062,15.111 C1.371,15.111 0.000,13.718 0.000,12.000 C0.000,10.282 1.371,8.888 3.062,8.888 C4.754,8.888 6.125,10.282 6.125,12.000 C6.125,13.718 4.754,15.111 3.062,15.111 ZM3.062,10.159 C2.061,10.159 1.250,10.983 1.250,12.000 C1.250,13.017 2.061,13.841 3.062,13.841 C4.063,13.841 4.875,13.017 4.875,12.000 C4.875,10.983 4.063,10.159 3.062,10.159 ZM3.062,6.222 C1.371,6.222 0.000,4.829 0.000,3.111 C0.000,1.393 1.371,-0.000 3.062,-0.000 C4.754,-0.000 6.125,1.393 6.125,3.111 C6.125,4.829 4.754,6.222 3.062,6.222 ZM3.062,1.270 C2.061,1.270 1.250,2.094 1.250,3.111 C1.250,4.128 2.061,4.952 3.062,4.952 C4.063,4.952 4.875,4.128 4.875,3.111 C4.875,2.094 4.063,1.270 3.062,1.270 ZM8.250,20.254 L22.375,20.254 C22.720,20.254 23.000,20.538 23.000,20.888 C23.000,21.239 22.720,21.524 22.375,21.524 L8.250,21.524 C7.905,21.524 7.625,21.239 7.625,20.888 C7.625,20.538 7.905,20.254 8.250,20.254 Z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="menu-open open-mobile-menu ml-20 d-inline-block d-lg-none">
                                <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="24px">
                                        <path fill-rule="evenodd" fill="rgb(24, 27, 29)"
                                            d="M22.375,12.635 L8.250,12.635 C7.905,12.635 7.625,12.350 7.625,12.000 C7.625,11.649 7.905,11.365 8.250,11.365 L22.375,11.365 C22.720,11.365 23.000,11.649 23.000,12.000 C23.000,12.350 22.720,12.635 22.375,12.635 ZM22.375,3.746 L8.250,3.746 C7.905,3.746 7.625,3.461 7.625,3.111 C7.625,2.760 7.905,2.476 8.250,2.476 L22.375,2.476 C22.720,2.476 23.000,2.760 23.000,3.111 C23.000,3.461 22.720,3.746 22.375,3.746 ZM3.062,24.000 C1.371,24.000 0.000,22.607 0.000,20.888 C0.000,19.170 1.371,17.777 3.062,17.777 C4.754,17.777 6.125,19.170 6.125,20.888 C6.125,22.607 4.754,24.000 3.062,24.000 ZM3.062,19.047 C2.061,19.047 1.250,19.872 1.250,20.888 C1.250,21.905 2.061,22.730 3.062,22.730 C4.063,22.730 4.875,21.905 4.875,20.888 C4.875,19.872 4.063,19.047 3.062,19.047 ZM3.062,15.111 C1.371,15.111 0.000,13.718 0.000,12.000 C0.000,10.282 1.371,8.888 3.062,8.888 C4.754,8.888 6.125,10.282 6.125,12.000 C6.125,13.718 4.754,15.111 3.062,15.111 ZM3.062,10.159 C2.061,10.159 1.250,10.983 1.250,12.000 C1.250,13.017 2.061,13.841 3.062,13.841 C4.063,13.841 4.875,13.017 4.875,12.000 C4.875,10.983 4.063,10.159 3.062,10.159 ZM3.062,6.222 C1.371,6.222 0.000,4.829 0.000,3.111 C0.000,1.393 1.371,-0.000 3.062,-0.000 C4.754,-0.000 6.125,1.393 6.125,3.111 C6.125,4.829 4.754,6.222 3.062,6.222 ZM3.062,1.270 C2.061,1.270 1.250,2.094 1.250,3.111 C1.250,4.128 2.061,4.952 3.062,4.952 C4.063,4.952 4.875,4.128 4.875,3.111 C4.875,2.094 4.063,1.270 3.062,1.270 ZM8.250,20.254 L22.375,20.254 C22.720,20.254 23.000,20.538 23.000,20.888 C23.000,21.239 22.720,21.524 22.375,21.524 L8.250,21.524 C7.905,21.524 7.625,21.239 7.625,20.888 C7.625,20.538 7.905,20.254 8.250,20.254 Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
