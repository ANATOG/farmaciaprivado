<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tipogasto;

use Illuminate\support\Facades\Redirect;//para que redirecciona a la vista

use DB;//hacer referencia a DB

class TipogastoController extends Controller
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
            $tipogastos=DB::table('tipogastos')->where('nombre','LIKE','%'.$sql.'%')
            ->orderBy('nombre', 'asc')
            ->paginate(5);
            return view('tipogastos.index',['tipogastos'=>$tipogastos,'buscar'=>$sql]);
            //return $tipogastos;
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
        $tipogasto= new Tipogasto();
        $tipogasto->nombre= $request->nombre;
        $tipogasto->descripcion=$request->descripcion;
        $tipogasto->condicion='1';
        $tipogasto->save();
        return Redirect::to("tipogasto");
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
        $tipogasto=Tipogasto::findOrFail($request->id_tipogasto);
        $tipogasto->nombre= $request->nombre;
        $tipogasto->descripcion=$request->descripcion;
        $tipogasto->condicion='1';
        $tipogasto->save();
        return Redirect::to("tipogasto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tipogasto=Tipogasto::findOrFail($request->id_tipogasto);
        if($tipogasto->condicion=='1')
        {
            $tipogasto->condicion='0';
            $tipogasto->save();
            
        }else 
        {
            $tipogasto->condicion='1';
            $tipogasto->save();
        }
        return Redirect::to("tipogasto");
    }
}
