@extends('home')
@section('contenido')

<main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/"><h1>FARMACIA AMEDIC S.A.</h1></a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">

                       <h2>Listado de Activos</h2><br/>
                      
                        <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#nuevoAc">
                        <i class="fas fa-plus-circle"></i>
                        </button>
                        <a href="{{url('responsabilidad')}}" class="btn btn-primary btn-lg" type="button" >
                        CONTROL DE ACTIVOS
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                            {{$buscar=''}}
                            {{ Form::open(array('url'=>'activo', 'method'=>'POST','autocomplete'=>'off','role'=>'search'))}}
                            <div class="input-group">
                                <input type="search" class="form-control" name="buscar" placeholder="Buscar" value="{{$buscar}}">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                            {{Form::close()}}
                                
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-primary">
                                    <tr class="bg-primary">
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Serie</th>
                                        <th>Precio</th>
                                        <th>Estado</th>
                                        <th>Editar</th>
                                        <th>Cambiar Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        @foreach($activos as $a)
                                            <td>{{$a->nombre}}</td>                                            
                                            <td>{{$a->marca}}</td>                                            
                                            <td>{{$a->modelo}}</td>
                                            <td>{{$a->serie}}</td>
                                            <td>Q. {{$a->precio}}</td>
                                            <td>
                                                @if($a->condicion=='1')
                                                <button type="button" class="btn btn-success btn-md">
                                            
                                                <i class="fa fa-check"></i>
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-danger btn-md">
                                            
                                                <i class="far fa-times-circle"></i>
                                                </button>
                                                @endif
                                            
                                            </td>

                                            <td>                            <!-- funcionalidad de Jquery-->
                                                <button type="button" class="btn btn-info btn-md" data-id_activo="{{$a->id}}" data-nombre="{{$a->nombre}}" 
                                                data-precio="{{$a->precio}}" data-modelo="{{$a->modelo}}" data-serie="{{$a->serie}}" 
                                                data-marca="{{$a->marca}}"  data-toggle="modal" data-target="#modificarAc">

                                                <i class="fa fa-edit"></i>
                                                </button> &nbsp;
                                            </td>

                                            <td>
                                                @if($a->condicion)
                                                <button type="button" class="btn btn-danger btn-sm" data-id_activo="{{$a->id}}" data-toggle="modal" data-target="#cambiarAc">
                                                    <i class="fa fa-lock"></i> 
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-success btn-sm" data-id_activo="{{$a->id}}" data-toggle="modal" data-target="#cambiarAc">
                                                    <i class="fas fa-unlock-alt"></i>
                                                </button>

                                                @endif                                            
                                            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/-->
            <div class="modal fade" id="nuevoAc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar activo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('activo.store')}}" method="post"  class="form-horizontal">
                            {{ csrf_field() }} 
                                @include('activos.form')
                                
                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->s
            </div>
            <!--Fin del modal-->

            <!--Inicio del modal modificar/-->
            <div class="modal fade" id="modificarAc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar activo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('activo.update','test')}}" method="post"  class="form-horizontal">
                                {{method_field('patch')}}<!-- proteger en la modificacion de registro -->
                                {{ csrf_field() }} 
                                <input type="hidden" id="id_activo" name="id_activo" value="">
                                @include('activos.form')                                
                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
            <!--Inicio del cambiar estado/-->
            <div class="modal fade" id="cambiarAc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cambiar estado</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('activo.destroy','test')}}" method="post"  class="form-horizontal">
                                {{method_field('delete')}}<!-- proteger en la modificacion de registro -->
                                {{ csrf_field() }} 
                                <input type="hidden" id="id_activo" name="id_activo" value="">
                                <!--Inicio del cambiar estado/-->
                                <p>Esta seguro de cambiar el estado</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Confirmar</button>
                                </div>                                
                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
           
           
            
        </main>
        


@endsection