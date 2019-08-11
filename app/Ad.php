<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public $directory = "/images/";

    const CONDITIONS = ['new','used'];

    protected $fillable = [
        'title','description','price','condition','url','user_id','phone','location'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function product(){
        return $this->hasOne('App\Product');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_id');
    }

    public function getPathAttribute($value){
        return $this->directory . $value;
    }
}
