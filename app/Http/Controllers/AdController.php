<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Product;
use App\User;

class AdController extends Controller
{
    
    public function index()
    {
        $ads = Ad::with('user')->paginate(15);
        return view('ads.allAds',compact('ads'));
    }
    public function create()
    {
        return view('ads.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'title' => 'required|min:2|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required',
            'condition' => 'required',
            'phone' => 'required',
            'location' => 'required',

        ]);
       
        $ad = new Ad();

        if($file = $request->file('file')){

            $name = $file->getClientOriginalName();

            $file->move('images', $name);

            $ad['path'] = $name;
        }
  
        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->price = $request->price;
        $ad->condition = $request->condition;
        $ad->phone = $request->phone;
        $ad->location = $request->location;
        $ad->user_id = auth()->user()->id;
        $ad->save();

        $product = new Product();
        $product->name = $request->name;
        $product->ad_id = $ad->id;
        $product->save();

        session()->flash('success_message', 'Article successfully created!');
        return back()->with('success_message', 'Article successfully created!');
    }

}
