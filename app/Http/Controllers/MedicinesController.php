<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\medicines;
use App\generalfunction;
use DB;

class MedicinesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $q = generalfunction::searchMedicine($request);
        $listdata = DB::select($q);
        $countdata = count($listdata);
        
        return view('pages.medicines.index')            
        ->with('listdata', $listdata)
        ->with('countdata',$countdata);     
        
    }

    public function search(Request $request){
        $request->session()->put('filter_medname', $request->input('filter_medname') );
        $request->session()->put('filter_meddesc', $request->input('filter_meddesc') );

        $q = generalfunction::searchMedicine($request);

        $listdata = DB::select($q);
        $countdata = count($listdata);
        
        return view('pages.medicines.index')            
            ->with('listdata', $listdata)
            ->with('countdata',$countdata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errormsg = [
            'required' => 'This field is required',
        ];

        $this->validate($request, [
            'medicinename' => 'required',
            'medicinedesc' => 'required',
        ],$errormsg);

        $insert = new medicines();
        $insert->medicinename = $request->input('medicinename');
        $insert->meddesc = $request->input('medicinedesc');
        $insert->save();

        generalfunction::notificationMsg($request, 'success', 'Medicine created successfully');

        return back();
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
        $edititem = medicines::find($id);
        return view('pages.medicines.edit')->with('edititem', $edititem );
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
        $errormsg = [
            'required' => 'This field is required',
        ];

        $this->validate($request, [
            'medicinename' => 'required',
            'meddesc' => 'required',
        ],$errormsg);
        
        $update = medicines::find($id);
        $update->medicinename = $request->input('medicinename');
        $update->meddesc = $request->input('meddesc');
        $update->save();

        generalfunction::notificationMsg($request, 'success', 'Medicine edited successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $deleteitem = medicines::find($id);
        $deleteitem->delete();
        generalfunction::notificationMsg($request, 'warning', 'Medicines deleted successfully');
        return redirect('/medicines');
    }
}
