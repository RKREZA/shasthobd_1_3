        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i data-feather="menu" class="feather-icon ti-menu ti-close"></i>
                        {{-- <i class="ti-close ti-menu"></i> --}}
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="{{ route('dashboard') }}">
                            
                            <span class="logo-text" style="font-weight: 600">
                                <img src="{{ asset('assets/images/s-logo.png') }}" alt="homepage" class="dark-logo" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i data-feather="more-horizontal" class="feather-icon ti-menu ti-close"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        

                        {{-- @include('layouts.notification') --}}
                        @include('layouts.language-changer')
                         

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right" style="margin-right: 15px;">
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                @if(!empty(Auth::user()->image))
                                    <img src="/storage/{{ Auth::user()->image }}" alt="user" class="rounded-circle" width="40" onerror="this.src='{{ asset('assets/images/user.png') }}';">
                                @else
                                    <img src="{{ asset('assets/images/user.png') }}" alt="user" class="rounded-circle" width="40">
                                @endif
                                 
                                {{-- <span class="text-dark">{{Auth::user()->name}}</span>  --}}
                                    {{-- <i data-feather="chevron-down" class="svg-icon"></i> --}}
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">

                                <a class="dropdown-item" href="#">
                                    {{Auth::user()->name}}<br>


                                    <small>
                                        @php
                                            $role = str_replace(array('[',']'),'',Auth::user()->getRoleNames());
                                            echo $role = str_replace(array('"'),' ',$role);
                                        @endphp
                                    </small>
                                </a>

                                <a class="dropdown-item" href="{{ route('profile') }}"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->