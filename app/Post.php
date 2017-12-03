<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'post';

    protected $fillable = ['texto', 'likescant', 'comentarioscant', 'user_id'];

    public function usuario()
    {
      return $this->belongsTo(Usuarioperfil::class, 'user_id');
    }

}
