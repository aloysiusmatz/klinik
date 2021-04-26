<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\medrec;
use App\allergies;
use App\transactions;
use App\transactions_medicines;
use App\transactions_images;
use DB;

class ReportCheckupController extends Controller
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
    public function index()
    {
        return view('pages.reports.checkup.index');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        if ($query != ''){
            if ($query == 'today'){
                $query = '
                select a.*, b.medrec_name 
                from transactions a, medrecs b
                where date(a.created_at) = current_date
                and a.medrec_id = b.id';
            }elseif($query == 'month'){
                $month = date('m');
                $query = '
                select a.*, b.medrec_name 
                from transactions a, medrecs b
                where month(a.created_at) = "'.$month.'"
                and a.medrec_id = b.id';
            }else{ //select range
                $str = strval($query);
                $range = explode(',', $str);
                $range_from = $range[0];
                $range_to = $range[1];
                if ($range_to != ""){
                    $query = '
                    select a.*, b.medrec_name 
                    from transactions a, medrecs b
                    where date(a.created_at) between "'.$range_from.'" and "'.$range_to.'"
                    and a.medrec_id = b.id
                    ';
                }else{
                    $query = '
                    select a.*, b.medrec_name 
                    from transactions a, medrecs b
                    where date(a.created_at) = "'.$range_from.'"
                    and a.medrec_id = b.id
                    ';
                }
            }
        }
        if ($query != ''){
            $result = DB::select($query);
        }
        $totalrow = count($result);
        if ($totalrow > 0){
            $output = "";
            foreach ($result as $temp_result){
                $date = date_create(strval($temp_result->created_at));
                $date1 = date_format($date, "d-M-Y");
                $output = $output.
                '
                    <tr>
                        <td>'.$date1.'</td>
                        <td>
                            <form action="/klinik/public/reportcheckup/'.$temp_result->id.'" method="POST">
                                <button type="submit" class="btn" style="padding-top:0px;padding-bottom:0px">'.$temp_result->id.'</button>
                                <input type="hidden" name="_method" value="GET">
                            </form>
                        </td>
                        <td>'.$temp_result->medrec_id.'</td>
                        <td>'.$temp_result->medrec_name.'</td>
                        <td>'.$temp_result->diagnosis.'</td>
                    </tr>
                ';
            }
        }else{
            $output ='
                <tr>
                    <td align="center" colspan="5"> No data found</td>
                </tr>
            ';
        }
        
        $data = array(
            'tabledata' => $output,
            'totalrow' => $totalrow,
        );

        echo json_encode($data);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $displaycheckup = transactions::find($id);
        /* diremark karena medicine menggunakan freetext
        $q = '
        select a.* , b.medicinename
        from transactions_medicines a, medicines b 
        where a.transaction_id = "'.$displaycheckup->id.'"
        and a.medicines_id = b.id 
        ';*/
        $q = '
        select a.*
        from transactions_medicines a
        where a.transaction_id = "'.$displaycheckup->id.'"
        ';
        //$transactions_medicines = transactions_medicines::where('transaction_id', $displaycheckup->id)->get();
        $transactions_medicines = DB::select($q);
        $transactions_images = transactions_images::where('transactions_id', $displaycheckup->id)->get();

        $edititem = medrec::find($displaycheckup->medrec_id);
        $allergieslist = allergies::all();

        $q = 'select a.medrec_id, a.allergy_id, b.allergyname
                from allergies_medrecs a, allergies b 
                 where medrec_id = "'.$displaycheckup->medrec_id.'" 
                   and a.allergy_id = b.id
                 order by a.allergy_id';
        $assignedaller = DB::select($q);
        
        //return json_encode($transactions_medicines);

        return view('pages.reports.checkup.show')
            ->with('edititem', $edititem )
            ->with('allergieslist', $allergieslist)
            ->with('assignedaller', $assignedaller)
            ->with('displaycheckup', $displaycheckup)
            ->with('transactions_medicines', $transactions_medicines)
            ->with('transactions_images', $transactions_images);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

