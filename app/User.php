<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Password Encrypt Mutator
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     *
     *  Relationships
     *
     */

    // One to One Relationship
    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    /**
     *
     *  Middleware Methods
     *
     */

    public function isAdmin(){
        return ($this->role->name == 'administrator' && $this->is_active == 1) ? true : false;
    }

    /**
     *
     *  Custom Methods
     *
     */
}
