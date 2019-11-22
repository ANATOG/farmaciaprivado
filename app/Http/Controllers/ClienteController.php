<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;

use Illuminate\Support\Facades\Redirect;//para que redirecciona a la vista

use DB;//hacer referencia a DB

class ClienteController extends Controller
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
            $clientes=DB::table('clientes')->where('nombre1','LIKE','%'.$sql.'%')
            ->orWhere('nombre2','LIKE','%'.$sql.'%')
            ->orWhere('apellido1','LIKE','%'.$sql.'%')
            ->orWhere('apellido2','LIKE','%'.$sql.'%')
            ->orWhere('nit','LIKE','%'.$sql.'%')
            ->orderBy('apellido1', 'desc')
            ->paginate(5);
            return view('clientes.index',['clientes'=>$clientes,'buscar'=>$sql]);
            //return $clientes;
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
        $cliente= new Cliente();
        $cliente->nit= $request->nit;
        $cliente->nombre1= $request->nombre1;
        $cliente->nombre2= $request->nombre2;
        $cliente->apellido1= $request->apellido1;
        $cliente->apellido2= $request->apellido2;
        $cliente->direccion=$request->direccion;
        $cliente->telefono=$request->telefono;
        $cliente->correo=$request->correo;
        $cliente->condicion='1';
        $cliente->save();
        return Redirect::to("cliente");
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
        $cliente=Cliente::findOrFail($request->id_cliente);
        $cliente->nit= $request->nit;
        $cliente->nombre1= $request->nombre1;
        $cliente->nombre2= $request->nombre2;
        $cliente->apellido1= $request->apellido1;
        $cliente->apellido2= $request->apellido2;
        $cliente->direccion=$request->direccion;
        $cliente->telefono=$request->telefono;
        $cliente->correo=$request->correo;
        $cliente->condicion='1';
        $cliente->save();
        return Redirect::to("cliente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cliente=Cliente::findOrFail($request->id_cliente);
        if($cliente->condicion=='1')
        {
            $cliente->condicion='0';
            $cliente->save();
            
        }else 
        {
            $cliente->condicion='1';
            $cliente->save();
        }
        return Redirect::to("cliente");
    }
}
