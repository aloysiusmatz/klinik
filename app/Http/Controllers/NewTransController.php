<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\medrec;
use App\allergies;
use App\transactions;
use App\transactions_medicines;
use App\transactions_images;
use App\generalfunction;
Use DB;    
Use Storage;

class NewTransController extends Controller
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
        /*$edititem = medrec::find($id);
        $allergieslist = allergies::all();

        $q = 'select a.medrec_id, a.allergy_id, b.allergyname
                from allergies_medrecs a, allergies b 
                 where medrec_id = "'.$id.'" 
                   and a.allergy_id = b.id
                 order by a.allergy_id';
        $assignedaller = DB::select($q);
    
        return view('pages.newtrans')
            ->with('edititem', $edititem )
            ->with('allergieslist', $allergieslist)
            ->with('assignedaller', $assignedaller);*/

        return redirect('/medrec');
    }

    public function searchmed(Request $request){
        
        //if($request->ajax()){
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('medicines')
                        ->where('id', 'like', '%'.$query.'%')
                        ->orWhere('medicinename', 'like', '%'.$query.'%')
                        ->orWhere('meddesc', 'like', '%'.$query.'%')
                        ->orderBy('id')
                        ->get();
            }else{
                $data = DB::table('medicines')
                        ->orderBy('id')
                        ->get();
            }
            $total_row = $data->count();

            if ($total_row > 0){
                $output = '';
                foreach($data as $row){
                    $output = $output.
                    '
                        <tr>
                            <td>'.$row->id.'</td>
                            <td>'.$row->medicinename.'</td>
                            <td>'.$row->meddesc.'</td>
                            <td><button class="btn btn-xs btn-primary" onclick="f_addmedsearch('.$row->id.',`'.trim($row->medicinename) .'`)" >Add</button></td>
                        </tr>
                    ';
                }
            }else{
                $output = '
                    <tr>
                        <td align="center" colspan="4"> No data found</td>
                    </tr>
                ';
            }
            $data = array(
                'table_data'    => $output,
                'total_data'    => $total_row
            );
            
            echo json_encode($data);
        //}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $errormsg = [
            'required' => 'This field is required',
        ];

        $this->validate($request, [
            'check_s' => 'required',
            'check_o' => 'required',
            'check_a' => 'required',
            'check_p' => 'required',
            'check_action' => 'required',
            'diagnosis' => 'required',
        ],$errormsg);
        
        
        $insert = new transactions();
        $insert->medrec_id = $request->input('inp_medrecID');
        $insert->check_s = $request->input('check_s');
        $insert->check_o = $request->input('check_o');
        $insert->check_a = $request->input('check_a');
        $insert->check_p = $request->input('check_p');
        $insert->action = $request->input('check_action');
        $insert->diagnosis = $request->input('diagnosis');
        $insert->save();
        
        $str = strval($request->input('inp_medID'));
        $listmedicines = explode(',',$str);
        foreach($listmedicines as $temp_listmedicines){
            $medicinename = $request->input('inpnamemed'.$temp_listmedicines);
            $qtymed = $request->input('inpqtymed'.$temp_listmedicines);
            if ($qtymed == ''){
                $qtymed = 0;
            }
            if (trim($medicinename) <> '' && $qtymed <> 0){
                $insert2 = new transactions_medicines();
                $insert2->transaction_id = $insert->id;
                $insert2->medicines_id = '0';
                $insert2->desc = $request->input('inpnamemed'.$temp_listmedicines);
                $insert2->qty = $request->input('inpqtymed'.$temp_listmedicines);
                $insert2->rule = $request->input('inprulemed'.$temp_listmedicines);
                $insert2->save();
            }
        };
        

        if ($request->hasFile('checkupImage')){
            $images = $request->file('checkupImage');
            
            if (!empty($images)){
                foreach($images as $temp_images){
                    $path = $temp_images->store('CheckupPhoto/'.$insert->id, 'public');
                    $strPath = strval($path);
                    $filePath = explode('/',$strPath);
                    $fileName = $filePath[count($filePath)-1];
                    $insert3 = new transactions_images();
                    $insert3->transactions_id = $insert->id;
                    $insert3->information = $temp_images->getClientOriginalName();
                    $insert3->image_url = $fileName;
                    $insert3->save();

                }
            }
        }

        generalfunction::notificationMsg($request, 'success', 'Medical checkup created successfully');
        
        //return $request->all();
        //return '123';
        return redirect('/medrec');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edititem = medrec::find($id);
        $allergieslist = allergies::all();

        $q = 'select a.medrec_id, a.allergy_id, b.allergyname
                from allergies_medrecs a, allergies b 
                 where medrec_id = "'.$id.'" 
                   and a.allergy_id = b.id
                 order by a.allergy_id';
        $assignedaller = DB::select($q);
    
        return view('pages.newtrans')
            ->with('edititem', $edititem )
            ->with('allergieslist', $allergieslist)
            ->with('assignedaller', $assignedaller);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
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
