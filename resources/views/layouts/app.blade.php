<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        .icon{
            width: 23px;
            height: 23px;
            color: white;
            margin-left: 10px;
            margin-right: 10px;
            margin-bottom: 0;
            margin-top: 5px;
        }
        .form-inline{
            margin-bottom: 0;
            margin-right: 50px;
            
        }
        #search{
            padding: 5px;
        }
        input{
            width: 300px;
            height: 35px;
        }
        #img-acc{
            margin-left: 10px;
            padding-left: 10px;
        }

    </style>
</head>
<body>
    <div id="app">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="{{ url('/') }}" style="font-family: Harlow Solid Italic">
                        {{ config('app.name', 'Laravel') }}
                      </a>
                      <!-- 
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                      </button> -->
                    </div>
                    <ul class="nav navbar-nav">
                        <li>
                        <form class="form-inline" action="/action_page.php">
                            <i class="fa fa-search"></i>
                           <input id="search"class="mr-sm-2" type="text" placeholder="Search">
                        </form>
                      </li>
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
                      
                      <li>
                        <a href="/upload">
                            <img class="icon" src="./icons/cloud-upload.png">
                        </a>
                      </li>
                      <li>
                        <a href="#">
                            <img class="icon" src="./icons/notification.png">
                        </a>
                      </li>
                    <!-- <li>
                      <a href="/home">
                        <img class="" src="./icons/account.png">
                      </a>
                    </li> -->
                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" href="/home" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img id="img-acc" class="" src="./icons/account.png">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    @endguest
                    </ul>
                </div>
            </nav>
            <div>
                <!-- <div class="container">
                    <ul>
                        <li><a href="/home"></a>All Images</li>
                        <li><a href="#"></a>Albums</li>
                        <li><a href="#">Something</a></li>
                    </ul>
                </div> -->
            </div>
        <!-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Retro') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    
                    <ul class="navbar-nav ml-auto">
                    
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
                        <a id="btn-upload"type="button" href="/upload" class="btn btn-success"><span>Upload</span></a>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- <script src="{{ asset('js/app.js') }}" ></script> -->
</body>
</html>
