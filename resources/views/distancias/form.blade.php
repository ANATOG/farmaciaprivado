    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="titulo">Punto A</label>
        
        <div class="col-md-9">
        
            <select class="form-control" name="idPuntoA" id="idPuntoA" required>
                                            
            <option value="0" disabled>Seleccione</option>
            
            @foreach($farmacias as $f)
                
                <option value="{{$f->id}}">{{$f->nombre}}</option>
                    
            @endforeach
            </select>        
        </div>                                       
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="titulo">Punto B</label>
        
        <div class="col-md-9">
        
            <select class="form-control" name="idPuntoB" id="idPuntoB" required>
                                            
            <option value="0" disabled>Seleccione</option>
            
            @foreach($farmacias as $f)
                
                <option value="{{$f->id}}">{{$f->nombre}}</option>
                    
            @endforeach
            </select>        
        </div>                                       
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Distancia</label>
        <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Ingrese distancia" id="distancia" name="distancia">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
        
    </div>