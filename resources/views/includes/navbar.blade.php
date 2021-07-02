<!-- Header-->
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="./"><img src="{{ url('images/logo-pangkasnesia.png') }}" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">

            <div class="user-area dropdown float-right">
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
            </div>

        </div>
    </div>
</header>
<!-- /#header -->
