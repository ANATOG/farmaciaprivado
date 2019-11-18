
    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="nombre">Nombre</label>
                <div class="col-md-9">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el Nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
                    
                </div>
    </div>
    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="telefono">Correo</label>
                <div class="col-md-9">
                  
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el correo">
                       
                </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="titulo">Rol</label>
        
        <div class="col-md-9">
        
            <select class="form-control" name="idRol" id="idRol" required>
                                            
            <option value="0" disabled>Seleccione</option>
            
            @foreach($roles as $r)
                
                <option value="{{$r->id}}">{{$r->nombre}}</option>
                    
            @endforeach
            </select>        
        </div>                                       
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="titulo">Empleado</label>
        
        <div class="col-md-9">
        
            <select class="form-control" name="idEmpleado" id="idEmpleado" required>
                                            
            <option value="0" disabled>Seleccione</option>
            
            @foreach($empleados as $e)
                
                <option value="{{$e->id}}">{{$e->nombre1}}{{$e->apellido1}}</option>
                    
            @endforeach
            </select>        
        </div>                                       
    </div>
    
    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="password">Password</label>
                <div class="col-md-9">
                  
                    <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese el password" required>
                       
                </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
        
    </div>