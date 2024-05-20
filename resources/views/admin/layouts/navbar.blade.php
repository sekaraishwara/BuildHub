<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand font-weight-bold" href="./">BUILDHUB</a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">


            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{ asset('admin/images/admin.jpg') }}"
                        alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">

                    <a class="nav-link" href="#"><i class="fa fa-user"></i>{{ auth()->user()->name }}</a>

                    <!-- Logout link -->
                    <a class="nav-link logout-link" href="#"
                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        <i class="fa fa-sign-out"></i>{{ __('Log Out') }}
                    </a>

                    <!-- Logout form -->
                    <form id="logoutForm" method="POST"
                        action="{{ auth()->guard('admin')->check() ? route('admin.logout') : route('logout') }}">
                        @csrf
                    </form>
                </div>

            </div>
        </div>

    </div>
</header>
