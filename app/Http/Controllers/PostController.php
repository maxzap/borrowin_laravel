<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Usuarioperfil;

use DB;

class PostController extends Controller
{
    public function crearPost(Request $request)
    {
      $post = new Post();
      $post->texto = $request['cuerpo'];
      $user = $request->user();
      $usario = Usuarioperfil::findOrFail($user['id']);
      $usario()->posts()->save($post);
      return redirect(route('portal_post'));

    }
}
