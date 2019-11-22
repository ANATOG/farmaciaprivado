<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empleado;

use App\Farmacia;

use Illuminate\Support\Facades\Redirect;//para que redirecciona a la vista

use DB;//hacer referencia a DB

class EmpleadoController extends Controller
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
            $consulta="select e.id, e.dpi, e.nombre1, e.nombre2, e.apellido1, e.apellido2, e.direccion, e.telefono, 
            e.correo, e.idFarmacia, e.condicion,
            (select f.nombre from farmacias f where e.idFarmacia=f.id ) as Farmacia 
            from empleados e
            where e.nombre1 like '%".$sql."%'
            or e.nombre2 like '%".$sql."%'
            or e.apellido1 like '%".$sql."%'
            or e.apellido1 like '%".$sql."%'";

            $empleados=DB::select($consulta);
 
            $farmacias=DB::table('farmacias')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();

            return view('empleados.index',['empleados'=>$empleados,"farmacias"=>$farmacias,'buscar'=>$sql]);
            //return $empleados;
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
        $empleado= new Empleado();
        $empleado->dpi= $request->dpi;
        $empleado->nombre1= $request->nombre1;
        $empleado->nombre2= $request->nombre2;
        $empleado->apellido1= $request->apellido1;
        $empleado->apellido2= $request->apellido2;
        $empleado->direccion=$request->direccion;
        $empleado->telefono=$request->telefono;
        $empleado->idFarmacia=$request->idFarmacia;
        $empleado->correo=$request->correo;
        $empleado->condicion='1';
        $empleado->save();
        return Redirect::to("empleado");
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
        $empleado=Empleado::findOrFail($request->id_empleado);
        $empleado->dpi= $request->dpi;
        $empleado->nombre1= $request->nombre1;
        $empleado->nombre2= $request->nombre2;
        $empleado->apellido1= $request->apellido1;
        $empleado->apellido2= $request->apellido2;
        $empleado->direccion=$request->direccion;
        $empleado->telefono=$request->telefono;
        $empleado->idFarmacia=$request->idFarmacia;
        $empleado->correo=$request->correo;
        $empleado->condicion='1';
        $empleado->save();
        return Redirect::to("empleado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $empleado=Empleado::findOrFail($request->id_empleado);
        if($empleado->condicion=='1')
        {
            $empleado->condicion='0';
            $empleado->save();
            
        }else 
        {
            $empleado->condicion='1';
            $empleado->save();
        }
        return Redirect::to("empleado");
    
    }

    public function getempleado(Request $request, $id)
    {
        if($request->ajax())
        {
            $consulta="select e.id,  concat (e.nombre1, ' ',e.apellido1)as nombre
            from empleados e
            where e.idFarmacia=".$id."";
            $empleados=DB::select($consulta);
            return response()->json($empleados);
        }
    }
}
