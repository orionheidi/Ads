<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const PRODUCTS = ['mac','lenovo','shirt','dress','pants', 'table','chair','sofa','kitchen', 'ios', 'asos','suit'];

    protected $fillable = [
        'name'
    ];

    public function ad()
    {
        return $this->belongsTo('App\Ad');
    }
}
