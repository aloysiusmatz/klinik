<?php

namespace App;


class generalfunction 
{
    static public function notificationMsg($request, $type, $message){
        if($request->session()->has('notif_type')){
            if ($request->session()->get('notif_type') == 'none'){
                $request->session()->put('notif_type',$type);
                $request->session()->put('notif_msg',$message);
            }      
        }else{
            $request->session()->put('notif_type',$type);
            $request->session()->put('notif_msg',$message);
        } 
    }


    static public function searchMedicine($request){
        $flag = 0;
        $q = 'select * from medicines where ';

        if($request->session()->get('filter_medname') != ""){
            
            $q = $q . 'medicinename like "' . $request->session()->get('filter_medname') . '" ';
            $flag = 1;
        }
        if($request->session()->get('filter_meddesc') != ""){
            
            if ($flag == 1){
                $q = $q . 'and ';
            }
            $q = $q . 'meddesc like "' . $request->session()->get('filter_meddesc') . '" ';
            $flag = 1;
        }
        
        if($flag == 0){
            $q = 'select * from medicines';
        }
        return $q;
    }

    static public function searchAllergies($request){
        $flag = 0;
        $q = 'select * from allergies where ';

        if($request->session()->get('filter_allername') != ""){
            
            $q = $q . 'allergyname like "' . $request->session()->get('filter_allername') . '" ';
            $flag = 1;
        }
        if($request->session()->get('filter_allerdesc') != ""){
            
            if ($flag == 1){
                $q = $q . 'and ';
            }
            $q = $q . 'allergydesc like "' . $request->session()->get('filter_allerdesc') . '" ';
            $flag = 1;
        }
        
        if($flag == 0){
            $q = 'select * from allergies';
        }
        return $q;        
    }

    static public function searchMedrec($request){
        $flag = 0;
        $q = 'select * from medrecs where ';

        if($request->session()->get('filter_medrecname') != ""){
            
            $q = $q . 'medrec_name like "%' . $request->session()->get('filter_medrecname') . '%" ';
            $flag = 1;
        }
        if($request->session()->get('filter_medrecaddress') != ""){
            
            if ($flag == 1){
                $q = $q . 'and ';
            }
            $q = $q . 'address like "%' . $request->session()->get('filter_medrecaddress') . '%" ';
            $flag = 1;
        }
        if($request->session()->get('filter_medrecbirthdate') != ""){
            
            if ($flag == 1){
                $q = $q . 'and ';
            }
            $q = $q . 'birthdate = "' . $request->session()->get('filter_medrecbirthdate') . '" ';
            $flag = 1;
        }
        if($request->session()->get('filter_medrecphone1') != ""){
            
            if ($flag == 1){
                $q = $q . 'and ';
            }
            $q = $q . 'phone1 like "%' . $request->session()->get('filter_medrecphone1') . '%" ';
            $flag = 1;
        }
        
        if($flag == 0){
            $q = 'select * from medrecs order by id desc limit 5';
        }
        return $q;  
    }

}
