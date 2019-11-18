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

                       <h2>Intercambios</h2><br/>
                      
                        
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                            {{$buscar=''}}
                            {{ Form::open(array('url'=>'intercambio', 'method'=>'GET','autocomplete'=>'off','role'=>'search'))}}
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
                                        <th>Medicamento</th>
                                        <th>Farmacia</th>
                                        <th>Existencia</th>
                                        <th>Distancia (M)</th>
                                        <th>Tiempo estimado (m)</th>
                                        <th>Intercambio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        @foreach($stocks as $s)
                                            <td>{{$s->medicamento}}</td>
                                            <td>{{$s->farmacia}}</td>
                                            <td>{{$s->existencia}}</td>
                                            <td>{{$s->distancia}}</td>
                                            <td>{{$s->tiempo}}</td>
                                            <td>                            <!-- funcionalidad de Jquery-->
                                                <button type="button" class="btn btn-info btn-md" data-idda="{{$s->idFarmacia}}" data-idStock="{{$s->id}}"
                                                        data-farmacia="{{$s->farmacia}}" data-idmedicamento="{{$s->idMedicamento}}" data-existencia="{{$s->existencia}}"
                                                        data-medicamento="{{$s->medicamento}}"
                                                        data-toggle="modal" data-target="#Modf">
                                                        <i class="fas fa-exchange-alt"></i>
                                                </button> &nbsp;
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
               
            <div class="modal fade" id="Modf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Intercambio</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('intercambio.store')}}" method="post"  class="form-horizontal">
                            {{ csrf_field() }} 
                                <input  type="hidden" id="idDa" name="idDa" value="">
                                <input  type="hidden" id="idMedicamento" name="idMedicamento" value="">
                                
                                @include('intercambios.form')
                                
                            </form>
                           
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>   
        </main>   
@endsection