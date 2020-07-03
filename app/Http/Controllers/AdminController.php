<?php

namespace App\Http\Controllers;
use \App\Visite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $membre = auth()->user();
        $admins = $membre->admins;
        return view('admins.listeAdmins')->with('admins', $admins); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    