<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ad;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $ads = Ad::whereUserId($id);
        return view('ads.userDetails',compact('user','ads'));
    }
}
