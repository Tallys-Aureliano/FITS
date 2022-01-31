<!DOCTYPE html>
<html lang="{{str_replace('_','_', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!--fonte do google-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!--boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script>
</head>
    
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="" class="narvar-brand">
                    <img src="/img/logo.png" alt="HDC Events"></a>
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Serviços</a></li>
                    <li class="nav-item">
                        <a href="/events/create" class="nav-link">Cadastrar serviços</a></li>
                    
                    @auth 
                     <li class="nav-item"> 
                     <form action="{{route('logout')}}" method=POST>
                        @csrf
                        <button class="nav-link" id = "sair" 
                                        >Sair da conta
                        </button>
                        <!-- <button class="nav-link">Logout</button> -->
                    </form>
                    @endauth
                        
                        
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar/Editar</a></li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar usuários</a></li>
                        </ul></div>
            </nav>
        </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                <p class="msg">{{ session('msg') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
</main>
    <footer>
        <p>Casa da Lubrificação &copy; 2022</p>
    </footer>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>