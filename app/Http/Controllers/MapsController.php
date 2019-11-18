<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\DetalleVenta;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;

class MapsController extends Controller
{
    public function index()
    {
        $farmacias=DB::table('farmacias')
            ->select('id', 'nombre', 'direccion')
            ->where('condicion','=','1')->get();
            return view('maps.index',['farmacias'=>$farmacias]);
    }
    public function store(Request $request)
    {
            $key='AIzaSyAys8no91OOaGo6t7xFNjAqwaoVKDI6Yas';
                  
            $formattedAddrFrom = str_replace(' ','+',$request->buscar);
            $formattedAddrTo = str_replace(' ','+',$request->idFarmacia);
            
            $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/directions/json?origin='.$formattedAddrFrom.'&destination='.$formattedAddrTo.'&key='.$key.'');
            $outputFrom = json_decode($geocodeFrom);
            $dist = $outputFrom->routes[0]->legs[0]->distance->text;
            $duracion = $outputFrom->routes[0]->legs[0]->duration->text;

            $farmacias=DB::table('farmacias')
            ->select('id', 'nombre', 'direccion')
            ->where('condicion','=','1')->get();
            
            //return $duracion;
            return view('maps.index',["dist"=>$dist,'duracion'=>$duracion, 'farmacias'=>$farmacias]);
        
    }
}
