<div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('home')}}" onclick="event.preventDefault(); document.getElementById('home-form').submit();"><i class="fa fa-list"></i>Panel</a>
                            
                        <form id="home-form" action="{{url('home')}}" method="GET" style="display: none;">
                        {{csrf_field()}} 
                        </form>
                    </li>
                    <li class="nav-title">
                        Menú
                    </li> 
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon fas fa-store"></i>Sucursales</a>
                            <ul class="nav-dropdown-items"> 
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('intercambio')}}" onclick="event.preventDefault(); document.getElementById('intercambio-form').submit();"><i class="fas fa-pills"></i>Buscar medicamento</a>                              
                                    <form id="intercambio-form" action="{{url('intercambio')}}" method="GET" style="display: none;">
                                    {{csrf_field()}} 
                                    </form>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('venta')}}" onclick="event.preventDefault(); document.getElementById('venta-form').submit();"><i class="fas fa-cash-register"></i>Ventas</a>                               
                                    <form id="venta-form" action="{{url('venta')}}" method="GET" style="display: none;">
                                    {{csrf_field()}} 
                                    </form>
                                </li>  
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('cliente')}}" onclick="event.preventDefault(); document.getElementById('cliente-form').submit();"><i class="fas fa-user-friends"></i>Clientes</a>                                
                                    <form id="cliente-form" action="{{url('cliente')}}" method="GET" style="display: none;">
                                    {{csrf_field()}} 
                                    </form>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/gasto')}}" onclick="event.preventDefault(); document.getElementById('/gasto-form').submit();"><i class="fas fa-file-invoice"></i>Planilla de Gastos</a>                            
                                    <form id="/gasto-form" action="{{url('/gasto')}}" method="GET" style="display: none;">
                                    {{csrf_field()}} 
                                    </form>
                                </li> 
                        </ul>
                    </li>                  
                   
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon fas fa-outdent"></i>Call Center</a>
                            <ul class="nav-dropdown-items">                             
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/verdistancia')}}" onclick="event.preventDefault(); document.getElementById('/verdistancia-form').submit();"><i class="fas fa-route"></i>Distancias</a>                           
                                <form id="/verdistancia-form" action="{{url('/verdistancia')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>                             
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('calcular')}}" onclick="event.preventDefault(); document.getElementById('calcular-form').submit();"><i class="fas fa-hospital"></i>Calculadora</a>                           
                                <form id="calcular-form" action="{{url('calcular')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>
                        </ul>
                    </li>
                    
                    
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>

       