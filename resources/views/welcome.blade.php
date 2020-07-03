<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

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
            
            .top-left {
                position: absolute;
                left: 10px;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-left links">
                    @auth
                        <a href="{{ url('/home') }}">Accueil</a>            
                       
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">Deconnexion</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>        
                    @else
                        <a href="{{ route('login') }}">Connexion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Inscription</a>
                        @endif
                    @endauth
                </div>
                <div class="top-right links">
                    @auth
                        @if(Auth::user()->FONCTION == "ADMIN")
                            <a>
                                Bienvenue 
                                <span style="color:red">{{ Auth::user()->PRENOM}}</span>
                            </a>
                        @elseif(Auth::user()->FONCTION == "VISITEUR")
                            <a>
                                Bienvenue 
                                <span style="color:green">{{ Auth::user()->PRENOM}}</span>
                            </a>
                        @elseif(Auth::user()->FONCTION == "RESPONSABLEREGION")
                            <a>
                                Bienvenue 
                                <span style="color:blue">{{ Auth::user()->PRENOM}}</span>
                            </a>
                        @else
                            <a>
                                Bienvenue 
                                {{ Auth::user()->PRENOM}}
                            </a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laboratoire GSB
                </div>
                @auth
                    @if(Auth::user()->FONCTION == "VISITEUR")
                    <div class="links">
                        <a href="{{ url('/visites') }}">Visites</a>
                    </div>
                    @endif
                @endauth
            </div>
        </div>
    </body>
</html>
