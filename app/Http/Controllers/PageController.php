<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use View;
use App\Usuarioperfil;

class PageController extends Controller
{

	public function showView($name)
	{
    	if(View::exists($name)){
      	// $usuarioperfil = Usuarioperfil::where('id', Auth::user()->id);
      	return view($name, compact('usuarioperfil'));
    	}
    	else{
        	return "404: No se encontro la pagina solicitada";
    	}
	}

}
