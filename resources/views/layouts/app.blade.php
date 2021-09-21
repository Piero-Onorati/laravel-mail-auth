<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        {{-- start top-navabar --}}
        <nav class="navbar navbar-expand-md navbar-dark my_navbar shadow-sm">
            <div class="container-fluid px-5">

                <!-- APP NAME -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <!-- TOGGLE BUTTON OF NAVBAR -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- NAVBAR -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                        @endguest
                    </ul>
                </div>

            </div>
        </nav>
        {{-- end top-navabar --}}

        {{-- start Content-page --}}
        <div class="container-fluid"> 
            <div class="row flex-nowrap">

                <!-- start SIDEBAR -->
                @auth
                    <div class="col-auto col-md-3 col-xl-2 px-0 my_sidebar min-vh-100">
                        <div  class="d-flex align-items-center justify-content-center my_dashboard">
                            <span class="d-none d-sm-inline py-3">Dashboard</span>
                        </div>
                        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 my_menu">
                            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                                <li>  
                                    <a href="{{route('admin.index')}}" class="nav-link align-middle px-0 ">
                                        <i class="bi-house" style="font-size:1.1rem;"></i> 
                                        <h6 class="ms-2 d-none d-sm-inline">Home</h6>
                                    </a>
                                </li>
                                <li>
                                    <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle dropdown-toggle">
                                        <i class="bi bi-card-list" style="font-size:1.1rem;"></i>
                                        <h6 class="ms-2 d-none d-sm-inline">Posts</h6> 
                                    </a>
                                    <ul class="collapse nav flex-column ms-1" id="submenu3" >
                                        <li class=" w-100 px-3">
                                            <a href="{{route('admin.posts.index')}}" class="nav-link px-0"> 
                                                <i class="bi bi-card-image" style="font-size:1.1rem;"></i>
                                                <span class="d-none d-sm-inline">All Posts</span>
                                            </a>
                                        </li>
                                        <li class="w-100 px-3 ">
                                            <a href="{{route('admin.posts.create')}}" class="nav-link px-0"> 
                                                <i class="bi bi-plus-square" style="font-size:1.1rem;"></i>
                                                <span class="d-none d-sm-inline">Add Post</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0 align-middle">
                                        <i class="bi-people" style="font-size:1.1rem"></i> 
                                        <h6 class="ms-1 d-none d-sm-inline">Users</h6> 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('admin.category_page')}}" class="nav-link px-0 align-middle">
                                        <i class="bi bi-grid" style="font-size:1.1rem"></i> 
                                        <h6 class="ms-2 d-none d-sm-inline">Categories</h6>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('admin.tags_page')}}" class="nav-link px-0 align-middle">
                                        <i class="bi bi-tag-fill" style="font-size:1.1rem"></i> 
                                        <h6 class="ms-2 d-none d-sm-inline">Tags</h6>
                                    </a>
                                </li>
                            </ul>
                            <hr>
                            
                        </div>
                    </div>
                              
                @endauth
                <!-- end SIDEBAR -->

                <div class="col p-0">
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
        {{-- end Content-page --}}

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
