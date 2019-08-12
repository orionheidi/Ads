<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index()
    {
    return view('layouts.app');
    }

    public function search(Request $request)
    {
    if($request->ajax())
    {
    $output="";
    $ads=DB::table('ads')->where('title','LIKE','%'.$request->search."%")->orWhere('description','LIKE','%'.$request->search.'%')->orWhere('price','LIKE','%'.$request->search.'%')->orWhere('location','LIKE','%'.$request->search.'%')->get();
    if($ads)
    {
    foreach ($ads as $key => $ad) {
    $output.='<tr>'.
    '<td>'.$ad->id.'</td>'.
    '<td>'.$ad->title.'</td>'.
    '<td>'.$ad->description.'</td>'.
    '<td>'.$ad->price.'</td>'.
    '<td>'.$ad->location.'</td>'.
    '<td>'.$ad->path.'</td>'.
    '</tr>';
    }
}
    return Response($output);
       }
    }
}
    
    
    