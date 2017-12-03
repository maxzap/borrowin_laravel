<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imagenes extends Model
{
    use SoftDeletes;

    protected $table = 'imagenes';

    protected $fillable = ['nombre','tipo', 'producto', 'user_id'];

    public function producto()
    {
      return $this->belongsTo(Producto::class, 'producto');
    }

    public function usuario()
    {
      return $this->belongsTo(Usuarioperfil::class, 'user_id');
    }

}
