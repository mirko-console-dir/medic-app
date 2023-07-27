<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'address', 'register_number_doc', 'cv_img', 'profile_img', 'phone_number', 'slug', 'prefix_id','body'
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

        return $this->belongsToMany('App\Clinic','user_clinic');
    }

    public function specializations()
    {

        return $this->belongsToMany('App\Specialization', 'user_specialization');
    }

    public function sponsorships()
    {

        return $this->belongsToMany('App\Sponsorship', 'user_sponsorship')->withTimestamps()->withPivot('sponsorship_id');
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

        return $this->belongsTo('App\Prefix', 'prefix_id');
    }

    public function services()
    {

        return $this->hasMany('App\Service');
    }


}
