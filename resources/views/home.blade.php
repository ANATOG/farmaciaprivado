<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema control de activos, inventario compas y ventas con Laravel">
    <meta name="keyword" content="Sistema farmacia con Laravel">
    <title>Proyecto</title>
    <!-- Icons -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9288420451.js" crossorigin="anonymous"></script>
    <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
     
    
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
<header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!--PONER LOGO-->
        <!--<a class="navbar-brand" href="#"></a>-->
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#">PANEL DE CONTROL</a>
            </li>
           
        </ul>
        <ul class="nav navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="d-md-down-none">{{Auth::user()->name}} 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="{{route('logout')}}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Cerrar sesión</a>

                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                    {{ csrf_field() }} 
                    </form>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">

        @if(Auth::check())
            @if (Auth::user()->idRol == 1)
                @include('plantilla.sidebaradministrador')
            @elseif (Auth::user()->idRol == 2)
                @include('plantilla.sidebaroperador')
            @elseif (Auth::user()->idRol == 3)
                @include('plantilla.sidebarcallcenter')
            @else

            @endif

        @endif

         <!-- Contenido Principal -->
        @yield('contenido') 
         <!-- /Fin del contenido principal -->
       
    </div>   

    <footer class="app-footer">
        <span> Privado &copy; 2019</span>
        <span class="ml-auto">Desarrollado por Ana Torrez</a></span>
    </footer>
    
    <!-- Bootstrap and necessary plugins -->  
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>
    <!-- Plugins and scripts required by all views -->
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <!-- GenesisUI main scripts -->
    <script src="{{asset('js/template.js')}}"></script>

    @include('js')
    
    
</body>

</html>