<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public $directory = "/images/";

    protected $fillable = [
        'title','description','price','condition','url','user_id','phone','location'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function product(){
        return $this->hasOne('App\Product');
    }

    public function getPathAttribute($value){
        return $this->directory . $value;
    }
}
