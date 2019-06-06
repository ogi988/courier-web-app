@extends('layouts.app')

@section('content')
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                transition: all .2s ease-in-out;
            }
            .links > a:hover{
                transform: scale(1.1);
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height home-background">
            @if (Route::has('login'))
            <div class = "header">
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
                <div class = "top-left links">
                    <a href = "#">O nama</a>
                    <a href = "#">Kontakt</a>
                </div>
            </div>
            @endif
            <div class="content">
                <div class="boxes__wrapper">
                    <div class="boxes">
                        <div class="boxes__heading_wrapper">
                            <div class="boxes__heading">
                                <div class="heading">
                                    <span>Pratite posiljku</span>
                                </div>
                            </div>
                        </div>
                        <div class="forma">
                            <form method="POST" action="{{ 'track' }}">
                                @csrf
                                <div class = "text-forme">
                                    <input type="text" name="track" id="track" class="form-control" placeholder="Unesite broj posiljke">
                                </div>
                                <div class = "dugme-forme">
                                    <input type="submit" class="btn btn-outline-primary" value="Pronadji">
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>

    </body> 

</html>
                    
