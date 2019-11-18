    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="titulo">Farmacia</label>
        
        <div class="col-md-9">
        
            <select class="form-control" name="idFarmacia" id="idFarmacia" required>
                                            
            <option value="0" disabled>Seleccione</option>
            
            @foreach($farmacias as $f)
                
                <option value="{{$f->id}}">{{$f->nombre}}</option>
                    
            @endforeach
            </select>        
        </div>                                       
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="titulo">Activo</label>
        
        <div class="col-md-9">
        
            <select class="form-control" name="idActivo" id="idActivo" required>
                                            
            <option value="0" disabled>Seleccione</option>
            
            @foreach($activos as $s)
                
                <option value="{{$s->id}}">{{$s->nombre}}</option>
                    
            @endforeach
            </select>        
        </div>                                       
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="titulo">Empleado</label>
        
        <div class="col-md-9"> 
        
            <div class="from-group">
                {{ Form::select('idEmpleado',['placeholder'=>'Seleccione un empleado','required'],null,['id'=>'idEmpleado','class' => 'form-control'])}}
            </div>      
        </div>                                       
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Descripcion</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Notas" id="descripcion" name="descripcion" required>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
        
    </div>