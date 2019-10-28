<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'path', 'product_id' ];

    public function product()
    {

        return $this->belongsTo('App\Product');
    
    }

}
