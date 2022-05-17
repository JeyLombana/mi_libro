<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservas;
use App\Models\usuarios;


class inicioController extends Controller
{
    public function __invoke()
    {
        if (session()->has('user')){
            $user = json_decode(session('user'));
            $user = usuarios::where(['unique_code'=> $user[0]->unique_code])->get(['id','unique_code','nombre','n_reservas']);
            session(['user'=>$user]);
            $user = json_decode(session('user'));
            $reservas = reservas::where('reservas.id_usuario', $user[0]->unique_code)->join('libros', 'libros.unique_code', '=', 'reservas.id_libro')->get(['libros.titulo','libros.autor','reservas.unique_code']);
            // echo '<pre>';
            // print_r($user);
            // print_r($reservas);
            // echo '</pre>';
            // exit;
            return view('inicio',['reservas'=>$reservas,'user'=> $user[0]]);
        }else {
            return view('login');
        }
    }
}
