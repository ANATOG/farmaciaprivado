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

                       <h2>Listado de Ventas</h2><br/>
                       
                       <a href="/venta/create">

                        <button class="btn btn-primary btn-lg" type="button">
                            <i class="fa fa-plus fa-x"></i>
                        </button>

                        </a>
                       
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-6">
                            {!! Form::open(array('url'=>'venta','method'=>'get','autocomplete'=>'off','role'=>'search')) !!} 
                                <div class="input-group">
                                   
                                    <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscar}}">
                                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            {{Form::close()}}
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr class="bg-primary">
                                    
                                    <th>Ver Detalle</th>
                                    <th>Fecha Venta</th>
                                    <th>Número Venta</th>
                                    <th>Forma de pago</th>
                                    <th>Cliente</th>
                                    <th>Farmacia</th>
                                    <th>Vendedor</th> 
                                    <th>Total (Q.)</th>
                                    <th>Estado</th>
                                    <th>Cambiar Estado</th>
                                    <th>Ver PDF</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                              @foreach($ventas as $v)
                               
                                <tr>
                                    <td>
                                     
                                     <a href="{{URL::action('VentaController@show',$v->id)}}">
                                       <button type="button" class="btn btn-warning btn-md">
                                         <i class="fa fa-eye fa-x"></i> Ver detalle
                                       </button> &nbsp;

                                     </a>
                                   </td>

                                    <td>{{$v->fecha_venta}}</td>
                                    <td>{{$v->numventa}}</td>
                                    <td>{{$v->tipo}}</td> 
                                    <td>{{$v->cliente}}</td>                                    
                                    <td>{{$v->farmacia}}</td>
                                    <td>{{$v->usuario}}</td>
                                    <td>Q.{{number_format($v->total,2)}}</td>
                                    <td>
                                      
                                      @if($v->estado=="Registrado")
                                        <button type="button" class="btn btn-success btn-md">
                                    
                                          <i class="fa fa-check fa-x"></i> Registrado
                                        </button>

                                      @else

                                        <button type="button" class="btn btn-danger btn-md">
                                    
                                          <i class="fa fa-check fa-x"></i> Anulado
                                        </button>

                                       @endif
                                       
                                    </td>

                                    
                                    <td>

                            

                                            @if($v->estado=="Registrado")

                                                <button type="button" class="btn btn-danger btn-sm" data-id_compra="{{$v->id}}" data-toggle="modal" data-target="#cambiarEstadoVent">
                                                    <i class="fa fa-times fa-x"></i> Anular Compra
                                                </button>

                                                @else

                                                <button type="button" class="btn btn-success btn-sm">
                                                    <i class="fa fa-lock fa-x"></i> Anulado
                                                </button>

                                            @endif
                                       
                                    </td>
                                    <td>
                                       
                                       <a href="{{url('pdfVenta',$v->id)}}" target="_blank">
                                          
                                          <button type="button" class="btn btn-info btn-sm">
                                           
                                            <i class="fa fa-file fa-x"></i> Descargar PDF
                                          </button> &nbsp;

                                       </a> 

                                   </td>

                                    
                                </tr>

                                @endforeach
                               
                            </tbody>
                        </table>

                        
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
                       
           
        <!-- Inicio del modal cambiar estado de compra -->
         <div class="modal fade" id="cambiarEstadoVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cambiar Estado de Compra</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>

                    <div class="modal-body">
                        <form action="{{route('venta.destroy','test')}}" method="POST">
                          {{method_field('delete')}}
                          {{csrf_field()}} 

                            <input type="hidden" id="id_venta" name="id_venta" value="">

                                <p>Estas seguro de cambiar el estado?</p>
        

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-x"></i>Cerrar</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-lock fa-x"></i>Aceptar</button>
                            </div>

                         </form>
                    </div>
                    <!-- /.modal-content -->
                   </div>
                <!-- /.modal-dialog -->
             </div>
            <!-- Fin del modal Eliminar -->
           
            
        </main>
@endsection