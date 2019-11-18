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
                            <i class="nav-icon far fa-eye"></i>Control</a>
                        <ul class="nav-dropdown-items"> 
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('activo')}}" onclick="event.preventDefault(); document.getElementById('activo-form').submit();"><i class="fa fa-suitcase"></i>Activos Fijos</a>                              
                                <form id="activo-form" action="{{url('activo')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('tipogasto')}}" onclick="event.preventDefault(); document.getElementById('tipogasto-form').submit();"><i class="fas fa-hand-holding-usd"></i>Gastos</a>                               
                                <form id="tipogasto-form" action="{{url('tipogasto')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('compra')}}" onclick="event.preventDefault(); document.getElementById('compra-form').submit();"><i class="fas fa-shopping-basket"></i>Compras</a>                               
                                <form id="compra-form" action="{{url('compra')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>
                        </ul>  
                    </li> 
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon fas fa-outdent"></i>Terceros</a>
                        <ul class="nav-dropdown-items">  
                                              
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('medicamento')}}" onclick="event.preventDefault(); document.getElementById('medicamento-form').submit();"><i class="fas fa-pills"></i>Medicamentos</a>
                                
                                <form id="medicamento-form" action="{{url('medicamento')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('proveedor')}}" onclick="event.preventDefault(); document.getElementById('proveedor-form').submit();"><i class="fas fa-user-friends"></i>Proveedores</a>
                                
                                <form id="proveedor-form" action="{{url('proveedor')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('principio')}}" onclick="event.preventDefault(); document.getElementById('principio-form').submit();"><i class="fas fa-pills"></i>Principios activos</a>                              
                                <form id="principio-form" action="{{url('principio')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('marca')}}" onclick="event.preventDefault(); document.getElementById('marca-form').submit();"><i class="far fa-copyright"></i>Marcas</a>
                                
                                <form id="marca-form" action="{{url('marca')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('farmacia')}}" onclick="event.preventDefault(); document.getElementById('farmacia-form').submit();"><i class="fas fa-hospital"></i>Farmacia</a>                                
                                <form id="farmacia-form" action="{{url('farmacia')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('distancia')}}" onclick="event.preventDefault(); document.getElementById('distancia-form').submit();"><i class="fas fa-route"></i>Distancias</a>                                
                                <form id="distancia-form" action="{{url('distancia')}}" method="GET" style="display: none;">
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
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon far fa-file-alt"></i>Reportes</a>
                        <ul class="nav-dropdown-items"> 
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/repmed')}}" onclick="event.preventDefault(); document.getElementById('/repmed-form').submit();"><i class="fas fa-dolly-flatbed"></i>Inventario</a>                             
                                <form id="/repmed-form" action="{{url('/repmed')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/repgasto')}}" onclick="event.preventDefault(); document.getElementById('/repgasto-form').submit();"><i class="fas fa-hand-holding-usd"></i></i>Gastos</a>                             
                                <form id="/repgasto-form" action="{{url('/repgasto')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/flujoe')}}" onclick="event.preventDefault(); document.getElementById('/flujoe-form').submit();"><i class="fas fa-search-dollar"></i>Flujo de ejectivo</a>                           
                                <form id="/flujoe-form" action="{{url('/flujoe')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/farmaciaspdf')}}" onclick="event.preventDefault(); document.getElementById('/farmaciaspdf-form').submit();"><i class="fas fa-hospital"></i>Farmacias</a>                       
                                <form id="/farmaciaspdf-form" action="{{url('/farmaciaspdf')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/activosrep')}}" onclick="event.preventDefault(); document.getElementById('/activosrep-form').submit();"><i class="fa fa-suitcase"></i>Activos</a>                            
                                <form id="/activosrep-form" action="{{url('/activosrep')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/intercambios')}}" onclick="event.preventDefault(); document.getElementById('/intercambios-form').submit();"><i class="fas fa-exchange-alt"></i>Intercambios</a>                           
                                <form id="/intercambios-form" action="{{url('/intercambios')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>                            
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon fas fa-user-cog"></i>Mantenimiento</a>
                        <ul class="nav-dropdown-items">                           

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('rol')}}" onclick="event.preventDefault(); document.getElementById('rol-form').submit();"><i class="far fa-address-card"></i>Roles</a>                              
                                <form id="rol-form" action="{{url('rol')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('usuario')}}" onclick="event.preventDefault(); document.getElementById('usuario-form').submit();"><i class="far fa-user-circle"></i>Usuarios</a>                             
                                <form id="usuario-form" action="{{url('usuario')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('empleado')}}" onclick="event.preventDefault(); document.getElementById('empleado-form').submit();"><i class="far fa-address-book"></i>Empleados</a>                              
                                <form id="empleado-form" action="{{url('empleado')}}" method="GET" style="display: none;">
                                {{csrf_field()}} 
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>

       