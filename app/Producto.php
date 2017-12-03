<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use softDeletes;

    protected $table = 'producto';

    protected $fillable = ['nombre', 'descripcion', 'user_id', 'estado_id'];

    public function transaccion()
    {
      return $this->belongsToMany(Transaccion::class, 'producto_transaccion', 'producto', 'transaccion');
    }

    public function usuario()
    {
      return $this->belongsTo(Usuarioperfil::class, 'user_id');
    }
}
