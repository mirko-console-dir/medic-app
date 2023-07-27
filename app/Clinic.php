<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{

    protected $fillable = ['name', 'city', 'address' , 'phone_clinic'];


    public function users()
    {

        return $this->belongsToMany('App\User','user_clinic');
    }


}
