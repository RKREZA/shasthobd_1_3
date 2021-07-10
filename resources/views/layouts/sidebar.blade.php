        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                            
                        

                        <li class="sidebar-item"> 
                            <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                                <i data-feather="target" class="feather-icon"></i>
                                <span class="hide-menu">
                                    {{__('sidebar.dashboard')}} 
                                    (
                                        @php
                                            $role = str_replace(array('[',']'),'',Auth::user()->getRoleNames());
                                            echo $role = str_replace(array('"'),' ',$role);
                                        @endphp
                                    )
                                </span>
                            </a>
                        </li>



                        @if(str_contains(Auth::user()->getRoleCodes(), 'admin'))
                            
                            @canany(['user-list','doctor-list','department-list','role-list','permission-list','user-activity','log-list'])

                                <li class="list-divider"></li>

                                <li class="sidebar-item {{ (request()->is('admin/setting*')) ? 'selected' : '' }}"> 

                                    <a class="sidebar-link has-arrow {{ (request()->is('admin/setting*')) ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
                                        <i data-feather="settings" class="feather-icon"></i>
                                        <span class="hide-menu">{{__('sidebar.settings')}} </span>
                                    </a>

                                    <ul aria-expanded="false" class="collapse  first-level base-level-line {{ (request()->is('admin/setting*')) ? 'in' : '' }}">

                                        @can('department-list')
                                            <li class="sidebar-item {{ (request()->is('admin/setting/user*')) ? 'active' : '' }}">
                                                <a href="{{ route('departments.index') }}" title="{{__('sidebar.department')}}" class="sidebar-link {{ (request()->is('admin/setting/user*')) ? 'active' : '' }}">
                                                    {{-- <i data-feather="users" class="feather-icon"></i> --}}
                                                    <span class="hide-menu">{{__('sidebar.department')}}</span>
                                                </a>
                                            </li>
                                        @endcan
                                        
                                        @can('doctor-list')
                                            <li class="sidebar-item {{ (request()->is('admin/setting/user*')) ? 'active' : '' }}">
                                                <a href="{{ route('doctors.index') }}" title="{{__('sidebar.doctor')}}" class="sidebar-link {{ (request()->is('admin/setting/user*')) ? 'active' : '' }}">
                                                    {{-- <i data-feather="users" class="feather-icon"></i> --}}
                                                    <span class="hide-menu">{{__('sidebar.doctor')}}</span>
                                                </a>
                                            </li>
                                        @endcan

                                        @can('user-list')
                                            <li class="sidebar-item {{ (request()->is('admin/setting/user*')) ? 'active' : '' }}">
                                                <a href="{{ route('users.index') }}" title="{{__('sidebar.user')}}" class="sidebar-link {{ (request()->is('admin/setting/user*')) ? 'active' : '' }}">
                                                    {{-- <i data-feather="users" class="feather-icon"></i> --}}
                                                    <span class="hide-menu">{{__('sidebar.user')}}</span>
                                                </a>
                                            </li>
                                        @endcan

                                        @can('role-list')
                                            <li class="sidebar-item {{ (request()->is('admin/setting/roles*')) ? 'active' : '' }}">
                                                <a href="{{ route('roles.index') }}" title="{{__('sidebar.roles')}}" class="sidebar-link {{ (request()->is('admin/setting/roles*')) ? 'active' : '' }}">
                                                    {{-- <i data-feather="user-check" class="feather-icon"></i> --}}
                                                    <span class="hide-menu">{{__('sidebar.user_role')}}</span>
                                                </a>
                                            </li>
                                        @endcan

                                        @can('permission-list')
                                            <li class="sidebar-item {{ (request()->is('admin/setting/permissions*')) ? 'active' : '' }}">
                                                <a href="{{ route('permissions.index') }}" title="{{__('sidebar.permissions')}}" class="sidebar-link {{ (request()->is('admin/setting/permissions*')) ? 'active' : '' }}">
                                                    {{-- <i data-feather="user-check" class="feather-icon"></i> --}}
                                                    <span class="hide-menu">{{__('sidebar.permission')}}</span>
                                                </a>
                                            </li>
                                        @endcan

                                        @can('file-manager')
                                            <li class="sidebar-item {{ (request()->is('admin/setting/file-manager*')) ? 'active' : '' }}">
                                                <a href="{{route('filemanager.index')}}" title="{{__('sidebar.file-manager')}}" class="sidebar-link {{ (request()->is('admin/setting/file-manager*')) ? 'active' : '' }}">
                                                    <span class="hide-menu">{{__('sidebar.file-manager')}}</span>
                                                </a>
                                            </li>
                                        @endcan

                                        @can('user-activity-list')
                                            <li class="sidebar-item {{ (request()->is('admin/setting/useractivity*')) ? 'active' : '' }}">
                                                <a href="/user-activity" title="{{__('sidebar.useractivity')}}" class="sidebar-link {{ (request()->is('admin/setting/useractivity*')) ? 'active' : '' }}">
                                                    {{-- <i data-feather="user-check" class="feather-icon"></i> --}}
                                                    <span class="hide-menu">{{__('sidebar.useractivity')}}</span>
                                                </a>
                                            </li>
                                        @endcan

                                        @can('log-list')
                                            <li class="sidebar-item {{ (request()->is('admin/setting/log*')) ? 'active' : '' }}">
                                                <a href="/admin/log-reader" title="{{__('sidebar.log')}}" class="sidebar-link {{ (request()->is('admin/setting/log*')) ? 'active' : '' }}">
                                                    <span class="hide-menu">{{__('sidebar.log')}}</span>
                                                </a>
                                            </li>
                                        @endcan

                                    </ul>
                                </li>
                            @endcanany
                        @endif


                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->