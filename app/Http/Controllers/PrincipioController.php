<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Principio;

use Illuminate\Support\Facades\Redirect;//para que redirecciona a la vista

use DB;//hacer referencia a DB

class PrincipioController extends Controller
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
            $principios=DB::table('principios')->where('nombre','LIKE','%'.$sql.'%')
            ->orderBy('nombre', 'asc')
            ->paginate(5);
            return view('principios.index',['principios'=>$principios,'buscar'=>$sql]);
            //return $principios;
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
        $principio= new Principio();
        $principio->nombre= $request->nombre;
        $principio->descripcion=$request->descripcion;
        $principio->condicion='1';
        $principio->save();
        return Redirect::to("principio");//redireccionar al index marca
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $principio=Principio::findOrFail($request->id_principio);
        $principio->nombre= $request->nombre;
        $principio->descripcion=$request->descripcion;
        $principio->condicion='1';
        $principio->save();
        return Redirect::to("principio");//redireccionar al index marca
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $principio=Principio::findOrFail($request->id_principio);
        if($principio->condicion=='1')
        {
            $principio->condicion='0';
            $principio->save();
            
        }else 
        {
            $principio->condicion='1';
            $principio->save();
        }
        return Redirect::to("principio");
    }
}
