    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">DPI</label>
        <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Ingrese el DPI" id="dpi" name="dpi" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Primer nombre</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder=" Primer nombre del Empleado" id="nombre1" name="nombre1" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Segundo nombre</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Segundo nombre del Empleado" id="nombre2" name="nombre2">
        </div>
    </div> 
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Primer Apellido</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Primer apellido del Empleado" id="apellido1" name="apellido1" required>
        </div>    
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Segundo Apellido</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Segundo apellido del Empleado" id="apellido2" name="apellido2">
        </div>    
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Direccion</label>
        <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Ingrese dirección" id="direccion" name="direccion">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Teléfono</label>
        <div class="col-md-9">
                <input type="tel" class="form-control" placeholder="(502)5555-5555" id="telefono" name="telefono">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Email</label>
        <div class="col-md-9">
                <input type="tel" class="form-control" placeholder="mimail@example.com5" id="correo" name="correo">
        </div>
    </div>
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

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
        
    </div>