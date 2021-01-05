<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\DetalleVenta;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;


class VentaController extends Controller
{
    public function index(Request $request){
      
        if($request){

            
 
            $sql=trim($request->get('buscar'));
            $consulta="select v.id, v.idCliente, v.idUsuario, v.idFarmacia,
            v.numventa, v.fecha_venta, v.total, v.estado, v.idTipoPago,
            (select t.nombre from formapagos t where  v.idTipoPago=t.id ) as tipo,
            (select concat (c.nombre1, ' ', c.apellido1) from clientes c where  v.idCliente=c.id ) as cliente,
            (select f.nombre from farmacias f where f.id=v.idFarmacia) as farmacia,
            (select u.name from users u where u.id=v.idUsuario) as usuario
            from ventas v
            where v.id like '%".$sql."%'
            group by v.id, v.idCliente, v.idUsuario, v.idFarmacia,
            v.numventa, v.fecha_venta, v.total, v.estado, cliente, farmacia, usuario
            order by v.id desc";
            $ventas=DB::select($consulta);
 
            return view('ventas.index',["ventas"=>$ventas,"buscar"=>$sql]);
            //return $ventas;
        }
    }
    public function create(){
 
        /*listar las clientes en ventana modal*/
        $clientes=DB::table('clientes')->get();
        $tipos=DB::table('formapagos')->get();

        $us= \Auth::user()->id;
        $farmacia="select (select f.id from farmacias f where f.id=
                    (select e.idFarmacia from empleados e where e.id=u.idEmpleado)) id,
                    (select f.nombre from farmacias f where f.id=
                    (select e.idFarmacia from empleados e where e.id=u.idEmpleado)) nombre
        from users u
        where u.id=".$us."
        limit 1";
        $s=DB::select($farmacia);
        foreach($s as $t){
            $sql= $t->id;
            $farm=$t->nombre;
		} 
       
        /*listar los productos en ventana modal*/
        $consulta="select concat (m.id, ' ', m.nombre) as producto,
        m.id, m.precio as precio_venta, 
        (select s.existencia from stocks s where s.idMedicamento=m.id and s.idFarmacia=".$sql.") as stock
        from medicamentos m
        where m.condicion=1 
        and (select s.existencia from stocks s where s.idMedicamento=m.id
        and s.idFarmacia=".$sql.")>0";
        $productos=DB::select($consulta);


        return view('ventas.create',["clientes"=>$clientes,"productos"=>$productos, "tipos"=>$tipos, "farm"=>$farm, "sql"=>$sql]);

   }

   public function store(Request $request){
         
         
    try{
        DB::beginTransaction();
        $tiempo= Carbon::now('America/Guatemala');
        $venta = new Venta();
        $venta->idCliente = $request->id_clientec;
        $venta->idUsuario =\Auth::user()->id;      
        $venta->idFarmacia = $request->id_farmaciac;
        $venta->numventa = $request->num_ventac;
        $venta->idTipoPago = $request->idTipoPago;
        $venta->fecha_venta = $tiempo->toDateString();
        $venta->total=$request->total_pagarc;
        $venta->estado = 'Registrado';
        $venta->save();

        $name=("select concat (c.nombre1, ' ', c.apellido1) nombre  from clientes c where
                    c.id=".$request->id_clientec."");
        $nomcli=DB::select($name);
        foreach($nomcli as $t){
            $namec=$t->nombre;
		}
       
        DB::statement('call llenado_totales(?,?,?,?)', [$namec,$venta->numventa, $venta->total,$venta->fecha_venta]);

        $id_producto=$request->id_productoc;
        $cantidad=$request->cantidadc;
        $descuento=$request->descuentoc;
        $precio=$request->precio_ventac;

        
        //Recorro todos los elementos
        $cont=0;

         while($cont < count($id_producto)){

            $detalle = new DetalleVenta();
            /*enviamos valores a las propiedades del objeto detalle*/
            /*al idcompra del objeto detalle le envio el id del objeto venta, que es el objeto que se ingresó en la tabla ventas de la bd*/
            /*el id es del registro de la venta*/
            $detalle->idVenta = $venta->id;
            $detalle->idMedicamento = $id_producto[$cont];
            $detalle->cantidad = $cantidad[$cont];
            $detalle->precio = $precio[$cont];         
            $detalle->save();
            $cont=$cont+1;
        }
            
        DB::commit();

        } catch(Exception $e){
        
        DB::rollBack();
        }

        return Redirect::to('venta');
    } 
    public function show($id){
 
        $consulta1="select v.id, v.numventa, v.fecha_venta, v.total, v.estado, v.idTipoPago,
        (select concat (c.nombre1, ' ', c.apellido1) from clientes c where  v.idCliente=c.id ) cliente,
        (select f.nombre from farmacias f where f.id=v.idFarmacia) farmacia,
        (select t.nombre from formapagos t where  v.idTipoPago=t.id ) as tipo,
        (select u.name from users u where u.id=v.idUsuario) usuario
        from ventas v  
        where v.id=".$id."
        order by v.id";
        $venta=DB::select($consulta1);
       

        /*mostrar detalles*/
        $consulta2="select dv.id, dv.cantidad, dv.precio,
        (select m.nombre from medicamentos m where m.id=dv.idMedicamento) medicamento
         from detalle_ventas dv
        where dv.idVenta=".$id."";
        $detalles = DB::select($consulta2);
        
        return view('ventas.show',['venta' => $venta,'detalles' =>$detalles]);
    }  
    public function destroy(Request $request){
 
        $venta = Venta::findOrFail($request->id_venta);
        $venta->estado = 'Anulado';
        $venta->save();
        return Redirect::to('venta');

   }
}
