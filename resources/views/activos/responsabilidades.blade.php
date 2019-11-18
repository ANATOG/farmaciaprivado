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

                       <h2>Listado de Responsabilidad de activos</h2><br/>
                      
                        <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#nuevoRes">
                        <i class="fas fa-plus-circle"></i>
                        </button>
                    </div>
                    <div class="card-body">
                       <div class="form-group row">
                            <div class="col-md-6">
                            {{$buscar=''}}
                            {{ Form::open(array('url'=>'responsabilidad', 'method'=>'GET','autocomplete'=>'off','role'=>'search'))}}
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
                                        <th>Fecha</th>
                                        <th>Activo</th>
                                        <th>Empleado</th>
                                        <th>Farmacia</th>
                                        <th>Notas</th>
                                        <th>Ver Ficha</th>
                                        <th>Estado</th>
                                        <th>Cambiar Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        @foreach($responsabilidades as $r)
                                            <td>{{$r->fechaasig}}</td>                                            
                                            <td>{{$r->activo}}</td>                                            
                                            <td>{{$r->empleado}}</td>
                                            <td>{{$r->farmacia}}</td>
                                            <td>{{$r->descripcion}}</td>
                                            <td>                                     
                                                <a href="{{URL::action('ResponsabilidadController@fichaPdf',$r->id)}}">
                                                <button type="button" class="btn btn-warning btn-md">
                                                    <i class="fa fa-eye fa-x"></i> Ver detalle
                                                </button> &nbsp;

                                                </a>
                                            </td>
                                            <td>
                                                @if($r->condicion=='1')
                                                <button type="button" class="btn btn-success btn-md">
                                            
                                                <i class="fa fa-check"></i>
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-danger btn-md">
                                            
                                                <i class="far fa-times-circle"></i>
                                                </button>
                                                @endif
                                            
                                            </td>

                                            <td>
                                                @if($r->condicion)
                                                <button type="button" class="btn btn-danger btn-sm" data-id_responsabilidad="{{$r->id}}" data-toggle="modal" data-target="#cambiarRes">
                                                    <i class="fa fa-lock"></i> 
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-success btn-sm" data-id_responsabilidad="{{$r->id}}" data-toggle="modal" data-target="#cambiarRes">
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
            <div class="modal fade" id="nuevoRes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Responsabilidad</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('responsabilidad.store')}}" method="post"  class="form-horizontal">
                            {{ csrf_field() }} 
                                @include('activos.formres')
                                
                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->s
            </div>
            <!--Fin del modal-->

            
            <!--Inicio del cambiar estado/-->
            <div class="modal fade" id="cambiarRes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cambiar estado</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('responsabilidad.destroy','test')}}" method="post"  class="form-horizontal">
                                {{method_field('delete')}}<!-- proteger en la modificacion de registro -->
                                {{ csrf_field() }} 
                                <input type="hidden" id="id_responsabilidad" name="id_responsabilidad" value="">
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