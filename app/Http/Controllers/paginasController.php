<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorias;
use App\Models\libros;
use App\Models\reservas;
use App\Models\usuarios;

class paginasController extends Controller
{
    public function validarUsuario(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $user = usuarios::where(['username'=> $username],['password'=> $password])->get(['id','unique_code','nombre','n_reservas']);
        if (!empty($user)){
            session(['user'=>$user]);
            session(['userName'=>$user[0]->nombre]);
            session(['login'=>true]);
            return redirect('/'); 
        }
    }
    public function getDataLibros(Request $request)
    {
        $id = $request->id_categoria;
        $libros = libros::where(['id_categoria'=> $id,'reservado'=>0])->get();
        
        $tabla="
        <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Acción</th>
        </tr>
    </thead>

    <tbody>";
    foreach ($libros as $key => $value) {
        // echo "alert( " . $value->titulo . " );";
        $tabla .= ' 
        <tr>
            <td>'.$value->titulo.'</td>
            <td>'.$value->autor.'</td>
            <td>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary btn-sm" href="/detalles/'.$value->unique_code.'">Ver detalles</button>
                </div>
                <div class="col">
                    <form action="/reservar" method="post">
                        <input type="hidden" name="dias" value="5">
                        <button class="btn btn-success btn-sm" name="id_libro" value="'.$value->unique_code.'">Reservar</button>
                    </form>
                </div>
                <div class="col">
                    <button class="btn btn-danger btn-sm" href="/eliminarLibro/'.$value->unique_code.'">Eliminar</button>
                </div>
            </div>
            </td>
        </tr>';
    }
    echo $tabla;
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/'); 
    }
    
    public function mostrarLibros()
    {
        $libros = libros::where(['reservado'=>0])->join('categorias', 'categorias.id', '=', 'libros.id_categoria')->get();
        // echo '<pre>';
        // print_r($libros);
        // echo '</pre>';
        // exit;
        $categorias = categorias::all();
        return view('libros',['libros'=>$libros, 'categorias'=>$categorias]);
    }

    public function verDetalles($unique_code)
    {
        $libro = libros::where('libros.unique_code', $unique_code)->join('categorias', 'categorias.id', '=', 'libros.id_categoria')->get();
        // echo '<pre>';
        // print_r($libro);
        // echo '</pre>';
        // exit;
        return view('detalle',['libro'=>$libro]);
    }

    public function reservar(Request $request)
    {
        //creando objeto apartir del modelo

        $n_reservas = usuarios::where(['nombre'=> session('userName')])->get(['n_reservas']);

        $user =session('user');
        $reserva = new reservas();
        $reserva->unique_code = rand(1, 100).$request->id_libro.$user[0]->id;
        $reserva->id_libro = $request->id_libro;
        $reserva->id_usuario = $user[0]->unique_code;
        $reserva->dias = $request->dias;
        // guardar
        $reserva->save();
        usuarios::where(['nombre'=> session('userName')])->update(["n_reservas"=>$n_reservas[0]->n_reservas+1]);
        libros::where('unique_code', $request->id_libro)->update(["reservado"=>1]);
        session(['reserva'=>true]);
        return redirect('/libros');
    }

    public function eliminarReserva($id_reserva)
    {
        // echo '<pre>';
        // print_r($id_reserva);
        // echo '</pre>';
        // exit;
        reservas::where('unique_code', $id_reserva)->delete();
        session(['delete'=>true]);
        return redirect('/');
    }

    public function eliminarLibro($id_libro)
    {
        libros::where('unique_code', $id_libro)->delete();
        
        session(['delete'=>true]);
        $this->mostrarLibros();
        // return view('libros',['libros'=>$libros,'user'=> $user[0]]);
    }
}
