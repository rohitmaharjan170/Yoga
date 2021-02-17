<div class="contactbar">
    <div class="contact d-flex">
        <div class="phone mr-3">
            <i class="fas fa-phone icon"></i> &nbsp;<span class="contact_item mr-3">+977 9851214726</span>
        </div>
        <div class="email-header">
            <i class="fas fa-envelope icon"></i> &nbsp;<span class="contact_item">info@karnaliyoga.com</span>
        </div>

        <form class="search-form" action="/search-packages" method="POST" role="search">
            {{ csrf_field() }}
            <input type="text" placeholder="Search.." name="searchText" class="search">
        </form>


        @if (Route::has('login')&& Route::has('register'))
            <div class="top-right links d-flex">
            @if (Auth::check())
                <!-- Basic dropdown -->
                    <button class="btn btn-default dropdown-toggle btn-lg"
                            style="font-size: 14px; background: none; box-shadow:none" type="button"
                            data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="fas fa-user icon"></i>
                        &nbsp; {{ Auth::user()->name }}</button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('userprofile') }}">My Profile</a>
                        <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                    </div>

                @else
                    <div class="Login_Register">
                        <a href="{{ route('register') }}"><i class="fas fa-key icon"></i>&nbsp;Register</a>
                        <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt icon ml-3 "></i>&nbsp;Login</a>
                    </div>

                @endif
            </div>
        @endif

    </div>
</div>

<!-- navbar -->
<nav class="bg-header navbar navbar-expand-md navbar-light d-flex">
    <button class="mobile-search ml-2" id="openSearch">
        <i class="fa fa-search white"></i>
    </button>
    <div id="myOverlay" class="overlay close">
        <span class="closebtn" id="closeSearch" title="Close Overlay">×</span>
        <div class="overlay-content">
            <form class="search-form mobile-search" action="/search-packages" method="POST" role="search">
                {{ csrf_field() }}
                <input type="text" placeholder="Search.." name="searchText" class="search">
            </form>
        </div>
    </div>

    <a class="navbar-brand mr-md-5" href="{{route('openingindex')}}"> <img class="logo" src="{{ asset('images/logo.png') }}"
                                                                           alt="no image"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('openingindex') }}">Home</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false" role="button">
                    Courses
                </a>
                <div class="dropdown-menu course-drop" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('class-schedule')}}">Course Schedule</a>
                    <hr class="m-0">
                    <a class="dropdown-item" href="{{route('classlist')}}">All Courses</a>
                    @foreach ($navClass as $class)
                        <ul>
                            <li class="float-left">
                                <a class="dropdown-item font-12"
                                   href="{{ Route('yogadescription',$class->id)}}">{{$class->name}}</a>
                            </li>
                        </ul>
                    @endforeach
                </div>

            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="package" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    Retreats
                </a>
                <div class="dropdown-menu course-drop" aria-labelledby="package">
                    <a class="dropdown-item" href="{{route('packages')}}">All Retreats</a>
                    @foreach ($navPackage as $pack)
                        <ul>
                            <li class="float-left">
                                <a class="dropdown-item font-12"
                                   href="{{ Route('single.package',$pack->id)}}">{{$pack->name}}</a>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('trainer')}}">Trainers</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{route('gallery')}}">Gallery</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('about')}}">About Us</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('contact')}}">Contact</a>
            </li>


            @if (Route::has('login')&& Route::has('register'))
                @if (Auth::check())
                    <li class="nav-item dropdown mobile-login-register">
                        <a class="nav-link dropdown-toggle" href="#" id="web-user" data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu course-drop" aria-labelledby="web-user">
                            <ul>
                                <li class="float-left">
                                    <a class="dropdown-item font-12"
                                       href="{{ route('userprofile') }}">My Profile</a>
                                </li>
                                <li class="float-left">
                                    <a class="dropdown-item font-12"
                                       href="{{ route('user.logout') }}">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else
                    <div class="Login_Register mobile-login-register">
                        <a class="fas fa-key icon btn btn-default text-white" href="{{ route('register') }}"
                           style="background-color:#3da18d;">Register</a>

                        <a class="fas fa-sign-in-alt icon ml-3 btn btn-default text-white" href="{{ route('login') }}"
                           style="background-color: #3da18d;">Login</a>
                    </div>
                @endif
            @endif
        </ul>
    </div>
</nav>


<!-- end of navbar -->