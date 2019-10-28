<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'price', 'description', 'is_approved' ];

    public function category()
    {

        return $this->belongsTo('App\Category');
    
    }

    public function images()
    {
        
        return $this->hasMany('App\Image');

    }

    public function users()
    {
        
        return $this->belongsToMany('App\User');

    }

}
