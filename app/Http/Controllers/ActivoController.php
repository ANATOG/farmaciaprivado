<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Activo;

use Illuminate\support\Facades\Redirect;//para que redirecciona a la vista

use DB;//hacer referencia a DB



class ActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        if ($request) {
            $sql=trim($request->get('buscar'));//trim borra espacios en blanco
            $activos=DB::table('activos')->where('nombre','LIKE','%'.$sql.'%')
            ->orWhere('marca','LIKE','%'.$sql.'%')
            ->orWhere('modelo','LIKE','%'.$sql.'%')
            ->orderBy('nombre', 'desc')
            ->paginate(5);
            return view('activos.index',['activos'=>$activos,'buscar'=>$sql]);
            //return $activos;
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
        $activo= new Activo();
        $activo->nombre= $request->nombre;
        $activo->marca= $request->marca;
        $activo->modelo= $request->modelo;
        $activo->serie= $request->serie;
        $activo->precio=$request->precio;
        $activo->condicion='1';
        $activo->save();
        return Redirect::to("activo");
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
        $activo=Activo::findOrFail($request->id_activo);
        $activo->nombre= $request->nombre;
        $activo->marca= $request->marca;
        $activo->modelo= $request->modelo;
        $activo->serie= $request->serie;
        $activo->precio=$request->precio;
        $activo->condicion='1';
        $activo->save();
        return Redirect::to("activo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $activo=Activo::findOrFail($request->id_activo);
        if($activo->condicion=='1')
        {
            $activo->condicion='0';
            $activo->save();
            
        }else 
        {
            $activo->condicion='1';
            $activo->save();
        }
        return Redirect::to("activo");
    }
}
