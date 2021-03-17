<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'description', 'price', 'user_id'];

    public function users()
    {

        return $this->belongsTo('App\User');
    }
}
