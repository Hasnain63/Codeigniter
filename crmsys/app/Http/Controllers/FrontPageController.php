<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    function index()
    {
    	return view('indexView');
    }

}
