<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeatTransport_Model;
use App\Models\ApproveAdmin_Model;
use App\Models\Approve_Transport_Admin_Model;
use App\Models\MeatType_Master;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HodMeatTransportListController extends Controller
{
    //
    	public function MeatTransportList(request $request, $status)
    {
        // Display All Meat Registration Form ( Status - 0 )
        $meat_registration_list =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')

                                        // ->where('t1.status', '=', $status)
                                        // ->where('t1.id', '=', $id)
                                        ->where('t1.t_hod_status', '=', $status)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
        // return $meat_registration_list;

        return view('hod.meat_transport.grid', compact('meat_registration_list', 'status'));
    }

      public function MeatTransportView(request $request, $id, $status)
    {
        $meat_transport_view =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->where('t1.t_hod_status', '=', $status)
                                        // ->where('t1.status', '=', $status)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
        // return $meat_registration_view;
        
        return view('hod.meat_transport.view', compact('meat_transport_view'));
    }

    public function RejectMeatTransport(request $request, $id){
        $data = MeatTransport_Model::where('id', $id)->first();
        $update = [
            't_hod_status' => 2,
            'reject_resion' => $request->get('reject_resion'),
            'reject_date' => date("Y-m-d H:i:s"),
            'reject_by' => Auth::user()->id,
        ];
        
        MeatTransport_Model::where('id', $id)->update($update);
        
        $mob_number = $data->mobile_number;
        $unique_id = $data->transport_license_no;
        $reason = $request->get('reject_resion');
    	$sms = "Your application no:- " . $unique_id . " for Meat Transport Business License is rejected, Reason for rejection: " . $reason . " CORE OCEAN.";
    	$this->sendsmsnew($sms,$mob_number);
        
        
        // $app_no = $request->get('meat_pplication_no');
        // $resion = $request->get('reject_resion');
        // $mobile = $request->get('mobile_number');
        //$domain = "https://".$_SERVER['HTTP_HOST'];

        //print_r($data->mobile_number);exit; 
        //$project_folder = 'PMC_MeatRegistration';
        
        // $msg = "Your application no:- $app_no is Rejected Resion For  $resion .";

        // $tempID= '1207167447455213113';
        // $this->sendsms($msg,$mobile,$tempID);
        
        
        
        return redirect('/meat_transport_list_hod/2')->with('message', 'Meat Transport Form Rejected Successfully'); //Redirect user somewhere
    }

    public function ApproveMeatTransport(request $request, $id)
    {
        
          //print_r($request->get('mobile_number'));exit;
        // $data = new Approve_Transport_Admin_Model();

        // $data->transport_register_id = $request->id;
        // $data->total_recived_tax = $request->get('total_recived_tax');
        // $data->mobile_number = $request->get('mobile_number');
        // $data->receipt_no = $request->get('receipt_no');
        // $data->date_of_receipt = (!empty($request->date_of_receipt) ? date("d-m-Y", strtotime($request->date_of_receipt)) : NULL);
        // $data->license_number = $request->get('license_number');
        // $data->date_of_license_obtain = (!empty($request->date_of_license_obtain) ? date("d-m-Y", strtotime($request->date_of_license_obtain)) : NULL);
        // $data->date = (!empty($request->date) ? date("d-m-Y", strtotime($request->date)) : NULL);
        // $data->inserted_dt = date("Y-m-d H:i:s");
        // $data->inserted_by = Auth::user()->id;
        // // $data->status = 1; //Rejected
        // $data->save();
        
        $update = [
            't_hod_status' => 1,
            'approve_date' => date("Y-m-d"),
            'approve_by' => Auth::user()->id,
        ];
        
        MeatTransport_Model::where('id', $id)->update($update);

        // $app_no = $request->get('license_number');
        // $scheme = 'Meat Registration Form';
        //$domain = "https://".$_SERVER['HTTP_HOST'];

        //print_r($data->mobile_number);exit; 
        //$project_folder = 'PMC_MeatRegistration';
        
        // $msg = "Your application no:- $app_no for $scheme is Approved Successfully.";

        // $tempID= '1207167447455213113';
        // $this->sendsms($msg,$data->mobile_number,$tempID);
        
        

        return redirect('/meat_transport_list_hod/1')->with('message', 'Meat Transport Form Approved Successfully'); //Redirect user somewhere
    }
    
     public function FinalApprovedList(request $request, $status)
     {
         
          $meat_registration_list =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->where('t1.t_final_approve', '=', $status)
                                        ->where('t1.t_hod_status', '=', 1)         
                                        ->where('t1.status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
        // return $meat_registration_list;

        return view('hod.final_approve_meat_transport_list.grid', compact('meat_registration_list', 'status'));
         
     }
     
     
     
      public function FinalApproveView(request $request, $id, $status)
     {
         
        
                                        
            $meat_transport_view =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name', 't5.transport_register_id', 't5.total_recived_tax', 't5.receipt_no',
                                                  't5.date_of_receipt', 't5.license_number', 't5.date_of_license_obtain',
                                                  't5.date as approve_date', 't5.t_hod_sign')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')
                                         ->where('t1.t_final_approve', '=', $status)
                                         ->where('t1.status', '=', 1)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();                             
        // return $meat_registration_view;
        
        return view('hod.final_approve_meat_transport_list.view', compact('meat_transport_view'));
         
     }
     
     
      public function meatTransportInvoice(request $request, $id, $status)
    {
         $invoice =  DB::table('meat_transport_register_tbl AS t1')
                        ->select('t1.*')
                          ->where('t1.t_final_approve', '=', $status)
                        ->where('t1.id', '=', $id)
                        ->where('t1.status', '=', 1)
                        ->orderBy('t1.id', 'DESC')
                        ->first();
        return view('hod.final_approve_meat_transport_list.invoice',compact('invoice'));
    }


     public function ApprovebyHodTransport(request $request, $id)
         {
             
           
            
              $existingRecord = Approve_Transport_Admin_Model::where('transport_register_id', $request->id)->first();

        // Create a new instance of the model
        $data = new Approve_Transport_Admin_Model();
        $datanew = MeatTransport_Model::where('id','=',$id)->firstOrFail();
    
        // Check if an existing record was found
        if ($existingRecord) {
            // Update the existing record
            $data = $existingRecord;
        }
            
            if(!empty($request->hasFile('t_hod_sign'))){
                $image = $request->file('t_hod_sign');
                $image_name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $new_name = time().rand(10,999).'.'.$extension;
                $image->move(public_path('/PMC_Meat_Registration/t_hod_sign/'),$new_name);
    
                $image_path = "/PMC_Meat_Registration/t_hod_sign/" . $image_name;
                $data->t_hod_sign = $new_name;
            }
            
            $data->transport_register_id = $request->id;
            $data->total_recived_tax = $request->get('total_recived_tax');
            $data->mobile_number = $request->get('mobile_number');
            $data->receipt_no = $request->get('receipt_no');
            $data->date_of_receipt = (!empty($request->date_of_receipt) ? date("d-m-Y", strtotime($request->date_of_receipt)) : NULL);
            $data->license_number = $request->get('license_number');
            $data->date_of_license_obtain = (!empty($request->date_of_license_obtain) ? date("d-m-Y", strtotime($request->date_of_license_obtain)) : NULL);
            $data->date = (!empty($request->date) ? date("d-m-Y", strtotime($request->date)) : NULL);
            $data->inserted_dt = date("Y-m-d H:i:s");
            $data->inserted_by = Auth::user()->id;
            // $data->status = 1; //Rejected
            $data->save();
             
             $update = [
             't_final_approve' => 1,
             't_final_approve_date' => date("Y-m-d"),
             't_final_approve_by' => Auth::user()->id,
         ];
         
          MeatTransport_Model::where('id', $id)->update($update);
        $mob_number = $datanew->mobile_number;
        $unique_id = $datanew->transport_license_no;
        $scheme = 'Meat Transport Business License';
        $sms = "Your application no:- " . $unique_id . " for " . $scheme . " has been approved by the PMC office successfully CORE OCEAN.";
        $this->sendsmsnew($sms,$mob_number);        
         
          return redirect('/final_meat_transport_list/1')->with('message', 'Meat Transport Form Final Approved By Hod Successfully'); //Redirect user somewhere
          
         }

   public function RejectByHodRegistration(request $request, $id)
    {
        $data = MeatTransport_Model::where('id', $id)->first();
        $update = [
             't_final_approve' => 2,
             't_final_reason_for_rejection'   =>$request->get('reject_resion'),
             't_final_reject_dt' => date("Y-m-d"),
             't_final_reject_by' => Auth::user()->id,
 
         ];
         
         MeatTransport_Model::where('id', $id)->update($update);
         
         $mob_number = $data->mobile_number;
        $unique_id = $data->transport_license_no;
        $reason = $request->get('reject_resion');
    	$sms = "Your application no:- " . $unique_id . " for Meat Transport Business License is rejected, Reason for rejection: " . $reason . " CORE OCEAN.";
    	$this->sendsmsnew($sms,$mob_number);
         
          return redirect('/final_meat_transport_list/2')->with('message', 'Meat Transport Form Final Rejected By Hod Successfully'); //Redirect user somewhere
    }

     public function EnglishGenerateMeatTransport(request $request, $id, $status)
    {
        
           $meat_transport_pdf =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.transport_register_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date', 't5.t_hod_sign')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')
                                         ->where('t1.t_final_approve', '=', $status)
                                         ->where('t1.status', '=', 1)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
        // return $pet_registration_pdf;
        
          $current_date = $meat_transport_pdf->inserted_dt;
        // dd($current_date);
        
        $current_m = date('m', strtotime($current_date));
        $currentMonth = Carbon::today($current_m)->format('m');
        // dd($currentMonth);
        $fiscalYear = '';
        
        $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();
        
        // dd($fiscalYear);
                                        
        return view('hod.final_approve_meat_transport_list.generate_english_meat_transport_pdf', compact('meat_transport_pdf','fiscalYear'));
    }

    public function MarathiGeneratemeatTransport(request $request, $id, $status)
    {
        // $meat_registration_pdf =  DB::table('dog_registration_tbl AS t1')
           $meat_transport_pdf =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.transport_register_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date', 't5.t_hod_sign')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')
                                         ->where('t1.t_final_approve', '=', $status)
                                         ->where('t1.status', '=', 1)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                            ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
        // return $pet_registration_pdf;
        
          $current_date = $meat_transport_pdf->inserted_dt;
        // dd($current_date);
        
        $current_m = date('m', strtotime($current_date));
        $currentMonth = Carbon::today($current_m)->format('m');
        // dd($currentMonth);
        $fiscalYear = '';
        
        $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();
        
        // dd($fiscalYear);
                                        
        return view('hod.final_approve_meat_transport_list.generate_marathi_meat_transport_pdf', compact('meat_transport_pdf','fiscalYear'));
    }
    
     public function adminMeatTransportRejectedList(request $request, $status)
     {
          $meat_registration_list =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->where('t1.status', '=', $status) 
                                        ->where('t1.t_hod_status', '=', 1)  
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
        // return $meat_registration_list;

        return view('hod.final_approve_meat_transport_list.rejected_list', compact('meat_registration_list', 'status'));
     }
    
    
     public function Vehicle_Report_List(request $request)
     {
        $meat_vehical_list =  DB::table('meat_transport_register_tbl AS t1')
                                      ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')  
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
                                        
        // return $pet_registration_list;
        
        return view('hod.Report.vehical_List_report', compact('meat_vehical_list'));
     }
     
    public function vehical_SearchReport_List(request $request)
    {
         $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $status = $request->input('status');
        $adminstatus = $request->input('adminstatus');
        $finalstatus = $request->input('finalstatus');
        $meat_type = $request->input('meat_type');
        $business_type = $request->input('business_type');
     
      if($request->from_date && $request->to_date){
        $meat_search_vehical_list =  DB::table('meat_transport_register_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')  
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
      }
      
       if($request->meat_type){
           
           $meat_search_vehical_list =  DB::table('meat_transport_register_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')  
                                        ->where('t1.meat_type', '=', $meat_type)
                                        
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                      ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
       }
       
        if($request->business_type){
            
            $meat_search_vehical_list =  DB::table('meat_transport_register_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')  
                                        ->where('t1.business_type', '=', $business_type)
                                        
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                      ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
        }
        
        if($request->status){
            
             $meat_search_vehical_list =  DB::table('meat_transport_register_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')  
                                        ->Where('t1.t_hod_status', '=', $status )
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
        }
        
        if($request->adminstatus){
            
            $meat_search_vehical_list =  DB::table('meat_transport_register_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')  
                                        ->Where('t1.status', '=', $adminstatus )
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
        }
        
         if($request->finalstatus){
             
             $meat_search_vehical_list =  DB::table('meat_transport_register_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')  
                                         ->Where('t1.t_final_approve', '=', $finalstatus )
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
         }
         
          if($request->from_date && $request->to_date && $request->status && $request->adminstatus && $request->finalstatus){
              
              $meat_search_vehical_list =  DB::table('meat_transport_register_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')  
                                          ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                        ->whereDate('t1.inserted_dt', '<=', $to_date)  
                                       
                                        ->Where('t1.t_hod_status', '=', $status )
                                        ->Where('t1.status', '=', $adminstatus )
                                        ->Where('t1.t_final_approve', '=', $finalstatus )
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
          }
        
        return view('hod.Report.vehical_List_report',  compact('meat_search_vehical_list'));
    }
    
    public function meatTransportReportView(request $request, $id){
        
        $meat_transport_view =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
        // return $meat_registration_view;
        
        return view('hod.Report.vehical_List_report_view', compact('meat_transport_view'));
    }
    
       public function sendsms($sms,$mobile_number,$tempID) 
    { 
        
        $user = "mohit";
        $password = "123456";
        $sender_id = 'CoreOc';
        
        $sender = $mobile_number;
        $priority = "ndnd";
    

        $key= 'Ef96BBH3ZZPSXoz6';
        $route= 2;
        
        
        $sms_type = "normal";
        $message = $sms;
    
        
        $data = array('apikey'=>$key,'unicode'=>$route,'senderid'=>$sender_id,'number'=>$sender,'message'=>$message,'templateid'=>$tempID);
  
        $ch = curl_init('http://sms.seqtech.in/api/smsapi?');
        $ch = curl_init('http://sms.adityahost.com/vb/apikey.php?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        try
        {     
            $response = curl_exec($ch);
            curl_close($ch);
            return $response;
        }
        catch(Exception $e)
        {
            return 0;
            echo 'Message: ' .$e->getMessage();
        
        }   
        
}

public function sendsmsnew($sms,$mob_number) 
    { 

        $key = "kbf8IN83hIxNTVgs";  
        $mbl=$mob_number;   /*or $mbl="XXXXXXXXXX,XXXXXXXXXX";*/
        $message=$sms;
        $message_content=urlencode($message);
        
        $senderid="CoreOC"; $route= 1;
        $url = "http://sms.adityahost.com/vb/apikey.php?apikey=$key&senderid=$senderid&number=$mbl&message=$message_content";
                            
        $output = file_get_contents($url);  /*default function for push any url*/
        
    }

}
