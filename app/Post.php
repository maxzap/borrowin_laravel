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
<<<<<<< HEAD
<<<<<<< HEAD
    public function likes()
=======
    public function Likes()
>>>>>>> parent of 191de29... Likes OK
=======
    public function Likes()
>>>>>>> parent of 191de29... Likes OK
    {
      return $this->hasMany(Like::class, 'post_id');
    }
=======

>>>>>>> parent of 262a836... Merge branch 'master' into vistas
}
