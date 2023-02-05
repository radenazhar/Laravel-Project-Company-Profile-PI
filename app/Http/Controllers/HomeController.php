<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function petcare()
    {
        return view('home.petcare');
    }
    public function petclinic()
    {
        return view('home.petclinic');
    }
    public function blog()
    {
        return view('home.blog');
    }
    public function about()
    {
        return view('home.about');
    }
}
