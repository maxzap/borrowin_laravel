<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use SoftDeletes;

    protected $table = 'imagenes';

    protected $fillable = ['nombre', 'postid', 'user_id'];

    public function post()
    {
      return $this->belongsTo(Post::class, 'postid');
    }

    public function usuario()
    {
      return $this->belongsTo(Usuarioperfil::class, 'user_id');
    }

}
