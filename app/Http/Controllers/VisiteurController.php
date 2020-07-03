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
    public function create()
    {
        return(view('admins.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $membre = auth()->user();
        $visite = new \App\Visite;
        $visite->ID_PRACTITIEN = $request->input('ID_PRACTITIEN');
        $visite->LIEU = $request->input('LIEU');
        $visite->DATE_V = $request->input('DATE_V');
        $visite->DESCRIPTION = $request->input('DESCRIPTION');
        $visite->H_DEBUT = $request->input('H_DEBUT');
        $visite->H_FIN = $request->input('H_FIN');
        $visite->ID_PERSONNEL = $membre->ID_PERSONNEL;
        
        $visite->save();
        return redirect('visites');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visite = \App\Visite::find($id);
        return view('visites/edit', compact('visite', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $membre = auth()->user();
        
        $admin = \App\Visite::find($id);
        $admin->ID_PRACTITIEN = $request->input('ID_PRACTITIEN');
        $admin->LIEU = $request->input('LIEU');
        $admin->DATE_V = $request->input('DATE_V');
        $admin->DESCRIPTION = $request->input('DESCRIPTION');
        $admin->H_DEBUT = $request->input('H_DEBUT');
        $admin->H_FIN = $request->input('H_FIN');
        $admin->ID_PERSONNEL = $membre->ID_PERSONNEL;
        $admin->save();
        return redirect('admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = \App\Admin::find($id);
        $admin->delete();
        return redirect('admins');
    }
}
