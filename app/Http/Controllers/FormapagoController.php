<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Formapago;

use Illuminate\Support\Facades\Redirect;//para que redirecciona a la vista

use DB;//hacer referencia a DB

class FormapagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if ($request) {
            $sql=trim($request->get('buscar'));//trim borra espacios en blanco
            $principios=DB::table('formapagos')->where('nombre','LIKE','%'.$sql.'%')
            ->orderBy('nombre', 'asc')
            ->paginate(5);
           // return view('pagos.index',['pagos'=>$pagos,'buscar'=>$sql]);
            return $pagos;
        }
    }    
}
