<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Evall') }} --}}
                    <strong style="font-size: 2.4rem; font-family: 'Lobster', cursive;color:#eb2929e6">Evall</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="col-8">
                        <form id="search-form" action="{{route('search')}}" method="POST">
                            <div class="search">
                                   @csrf
                                   <input class="search-input" type="text" name="search" id="search">
                                   <span class="search-btn" type="submit">
                                       <i class="fa fa-search" aria-hidden="true"></i>
                                   </span>
                            </div>
                        </form>
                    </div>

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
                                <a id="notifications-btn" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div id="notification-icons" class="d-flex flex-row">
                                        <i class="fa fa-bell-o" style="font-size: 1.5rem" aria-hidden="true"></i>
                                    </div>
                                </a>
                                <input url="{{route('notificationsUser', Auth::user()->id)}}" id="postAjaxNotifications" type="hidden" name="postAjaxNotifications" value="{{Auth::user()->id}}">

                                <div id="notifications-container" class="dropdown-menu dropdown-menu-right" aria-labelledby="notifications-btn">
                                    <p class="dropdown-item">Sem notificações</p>
                                </div>

                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{route('home.home')}}">Perfil</a>

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


        <div class="row m-0 lateral-nav">
            <div class="col-lg-2 lateral-nav p-0">
                <div class="d-flex flex-column">
                   <div class="d-flex flex-row justify-content-center align-content-center mt-2">
                       <h3>Categorias</h3>
                   </div>
                   <ul class="nav-categorys">
                        <li class="nav-category-item" index="1">
                           <span>Alimentos</span>
                           <i class="fa fa-angle-right"></i>
                           <div class="nav-category-item-more" index="1">

                           </div>
                        </li>
                        <li class="nav-category-item" index="2">
                           <span>Altomóveis</span>
                           <i class="fa fa-angle-right"></i>
                           <div class="nav-category-item-more" index="2">

                           </div>
                        </li>
                        <li class="nav-category-item" index="3">
                           <span>Casa mesa e banho</span>
                           <i class="fa fa-angle-right"></i>
                           <div class="nav-category-item-more" index="3">

                           </div>
                        </li>
                        <li class="nav-category-item" index="4">
                           <span>Brinquedos</span>
                           <i class="fa fa-angle-right"></i>
                           <div class="nav-category-item-more" index="4">

                           </div>
                        </li>
                        <li class="nav-category-item" index="5">
                            <span>Altomóveis</span>
                            <i class="fa fa-angle-right"></i>
                            <div class="nav-category-item-more" index="5">

                            </div>
                         </li>
                         <li class="nav-category-item" index="6">
                            <span>Roupas e acessórios</span>
                            <i class="fa fa-angle-right"></i>
                            <div class="nav-category-item-more" index="6">

                            </div>
                         </li>
                         <li class="nav-category-item" index="7">
                            <span>Eletrodomésticos</span>
                            <i class="fa fa-angle-right"></i>
                            <div class="nav-category-item-more" index="7">

                            </div>
                         </li>
                         <li class="nav-category-item" index="8">
                            <span>Celulares</span>
                            <i class="fa fa-angle-right"></i>
                            <div class="nav-category-item-more" index="8">

                            </div>
                         </li>
                         <li class="nav-category-item" index="9">
                            <span>Informática</span>
                            <i class="fa fa-angle-right"></i>
                            <div class="nav-category-item-more" index="9">

                            </div>
                         </li>
                    </ul>
                </div>
            </div>
             <main class="col-lg-10 p-0 m-0">
                 @yield('content')
             </main>
        </div>
    </div>
    
    <footer class="footer">
        <div class="top-footer row m-0 pb-1">
            <div class="col-4 col-lg-3 d-flex flex-row justify-content-center">
                <ul style="list-style: none; color: #4f4f4f; margin: 10px!important;">
                    <li class="">
                        <a href="#"><strong>Início</strong></a>
                    </li>
                    <li class="">
                     <a href="#">Buscar produto</a>
                    </li>
                    <li class="">
                        <a href="#">Rankings</a>
                    </li>
                    <li class="">
                        <a href="#">Mais avaliados</a>
                    </li>
                </ul>
            </div>
            
            <div class="col-4 col-lg-3 d-flex flex-row justify-content-center">
                <ul style="list-style: none; margin: 10px!important;">
                    <li class="">
                        <a href="#"><strong>Sobre</strong></a>
                    </li>
                    <li class="">
                     <a href="#">Empresa</a>
                    </li>
                    <li class="">
                        <a href="#">Mapa do site</a>
                    </li>
                    <li class="">
                        <a href="#">Contato</a>
                    </li>
                </ul>
            </div>
           
            <div class="col-4 col-lg-3 d-flex flex-row justify-content-center">
                <ul style="list-style: none; margin: 10px!important;">
                    <li class="">
                        <a href="#"><strong>Suporte</strong></a>
                    </li>
                    <li class="">
                     <a href="#">FAQ</a>
                    </li>
                    <li class="">
                        <a href="#">Sugestões</a>
                    </li>
                    <li class="">
                        <a href="#">Termos</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-lg-3 d-flex flex-row justify-content-center">
                <div class="d-flex flex-column justify-content-center">
                    <div class="d-flex flex-row justify-content-center align-items-center">
                        <i class="fa fa-facebook p-2 social-icon" aria-hidden="true"></i>
                        <i class="fa fa-instagram p-2 social-icon" aria-hidden="true"></i>
                        <i class="fa fa-twitter p-2 social-icon" aria-hidden="true"></i>
                        <i class="fa fa-linkedin p-2 social-icon" aria-hidden="true"></i>
                    </div>
                    <div class="d-flex flex-row justify-content-center" style="background-color: rgba(235, 41, 41, 0.9); border-radius: 0.95rem; cursor: pointer">
                       <span style="font-size: 1.2rem; color: #fff">Contato</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer d-flex flex-row justify-content-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="d-flex flex-row align-items-end">
                    <p class="m-0" style="color: #4f4f4f; font-family: 'Lobster'; font-size: 1.7rem">Evall®</p><p class="m-2" style="color: #4f4f4f"> 2020</p>
                </div>
                <p class="m-0" style="color: #4f4f4f">todos os direiotos reservados</p>
            </div>
        </div>
    </footer>
</body>
</html>
