<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Responsabilidad;
use Carbon\Carbon;
use \PDF;
use App\Intercambio;
use Illuminate\Support\Facades\Redirect;
use DB;//hacer referencia a DB

class IntercambioController extends Controller
{
    public function index(Request $request)
    { 
        

        if ($request) {
            $sql=trim($request->get('buscar'));
            $us= \Auth::user()->id;
            $farmacia="select (select f.id from farmacias f where f.id=
                        (select e.idFarmacia from empleados e where e.id=u.idEmpleado)) id
            from users u
            where u.id=".$us."
            limit 1";
            $s=DB::select($farmacia);
            foreach($s as $s){
                $farm= $s->id;
            } 
            $consulta=" select s.id, s.idFarmacia, s.idMedicamento, s.existencia,
            (select f.nombre from farmacias f where f.id=s.idFarmacia) farmacia,
            (select m.nombre from medicamentos m where m.id=s.idMedicamento) medicamento,
             (select d.distancia from distancias d
             where d.idPuntoA=".$farm."
             or d.idPuntoB=".$farm.") distancia, (select m.nombre from medicamentos m where m.id=s.idMedicamento) medicamento,
             (select d.distancia from distancias d
             where d.idPuntoA=1
             or d.idPuntoB=1)/1000 tiempo 
             from stocks s
             where s.condicion=1
             and s.idFarmacia!=".$farm."
             and (select m.nombre from medicamentos m where m.id=s.idMedicamento) like '%".$sql."%'
             order by distancia, tiempo";
            $stocks=DB::select($consulta);
            return view('intercambios.index',['stocks'=>$stocks, 'farm'=>$farm,'buscar'=>$sql]);
            //return $gastos;
        }
    }

    public function store(Request $request)
    {
        $tiempo= Carbon::now('America/Guatemala');
        $us= \Auth::user()->id;
        $farmacia="select (select f.id from farmacias f where f.id=
                    (select e.idFarmacia from empleados e where e.id=u.idEmpleado)) id
        from users u
        where u.id=".$us."
        limit 1";
        $s=DB::select($farmacia);
        foreach($s as $t){
            $sql= $t->id;
        } 
        
        $intercambio= new Intercambio();
        $intercambio->idDa= $request->idDa;
        $intercambio->idPide= $sql;
        $intercambio->idMedicamento=$request->idMedicamento;
        $intercambio->idUsuario= \Auth::user()->id; 
        $intercambio->cantidad=$request->cantidad;
        $intercambio->fecha=$tiempo->toDateString();
        $intercambio->condicion='1';
        $intercambio->save();
        return Redirect::to("intercambio");
    }

    public function intercambios()
    {
        $farmacias=DB::table('farmacias')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();
        return view('reportes.intercambios',["farmacias"=>$farmacias]);

    }

    public function listafarm()
    {
        $farmacias=DB::table('farmacias')
            ->select('id', 'nombre', 'direccion')
            ->where('condicion','=','1')->get();
        return view('intercambios.distancias',["farmacias"=>$farmacias]);

    }

    public function intsPDF(){
        $consulta="select (select f.nombre from farmacias f where f.id=i.idDa) entrega,
        (select f.nombre from farmacias f where f.id=i.idPide) recibe,
        (select m.nombre from medicamentos m where m.id=i.idMedicamento) medicamento,
        (select u.name from users u where u.id=i.idUsuario) usuario,
        i.cantidad, i.fecha
        from intercambios i
        where i.condicion=1";

        $intercambios=DB::select($consulta);

        $pdf= PDF::loadView('pdf.intercambiospdf',[ 'intercambios'=>$intercambios]);
        return $pdf->download('intercambios.pdf');
    }

    public function intPDF($id){
        $consulta="select (select f.nombre from farmacias f where f.id=i.idDa) entrega,
        (select f.nombre from farmacias f where f.id=i.idPide) recibe,
        (select m.nombre from medicamentos m where m.id=i.idMedicamento) medicamento,
        (select u.name from users u where u.id=i.idUsuario) usuario,
        i.cantidad, i.fecha
        from intercambios i
        where i.condicion=1
        and i.idPide=".$id."";

        $intercambios=DB::select($consulta);

        $farmacia="select f.nombre from farmacias f where f.id=".$id."";
        $s=DB::select($farmacia);
        foreach($s as $t){
            $farm=$t->nombre;
        }

        $pdf= PDF::loadView('pdf.intercambiospdf',[ 'intercambios'=>$intercambios, 'farm'=>$farm]);
        return $pdf->download('Intercambios'.$farm.'.pdf');
    }
    
}
