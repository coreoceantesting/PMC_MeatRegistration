<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Admin_Home()
    {
        $total_pending_meat_register =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.id')
                                        ->where('t1.status', 0)
                                        ->where('t1.hod_status', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();
                                
        // return $total_pending_meat_register;
        
        $total_approve_meat_register =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.id')
                                        ->where('t1.status', 1)
                                        ->where('t1.hod_status', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();
                                
        // return $total_approve_meat_register;
        
        $total_rejected_meat_register =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.id')
                                        ->where('t1.status', 2)
                                        ->where('t1.hod_status', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();
                                        
        // ------------renewal ---------------------
        
        
   $total_pending_meat_renewal_register =  DB::table('meat_renewal_license_tbl AS t1')
                                        ->select('t1.id')
                                        ->where('t1.status', 0)
                                        ->where('t1.re_hod_status', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();
                                
        // return $total_pending_meat_register;
        
    $total_approve_meat_renewal_register =  DB::table('meat_renewal_license_tbl AS t1')
                                        ->select('t1.id')
                                        ->where('t1.status', 1)
                                        ->where('t1.re_hod_status', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();
                                
        // return $total_approve_meat_register;
        
    $total_rejected_meat_renewal_register =  DB::table('meat_renewal_license_tbl AS t1')
                                        ->select('t1.id')
                                        ->where('t1.status', 2)
                                        ->where('t1.re_hod_status', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();
                                
        // return $total_rejected_meat_register;
        
      // ------------ Vehicle ---------------------
        
        
   $total_pending_vehicle_register =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.id')
                                        ->where('t1.status', 0)
                                        ->where('t1.t_hod_status', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();
                                
        // return $total_pending_meat_register;
        
    $total_approve_vehicle_register =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.id')
                                        ->where('t1.status', 1)
                                        ->where('t1.t_hod_status', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();
                                
        // return $total_approve_meat_register;
        
    $total_rejected_vehicle_register =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.id')
                                        ->where('t1.status', 2)
                                        ->where('t1.t_hod_status', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();
                                
        // return $total_rejected_meat_register;
        
        
         // ------------ Vehicle Renewal---------------------
        
        
   $total_pending_vehicle_renewal_register =  DB::table('meat_transport_renewal_tbl AS t1')
                                        ->select('t1.id')
                                        ->where('t1.status', 0)
                                        ->where('t1.tr_hod_status', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                     
                                        ->count();
                                
     
    $total_approve_vehicle_renewal_register =  DB::table('meat_transport_renewal_tbl AS t1')
                                        ->select('t1.id')
                                        ->where('t1.status', 1)
                                        ->where('t1.tr_hod_status', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();
                                
       
    $total_rejected_vehicle_renewal_register =  DB::table('meat_transport_renewal_tbl AS t1')
                                        ->select('t1.id')
                                        ->where('t1.status', 2)
                                        ->where('t1.tr_hod_status', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();
                                
       
        return view('admin.admin_dashboard', compact('total_pending_meat_register', 'total_approve_meat_register', 'total_rejected_meat_register','total_pending_meat_renewal_register',
        'total_approve_meat_renewal_register','total_rejected_meat_renewal_register','total_pending_vehicle_register','total_approve_vehicle_register','total_rejected_vehicle_register',
        'total_pending_vehicle_renewal_register','total_approve_vehicle_renewal_register','total_rejected_vehicle_renewal_register'));
    }
}
