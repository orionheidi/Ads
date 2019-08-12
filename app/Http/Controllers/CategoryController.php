<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Category;

class CategoryController extends Controller
{
    public function show($category_id)
    {
       $category = Category::findOrFail($category_id);
    
        if($category){
           $ads = Ad::where('category_id',$category_id)->get();
    
            return view('ads.categoryAd', compact('ads'));
        }
    
    }
}
