<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'slug_name' ];

    /**
     * Remove timestamps from model.
     *
     * @var bool
     */
    public $timestamps = false;

    public function products()
    {

        return $this->hasMany('App\Product');
    
    }

}
