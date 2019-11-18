
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Nombre del medicamento" id="nombre" name="nombre" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Precio</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Precio Q0.00" id="precio" name="precio" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Contenido</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Contenido" id="contenido" name="contenido" required>
        </div>    
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Descripcion</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Descripcion" id="descripcion" name="descripcion">
        </div>    
    </div>
    <div class="form-group row">
            <label class="col-md-3 form-control-label" for="titulo">Marca</label>
            
            <div class="col-md-9">
            
                <select class="form-control" name="idMarca" id="idMarca" required>
                                                
                <option value="0" disabled>Seleccione</option>
                
                @foreach($marcas as $m)
                  
                   <option value="{{$m->id}}">{{$m->nombre}}</option>
                        
                @endforeach

                </select>
            
            </div>
                                       
    </div>
    <div class="form-group row">
            <label class="col-md-3 form-control-label" for="titulo">Marca</label>
            
            <div class="col-md-9">
            
                <select class="form-control" name="idPresentacion" id="idPresentacion" required>
                                                
                <option value="0" disabled>Seleccione</option>
                
                @foreach($presentaciones as $p)
                  
                   <option value="{{$p->id}}">{{$p->nombre}}</option>
                        
                @endforeach

                </select>
            
            </div>
                                       
    </div>
   

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
        
    </div>