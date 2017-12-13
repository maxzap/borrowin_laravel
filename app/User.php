<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
<<<<<<< HEAD
<<<<<<< HEAD

<<<<<<< HEAD
    public function likes()
    {
      return $this->hasMany(Like::class);
    }
=======
    public function perfil()
    {
    return $this->hasOne(Usuarioperfil::class, 'id');
    }

>>>>>>> parent of 262a836... Merge branch 'master' into vistas
=======
>>>>>>> parent of 191de29... Likes OK
=======
>>>>>>> parent of 191de29... Likes OK
}
