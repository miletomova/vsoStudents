<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    //
    public function index()
    {
    	$profile = Profile::where('user_id', '=', 1)->first();
    	
    	$test = 1;
    	
    	return view('profile', compact(array('profile', 'test')));
    }
}
