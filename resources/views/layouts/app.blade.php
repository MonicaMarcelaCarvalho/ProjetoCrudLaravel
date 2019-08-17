<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <script src="{{ asset('js/jquery.mask.js') }}" defer></script>

    <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#example').DataTable();
            } );
 </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


   
      
      
       

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                   
							<li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
							<li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> 
                       

                        @else
                           <li><a class="nav-link" href="/especie/cadastro">{{ __('Especie') }}</a></li>
                            <li><a class="nav-link" href="/especie/visualizar">{{ __('Visualizar Especie') }}</a></li>
                            <li><a class="nav-link" href="/animal/cadastro">{{ __('Animal') }}</a></li>
                            <li><a class="nav-link" href="/animal/visualizar">{{ __('Visualizar Animal') }}</a></li>
							<li><a class="nav-link" href="/atendimento/cadastro">{{ __('Atendimento') }}</a></li>
                            <li><a class="nav-link" href="/atendimento/visualizar">{{ __('Visualizar Atendimento') }}</a></li>
							 <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
						

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
					<section>
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $erro)
								<li>{{ $erro }}</li>
							@endforeach
						</ul>
					</div>
				@endif
			
				<!-- <img src="{{ asset('img\fotolegal.jpg') }}" />-->
				@yield("conteudo")
			</section>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
