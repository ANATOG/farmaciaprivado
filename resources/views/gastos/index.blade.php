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

                       <h2>Planilla de gastos mes {{now()->month}}</h2><br/>
                      
                        <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#nuevoGas">
                        <i class="fas fa-plus-circle"></i>
                        </button>
                        <a href="{{URL::action('GastoController@planillapdf',$farm)}}" class="btn btn-primary btn-lg" type="button" >
                            IMPRIMIR PLANILLA
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-primary">
                                    <tr class="bg-primary">
                                        <th>No Documento</th>
                                        <th>Tipo Gasto</th>
                                        <th>Descripcion</th>
                                        <th>Monto</th>
                                        <th>Fecha</th>
                                        <th>Reporto</th>
                                        <th>Farmacia</th>
                                        <th>Estado</th>
                                        <th>Cambiar Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        @foreach($gastos as $g)
                                            <td>{{$g->nodoc}}</td>                                            
                                            <td>{{$g->tipo}}</td>                                            
                                            <td>{{$g->descripcion}}</td>
                                            <td>Q. {{$g->monto}}</td>
                                            <td>{{$g->fecha}}</td>
                                            <td>{{$g->usuario}}</td>
                                            <td>{{$g->farmacia}}</td>
                                            <td>
                                                @if($g->condicion=='1')
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
                                                @if($g->condicion)
                                                <button type="button" class="btn btn-danger btn-sm" data-id_gasto="{{$g->id}}" data-toggle="modal" data-target="#cambiarGas">
                                                    <i class="fa fa-lock"></i> 
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-success btn-sm" data-id_gasto="{{$g->id}}" data-toggle="modal" data-target="#cambiarGas">
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
            <div class="modal fade" id="nuevoGas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar gasto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('gasto.store')}}" method="post"  class="form-horizontal">
                            {{ csrf_field() }} 
                                @include('gastos.form')
                                
                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->

            <!--Inicio del modal modificar/-->
            
            <!--Inicio del cambiar estado/-->
            <div class="modal fade" id="cambiarGas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cambiar estado</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('gasto.destroy','test')}}" method="post"  class="form-horizontal">
                                {{method_field('delete')}}<!-- proteger en la modificacion de registro -->
                                {{ csrf_field() }} 
                                <input type="hidden" id="id_gasto" name="id_gasto" value="">
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