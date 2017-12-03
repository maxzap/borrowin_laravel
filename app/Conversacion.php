<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversacion extends Model
{
    use SoftDeletes;

    protected $table = 'conversacion';

    protected $fillable = ['user_id', 'receptor_id'];

    public function usuario()
    {
      return $this->belongsTo(Usuarioperfil::class, 'user_id');
    }
    public function amigo()
    {
      return $this->belongsTo(Usuarioperfil::class, 'receptor_id');
    }


    public function mensajes()
    {
      return $this->hasMany(Mensajes::class, 'id');
    }


}
