@extends('home')
@section('contenido')

<main class="main">
    <!-- Breadcrumb -->
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <h2>Agregar compra</h2><br/>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div >
                        <form action="{{route('compra.store')}}" method="POST">
                            {{csrf_field()}}  
                            <div class="form-group ">
                                <div class="col-md-6 row">
                                    <label class="form-control-label" for="num_compra">Número Compra</label>                        
                                    <input type="text" id="num_compra" name="num_compra" class="form-control" placeholder="Ingrese el número compra" required pattern="[0-9]{0,15}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Proveedor</label>
                                    <select class="form-control selectpicker" name="id_proveedor" id="id_proveedor" data-live-search="true">                                                    
                                        <option value="0" disabled>Seleccione</option>                    
                                        @foreach($proveedores as $prove)                    
                                        <option value="{{$prove->id}}">{{$prove->nombre}}</option>                            
                                        @endforeach                                        
                                    </select>
                                
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Farmacia destino</label>
                                    <select class="form-control selectpicker" name="id_farmacia" id="id_farmacia" data-live-search="true">                                                    
                                        <option value="0" disabled>Seleccione</option>                    
                                        @foreach($farmacias as $f)                    
                                        <option value="{{$f->id}}">{{$f->nombre}}</option>                            
                                    @endforeach
                                </select>
                                </div> 
                            </div>
                            <br/><br/>
                            <div class="row">
                                <div class="form-group col-md-6"> 
                                    <label class="form-control-label" for="nombre">Producto</label>
                                    <select class="form-control selectpicker" name="id_producto" id="id_producto" data-live-search="true">                                                            
                                        <option value="0" selected>Seleccione</option>                            
                                        @foreach($productos as $prod)                            
                                        <option value="{{$prod->id}}">{{$prod->producto}}</option>                                    
                                         @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Cantidad</label>  
                                    <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese cantidad" pattern="[0-9]{0,15}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Precio</label>
                                    <input type="number" id="precio_compra" name="precio_compra" class="form-control" placeholder="Ingrese precio" pattern="[0-9]{0,15}">                        
                                </div>
                                <div class="form-group col-md-6">                        
                                    <button type="button" id="agregar" class="btn btn-primary"><i class="fa fa-plus fa-2x"></i> Agregar detalle</button>
                                </div>
                            </div>

                            <br/><br/>
                            
                            <h3>Detalle de Compras</h3>
                            <table id="detalles" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>Eliminar</th>
                                        <th>Producto</th>
                                        <th>Precio(Q.)</th>
                                        <th>Cantidad</th>
                                        <th>SubTotal (Q.)</th>
                                    </tr>
                                </thead>                                    
                                <tfoot>
                                    <tr>
                                        <th  colspan="4"><p align="right">TOTAL:</p></th>
                                        <th><p align="right"><span id="total">Q. 0.00</span> </p></th>
                                    </tr>
                                    <tr>
                                        <th  colspan="4"><p align="right">TOTAL PAGAR:</p></th>
                                        <th><p align="right"><span align="right" id="total_pagar_html">Q. 0.00</span> <input type="hidden" name="total_pagar" id="total_pagar"></p></th>
                                    </tr> 
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                             
                            <div class="modal-footer form-group row" id="guardar">            
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