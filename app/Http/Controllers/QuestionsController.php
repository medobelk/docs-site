<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    // public function index()
    // {
    // 	return view('add-review');
    // }

    public function index(Request $request)
    {
    	return view('add-question');
    }
}
