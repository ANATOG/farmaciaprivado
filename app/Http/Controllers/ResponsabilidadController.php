<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Responsabilidad;
use Carbon\Carbon;

use \PDF;

use Illuminate\Support\Facades\Redirect;//para que redirecciona a la vista

use DB;//hacer referencia a DB

class ResponsabilidadController extends Controller
{
    public function index(Request $request)
    { 
        if ($request) {
            $sql=trim($request->get('buscar'));
            $consulta="select r.id, r.idActivo, r.idEmpleado, r.idFarmacia, r.fechaasig, r.descripcion, r.condicion,
            (select concat (a.nombre, ' ',a.modelo, ' ',a.serie) from activos a where a.id=r.idActivo) as activo,
            (select concat (e.nombre1, ' ',e.apellido1) from empleados e where e.id=r.idEmpleado) as empleado,
            (select f.nombre from farmacias f where f.id=r.idFarmacia) as farmacia
            from responsabilidades r
            where r.condicion=1
            or (select concat (a.nombre, ' ',a.modelo, ' ',a.serie) from activos a where a.id=r.idActivo) like '%".$sql."%'
            or (select concat (e.nombre1, ' ',e.apellido1) from empleados e where e.id=r.idEmpleado) like '%".$sql."%'";
            $responsabilidades=DB::select($consulta);

            $farmacias=DB::table('farmacias')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();

            $activos=DB::table('activos')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();
            return view('activos.responsabilidades',['responsabilidades'=>$responsabilidades, 'farmacias'=>$farmacias, "activos"=>$activos,'buscar'=>$sql]);
            //return $responsabilidades;
        }
    }

    public function store(Request $request)
    {
        $tiempo= Carbon::now('America/Guatemala');
        $responsabilidad= new Responsabilidad();
        $responsabilidad->idActivo= $request->idActivo;
        $responsabilidad->idFarmacia= $request->idFarmacia;
        $responsabilidad->idEmpleado= $request->idEmpleado;
        $responsabilidad->fechaasig= $tiempo->toDateString();
        $responsabilidad->descripcion=$request->descripcion;
        $responsabilidad->condicion='1';
        $responsabilidad->save();
        return Redirect::to("responsabilidad");
    }

    public function destroy(Request $request)
    {
        $responsabilidad=Responsabilidad::findOrFail($request->id_responsabilidad);
        if($responsabilidad->condicion=='1')
        {
            $responsabilidad->condicion='0';
            $responsabilidad->save();
            
        }else 
        {
            $responsabilidad->condicion='1';
            $responsabilidad->save();
        }
        return Redirect::to("responsabilidad");
    
    }

    public function fichaPdf($id){


        $consulta = "select r.id, r.idActivo, r.idEmpleado, r.idFarmacia, r.fechaasig, r.descripcion, r.condicion,
        (select concat (a.nombre, ' ',a.modelo, ' ',a.serie) from activos a where a.id=r.idActivo) as activo,
        (select a.precio from activos a where a.id=r.idActivo) as precio,
        (select concat (e.nombre1, ' ',e.apellido1) from empleados e where e.id=r.idEmpleado) as empleado,
        (select f.nombre from farmacias f where f.id=r.idFarmacia) as farmacia
        from responsabilidades r
        where r.id=".$id.""; 
        
        $ficha=DB::select($consulta);
    

        $pdf= PDF::loadView('pdf.fichapdf',['ficha'=>$ficha]);
        return $pdf->download('fichaDeResponsabilidad.pdf');
      
    }

    public function rep(){

        $farmacias=DB::table('farmacias')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();
        return view('reportes.activos',["farmacias"=>$farmacias]);
    }
    
    public function listarPdf(){


        $consulta = "select r.id, r.idActivo, r.idEmpleado, r.idFarmacia, r.fechaasig, r.descripcion, r.condicion,
        (select concat (a.nombre, ' ',a.modelo, ' ',a.serie) from activos a where a.id=r.idActivo) as activo,
        (select a.precio from activos a where a.id=r.idActivo) as precio,
        (select concat (e.nombre1, ' ',e.apellido1) from empleados e where e.id=r.idEmpleado) as empleado,
        (select f.nombre from farmacias f where f.id=r.idFarmacia) as farmacia
        from responsabilidades r"; 

        $activos=DB::select($consulta);

        $pdf= PDF::loadView('pdf.responsabilidadespdf',['activos'=>$activos]);
        return $pdf->download('InventarioActivosFijos.pdf');
      
    }

    public function listarxfarPdf($id){


        $consulta = "select r.id, r.idActivo, r.idEmpleado, r.idFarmacia, r.fechaasig, r.descripcion, r.condicion,
        (select concat (a.nombre, ' ',a.modelo, ' ',a.serie) from activos a where a.id=r.idActivo) as activo,
        (select a.precio from activos a where a.id=r.idActivo) as precio,
        (select concat (e.nombre1, ' ',e.apellido1) from empleados e where e.id=r.idEmpleado) as empleado,
        (select f.nombre from farmacias f where f.id=r.idFarmacia) as farmacia
        from responsabilidades r
        where r.idFarmacia=".$id.""; 

        $activos=DB::select($consulta);

        $farmacia="select f.nombre from farmacias f where f.id=".$id."";
        $s=DB::select($farmacia);
        foreach($s as $t){
            $farm=$t->nombre;
		}

        $pdf= PDF::loadView('pdf.responsabilidadespdf',['activos'=>$activos, 'farm'=>$farm]);
        return $pdf->download('InventarioAc-'.$farm.'.pdf');
      
    }
}
