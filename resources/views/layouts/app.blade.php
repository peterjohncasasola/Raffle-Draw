<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/confetti.js') }}"></script>
    <script src="{{ asset('js/confetti.min.js') }}"></script>

    @yield('additional-css')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/members') }}">
                    <img src="{{URL::asset('/img/logo.png')}}" sheight="40px" width="40px" alt="Providers Logo">
                    <strong>PMPC</strong>
                </a>
                @guest
                    @else
                        @if(Auth::user()->is_admin === 1)
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        @endif
                @endguest
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            @if (Auth::user()->is_admin === 1)
                                {{-- <div class="nav-item dropdown">
                                    <a href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Settings
                                    </a>
                                    <div id="menu-dropdown" class="dropdown-menu">
                                        <a class="dropdown-item" href="/raffle-promo">Raffle Promo</a>
                                        <a class="dropdown-item" href="#">Raffle Settings</a>
                                        <a class="dropdown-item" href="#">Users</a>
                                    </div>
                                </div> --}}

                                <div class="nav-item">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/members">Members</a>
                                    </li>
                                </div>
                                <div class="nav-item">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/users">Users</a>
                                    </li>
                                </div>

                                <div class="nav-item">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/winners-list">Winners</a>
                                    </li>
                                </div>

                                <div class="nav-item">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/raffle-promo">Raffle Prizes</a>
                                    </li>
                                </div>

                                <div class="nav-item">
                                    <li class="nav-item">
                                    <a class="nav-link" href="/participant">Participants</a>
                                    </li>
                                </div>
                            @endif
                            <div class="nav-item">
                                <li class="nav-item">
                                <a class="nav-link" href="/raffle-draw">Raffle Draw</a>
                                </li>
                            </div>
                        @endguest
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
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
        </nav>

        <main class="py-4">
            @yield('content')
            {{-- <roulette></roulette> --}}
        </main>
    </div>
</body>

@yield('additional-script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</html>
