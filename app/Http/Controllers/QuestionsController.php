<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function add()
    {
    	return view('add-question');
    }
}
