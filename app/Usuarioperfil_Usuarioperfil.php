<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarioperfil_Usuarioperfil extends Model
{
  use softDeletes;

  protected $table = 'usuarioperfil_usuarioperfil';

  protected $fillable = ['user_id', 'amigo'];

}
