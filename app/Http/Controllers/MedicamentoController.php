<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Medicamento;

use App\Marca;

use \PDF;

use Illuminate\Support\Facades\Redirect;//para que redirecciona a la vista

use DB;//hacer referencia a DB

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $sql=trim($request->get('buscar'));
            $consulta="select m.id, m.nombre, m.precio, m.contenido, m.descripcion, m.condicion, 
            (select p.nombre from presentaciones p where  m.idPresentacion=p.id ) as presentacion, 
            m.idPresentacion,
            (select x.nombre from marcas x where x.id=m.idMarca)  as marca,
            m.idMarca
            from medicamentos m
            where m.nombre like '%".$sql."%'";
            $medicamentos=DB::select($consulta);

            $marcas=DB::table('marcas')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();

            $presentaciones=DB::table('presentaciones')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();
            return view('medicamentos.index',['medicamentos'=>$medicamentos, "presentaciones"=>$presentaciones, "marcas"=>$marcas,'buscar'=>$sql]);
            //return $medicamentos;
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
        $medicamento= new medicamento();
        $medicamento->idMarca= $request->idMarca;
        $medicamento->idPresentacion= $request->idPresentacion;
        $medicamento->nombre= $request->nombre;
        $medicamento->descripcion=$request->descripcion;
        $medicamento->precio=$request->precio;
        $medicamento->contenido=$request->contenido;
        $medicamento->condicion='1';
        $medicamento->save();
        return Redirect::to("medicamento");
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
        $medicamento=Medicamento::findOrFail($request->id_medicamento);
        $medicamento->idMarca= $request->idMarca;
        $medicamento->idPresentacion= $request->idPresentacion;
        $medicamento->nombre= $request->nombre;
        $medicamento->descripcion=$request->descripcion;
        $medicamento->precio=$request->precio;
        $medicamento->contenido=$request->contenido;
        $medicamento->condicion='1';
        $medicamento->save();
        return Redirect::to("medicamento");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $medicamento=Medicamento::findOrFail($request->id_medicamento);
        if($medicamento->condicion=='1')
        {
            $medicamento->condicion='0';
            $medicamento->save();
            
        }else 
        {
            $medicamento->condicion='1';
            $medicamento->save();
        }
        return Redirect::to("medicamento");
    }

    public function rep()
    {
        $farmacias=DB::table('farmacias')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();
        return view('reportes.medicamentos',["farmacias"=>$farmacias]);

    }

    public function listarPdf(){


        $consulta = "select (select m.nombre from medicamentos m where s.idMedicamento=m.id) medicamento, s.idMedicamento, 
        sum(s.existencia) conteo
        from stocks s 
        where s.condicion=1
        GROUP BY s.idMedicamento
        HAVING conteo >0
        ORDER BY medicamento"; 

        $medicamentos=DB::select($consulta);

        $pdf= PDF::loadView('pdf.medicamentospdf',['medicamentos'=>$medicamentos]);
        return $pdf->download('inventarioMx.pdf');
      
    }
    public function listarxfarPdf($id){


        $consulta = "select (select m.nombre from medicamentos m where s.idMedicamento=m.id) medicamento,
         s.idMedicamento, s.existencia conteo
        from stocks s
        where s.idFarmacia=".$id.""; 

        $medicamentos=DB::select($consulta);

        $farmacia="select f.nombre from farmacias f where f.id=".$id."";
        $s=DB::select($farmacia);
        foreach($s as $t){
            $farm=$t->nombre;
		}

        $pdf= PDF::loadView('pdf.medicamentospdf',['medicamentos'=>$medicamentos, 'farm'=>$farm]);
        return $pdf->download('InventarioMx-'.$farm.'.pdf');
      
    }
}
