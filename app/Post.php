<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'post';

    protected $fillable = ['texto','user_id'];

    public function usuario()
    {
      return $this->belongsTo(Usuarioperfil::class, 'user_id');
    }
<<<<<<< HEAD
    public function likes()
    {
      return $this->hasMany(Like::class, 'post_id');
    }
=======

>>>>>>> parent of 262a836... Merge branch 'master' into vistas
}
