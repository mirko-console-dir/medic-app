<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefix extends Model
{
    protected $fillable = ['name', 'dial_code', 'code'];



    public function users(){

        return $this->hasMany('App\User');

    }

}
