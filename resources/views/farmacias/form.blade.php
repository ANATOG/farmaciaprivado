
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Nombre de la farmacia" id="nombre" name="nombre" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Direccion</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Direccion exacta" id="direccion" name="direccion" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="titulo">Departamento</label>
        
        <div class="col-md-9">
        
            <select class="form-control" name="idDepartamento" id="idDepartamento" required>
                                            
            <option value="0" disabled>Seleccione</option>
            
            @foreach($departamentos as $d)
                
                <option value="{{$d->id}}">{{$d->nombre}}</option>
                    
            @endforeach
            </select>        
        </div>                                       
    </div>
    
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Telefono</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Telefono" id="telefono" name="telefono" required>
        </div>    
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Email</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="email@gmail.com" id="email" name="email">
        </div>    
    </div>
    <div class="form-group row">
            <label class="col-md-3 form-control-label" for="titulo">Tipo</label>
            
            <div class="col-md-9">
            
                <select class="form-control" name="idTipo" id="idTipo" required>
                                                
                <option value="0" disabled>Seleccione</option>
                
                @foreach($tipos as $t)
                  
                   <option value="{{$t->id}}">{{$t->nombre}}</option>
                        
                @endforeach

                </select>
            
            </div>
                                       
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Capital Inicial</label>
        <div class="col-md-9">
            <input type="number" class="form-control" placeholder="Q.00" id="capital" name="capital">
        </div>    
    </div>
    
   

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
        
    </div>