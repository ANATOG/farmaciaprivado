<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Responsabilidad;
use Carbon\Carbon;
use \PDF;
use App\Gasto;
use Illuminate\support\Facades\Redirect;
use DB;//hacer referencia a DB

class GastoController extends Controller
{
    public function index(Request $request)
    { 
        

        if ($request) {
            $us= \Auth::user()->id;
            $farmacia="select (select f.id from farmacias f where f.id=
                        (select e.idFarmacia from empleados e where e.id=u.idEmpleado)) id
            from users u
            where u.id=".$us."
            limit 1";
            $s=DB::select($farmacia);
            foreach($s as $t){
                $farm= $t->id;
            } 
            $tiempo= Carbon::now('America/Guatemala');
            $mes=$tiempo->month;
            $consulta="select g.id, g.idTipogasto, g.idUsuario, g.idFarmacia, g.fecha, g.monto, g.nodoc, g.descripcion, g.condicion,
            (select f.nombre from farmacias f where f.id=g.idFarmacia) as farmacia,
            (select u.name from users u where u.id=g.idUsuario) usuario,
            (select t.nombre from tipogastos t  where t.id=g.idTipogasto) as tipo
             from gastos g
            where 
            g.idFarmacia=".$farm."
            AND MONTH(g.fecha)=".$mes."";
            $gastos=DB::select($consulta);

           

            $tipos=DB::table('tipogastos')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();
            return view('gastos.index',['gastos'=>$gastos, 'farmacias'=>$farmacias, "tipos"=>$tipos,'farm'=>$farm]);
            //return $gastos;
        }
    }

    public function destroy(Request $request)
    {
        $gasto=Gasto::findOrFail($request->id_gasto);
        if($gasto->condicion=='1')
        {
            $gasto->condicion='0';
            $gasto->save();
            
        }else 
        {
            $gasto->condicion='1';
            $gasto->save();
        }
        return Redirect::to("gasto");
    
    }

    public function store(Request $request)
    {
        $us= \Auth::user()->id;
        $farmacia="select (select f.id from farmacias f where f.id=
                    (select e.idFarmacia from empleados e where e.id=u.idEmpleado)) id
        from users u
        where u.id=".$us."
        limit 1";
        $s=DB::select($farmacia);
        foreach($s as $t){
            $sql= $t->id;
        } 
        
        $gasto= new Gasto();
        $gasto->idTipogasto= $request->idTipogasto;
        $gasto->idUsuario= \Auth::user()->id; 
        $gasto->idFarmacia= $sql;
        $gasto->fecha = $request->fecha;
        $gasto->monto=$request->monto;
        $gasto->descripcion=$request->detalle;
        $gasto->condicion='1';
        $gasto->save();
        return Redirect::to("gasto");
    }

    public function planillapdf($id){

        $tiempo= Carbon::now('America/Guatemala');
            $mes=$tiempo->month;
            $consulta="select g.id, g.idTipogasto, g.idUsuario, g.idFarmacia, g.fecha, g.monto, g.nodoc, g.descripcion, g.condicion,
            (select f.nombre from farmacias f where f.id=g.idFarmacia) as farmacia,
            (select u.name from users u where u.id=g.idUsuario) usuario,
            (select t.nombre from tipogastos t  where t.id=g.idTipogasto) as tipo
             from gastos g
            where 
            g.idFarmacia=".$id."
            and g.condicion=1
            AND MONTH(g.fecha)=".$mes."";
            $gastos=DB::select($consulta);
            $farmacia="select f.nombre from farmacias f where f.id=".$id."";
            $s=DB::select($farmacia);
            foreach($s as $t){
                $farm=$t->nombre;
		    }
    

        $pdf= PDF::loadView('pdf.planillasucmespdf',['gastos'=>$gastos, 'farm'=>$farm, 'mes'=>$mes]);
        return $pdf->download('Planilla.pdf');
        return $pdf->download('InventarioAc-'.$farm.'mes'.$mes.'.pdf');
      
    }

    public function repgasto()
    {
        $farmacias=DB::table('farmacias')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();
        return view('reportes.gastos',["farmacias"=>$farmacias]);

    }

    public function planillastPdf(){

        $tiempo= Carbon::now('America/Guatemala');
            $mes=$tiempo->month;

        $consulta = "select (select t.nombre from tipogastos t  where t.id=g.idTipogasto) as tipo, g.idTipogasto, 
        sum(g.monto) monto
        from gastos g 
        where g.condicion=1
        GROUP BY g.idTipogasto
        HAVING monto >0
        ORDER BY tipo"; 

        $gastos=DB::select($consulta);

        $pdf= PDF::loadView('pdf.planillaspdf',['gastos'=>$gastos, 'mes'=>$mes]);
        return $pdf->download('Gastosgeneralesmes'.$mes.'.pdf');
      
    }
    
}
