<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\medrec;
use App\printlog;
use DB;

class PrintController extends Controller
{
    /*public function sickletter($id){
        $medrecdetail = medrec::find($id);
        return view('pages.print.sickletter')
            ->with('medrecdetail', $medrecdetail);
    }*/

    public function openhealthletter($id){
        $medrecdetail = medrec::find($id);
        return view('pages.print.healthletter')
            ->with('medrecdetail', $medrecdetail);
    }


    public function opensickletter($id){
        $medrecdetail = medrec::find($id);
        return view('pages.print.sickletter')
            ->with('medrecdetail', $medrecdetail);
    }

    public function printsickletter(Request $request){
        $failed = 'false';
        $message = '';
        $q = '';
        $query = $request->get('query');
        $tmp_query = explode(',', $query);
        $transaction_id = $tmp_query[0];
        $range_from = $tmp_query[1];
        $range_to = $tmp_query[2];
        $date_to = '';
        $range_to1 = '';
        
        //checking
        if ($transaction_id == ''){
            $failed = 'true';
            $message = 'Checkup ID is required';
        }
        if ($range_from == ''){
            $failed = 'true';
            $message = 'Date from is required';
        }
		if ($range_to != ''){
			if($range_to == $range_from){
				$range_to = '';
			}
		}
        $s = 'select * from printlog where print_type="sckltr" and foreign_id = "'.$transaction_id.'"
        ';
        $result = DB::select($s);
        foreach ($result as $temp_result){
            $date_from = date_format(date_create(strval($temp_result->date_from)), "d-M-Y");
            if ($temp_result->date_to != ''){
                $date_to = date_format(date_create(strval($temp_result->date_to)), "d-M-Y");
            }
            $range_from1 = date_format(date_create(strval($range_from)), "d-M-Y");
            if ($range_to != ''){
                $range_to1 = date_format(date_create(strval($range_to)), "d-M-Y");
            }

            if ($range_to1 == ''){ //jika to date input nya kosong      
                
                if ($range_from1 == $date_from){
                    $failed = 'true';
                    $message = 'Sick Letter for this particullar date already been printed';
                }
                if ($date_to != ''){
                    if ($range_from1 == $date_to){
                        $failed = 'true';
                        $message = 'Sick Letter for this particullar date already been printed';
                    }  
                    if ($range_from1 >= $date_from && $range_from1 <= $date_to){
                        $failed = 'true';
                        $message = 'Sick Letter for this particullar date already been printed';
                    }                  
                }
                
            }else{
                if ($range_from1 > $range_to1){
                    $failed = 'true';
                    $message = 'Entered date range is not valid';
                }else {
                    if ($date_from >= $range_from1 && $date_from <= $range_to1){
                        $failed = 'true';
                        $message = 'Sick Letter for this particullar date overlapping';
                    }
                    if ($date_to != ''){
                        if ($date_to >= $range_from1 && $date_to <= $range_to1){
                            $failed = 'true';
                            $message = 'Sick Letter for this particullar date overlapping';
                        }
                    }
                }
            }
        }

        //jika proses checking tidak ada masalah maka lanjutkan proses
        if ($failed == 'false'){
            
            if ($range_to == ''){
                $q = 'insert into printlog(print_type, foreign_id, date_from) 
                values("sckltr", "'.$transaction_id.'", "'.$range_from.'")';
            }else{
                $q = 'insert into printlog(print_type, foreign_id, date_from, date_to) 
                values("sckltr", "'.$transaction_id.'", "'.$range_from.'", "'.$range_to.'")';
            }
            
            DB::insert($q);

        }

        $data = array(
            'failed' => $failed,
            'message' => $message,
            'query' => $q
        );

        echo json_encode($data);
    }
}
