<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadotransaccion extends Model
{
    use SoftDeletes;

    protected $table = 'estadotransaccion';

    protected $fillable = ['estado'];
}
