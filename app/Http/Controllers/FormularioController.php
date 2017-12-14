<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ixudra\Curl\Facades\Curl;
use App\Usuarioperfil;

class FormularioController extends Controller
{

    public function mostrarSubir()
    {
    	return view('view_user');
    }

    public function subir(Request $request)
    {
      $user = $request->user();
      $usuario = Usuarioperfil::findOrFail($user['id']);

      $nombre = 'user_profile.' . $request->file('profile_pic')->extension();
    	$path = $request->file('profile_pic')->storePubliclyAs('public/assets/img/profile', $nombre);

      // $usuario->fill($nombre);
      $usuario->save();

    	return redirect('/subir');
    }


}
