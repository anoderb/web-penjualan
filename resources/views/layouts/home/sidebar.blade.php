<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link bg-danger">
        <span class="brand-text font-weight-light font-weight-bold text-uppercase">{{ config('app.name', 'App Name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/') }}adminlte3-template/dist/img/avatar2.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }} ({{ Auth::user()->level->level_name }})</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link @if (Request::is('home') || Request::is('home/*')) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">{{ Auth::user()->level->level_name }}</li>

                @foreach ($menu_byidlevel as $firstmenu)
                    {{-- first menu --}}
                    @php
                        $firstMenuActive = false;
                    @endphp

                    @if (Request::is($firstmenu['link']) || Request::is($firstmenu['link'] . '/*'))
                        @php
                            $firstMenuActive = true;
                        @endphp
                    @endif

                    @foreach ($firstmenu['children'] as $secondmenu)
                        @if (Request::is($secondmenu['link']) || Request::is($secondmenu['link'] . '/*'))
                            @php
                                $firstMenuActive = true;
                            @endphp
                        @endif
                    @endforeach

                    <li class="nav-item @if ($firstMenuActive) menu-open @endif">
                        <a href="{{ url($firstmenu['link']) }}" class="nav-link @if ($firstMenuActive) active @endif">
                            <i class="nav-icon {{ $firstmenu['icon'] }}"></i>
                            <p>
                                {{ $firstmenu['name'] }}
                                @if (!empty($firstmenu['children']))
                                    <i class="fas fa-angle-left right"></i>
                                @endif
                            </p>
                        </a>

                        @if (!empty($firstmenu['children']))
                            <ul class="nav nav-treeview">
                                {{-- second menu --}}
                                @foreach ($firstmenu['children'] as $secondmenu)
                                    <li class="nav-item">
                                        <a href="{{ url($secondmenu['link']) }}" class="nav-link @if (Request::is($secondmenu['link']) || Request::is($secondmenu['link'] . '/*')) active @endif">
                                            <i class="nav-icon {{ $secondmenu['icon'] }}"></i>
                                            <p>{{ $secondmenu['name'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
