

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
    
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}" data-toggle="dropdown">
        <i class="nav-icon fa fa-bars"></i>    
        S.U.E
    </a>
            <ul class="dropdown-menu">
                <p>Gerenciar:</p>
                <li>
                    <a class="nav-item-drop" href="{{route('criar_candidato')}}" style="text-decoration:none">  Criar Candidato </a>
                </li> 
                <li>
                    <a class="nav-item-drop"href="{{route('gerarRelatorio')}}" style="text-decoration:none">  Gerar Relatório </a>
                </li>                                                                               
            </ul>
    
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('paginaVotacao')}}">Votar</a>
        </li>
        <!--<li class="nav-item">
            <a class="nav-link" href="{{route('criar_candidato')}}">Criar Candidato</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('gerarRelatorio')}}">Gerar relatório</a>
        </li>
        -->
        <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </li>
    </div>
    </nav>







