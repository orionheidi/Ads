<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Product;
use App\User;
use App\Category;
use Carbon\Carbon;
// use App\Http\Controllers\Auth;
use Auth;

class AdController extends Controller
{
    
    public function index()
    {
        $ads = Ad::with('user')->paginate(15);
        return view('ads.allAds',compact('ads'));
    }

    
    public function show($id)
    {
        $ad = Ad::with('user')->findOrFail($id);
        // $product = Product::findOrFail($ad->id);
        return view('ads.singleAd',compact('ad'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('ads.create', compact('categories'));
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
        $category = $request['category'];
        $ad->categories()->attach($category);
        // $ad->categories()->attach($request->category_id);
        // $category_name = $ad->category->name;
        // $category = (int)$data['category'];
        // // $category = $ad->category;
        // $ad->category()->attach($category);
        $ad->save();

        $product = new Product();
        $product->name = $request->name;
        $product->ad_id = $ad->id;
        $product->save();

        session()->flash('success_message', 'Article successfully created!');
        return redirect('allAds')->with('success_message', 'Article successfully created!');
    }

    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        if( Auth::user()->id==$ad->user->id){
            $ad->delete();
            return redirect('allAds')->with('success', 'Ad successfully deleted!');
        }else{
            return redirect('allAds')->withErrors(['msg', 'Cant delete ad, because you are not the owner!']);
        }
       
    }

    public function edit($id)
    {
        $ad = Ad::with('user','product')->findOrFail($id);
        if( Auth::user()->id==$ad->user->id){
            return view('ads.edit',compact('ad'));
        }else{
            return redirect('/allAds');
        }
    }

    public function update(Request $request, $id)
    {

    $this->validate($request,
    [
        'title' => 'required|min:2|max:255',
        'description' => 'required|string|max:1000',
        'price' => 'required',
        'condition' => 'required',
        'phone' => 'required',
        'location' => 'required',
         'name' => 'required'
    ]);

    $data = Ad::findOrFail($id);
    $data->update($request->all());

   if ($request->hasFile('file'))
   {
           $file = $request->file('file');
           $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString()); 
           $name = $timestamp. '-' .$file->getClientOriginalName();
           $data->path = $name;
           $file->move(public_path().'/images/', $name);   
           $data->save();                  
       }  

        $product = $data->product;
    
        // $product = new Product;
        $product->ad_id = $data->id;
       
        $product->name = $request->input('name');
   
        $product->save();
   

    session()->flash('success_message', 'Article successfully updated!');
    return redirect('allAds')->with('success_message', 'Article successfully updated!');

    }
}
