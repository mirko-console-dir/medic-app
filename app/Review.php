<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['vote', 'name', 'lastname', 'title', 'body', 'date','user_id'];

    public function users() {
        return $this->belongsTo('App\User');
    }
}
