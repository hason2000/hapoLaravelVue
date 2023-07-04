<header>
    <nav class="navbar navbar-expand-sm navbar-light header-navbar">
        <div class="header-navbar-brand">
            <div class="navbar-brand">
                <a href="{{ route('home') }}"><img src="{{ asset('images/Hapo_Learn.png') }}" alt="Hapo_Learn" class="w-100"></a>
            </div>
        </div>
        <button class="navbar-toggler header-tonggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="headerBtnIcon">
            <span class="navbar-toggler-icon"></span>
            <i class="fa fa-times header-iconx hide"></i>
        </button>
        <div class="collapse navbar-collapse header-content" id="navbarSupportedContent">
            <ul class="navbar-nav header-ul">
                <li class="nav-item header-nav-item @if(Request::route()->getName() == 'live-teaching.index') header-active @endif">
                    <a class="nav-link" href="{{ route('live-teaching.index') }}">LIVE TEACHING</a>
                </li>
                <li class="nav-item header-nav-item @if(Request::route()->getName() == 'home') header-active @endif">
                    <a class="nav-link" href="{{ route('home') }}">HOME</a>
                </li>
                <li class="nav-item header-nav-item @if(Request::route()->getName() == 'courses.index' || Request::route()->getName() == 'courses.show') header-active @endif">
                    <a class="nav-link" href="{{ route('courses.index') }}">ALL COURSES</a>
                </li>
                @if(!Auth::user())
                    <li class="nav-item header-nav-item header-lr-cus" data-toggle="modal" data-target="#loginRegisterModal">
                        <a class="nav-link" href="#">LOGIN/REGISTER</a>
                    </li>
                @endif
                @if (Auth::check())
                    <li class="nav-item header-nav-item @if(Request::route()->getName() == 'users.show') header-active @endif">
                        <a class="nav-link" href="{{ route('users.show', Auth::id()) }}">PROFILE</a>
                    </li>
                @endif
            </ul>
        </div>
        @if(Auth::user())
            <div class="dropdown icon-user">
                <button class="btn dropdown-toggle d-flex align-items-center avata" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                    <div class="avata-cus">
                        <img src="{{ Auth::user()->make_avata_url }}" class="w-100 h-100" alt="avata.{{ Auth::user()->username }}">
                    </div>
                    <span>{{ Auth::user()->username }}</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Profile</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item" href="#">Logout</button>
                    </form>
                </div>
            </div>
        @endif
    </nav>
</header>
