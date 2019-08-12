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
    
       $asd = Ad::with('categories')->get();
    
            return view('ads.categoryAd', compact('ads','categories'));
        }
    
    }

