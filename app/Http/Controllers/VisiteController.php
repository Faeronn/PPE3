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
        $visites = $membre->visites;
        return view('visites.listeVisites')->with('visites', $visites); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return(view('visites.create'));
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
        
        $visite = \App\Visite::find($id);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visite = \App\Visite::find($id);
        $visite->delete();
        return redirect('visites');
    }
}
