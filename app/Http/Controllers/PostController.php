<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Usuarioperfil;

use DB;

class PostController extends Controller
{
    public function crearPost(Request $request)
    {
      $post = new Post();
      $post->texto = "un texto de prueba";
      $user = $request->user();
      $usario = Usuarioperfil::findOrFail($user['id']);
      $usario()->posts()->save($post);
      $id = Auth::id();
      dd($id);
      return redirect()->route('portal_post');
    }
}
