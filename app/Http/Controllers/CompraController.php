<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\DetalleCompra;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;

class CompraController extends Controller
{
    public function index(Request $request){
        if($request){
            $sql=trim($request->get('buscar'));
            $consulta="select c.id, c.idUsuario, c.idFarmacia, c.idProveedor,
            c.numcompra, c.fechacom, c.total, c.estado,
            (select p.nombre from proveedores p where p.id=c.idProveedor) as proveedor,
            (select f.nombre from farmacias f where f.id=c.idFarmacia) as farmacia,
            (select u.name from users u where u.id=c.idUsuario) as usuario
            from compras c
            where c.numcompra like '%".$sql."%'
            GROUP BY c.id, c.idUsuario, c.idFarmacia, c.idProveedor,
            c. numcompra, c.fechacom, c.total, c.estado, proveedor,
            farmacia, usuario
            ORDER BY c.id desc";
            $compras=DB::select($consulta);
            return view('compras.index',['compras'=>$compras, 'buscar'=>$sql]);
            //return $compras;
            
        }
    }

    public function create(){

        $productos=DB::table('medicamentos as m')
            ->select(DB::raw('CONCAT(m.id," ",m.nombre," ",m.descripcion) AS producto'),'m.id')
            ->where('m.condicion','=','1')->get();
            
        $proveedores=DB::table('proveedores as p')
             ->select('p.nombre','p.id')
             ->where('p.condicion','=','1')->get();

        $farmacias=DB::table('farmacias as f')
             ->select('f.nombre','f.id')
             ->where('f.condicion','=','1')->get();

        return view('compras.create',["proveedores"=>$proveedores,"productos"=>$productos,"farmacias"=>$farmacias]);
        
    }

    public function store (Request $request){
        try{
            DB::beginTransaction();

            $tiempo=Carbon::now('America/Guatemala');

            $compra=new Compra();
            $compra->idProveedor = $request->id_proveedor;
            $compra->idUsuario = \Auth::user()->id;
            $compra->idFarmacia = $request->id_farmacia;
            $compra->numcompra = $request->num_compra;
            $compra->fechacom = $tiempo->toDateString();
            $compra->total = $request->total_pagar;
            $compra->estado = 'Registrado';
            $compra->save();


            $id_producto=$request->id_producto;
            $cantidad=$request->cantidad;
            $precio=$request->precio_compra;

            //Recorro todos los elementos
            $cont=0;
        
            while($cont < count($id_producto)){

                $detalle = new DetalleCompra();
                /*enviamos valores a las propiedades del objeto 
                detalle*/
                /*al idcompra del objeto detalle le envio el id 
                del objeto compra, que es el objeto que se ingresó 
                en la tabla compras de la bd*/
                $detalle->idCompra = $compra->id;
                $detalle->idMedicamento = $id_producto[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio = $precio[$cont];
                $detalle->timestamps = false;    
                $detalle->save();
                $cont=$cont+1;
            }
            DB::commit();
        }catch (Exception $x){
            DB::rollBack();
        }
        return Redirect::to('compra');
    }
    public function show ($id){
        $consulta="select c.id, c.numcompra,c.idUsuario, c.fechacom, c.estado,
        c.idFarmacia, c.idProveedor, 
        (select p.nombre from proveedores p where p.id=c.idProveedor) as proveedor,
        (select f.nombre from farmacias f where f.id=c.idFarmacia) as farmacia,
        (select sum(d.precio*cantidad) from detalle_compras d where
        d.idCompra=c.id ) as total
        from compras c
        where c.id=".$id."
        ORDER BY c.id desc";
        $compra=DB::select($consulta);  
        
        $cons="select d.id, d.cantidad, d.precio,
        (select m.nombre from medicamentos m where m.id=d.idMedicamento) medicamento
         from detalle_compras d
        where d.idCompra=".$id."
        order by d.id desc";
        $detalles=DB::select($cons);
        return view('compras.show',['compra' => $compra,'detalles' =>$detalles]); 
    }

    public function destroy (Request $request){
        $compra= Compra::findOrFail($request->id_compra);
        $compra->estado='Anulado';
        $compra->save();
        return Redirect::to('compra');
    }

    
}
