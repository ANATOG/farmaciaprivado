<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Departamento;

use DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getDepartamentos(Request $request, $id)
    {
        if($request->ajax())
        {
            $departamentos = Departamento::depar($id);
            return response()->json($departamentos);
        }
    }  
}
