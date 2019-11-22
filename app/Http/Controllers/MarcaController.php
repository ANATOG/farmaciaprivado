<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Marca;

use Illuminate\Support\Facades\Redirect;//para que redirecciona a la vista

use DB;//hacer referencia a DB

class MarcaController extends Controller
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
            $marcas=DB::table('marcas')->where('nombre','LIKE','%'.$sql.'%')
            ->orderBy('id', 'desc')
            ->paginate(5);
            return view('marcas.index',['marcas'=>$marcas,'buscar'=>$sql]);
            //return $marcas;
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
        $marca= new Marca();
        $marca->nombre= $request->nombre;
        $marca->descripcion=$request->descripcion;
        $marca->condicion='1';
        $marca->save();
        return Redirect::to("marca");//redireccionar al index marca
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
        $marca=Marca::findOrFail($request->id_marca);
        $marca->nombre= $request->nombre;
        $marca->descripcion=$request->descripcion;
        $marca->condicion='1';
        $marca->save();
        return Redirect::to("marca");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $marca=Marca::findOrFail($request->id_marca);
        if($marca->condicion=='1')
        {
            $marca->condicion='0';
            $marca->save();
            
        }else 
        {
            $marca->condicion='1';
            $marca->save();
        }
        return Redirect::to("marca");
    }
}
