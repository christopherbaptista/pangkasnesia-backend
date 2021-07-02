<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="description" content="Pangkasnesia">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Style --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
    <style>
        a {
            color: black;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }
    </style>

</head>

<body>
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        {{-- Navbar --}}
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="{{ url('images/logo-pangkasnesia.png') }}" alt="Logo"></a>
                    {{-- <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> --}}
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="justify-center sm:items-center py-3" style="color: black">
                        @if (Route::has('login'))
                            <div>
                                @auth
                                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register')}}" class="ml-4 text-sm">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif

                    </div>
                    {{-- <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ url('images/admin.jpg') }}" alt="User">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                    class="nav-link underline text-sm text-gray-600 hover:text-gray-900" href="route('logout')" >
                                        <i class="fa fa-power -off"></i>{{ __('Log Out') }}</a>
                            </form>
                        </div>
                    </div> --}}

                </div>
            </div>
        </header>
        <!-- Content -->

    </div>
    <!-- /#right-panel -->

    {{-- Script --}}
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')

</body>
</html>
