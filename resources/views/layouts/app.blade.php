<x-laravel-ui-adminlte::adminlte-layout>
    @livewireStyles

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item user-menu">
                        <a href="{{ url('/') }}" class="nav-link" target="_blank">
                            <i class="fa fa-home"></i>
                            <span class="d-none d-md-inline">Frontend</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('logo')) }}"
                                class="user-image img-circle elevation-2"
                                alt="{{ applicationSettingsAltText('logo') }}">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('logo')) }}"
                                    class="img-circle elevation-2" alt="{{ applicationSettingsAltText('logo') }}">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-right"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- Main Footer -->
            <footer class="main-footer">

                &copy; Maharaja Restaurant {{ now()->year }}. All right reserved
            </footer>
        </div>
        <!-- Livewire -->
        <script src="//unpkg.com/alpinejs" defer></script>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
        <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.2.0/dist/livewire-sortable.js"></script>
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <!-- Toastr -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        @include('common.flash-toastr-message')
        <!-- Sweet Alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.0/tinymce.min.js"
            integrity="sha512-E2dqytT185qVoAL0sfqr39BLHEBQtmZze59ChMjYi4vRUW6BzIBLZAqErdQAAAJX8bkFq2kQgQL9Lbpm8Uuw0Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </body>
</x-laravel-ui-adminlte::adminlte-layout>
