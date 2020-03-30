<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-Raffle Draw</title>

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
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .full-height {
                height: 80vh;
            }

            .roll-number {
                width: 40vh;
                height: 30vh;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="container-fluid">
                    <div class="winner-content">
                        <p class="winner">Hello Word</p>
                    </div>
                </div>
                <div class="container-fluid">
                    {{-- <div class="jumbotron jumbotron-fluid">
                         <div class="container">
                             <h3 class="display-4">150,000.00</h3>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="span3">
                            <div class="roulette_container" >
                                <div class="roulette" id="roulette1" style="display:none;">
                                    <img src="{{URL::asset('/img/0.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/1.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/2.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/3.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/4.jpg')}}" class="roll-number"/>
                                </div>
                            </div>

                        </div>
                        <div class="span3">
                            <div class="roulette_container" >
                                <div class="roulette" id="roulette2" style="display:none;">
                                    <img src="{{URL::asset('/img/0.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/1.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/2.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/3.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/4.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/5.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/6.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/7.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/8.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/9.jpg')}}" class="roll-number"/>

                                </div>
                            </div>


                        </div>
                        <div class="span3">
                            <div class="roulette_container" >
                                <div class="roulette" id="roulette3" style="display:none;">
                                    <img src="{{URL::asset('/img/0.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/1.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/2.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/3.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/4.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/5.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/6.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/7.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/8.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/9.jpg')}}" class="roll-number"/>
                                </div>
                            </div>


                        </div>
                        <div class="span3">
                            <div class="roulette_container" >
                                <div class="roulette" id="roulette4"  style="display:none;">
                                    <img src="{{URL::asset('/img/0.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/1.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/2.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/3.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/4.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/5.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/6.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/7.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/8.jpg')}}" class="roll-number"/>
                                    <img src="{{URL::asset('/img/9.jpg')}}" class="roll-number"/>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="winner-content">
                        <p class="winner-name"></p>
                    </div>
                </div>




            </div>
        </div>
    </body>

    <script src="{{ asset('js/roulette.js') }}"></script>
    <script src="{{ asset('js/rouletteApp.js') }}"></script>
</html>
