<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $guarded=[];

    public function user(){
        return $this->belongsTo('App\User');
    } 

    public function comments(){
        return $this->hasMany('App\comment');
    } 

    public function likes(){
        return $this->belongsToMany('App\User', 'likes');
    }
}
