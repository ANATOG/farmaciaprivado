
<script>

//////select de empleados

$("#idFarmacia").change(function(event)
    {
        $.get("/getempleado/"+event.target.value+"", function(response, getempleado){
            $("#idEmpleado").empty();
            for (i=0;i<response.length;i++){
                $("#idEmpleado").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
            }
        });
    });
//////fin select empleados



////venta/////////////////
$("#agregarc").click(function(){

agregarc();
});

var contc=0;
totalc=0;
subtotalc=[];
$("#guardarc").hide();
$("#id_productoc").change(mostrarValoresc);

function mostrarValoresc(){

datosProductoc = document.getElementById('id_productoc').value.split('_');
$("#precio_ventac").val(datosProductoc[2]);
$("#stockc").val(datosProductoc[1]);

} 

function agregarc(){

datosProductoc = document.getElementById('id_productoc').value.split('_');

id_productoc= datosProductoc[0];
productoc= $("#id_productoc option:selected").text();
cantidadc= $("#cantidadc").val();
precio_ventac= $("#precio_ventac").val();
stockc= $("#stockc").val();
impuestoc=20;
 
 if(id_productoc !="" && cantidadc!="" && cantidadc>0  && precio_ventac!=""){

       if(parseInt(stockc)>=parseInt(cantidadc)){

           subtotalc[contc]=(cantidadc*precio_ventac);
           totalc= totalc+subtotalc[contc];

           var filac= '<tr class="selected" id="filac'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarc('+contc+');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="id_productoc[]" value="'+id_productoc+'">'+productoc+'</td> <td><input type="number" name="precio_ventac[]" value="'+parseFloat(precio_ventac).toFixed(2)+'"> </td> <td><input type="number" name="cantidadc[]" value="'+cantidadc+'"> </td> <td>Q. '+parseFloat(subtotalc[contc]).toFixed(2)+'</td></tr>';
           contc++;
           limpiarc();
           totalesc();   
           evaluarc();
           $('#detallesc').append(filac);

       } else{

           alert("La cantidad a vender supera el stock");       
          
       }
      
   }else{

       alert("Rellene todos los campos del detalle de la venta");        
  
   }

}


function limpiarc(){

$("#cantidadc").val("");
$("#precio_ventac").val("");

}

function totalesc(){

$("#totalc").html("Q. " + totalc.toFixed(2));
total_pagarc=totalc;
$("#total_pagar_htmlc").html("Q. " + total_pagarc.toFixed(2));
$("#total_pagarc").val(total_pagarc.toFixed(2));
}


function evaluarc(){

if(totalc>0){

  $("#guardarc").show();

} else{
     
  $("#guardarc").hide();
}
}

function eliminarc(indexc){

totalc=totalc-subtotalc[indexc];
total_pagar_htmlc = totalc;

$("#totalc").html("USD$" + totalc);
$("#total_pagar_htmlc").html("Q." + total_pagar_htmlc);
$("#total_pagarc").val(total_pagar_htmlc.toFixed(2));

$("#filac" + indexc).remove();
evaluarc();
}
/////////fin compra///////

////////////////////////compra///////////
$("#agregar").click(function(){
        
        agregar();
});

