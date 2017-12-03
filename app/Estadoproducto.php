<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadoproducto extends Model
{
    use SoftDeletes;

    protected $table = 'estadoproducto';

    protected $fillable = ['estado'];

}
