    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="titulo">Farmacia</label>
        
        <div class="col-md-9">
        
            <select class="form-control" name="idFarmacia" id="idFarmacia" required>
                                            
            <option value="0" disabled>Seleccione</option>
            
            @foreach($farmacias as $f)
                
                <option value="{{$f->direccion}}">{{$f->nombre}}, {{$f->direccion}}</option>
                    
            @endforeach
            </select>        
        </div>                                       
    </div>
    
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Direccion destino</label>
        <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Ingrese distancia" id="buscar" name="buscar">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i>Calcular</button>
        
    </div>