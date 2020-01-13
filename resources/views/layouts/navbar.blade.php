<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <button id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}"><img src="{{ asset('images/Logo PORTALPRO.png') }}"
                                                                         alt="logo"></a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Hi, {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu user" aria-labelledby="navbarDropdown">
                    <p style="font-weight: 500">{{ Auth::user()->name }}</p>
                    <p>{{ Auth::user()->nim }}</p>
                    <p>{{ Auth::user()->class }}</p>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img src="{{asset('images/logout.png')}}" alt="" height="20" width="20">Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>

    </nav>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
