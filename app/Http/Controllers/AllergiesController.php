<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\generalfunction;
use App\allergies;
use DB;

class AllergiesController extends Controller
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
        $q = generalfunction::searchAllergies($request);

        $listdata = DB::select($q);
        $countdata = count($listdata);
        
        return view('pages.allergies.index')            
            ->with('listdata', $listdata)
            ->with('countdata',$countdata);
        
    }

    public function search(Request $request){
        $request->session()->put('filter_allername', $request->input('filter_allername') );
        $request->session()->put('filter_allerdesc', $request->input('filter_allerdesc') );

        $q = generalfunction::searchAllergies($request);

        $listdata = DB::select($q);
        $countdata = count($listdata);
        
        return view('pages.allergies.index')            
            ->with('listdata', $listdata)
            ->with('countdata',$countdata);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.allergies.create');
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
            'allername' => 'required',
            'allerdesc' => 'required',
        ],$errormsg);

        $insert = new allergies();
        $insert->allergyname = $request->input('allername');
        $insert->allergydesc = $request->input('allerdesc');
        $insert->save();

        generalfunction::notificationMsg($request, 'success', 'Allergy created successfully');

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
    public function edit(Request $request, $id)
    {
        $edititem = allergies::find($id);
        return view('pages.allergies.edit')->with('edititem', $edititem );        
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
            'allername' => 'required',
            'allerdesc' => 'required',
        ],$errormsg);

        $insert = allergies::find($id);
        $insert->allergyname = $request->input('allername');
        $insert->allergydesc = $request->input('allerdesc');
        $insert->save();

        generalfunction::notificationMsg($request, 'success', 'Allergy edited successfully');

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
        $q = 'select allergy_id from allergies_medrec where allergy_id = "'.$id.'" limit 1'; //cek apakah alergi yang mau didelete sudah diassign ke medrec
        if (count($q)>0){
            generalfunction::notificationMsg($request, 'error', 'Allergy can`t be deleted because there are medical records still using it');   
            return back();     
        }
        $deleteitem = allergies::find($id);
        $deleteitem->delete();
        generalfunction::notificationMsg($request, 'warning', 'Allergy deleted successfully');
        return redirect('/allergies');
    }
}
