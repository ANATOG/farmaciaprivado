
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="titulo">Tipo de gasto</label>        
        <div class="col-md-9">        
            <select class="form-control" name="idTipogasto" id="idTipogasto" required>                                            
            <option value="0" disabled>Seleccione</option>            
            @foreach($tipos as $t)                
                <option value="{{$t->id}}">{{$t->nombre}}</option>                    
            @endforeach
            </select>        
        </div>                                       
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Fecha</label>
        <div class="col-md-9">
            <input type=date class="form-control" name="fecha" id="fecha"required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Detalle</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Detalle" id="detalle" name="detalle">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Monto Gasto</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Q0.00" id="monto" name="monto" required>
        </div>
    </div>
    
   

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
        
    </div>