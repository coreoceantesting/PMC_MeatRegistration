<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeatRegistration_Model;
use App\Models\ApproveAdmin_Model;
use App\Models\MeatType_Master;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Meat_ReporController extends Controller
{
      public function Meat_Report_List(request $request)
     {
        $meat_registration_list =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                      
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
                                        
        
      // print_r($status); exit;
        
        
        return view('admin.Report.meat_List_report', compact('meat_registration_list'));
     }
     
    public function Meat_SearchReport_List(request $request)
    {
        
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $status = $request->input('status');
     
        $meat_search_registration_list =  DB::table('meat_registration_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        
                                        ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                        ->whereDate('t1.inserted_dt', '<=', $to_date)    
                                        
                                        // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                        ->where('t1.status', '=', $status )
                                        
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
                                        
                                        
    //           $status = $meat_search_registration_list->status ;                         
                                        
        
    //     // dd ($pet_search_registration_list);
    //   print_r($status); 
        
        return view('admin.Report.meat_List_report',  compact('meat_search_registration_list'));
    }
    
    
    
}