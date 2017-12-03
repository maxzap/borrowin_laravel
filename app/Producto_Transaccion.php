<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_Transaccion extends Model
{
    use SoftDeletes;

    protected $table = 'producto_transaccion';

    protected $fillable = ['transaccion', 'producto'];

}
