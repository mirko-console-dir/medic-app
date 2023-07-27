<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{

    protected $fillable = ['name','type','price','duration'];

    public function users()
    {

        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
