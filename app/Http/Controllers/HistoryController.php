<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HistoryController extends Controller
{
    public function search(Request $request){
        
        $id = $request->get('query');
        $q = '
            select id, diagnosis, created_at
            from transactions
            where medrec_id = "'.$id.'"
            order by created_at desc;
        ';

        $result = DB::select($q);
        $total_data = count($result);
        $output = '';
        foreach ($result as $temp_result){
            $date = date_create(strval($temp_result->created_at));
            $date1 = date_format($date, "d-M-Y, H:i");
            $output = $output.'
                <tr>
                    <td style="width:20%"><a href="/klinik/public/reportcheckup/'.$temp_result->id.'" target="_blank">'.$date1.'</a></td>
                    <td>'.$temp_result->diagnosis.'</td>
                </tr>
            ';
        }
        $data = array(
            'query' => $q,
            'table_data' => $output,
            'total_data' => $total_data
        );
        
        echo json_encode($data);
    }
}
