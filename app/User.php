<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //you don't have to add the foreign key parameter if you have follow the convention "user_id", it is just for illustration
    public function address(){

        return $this->hasOne('App\Address','user_id');
    }

    public function posts(){

        return $this->hasMany('App\Post');
    }

    public function roles(){

        return $this->belongsToMany('App\Role');
    }
}
