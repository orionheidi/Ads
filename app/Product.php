<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name'
    ];

    // public function ad()
    // {
    //     return $this->belongsTo('App\Ad');
    // }
}
