<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index()
    {
    	return view('patient_cabinet.index');
    }

    public function question()
    {
    	return view('patient_cabinet.question');
    }

    public function review()
    {
    	return view('patient_cabinet.review');
    }

    public function enroll()
    {
    	return view('patient_cabinet.enroll');
    }
}
