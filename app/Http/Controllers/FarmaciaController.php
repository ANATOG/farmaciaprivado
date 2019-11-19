<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Medicamento;

use App\Farmacia;

use Illuminate\support\Facades\Redirect;//para que redirecciona a la vista

use DB;//hacer referencia a DB
use \PDF;
use App\Gasto;

class FarmaciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $sql=trim($request->get('buscar'));
            $consulta="select f.id, f.nombre, f.telefono, f.email, f.direccion,  f.capital, 
             f.idDepartamento, f.idTipo, f.condicion,
            (select t.nombre from tipos t where f.idTipo=t.id ) as Tipo, 
            (select x.nombre from departamentos x where x.id=f.idDepartamento)  as Departamento
            from farmacias f
            where f.nombre like '%".$sql."%'";
            $farmacias=DB::select($consulta);

            $departamentos=DB::table('departamentos')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();

            $tipos=DB::table('tipos')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();
            return view('farmacias.index',['farmacias'=>$farmacias, "departamentos"=>$departamentos, "tipos"=>$tipos,'buscar'=>$sql]);
            //return $farmacias;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $farmacia= new Farmacia();
        $farmacia->idTipo= $request->idTipo;
        $farmacia->idDepartamento= $request->idDepartamento;
        $farmacia->nombre= $request->nombre;
        $farmacia->telefono=$request->telefono;
        $farmacia->capital=$request->capital;
        $farmacia->email=$request->email;
        $farmacia->direccion=$request->direccion;
        $farmacia->condicion='1';
        $farmacia->save();
        return Redirect::to("farmacia");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $farmacia=Farmacia::findOrFail($request->id_farmacia);
        $farmacia->idTipo= $request->idTipo;
        $farmacia->idDepartamento= $request->idDepartamento;
        $farmacia->nombre= $request->nombre;
        $farmacia->telefono=$request->telefono;
        $farmacia->capital=$request->capital;
        $farmacia->email=$request->email;
        $farmacia->direccion=$request->direccion;
        $farmacia->condicion='1';
        $farmacia->save();
        return Redirect::to("farmacia");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $farmacia=Farmacia::findOrFail($request->id_farmacia);
        if($farmacia->condicion=='1')
        {
            $farmacia->condicion='0';
            $farmacia->save();
            
        }else 
        {
            $farmacia->condicion='1';
            $farmacia->save();
        }
        return Redirect::to("farmacia");
    }

    public function flujoe()
    {
        $farmacias=DB::table('farmacias')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();
        return view('reportes.flujoefectivo',["farmacias"=>$farmacias]);

    }

    public function flujototal(){
        
        $v=0; $c=0;$ca=0;
        $consulta = "select f.condicion,  f.capital, 
        (select sum(monto) from gastos where idFarmacia=f.id) gastos,
        (select sum(v.total) from ventas v where v.idFarmacia=f.id) ventas,
        (select sum(c.total) from compras c where c.idFarmacia=f.id) compras
        from farmacias f
        where f.condicion=1"; 

        $consulta2="select (select t.nombre from tipogastos t  where t.id=g.idTipogasto) as tipo, g.idTipogasto, 
        sum(g.monto) monto
        from gastos g 
        where g.condicion=1
        GROUP BY g.idTipogasto
        HAVING monto >0
        ORDER BY tipo";
        $rubros=DB::select($consulta);
        foreach($rubros as $t){
            $v=$v+$t->ventas;
            $c=$c+$t->compras;
            $ca=$ca+$t->capital;
        }


        $gastos=DB::select($consulta2);

        $pdf= PDF::loadView('pdf.efectivopdf',['v'=>$v, 'c'=>$c, 'ca'=>$ca, 'gastos'=>$gastos]);
        return $pdf->download('FlujoEfectivoG.pdf');
      
    }

    public function flujopdf($id){


        $consulta1 = "select f.nombre, f.id, f.capital as caja, 
        (select sum(monto) from gastos where idFarmacia=f.id) gastos,
        (select sum(v.total) from ventas v where v.idFarmacia=f.id) ventas,
        (select sum(c.total) from compras c where c.idFarmacia=f.id) compras
        from farmacias f
        where f.condicion=1
        and f.id=".$id.""; 

        $consulta2="select (select t.nombre from tipogastos t  where t.id=g.idTipogasto) as tipo, g.idTipogasto, 
        sum(g.monto) monto
        from gastos g 
        where g.condicion=1
        and g.idFarmacia=".$id."
        GROUP BY g.idTipogasto
        HAVING monto >0
        ORDER BY tipo";

        $rubros=DB::select($consulta1);
        $gastos=DB::select($consulta2);

        $farmacia="select f.nombre from farmacias f where f.id=".$id."";
        $s=DB::select($farmacia);
        foreach($s as $t){
            $farm=$t->nombre;
        }
        
        

        $pdf= PDF::loadView('pdf.flujoefectivopdf',['rubros'=>$rubros, 'gastos'=>$gastos, 'farm'=>$farm]);
        return $pdf->download('FlujoEfectivo-'.$farm.'.pdf');
      
    }

    public function farmaciaspdf(){
        
        $tipos=DB::table('tipos')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();
        return view('reportes.farmacias',["tipos"=>$tipos]);

        
    }

    public function farmaPDF(){
        $consulta="select f.nombre, f.telefono, f.email, f.direccion, 
        (select t.nombre from tipos t where t.id=f.idTipo) tipo,
        (select d.nombre from departamentos d where d.id=f.idDepartamento) depa
        from farmacias f
        where f.condicion=1";

        $farmacias=DB::select($consulta);

        $pdf= PDF::loadView('pdf.farmaciaspdf',[ 'farmacias'=>$farmacias]);
        return $pdf->download('ListadoFarmacias.pdf');
    }

    public function farmPDF($id){
        $consulta="select f.nombre, f.telefono, f.email, f.direccion, 
        (select t.nombre from tipos t where t.id=f.idTipo) tipo,
        (select d.nombre from departamentos d where d.id=f.idDepartamento) depa
        from farmacias f
        where f.condicion=1
        and f.idTipo=".$id."";

        $farmacias=DB::select($consulta);

        $pdf= PDF::loadView('pdf.farmaciaspdf',[ 'farmacias'=>$farmacias]);
        return $pdf->download('ListadoFarmacias.pdf');
    }
}
