<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PET_Activation;
use App\Models\PET_Dispute;
use App\Models\PET_Refund;
use App\Models\MeatTransportRenewalLicense_Model;
use App\Models\ApproveAdminRenewalLicense_Model;
use App\Models\ApproveAdmin_RenewalTransport_Model;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Meat_VehicleRenewalReporController extends Controller
{

public function Vehicle_Renewal_Report_List(request $request)
     {
        $renewal_vehical_list =  DB::table('meat_transport_renewal_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_vehical_renewal_tbl AS t5', 't5.transport_register_id', '=', 't1.id')  
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
                                        
        // return $pet_registration_list;
        
        return view('admin.Report.vehical_List_Renewal_report', compact('renewal_vehical_list'));
     }
     
    public function vehical_Renewal_SearchReport_List(request $request)
    {
        
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $status = $request->input('status');
     
        $renewal_search_vehical_list =  DB::table('meat_transport_renewal_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_vehical_renewal_tbl AS t5', 't5.transport_register_id', '=', 't1.id')  
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
        
        // dd ($pet_search_registration_list);
        
        
        return view('admin.Report.vehical_List_Renewal_report',  compact('renewal_search_vehical_list'));
    }


}