var cont=0;
   total=0;
   subtotal=[];
   $("#guardar").hide();

     function agregar(){

          id_producto= $("#id_producto").val();
          producto= $("#id_producto option:selected").text();
          cantidad= $("#cantidad").val();
          precio_compra= $("#precio_compra").val();
          impuesto=20;
        
          
          if(id_producto !="" && cantidad!="" && cantidad>0 && precio_compra!=""){
             subtotal[cont]=cantidad*precio_compra;
             total= total+subtotal[cont];                                                 
             var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+producto+'</td> <td><input type="number" id="precio_compra[]" name="precio_compra[]"  value="'+precio_compra+'"> </td>  <td><input type="number" name="cantidad[]" value="'+cantidad+'"> </td> <td>Q.'+parseFloat(subtotal[cont]).toFixed(2)+' </td></tr>';             cont++;
             limpiar();
             totales();
            
             evaluar();
             $('#detalles').append(fila);
            
            
            }else{

                alert("Rellene todos los campos del detalle de la compra, revise los datos del producto");
            
            }
         
     };

    
     function limpiar(){
        
        $("#cantidad").val("");
        $("#precio_compra").val("");
        

     };

     function totales(){

        $("#total").html("Q. " + total.toFixed(2));

        
        total_pagar=total;
        $("#total_pagar_html").html("Q. " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
        
     };



     function evaluar(){

         if(total>0){

           $("#guardar").show();

         } else{
              
           $("#guardar").hide();
         }
     };

     function eliminar(index){

        total=total-subtotal[index];
        total_impuesto= total*20/100;
        total_pagar_html = total + total_impuesto;
       
        $("#total").html("Q. " + total);
        $("#total_impuesto").html("Q." + total_impuesto);
        $("#total_pagar_html").html("Q. " + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
       
        $("#fila" + index).remove();
        evaluar();
     };


///////////////////fin compra/////////

////responsabilidad//////////////////////


        $('#cambiarRes').on('show.bs.modal', function (event) {
                //cambiar estado;
                
                var button = $(event.relatedTarget)
                var id_responsabilidad = button.data('id_responsabilidad')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_responsabilidad').val(id_responsabilidad);
        })

///////////////////////fin respnsabilidad/////////////////

////gsto//////////////////////


$('#cambiarGas').on('show.bs.modal', function (event) {
                //cambiar estado;
                
                var button = $(event.relatedTarget)
                var id_gasto = button.data('id_gasto')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_gasto').val(id_gasto);
        })

///////////////////////fin gasto/////////////////

/////////////intercambio/////////////
////MARCA//////////////////////
$('#Modf').on('show.bs.modal', function (event) {
                //llenar form para modificiar
                var button = $(event.relatedTarget)
                var idda= button.data('idda')
                var idmedicamento = button.data('idmedicamento')
                var existencia = button.data('existencia')
                var farmacia = button.data('farmacia')
                var medicamento = button.data('medicamento')
                //var id_marca = button.data('id_marca')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #idDa').val(idda);
                modal.find('.modal-body #idMedicamento').val(idmedicamento); 
                modal.find('.modal-body #cantidad').val(existencia); 
                modal.find('.modal-body #farmacia').val(farmacia); 
                modal.find('.modal-body #medicamento').val(medicamento);
        
               // modal.find('.modal-body #id_marca').val(id_marca);
        })

//////////fin intercambio///////////
////distancia//////////////////////
$('#abrirmodalDistancia').on('show.bs.modal', function (event) {
                //llenar form para modificiar
                var button = $(event.relatedTarget)
                var idPuntoA_modal_editar = button.data('idPuntoA')
                var idPuntoB_modal_editar = button.data('idPuntoB')
                var distancia_modal_editar = button.data('distancia')
                var id_distancia = button.data('id_distancia')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #idPuntoA').val(idPuntoA_modal_editar);
                modal.find('.modal-body #idPuntoB').val(idPuntoB_modal_editar); 
                modal.find('.modal-body #distancia').val(distancia_modal_editar); 
                modal.find('.modal-body #id_distancia').val(id_distancia);
        })

        $('#cambiarDistancia').on('show.bs.modal', function (event) {
                //cambiar estado;
                var button = $(event.relatedTarget)
                var id_distancia = button.data('id_distancia')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_distancia').val(id_distancia);
        })
//////fin marca//////////  
////MARCA//////////////////////
        $('#abrirmodalP').on('show.bs.modal', function (event) {
                //llenar form para modificiar
                var button = $(event.relatedTarget)
                var nombre_modal_editar = button.data('nombre')
                var email_modal_editar = button.data('email')
                var id_marca = button.data('id_marca')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #nombre').val(nombre_modal_editar);
                modal.find('.modal-body #email').val(email_modal_editar); 
                modal.find('.modal-body #id_marca').val(id_marca);
        })

        $('#cambiarE').on('show.bs.modal', function (event) {
                //cambiar estado;
                var button = $(event.relatedTarget)
                var id_marca = button.data('id_marca')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_marca').val(id_marca);
        })
//////fin marca//////////        

        ////PRINCIPIO//////////////////////
        $('#abrirmodalG').on('show.bs.modal', function (event) {
                //llenar form para modificiar
                var button = $(event.relatedTarget)
                var nombre_modal_editar = button.data('nombre')
                var email_modal_editar = button.data('email')
                var id_principio = button.data('id_principio')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #nombre').val(nombre_modal_editar);
                modal.find('.modal-body #email').val(email_modal_editar); 
                modal.find('.modal-body #id_principio').val(id_principio);
        })

        $('#cambiarG').on('show.bs.modal', function (event) {
                //cambiar estado;
                var button = $(event.relatedTarget)
                var id_principio = button.data('id_principio')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_principio').val(id_principio);
        })

         ////TIPOGASTO//////////////////////
         $('#abrirmodalT').on('show.bs.modal', function (event) {
                //llenar form para modificiar
                var button = $(event.relatedTarget)
                var nombre_modal_editar = button.data('nombre')
                var descripcion_modal_editar = button.data('descripcion')
                var id_tipogasto = button.data('id_tipogasto')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #nombre').val(nombre_modal_editar);
                modal.find('.modal-body #descripcion').val(descripcion_modal_editar); 
                modal.find('.modal-body #id_tipogasto').val(id_tipogasto);
        })

        $('#cambiarT').on('show.bs.modal', function (event) {
                //cambiar estado;
                var button = $(event.relatedTarget)
                var id_tipogasto = button.data('id_tipogasto')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_tipogasto').val(id_tipogasto);
        })



////PROVEEDOR//////////////////////
        $('#abrirmodalP').on('show.bs.modal', function (event) {
                //llenar form para modificiar
                var button = $(event.relatedTarget)
                var nombre_modal_editar = button.data('nombre')
                var nit_modal_editar = button.data('nit')
                var email_modal_editar = button.data('email')
                var direccion_modal_editar = button.data('direccion')
                var telefono_modal_editar = button.data('telefono')
                var correo_modal_editar = button.data('correo')
                var id_proveedor = button.data('id_proveedor')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #nombre').val(nombre_modal_editar);
                modal.find('.modal-body #email').val(email_modal_editar); 
                modal.find('.modal-body #direccion').val(direccion_modal_editar);
                modal.find('.modal-body #telefono').val(telefono_modal_editar);
                modal.find('.modal-body #nit').val(nit_modal_editar);
                modal.find('.modal-body #correo').val(correo_modal_editar);
                modal.find('.modal-body #id_proveedor').val(id_proveedor);
        })

        $('#cambiarP').on('show.bs.modal', function (event) {
                //cambiar estado;
                var button = $(event.relatedTarget)
                var id_proveedor = button.data('id_proveedor')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_proveedor').val(id_proveedor);
        })

        ////CLIENTE//////////////////////
        $('#abrirmodalC').on('show.bs.modal', function (event) {
                //llenar form para modificiar
                var button = $(event.relatedTarget)
                var nombre1_modal_editar = button.data('nombre1')
                var nombre2_modal_editar = button.data('nombre2')
                var apellido1_modal_editar = button.data('apellido1')
                var apellido2_modal_editar = button.data('apellido2')
                var nit_modal_editar = button.data('nit')
                var direccion_modal_editar = button.data('direccion')
                var telefono_modal_editar = button.data('telefono')
                var correo_modal_editar = button.data('correo')
                var id_cliente = button.data('id_cliente')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #nombre1').val(nombre1_modal_editar);
                modal.find('.modal-body #nombre2').val(nombre2_modal_editar);
                modal.find('.modal-body #apellido1').val(apellido1_modal_editar);
                modal.find('.modal-body #apellido2').val(apellido2_modal_editar);
                modal.find('.modal-body #direccion').val(direccion_modal_editar);
                modal.find('.modal-body #telefono').val(telefono_modal_editar);
                modal.find('.modal-body #nit').val(nit_modal_editar);
                modal.find('.modal-body #correo').val(correo_modal_editar);
                modal.find('.modal-body #id_cliente').val(id_cliente);
        })

        $('#cambiarC').on('show.bs.modal', function (event) {
                //cambiar estado;
                var button = $(event.relatedTarget)
                var id_cliente = button.data('id_cliente')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_cliente').val(id_cliente);
        })

        ////EMPLEADO//////////////////////
        $('#abrirmodalEm').on('show.bs.modal', function (event) {
                //llenar form para modificiar
                var button = $(event.relatedTarget)
                var nombre1_modal_editar = button.data('nombre1')
                var nombre2_modal_editar = button.data('nombre2')
                var apellido1_modal_editar = button.data('apellido1')
                var apellido2_modal_editar = button.data('apellido2')
                var dpi_modal_editar = button.data('dpi')
                var direccion_modal_editar = button.data('direccion')
                var telefono_modal_editar = button.data('telefono')
                var idFarmacia_modal_editar = button.data('idFarmacia')
                var correo_modal_editar = button.data('correo')
                var id_empleado = button.data('id_empleado')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #nombre1').val(nombre1_modal_editar);
                modal.find('.modal-body #nombre2').val(nombre2_modal_editar);
                modal.find('.modal-body #apellido1').val(apellido1_modal_editar);
                modal.find('.modal-body #apellido2').val(apellido2_modal_editar);
                modal.find('.modal-body #direccion').val(direccion_modal_editar);
                modal.find('.modal-body #telefono').val(telefono_modal_editar);
                modal.find('.modal-body #idFarmacia').val(idFarmacia_modal_editar);
                modal.find('.modal-body #dpi').val(dpi_modal_editar);
                modal.find('.modal-body #correo').val(correo_modal_editar);
                modal.find('.modal-body #id_empleado').val(id_empleado);
        })

        $('#cambiarEm').on('show.bs.modal', function (event) {
                //cambiar estado;
                var button = $(event.relatedTarget)
                var id_empleado = button.data('id_empleado')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_empleado').val(id_empleado);
        })

        ////USUARIO//////////////////////
        $('#abrirmodalU').on('show.bs.modal', function (event) {
                //llenar form para modificiar
                var button = $(event.relatedTarget)
                var name_modal_editar = button.data('name')
                var email_modal_editar = button.data('email')
                var idRol_modal_editar = button.data('idRol')
                var idEmpleado_modal_editar = button.data('idEmpleado')
                var id_usuario = button.data('id_usuario')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #name').val(name_modal_editar);
                modal.find('.modal-body #email').val(email_modal_editar);
                modal.find('.modal-body #idRol').val(idRol_modal_editar);
                modal.find('.modal-body #idEmpleado').val(idEmpleado_modal_editar);
                modal.find('.modal-body #id_usuario').val(id_usuario);
        })

        $('#cambiarU').on('show.bs.modal', function (event) {
                //cambiar estado;
                var button = $(event.relatedTarget)
                var id_usuario = button.data('id_usuario')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_usuario').val(id_usuario);
        })


        ////farmacia//////////////////////
        $('#modificarFR').on('show.bs.modal', function (event) {
                //llenar form para modificiar
                var button = $(event.relatedTarget)
                var nombre_modal_editar = button.data('nombre')
                var direccion_modal_editar = button.data('direccion')
                var idDepartamento_modal_editar = button.data('idDepartamento')
                var email_modal_editar = button.data('email')
                var telefono_modal_editar = button.data('telefono')
                var idTipo_modal_editar = button.data('idTipo')
                var latitud_modal_editar = button.data('latitud')
                var longitud_modal_editar = button.data('longitud')
                var capital_modal_editar = button.data('capital')
                var id_farmacia = button.data('id_farmacia')
                
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #nombre').val(nombre_modal_editar);
                modal.find('.modal-body #direccion').val(direccion_modal_editar);
                modal.find('.modal-body #idDepartamento').val(idDepartamento_modal_editar);
                modal.find('.modal-body #email').val(email_modal_editar);
                modal.find('.modal-body #telefono').val(telefono_modal_editar);
                modal.find('.modal-body #idTipo').val(idTipo_modal_editar);
                modal.find('.modal-body #latitud').val(latitud_modal_editar);
                modal.find('.modal-body #longitud').val(longitud_modal_editar);
                modal.find('.modal-body #capital').val(capital_modal_editar);
                modal.find('.modal-body #id_farmacia').val(id_farmacia);
        })

        $('#cambiarFR').on('show.bs.modal', function (event) {
                //cambiar estado;
                var button = $(event.relatedTarget)
                var id_farmacia = button.data('id_farmacia')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_farmacia').val(id_farmacia);
        })

        ////medicamento//////////////////////
        $('#modificarMx').on('show.bs.modal', function (event) {
                //llenar form para modificiar
                var button = $(event.relatedTarget)
                var nombre_modal_editar = button.data('nombre')
                var precio_modal_editar = button.data('precio')
                var contenido_modal_editar = button.data('contenido')
                var descripcion_modal_editar = button.data('descripcion')
                var idMarca_modal_editar = button.data('idMarca')
                var idPresentacion_modal_editar = button.data('idPresentacion')
                var id_medicamento = button.data('id_medicamento')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #nombre').val(nombre_modal_editar);
                modal.find('.modal-body #precio').val(precio_modal_editar);
                modal.find('.modal-body #contenido').val(contenido_modal_editar);
                modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
                modal.find('.modal-body #idMarca').val(idMarca_modal_editar);
                modal.find('.modal-body #idPresentacion').val(idPresentacion_modal_editar);
                modal.find('.modal-body #id_medicamento').val(id_medicamento);
        })

        $('#cambiarMx').on('show.bs.modal', function (event) {
                //cambiar estado;
                var button = $(event.relatedTarget)
                var id_medicamento = button.data('id_medicamento')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_medicamento').val(id_medicamento);
        })


        ////activo//////////////////////
        $('#modificarAc').on('show.bs.modal', function (event) {
                //llenar form para modificiar
                var button = $(event.relatedTarget)
                var nombre_modal_editar = button.data('nombre')
                var marca_modal_editar = button.data('marca')
                var serie_modal_editar = button.data('serie')
                var precio_modal_editar = button.data('precio')
                var modelo_modal_editar = button.data('modelo')
                var id_activo = button.data('id_activo')
                
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #nombre').val(nombre_modal_editar);
                modal.find('.modal-body #marca').val(marca_modal_editar);
                modal.find('.modal-body #modelo').val(modelo_modal_editar);
                modal.find('.modal-body #precio').val(precio_modal_editar);
                modal.find('.modal-body #serie').val(serie_modal_editar);
                modal.find('.modal-body #id_activo').val(id_activo);
        })

        $('#cambiarAc').on('show.bs.modal', function (event) {
                //cambiar estado;
                var button = $(event.relatedTarget)
                var id_activo = button.data('id_activo')
                var modal = $(this)
                //modal.find('.modal-title').text('New message to '+)
                modal.find('.modal-body #id_activo').val(id_activo);
        })
</script>