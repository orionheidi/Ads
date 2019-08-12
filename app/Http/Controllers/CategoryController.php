<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Category;

class CategoryController extends Controller
{
    public function show($id)
    {
       $category = Category::findOrFail($id);
    
       $ads = Ad::has('product')->with('categories','product')->get();
       foreach($ads as $ad){
           $product = Ad::find($ad->id)->product;
        }
    
        return view('ads.categoryAd', compact('ads','category','product'));
        }
    }

