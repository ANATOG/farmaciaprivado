<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Distancia;

use DB;
use Illuminate\support\Facades\Redirect;

class DistanciaController extends Controller
{
    public function index(Request $request)
    {       
        if ($request) {
            $sql=trim($request->get('buscar'));
            $consulta="select (select f.nombre from farmacias f where f.id=d.idPuntoA) FarmaciaA,
            (select f.nombre from farmacias f where f.id=d.idPuntoB) FarmaciaB,
            d.distancia, d.condicion, d.id
            from distancias d
            where d.condicion=1
            and (select f.nombre from farmacias f where f.id=d.idPuntoA) like '%".$sql."%'
            and (select f.nombre from farmacias f where f.id=d.idPuntoB) like '%".$sql."%'";

            $farmacias=DB::table('farmacias')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();
          
            $distancias=DB::select($consulta);
            return view('distancias.index',['distancias'=>$distancias, 'farmacias'=>$farmacias, 'buscar'=>$sql]);
            //return $distancias;
             
        }  
            
    }
    public function verdistancias()
    {   
            $consulta="select (select f.nombre from farmacias f where f.id=d.idPuntoA) FarmaciaA,
            (select f.nombre from farmacias f where f.id=d.idPuntoB) FarmaciaB,
            d.distancia, d.condicion, d.id
            from distancias d
            where d.condicion=1
            ";

            $farmacias=DB::table('farmacias')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();
          
            $distancias=DB::select($consulta);
            return view('distancias.discallcenter',['distancias'=>$distancias, 'farmacias'=>$farmacias]);
            //return $distancias;            
    }



    public function store(Request $request)
    {
        $distancia= new Distancia();
        $distancia->idPuntoA= $request->idPuntoA;
        $distancia->idPuntoB= $request->idPuntoB;
        $distancia->distancia= $request->distancia;
        $distancia->condicion='1';
        $distancia->save();
        return Redirect::to("distancia");
    }

    public function update(Request $request)
    {
        $distancia=Distancia::findOrFail($request->id_distancia);
        $distancia->idPuntoA= $request->idPuntoA;
        $distancia->idPuntoB= $request->idPuntoB;
        $distancia->distancia= $request->distancia;
        $distancia->condicion='1';
        $distancia->save();
        return Redirect::to("distancia");
    }

    public function destroy(Request $request)
    {
        $distancia=Distancia::findOrFail($request->id_distancia);
        if($distancia->condicion=='1')
        {
            $distancia->condicion='0';
            $distancia->save();
            
        }else 
        {
            $distancia->condicion='1';
            $distancia->save();
        }
        return Redirect::to("distancia");
    }
}
