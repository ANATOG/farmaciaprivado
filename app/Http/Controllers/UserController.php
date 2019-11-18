<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Redirect;

use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sql=trim($request->get('buscar'));
            $consulta="select u.id, u.name, u.email, u.idRol, u.idEmpleado, u.condicion,
            (select concat (e.nombre1, ' ', e.apellido1) from empleados e where  u.idEmpleado=e.id ) as empleado,
            (select r.nombre from roles r where r.id=u.idRol)  as rol
            from users u
            where u.name like '%".$sql."%'";
            
            $usuarios=DB::select($consulta);

            $roles=DB::table('roles')
            ->select('id', 'nombre')
            ->where('condicion','=','1')->get();

            $empleados=DB::table('empleados')
            ->select('id', 'nombre1', 'apellido1')
            ->where('condicion','=','1')->get();
            return view('usuarios.index',['usuarios'=>$usuarios, "empleados"=>$empleados, "roles"=>$roles,'buscar'=>$sql]);
            //return $usuarios;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario= new User();
        $usuario->name= $request->name;
        $usuario->email= $request->email;
        $usuario->password=bcrypt($request->password);
        $usuario->idEmpleado=$request->idEmpleado;
        $usuario->idRol=$request->idRol;
        $usuario->condicion='1';
        $usuario->save();
        return Redirect::to("usuario");
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
        $usuario= User::findOrFail($request->id_usuario);
        $usuario->name= $request->name;
        $usuario->email= $request->email;
        $usuario->password=bcrypt($request->password);
        $usuario->idEmpleado=$request->idEmpleado;
        $usuario->idRol=$request->idRol;
        $usuario->condicion='1';
        $usuario->save();
        return Redirect::to("usuario");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user= User::findOrFail($request->id_usuario);
         
         if($user->condicion=="1"){

                $user->condicion= '0';
                $user->save();
                return Redirect::to("user");

           }else{

                $user->condicion= '1';
                $user->save();
                return Redirect::to("usuario");

            }
    }
}
