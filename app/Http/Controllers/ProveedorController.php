<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proveedor;

use Illuminate\support\Facades\Redirect;//para que redirecciona a la vista

use DB;//hacer referencia a DB

class ProveedorController extends Controller
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
            $proveedores=DB::table('proveedores')->where('nombre','LIKE','%'.$sql.'%')
            ->orWhere('nit','LIKE','%'.$sql.'%')
            ->orderBy('id', 'desc')
            ->paginate(5);
            return view('proveedores.index',['proveedores'=>$proveedores,'buscar'=>$sql]);
            //return $proveedores;
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
        $proveedor= new Proveedor();
        $proveedor->nit= $request->nit;
        $proveedor->nombre= $request->nombre;
        $proveedor->descripcion=$request->descripcion;
        $proveedor->direccion=$request->direccion;
        $proveedor->telefono=$request->telefono;
        $proveedor->correo=$request->correo;
        $proveedor->condicion='1';
        $proveedor->save();
        return Redirect::to("proveedor");
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
        $proveedor=Proveedor::findOrFail($request->id_proveedor);
        $proveedor->nit= $request->nit;
        $proveedor->nombre= $request->nombre;
        $proveedor->descripcion=$request->descripcion;
        $proveedor->direccion=$request->direccion;
        $proveedor->telefono=$request->telefono;
        $proveedor->correo=$request->correo;
        $proveedor->condicion='1';
        $proveedor->save();
        return Redirect::to("proveedor");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $proveedor=Proveedor::findOrFail($request->id_proveedor);
        if($proveedor->condicion=='1')
        {
            $proveedor->condicion='0';
            $proveedor->save();
            
        }else 
        {
            $proveedor->condicion='1';
            $proveedor->save();
        }
        return Redirect::to("proveedor");
    }
}
