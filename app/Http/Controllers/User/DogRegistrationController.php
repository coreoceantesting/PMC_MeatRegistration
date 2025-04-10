<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DogRegistration_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DogRegistrationController extends Controller
{
    public function check_application_status(Request $request)
    {
        $application_no = $request->application_no;
        // dd($application_no);
        // $empty='';
        $get_pet_application_status = DB::table('dog_registration_tbl AS t1')
                                        ->select('t1.*')
                                        ->whereNull('t1.deleted_at')
                                        ->where('t1.pet_pplication_no','=',$application_no)
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                
        $get_meat_application_status = DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*')
                                        ->whereNull('t1.deleted_at')
                                        ->where('t1.meat_pplication_no','=',$application_no)
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
        
        if(empty($get_pet_application_status) && empty($get_meat_application_status))
        {
            $serch_result = 'none';
            return view('user.home', compact('serch_result'));
        }
        if(!empty($get_pet_application_status))
        {  
            $type= "dog_license";
            if($get_pet_application_status->status == 0)
            {
               $serch_result = "Pending";    
            }
            else if($get_pet_application_status->status == 1)
            {
               $serch_result = "Approve";    
            }
            else if($get_pet_application_status->status == 2)
            {
               $serch_result = "Reject";    
            }
            
            $get_details = $get_pet_application_status;
            
            // dd($get_details);
            
            return view('user.home', compact('serch_result','type','get_details'));
        }
        if(!empty($get_meat_application_status))
        {  
            $type= "meat_license";
            if($get_meat_application_status->status == 0)
            {
               $serch_result = "Pending";    
            }
            else if($get_meat_application_status->status == 1)
            {
               $serch_result = "Approve";    
            }
            else if($get_meat_application_status->status == 2)
            {
               $serch_result = "Reject";    
            }
            
            $get_details = $get_meat_application_status;
            // dd($get_details);
            
            return view('user.home', compact('serch_result','type','get_details'));
        }
        else
        {
            $serch_result = 'No data Found';
            return view('user.home',compact('serch_result'));    
        }
    }
    
    // Taluka List
    public function Taluka_List(Request $request)
    {

        $taluka_list = $request->district_id;

        $data['talukalist']= DB::select("SELECT id, taluka_name FROM `mst_taluka` WHERE dist_id = '$taluka_list' AND deleted_at IS NULL ORDER BY `mst_taluka`.`id` DESC");
       
        return response()->json($data);
    }
    
    // Department List
    public function Department_List(Request $request)
    {

        $dept_list = $request->ward_id;

        $data['departmentlist']= DB::select("SELECT id, dept_name FROM `department_mst` WHERE ward_id = '$dept_list' AND deleted_at IS NULL ORDER BY `department_mst`.`id` DESC");
       
        return response()->json($data);
    }
    
}
