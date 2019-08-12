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
        return $this->hasMany(Ad::class,'category_id', 'ad_id');
    }

    // public function categories() {
    //     return $this->belongsToMany('App\Category');    
    // }
}
