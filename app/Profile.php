<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name' ];

    /**
     * Remove timestamps from model.
     *
     * @var bool
     */
    public $timestamps = false;

    public function users()
    {

        return $this->hasMany('App\User');
    
    }

    public function admins()
    {

        return $this->hasMany('App\Admins');
    
    }

}
