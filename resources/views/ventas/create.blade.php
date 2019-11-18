@extends('home')
@section('contenido')

<main class="main">
    <!-- Breadcrumb -->
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <h2>Operar venta en {{$farm}}</h2><br/>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div >
                        <form action="{{route('venta.store')}}" method="POST">
                            {{csrf_field()}}  
                            <input type="hidden" id="id_farmaciac" name="id_farmaciac" value="{{$sql}}">
                            <div class="form-group ">
                                <div class="col-md-6 row">
                                    <label class="form-control-label" for="num_ventac">Número venta</label>                        
                                    <input type="text" id="num_ventac" name="num_ventac" class="form-control" placeholder="Ingrese el número venta" required pattern="[0-9]{0,15}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Cliente</label>
                                    <select class="form-control selectpicker" name="id_clientec" id="id_clientec" data-live-search="true">                                                    
                                        <option value="0" disabled>Seleccione</option>                    
                                        @foreach($clientes as $cli)                    
                                        <option value="{{$cli->id}}">{{$cli->nombre1}} {{$cli->apellido1}}</option>                            
                                        @endforeach                                        
                                    </select>
                                
                                </div> 
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Forma de pago</label>
                                    <select class="form-control selectpicker" name="idTipoPago" id="idTipoPago" data-live-search="true">                                                    
                                        <option value="0" disabled>Seleccione</option>                    
                                        @foreach($tipos as $t)                    
                                        <option value="{{$t->id}}">{{$t->nombre}}</option>                            
                                        @endforeach                                        
                                    </select>
                                
                                </div> 
                            </div>
                            <br/><br/>
                            <div class="row">
                                <div class="form-group col-md-4"> 
                                    <label class="form-control-label" for="nombre">Medicamento</label>
                                    <select class="form-control selectpicker" name="id_productoc" id="id_productoc" data-live-search="true">                                                            
                                        <option value="0" selected>Seleccione</option>                            
                                        @foreach($productos as $prod)                            
                                        <option value="{{$prod->id}}_{{$prod->stock}}_{{$prod->precio_venta}}">{{$prod->producto}}</option>                                    
                                         @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Cantidad</label>  
                                    <input type="number" id="cantidadc" name="cantidadc" class="form-control" placeholder="Ingrese cantidad" pattern="[0-9]{0,15}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Stock</label>  
                                    <input type="number" disabled id="stockc" name="stockc" class="form-control" placeholder="Ingrese stock" pattern="[0-9]{0,15}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Precio</label>
                                    <input type="number" disabled id="precio_ventac" name="precio_ventac" class="form-control" placeholder="Ingrese precio" pattern="[0-9]{0,15}">                        
                                </div>
                                <div class="form-group col-md-6">                        
                                    <button type="button" id="agregarc" class="btn btn-primary"><i class="fa fa-plus fa-2x"></i> Agregar detalle</button>
                                </div>
                            </div>

                            <br/><br/>
                            
                            <h3>Detalle de ventas</h3>
                            <table id="detallesc" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>Eliminar</th>
                                        <th>Medicamento</th>
                                        <th>Precio(Q.)</th>
                                        <th>Cantidad</th>
                                        <th>SubTotal (Q.)</th>
                                    </tr>
                                </thead>                                    
                                <tfoot>
                                    <tr>
                                        <th  colspan="4"><p align="right">TOTAL:</p></th>
                                        <th><p align="right"><span id="totalc">Q. 0.00</span> </p></th>
                                    </tr>
                                    <tr>
                                        <th  colspan="4"><p align="right">TOTAL PAGAR:</p></th>
                                        <th><p align="right"><span align="right" id="total_pagar_htmlc">Q. 0.00</span> <input type="hidden" name="total_pagarc" id="total_pagarc"></p></th>
                                    </tr> 
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                             
                            <div class="modal-footer form-group row" id="guardarc">            
                                <div class="col-md">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">              
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Registrar</button>            
                                </div>
                            </div>
                        </form>  
                        </div>                        
                </div>
            </div>       
        </div>
    </div>
</main>
@endsection