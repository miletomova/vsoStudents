<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeworksController extends Controller
{
     public function index()
    {
    	return view('homeworks');
    }
}
