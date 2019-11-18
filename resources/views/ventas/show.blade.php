@extends('home')
@section('contenido')


<main class="main">

 <div class="card-body">

  <h2 class="text-center">Detalle de Venta</h2><br/><br/><br/>

  @foreach($venta as $venta)
            <div class="form-group row">

                    <div class="col-md-4">  

                        <label class="form-control-label" for="nombre">Cliente</label>
                        
                        <p>{{$venta->cliente}}</p>
                            
                    </div>
 

                    <div class="col-md-4">
                            <label class="form-control-label" for="num_venta">Número Venta</label>
                            
                            <p>{{$venta->numventa}}</p>
                    </div>

                    <div class="col-md-4">
                            <label class="form-control-label" for="pago">Forma de pago</label>
                            
                            <p>{{$venta->tipo}}</p>
                    </div>

            </div>

            
            <br/><br/>

           <div class="form-group row border">

              <h3>Detalle de Ventas</h3>

              <div class="table-responsive col-md-12">
                <table id="detalles" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr class="bg-success">

                        <th>Medicamento</th>
                        <th>Precio Venta Q. </th>
                        <th>Cantidad</th>
                        <th>SubTotal Q. </th>
                    </tr>
                </thead>
                 
                <tfoot>
                   
                   <!--<th><h2>TOTAL</h2></th>
                   <th></th>
                   <th></th>
                   <th></th>
                   <th><h4 id="total">{{$venta->total}}</h4></th>-->
                   <tr>
                        <th  colspan="3"><p align="right">TOTAL:</p></th>
                        <th><p align="right">Q. {{number_format($venta->total,2)}}</p></th>
                    </tr>

                    <tr>
                        <th  colspan="3"><p align="right">TOTAL PAGAR:</p></th>
                        <th><p align="right">Q.{{number_format($venta->total,2)}}</p></th>
                    </tr>  
                </tfoot>

                <tbody>
                   
                   @foreach($detalles as $det)

                    <tr>
                     
                      <td>{{$det->medicamento}}</td>
                      <td>Q.{{$det->precio}}</td>
                      <td>{{$det->cantidad}}</td>
                      <td>Q.{{number_format($det->cantidad*$det->precio)}}</td>
                    
                    
                    </tr> 


                   @endforeach
                   @endforeach
                   
                </tbody>
                
                
                </table>
              </div>
            
            </div>


    </div><!--fin del div card body-->
  </main>

@endsection