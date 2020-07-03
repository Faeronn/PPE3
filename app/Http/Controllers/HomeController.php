<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(auth()->user()->FONCTION == "VISITEUR") {
            return view('visiteur');
        }elseif(auth()->user()->FONCTION == "ADMIN"){
            return view('admin');
        }elseif(auth()->user()->FONCTION == "RESPONSABLEREGION"){
            return view('responsableregion');
        }else{
            return view('home');
        }
    }
}
