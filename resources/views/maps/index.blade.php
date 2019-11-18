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

                       <h2>Calcula distancias</h2><br/>
                      
                        <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#nuevoMaps">
                        Calcular
                        </button>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-primary">
                                    <tr class="bg-primary">
                                        <th>Distancia</th>
                                        <th>Tiempo estimado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                            <th>{{$dist}}</th>  
                                            <th>{{$duracion}}</th> 
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/-->
            <div class="modal fade" id="nuevoMaps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Calcular</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('calcular.store')}}" method="post"  class="form-horizontal">
                            {{ csrf_field() }} 
                                @include('maps.form')
                                
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