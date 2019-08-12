<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
       'name'
    ];
    
    public function ads()
    {
        return $this->belongsToMany('App\Ad','category_ads','ad_id','category_id');
    }

    // public function categories() {
    //     return $this->belongsToMany('App\Category');    
    // }
}
