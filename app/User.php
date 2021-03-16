<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'address', 'register_number_doc', 'cv_img', 'profile_img', 'phone_number', 'slug'
    ];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    //Relationship


    // ManyToMany

    public function clinics()
    {

        return $this->belongsToMany('App\Clinic');
    }

    public function specializations()
    {

        return $this->belongsToMany('App\Specialization');
    }

    public function services()
    {

        return $this->belongsToMany('App\Service');
    }
    public function sponsorships()
    {

        return $this->belongsToMany('App\Sponsorship');
    }
    //manyToOne
    public function reviews()
    {

        return $this->hasMany('App\Review');
    }
    public function messages()
    {

        return $this->hasMany('App\Message');
    }

    // OneToMany


    public function prefixes()
    {

        return $this->belongsTo('App\Prefix');
    }


}
