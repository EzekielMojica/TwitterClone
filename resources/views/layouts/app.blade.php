<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('Twitter Clone') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/custom.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/5b4c848875.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            @yield('content')

            @section('sidebar')
            <nav class="sidebar position-fixed border-right"> 
                <ul class="py-2 pl-2 pl-lg-5">
                    <li class="sidebar-item"><a id="logo-link" class="link rounded-pill px-0 position-relative" href="/home"><img id="logo" class="" src="{{ asset('images/twitter-logo.png') }}" alt="Twitter"></a></li>
                    <li class="sidebar-item py-2"><a class="link rounded-pill active" href="/home"><i class="fas fa-home pr-lg-4"></i><span>Home</span></a></li>
                    <li class="sidebar-item py-2"><a class="link rounded-pill" href="#explore"><i class="fas fa-hashtag pr-lg-4"></i><span>Explore</span></a></li>
                    <li class="sidebar-item py-2"><a class="link rounded-pill" href="#notifications"><i class="fas fa-bell pr-lg-4"></i><span>Notifications</span></a></li>
                    <li class="sidebar-item py-2"><a class="link rounded-pill" href="#messages"><i class="fas fa-envelope pr-lg-4"></i><span>Messages</span></a></li>
                    <li class="sidebar-item py-2"><a class="link rounded-pill" href="#bookmarks"><i class="fas fa-bookmark pr-lg-4"></i><span>Bookmarks</span></a></li>
                    <li class="sidebar-item py-2"><a class="link rounded-pill" href="#"><i class="fas fa-list pr-lg-4"></i><span>List</span></a></li>
                    <li class="sidebar-item py-2"><a class="link rounded-pill" href="#"><i class="fas fa-user-circle pr-lg-4"></i><span>Profile</span></a></li>

                    <li class="sidebar-item py-2 dropup">
                        <a id="navbarDropdown" class="link rounded-pill dropdown-toogle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" v-pre><i class="fas fa-ellipsis-h pr-lg-4"></i><span>More</span></a>
                        <div class="dropdown-menu position-absolute dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                    <li class="sidebar-item py-2"><a class="link rounded-pill d-lg-none" href="#"><i class="fas fa-feather-alt pr-lg-4"></i></a></li>
                    <a href="#">
                        <div id="tweet" class="d-none d-lg-block p-2 rounded-pill">
                            <h5 class="m-1 text-center font-weight-bold">Tweet</h5>
                        </div>
                    </a>

                </ul>


            </nav>
            <main class="main">
                <div class="content border-right">
                    <a class="position-fixed text-decoration-none nav-link m-0 p-0" href="/home">
                        <nav class="navbar navbar-white bg-white border-bottom border-right">
                            <h5 class="font-weight-bold m-0 p-2">Home</h5>
                        </nav>
                    </a>
                    <div class="feed">
                        @show
                    </div>
                </div>

                @section('search')
                <div class="rightbar d-none d-md-block">
                    <nav class="navbar position-fixed navbar-white bg-white pr-5">
                        <form class="w-100" action="">
                            <div class="search-div border-0 rounded-pill pl-3 input-group">
                                <div class="input-group-prepend">
                                    <div class="border-0 bg-transparent input-group-text">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                                <input id="search" class="bg-transparent form-control border-0 rounded-pill" type="search" placeholder="Search Twitter" autocomplete="off">
                            </div>
                        </form>
                    </nav>
                    <div class="feed">
                        @show
                    </div>
                </div>

            </main>
        </div>
    </body>
</html>
