<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\medrec;
use App\allergies;
use App\generalfunction;
use App\allergies_medrec;
use DB;

class MedrecController extends Controller
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
        $q = generalfunction::searchMedrec($request);
        $listdata = DB::select($q);
        //$listdata = medrec::all();
        $countdata = count($listdata);
        
        return view('pages.medrec.index')            
        ->with('listdata', $listdata)
        ->with('countdata', $countdata);     
        
    }

    public function search(Request $request){
        
        $request->session()->put('filter_medrecname', $request->input('filter_medrecname') );
        $request->session()->put('filter_medrecaddress', $request->input('filter_medrecaddress') );
        $request->session()->put('filter_medrecbirthdate', $request->input('filter_medrecbirthdate') );
        $request->session()->put('filter_medrecphone1', $request->input('filter_medrecphone1') );

        $q = generalfunction::searchMedrec($request);
        $listdata = DB::select($q);
        $countdata = count($listdata);
        
        return view('pages.medrec.index')            
        ->with('listdata', $listdata)
        ->with('countdata', $countdata);     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $allergieslist = allergies::all();

        return view('pages.medrec.create')->with('allergieslist', $allergieslist);
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
            'medrecname' => 'required',
            'medrecbirthdate' => 'required',
            
        ],$errormsg);

        $insert = new medrec();
        $insert->medrec_name = ucwords($request->input('medrecname'));
        $insert->birthdate = $request->input('medrecbirthdate');
        $insert->sex = $request->input('medrecsex');
        $insert->blood = $request->input('medrecblood');
        $insert->religion = ucwords($request->input('medrecreligion'));
        $insert->address = ucwords($request->input('medrecaddress'));
        $insert->city = ucwords($request->input('medreccity'));
        $insert->region = ucwords($request->input('medrecregion'));
        $insert->postalcode = $request->input('medrecpostal');
        $insert->parent = ucwords($request->input('medrecparent'));
        $insert->phone1 = $request->input('medrecphone1');
        $insert->phone2 = $request->input('medrecphone2');
        $insert->email = $request->input('medrecemail');
        $insert->special_note = $request->input('specialnote');
        $insert->allergies = $request->input('medrecaller');
        $insert->save();

        /*$str = strval($request->input('medrecaller'));
        $listallergies = explode(',',$str);
        foreach($listallergies as $temp_listallergies){
            $insert2 = new allergies_medrec();
            $insert2->allergy_id = $temp_listallergies;
            $insert2->medrec_id = $insert->id;
            $insert2->save();
        }*/
        
        generalfunction::notificationMsg($request, 'success', 'Medical record created successfully');

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
        $edititem = medrec::find($id);
        /*$allergieslist = allergies::all();

        $q = 'select a.medrec_id, a.allergy_id, b.allergyname
                from allergies_medrecs a, allergies b 
                 where medrec_id = "'.$id.'" 
                   and a.allergy_id = b.id
                 order by a.allergy_id';
        $assignedaller = DB::select($q);
    
        return view('pages.medrec.edit')
            ->with('edititem', $edititem )
            ->with('allergieslist', $allergieslist)
            ->with('assignedaller', $assignedaller);
        */

        return view('pages.medrec.edit')
            ->with('edititem', $edititem );
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
            'medrecname' => 'required',
            'medrecbirthdate' => 'required',
        ],$errormsg);

        $update = medrec::find($id);
        $update->medrec_name = ucwords($request->input('medrecname'));
        $update->birthdate = $request->input('medrecbirthdate');
        $update->sex = $request->input('medrecsex');
        $update->blood = $request->input('medrecblood');
        $update->religion = ucwords($request->input('medrecreligion'));
        $update->address = ucwords($request->input('medrecaddress'));
        $update->city = ucwords($request->input('medreccity'));
        $update->region = ucwords($request->input('medrecregion'));
        $update->postalcode = $request->input('medrecpostal');
        $update->parent = ucwords($request->input('medrecparent'));
        $update->phone1 = $request->input('medrecphone1');
        $update->phone2 = $request->input('medrecphone2');
        $update->email = $request->input('medrecemail');
        $update->special_note = $request->input('specialnote');
        $update->allergies = $request->input('medrecaller');
        $update->save();

        /*DB::table('allergies_medrecs')->where('medrec_id', '=', $id)->delete();

        $str = strval($request->input('medrecaller'));
        $listallergies = explode(',',$str);
        foreach($listallergies as $temp_listallergies){
            $insert2 = new allergies_medrec();
            $insert2->allergy_id = $temp_listallergies;
            $insert2->medrec_id = $update->id;
            $insert2->save();
        }
        */
        generalfunction::notificationMsg($request, 'success', 'Medical record edited successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
