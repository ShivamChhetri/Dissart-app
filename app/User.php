<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\message;
use App\post;

class User extends Authenticatable
{
    use Notifiable;

   
    protected $fillable = [
        'name', 'email', 'password','verifyToken'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public function messages(){
        return $this->hasMany('App\message');
    }

    public function posts(){
        return $this->hasMany('App\post');
    }

    public function likes(){
        return $this->belongsToMany('App\Post', 'likes', 'user_id', 'post_id');
    }

}
