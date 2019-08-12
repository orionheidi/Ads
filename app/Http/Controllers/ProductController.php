<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Session;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->paginate(15);
       
        return view('ads.allAds',compact('products'));
    }

    
    public function getAddToCart(Request $request, $id)
    {
      if (Auth::check()){
      $products = Product::all();
      $product = Product::findOrFail($id);
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($product, $product->id);

      $request->session()->put('cart',$cart);
      // dd($request->session()->get('cart'));
      return view('shop.shopping-cart',['products' =>$cart->items,'totalPrice'=> $cart->totalPrice,'product']);
      }
      else {
        return redirect('/allAds');
      }
    }

    public function getCart()
    {
        $products = Product::all();
        if(!Session::has('cart')){
          return view('shop.shopping-cart',['products' => null ]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart',['products' =>$cart->items,'totalPrice'=> $cart->totalPrice,'product']);
    }
}
