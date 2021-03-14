<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['vote', 'name', 'lastname', 'title', 'body', 'date'];

    public function users() {
        return $this->belongsTo('App\User');
    }
}
