<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['title', 'body', 'name', 'lastname', 'email', 'tax_code', 'date', 'slug'];
}
