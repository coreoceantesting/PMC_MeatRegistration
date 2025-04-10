<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeatRegistration_Model;
use App\Models\ApproveAdmin_Model;
use App\Models\MeatType_Master;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class HodMeatRegistrationListController extends Controller
{
   
    public function MeatRegistrationList(request $request, $status)
    {
        // Display All Meat Registration Form ( Status - 0 )
        $meat_registration_list =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->where('t1.hod_status', '=', $status)
                                        // ->where('t1.status', '=', $status)
                                        // ->where('t1.id', '=', $id)
                                        
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
        // return $meat_registration_list;

        return view('hod.meat_registration.grid', compact('meat_registration_list', 'status'));
    }
    
    // View Meat Registration
    public function MeatRegistrationView(request $request, $id, $status)
    {
        $unit_Meat_Type = DB::table('unit_Meat_Type')->get();
        $meat_registration_view =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->where('t1.hod_status', '=', $status)
                                        // ->where('t1.status', '=', $status)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
        // return $meat_registration_view;
        
        return view('hod.meat_registration.view', compact('meat_registration_view','unit_Meat_Type'));
    }

   


    // Approved Meat Registration Form ( Status - 1 )
     public function ApproveMeatRegistration(request $request, $id)
    {

        //print_r($request->get('mobile_number'));exit;
        // $data = new ApproveAdmin_Model();

        // $data->meat_pplication_id = $request->id;
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
            'hod_status' => 1,
            'approve_date' => date("Y-m-d"),
            'approve_by' => Auth::user()->id,
        ];
        
        MeatRegistration_Model::where('id', $id)->update($update);

    //     $app_no = $request->get('license_number');
    //     $scheme = 'Meat Registration Form';
    //     // $domain = "https://".$_SERVER['HTTP_HOST'];

    //   // print_r($data->mobile_number);exit; 
        
    //     $project_folder = 'PMC_MeatRegistration';
        
    //     $msg = "Your application no:- $app_no for $scheme is Approved Successfully.";

    //     $tempID= '1207167447455213113';
    //     $this->sendsms($msg,$data->mobile_number,$tempID);

        return redirect('/meat_registration_list_hod/1')->with('message', 'Meat Registration Form Approved Successfully'); //Redirect user somewhere

        
    }



    // Rejected Meat Registration Form ( Status - 2 )
    public function RejectMeatRegistration(request $request, $id){
        $data = MeatRegistration_Model::where('id', $id)->first();
        $update = [
            'hod_status' => 2,
            'reject_resion' => $request->get('reject_resion'),
            'reject_date' => date("Y-m-d H:i:s"),
            'reject_by' => Auth::user()->id,
        ];
        
        MeatRegistration_Model::where('id', $id)->update($update);
        
        $mob_number = $data->mobile_number;
        $unique_id = $data->meat_pplication_no;
        $reason = $request->get('reject_resion');
    	$sms = "Your application no:- " . $unique_id . " for meat license is rejected, Reason for rejection: " . $reason . " CORE OCEAN.";
    	$this->sendsmsnew($sms,$mob_number);
        
        
        // $app_no = $request->get('meat_pplication_no');
        // $resion = $request->get('reject_resion');
        //  $mobile = $request->get('mobile_number');
        // //$domain = "https://".$_SERVER['HTTP_HOST'];

        // //print_r($data->mobile_number);exit; 
        // //$project_folder = 'PMC_MeatRegistration';
        
        // $msg = "Your application no:- $app_no is Rejected Resion For  $resion .";

        // $tempID= '1207167447455213113';
        // $this->sendsms($msg,$mobile,$tempID);


        return redirect('/meat_registration_list_hod/2')->with('message', 'Meat Registration Form Rejected Successfully'); //Redirect user somewhere
    }
    
    
    public function FinalApprovedList(request $request, $status)
     {
    
     $meat_registration_list =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->where('t1.final_approve', '=', $status)
                                        ->where('t1.hod_status', '=', 1)         
                                        ->where('t1.status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
        // return $meat_registration_list;

        return view('hod.admin_approve_list.grid', compact('meat_registration_list', 'status'));
    
    
     }
    
    public function FinalApproveView(request $request, $id, $status)
     {

       
         $unit_Meat_Type = DB::table('unit_Meat_Type')->get();
         $meat_registration_view =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name', 't5.meat_pplication_id', 't5.total_recived_tax', 't5.receipt_no',
                                                  't5.date_of_receipt', 't5.license_number', 't5.date_of_license_obtain',
                                                  't5.date as approve_date', 't5.hod_sign')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        // ->where('t1.status', '=', $status)
                                        ->where('t1.final_approve', '=', $status)
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
        
        return view('hod.admin_approve_list.view', compact('meat_registration_view','unit_Meat_Type'));
     }
     
      public function meatRegistrationInvoice(request $request, $id, $status)
    {
         $invoice =  DB::table('meat_registration_tbl AS t1')
                        ->select('t1.*')
                         ->where('t1.final_approve', '=', $status)
                        ->where('t1.id', '=', $id)
                        ->where('t1.status', '=', 1)
                        ->orderBy('t1.id', 'DESC')
                        ->first();
        return view('hod.admin_approve_list.invoice',compact('invoice'));
    }
    
     public function ApprovebyHodRegistration(request $request, $id)
     {
           $existingRecord = ApproveAdmin_Model::where('meat_pplication_id', $request->id)->first();

        // Create a new instance of the model
        $datanew = MeatRegistration_Model::where('id','=',$id)->firstOrFail();
        $data = new ApproveAdmin_Model();
    
        // Check if an existing record was found
        if ($existingRecord) {
            // Update the existing record
            $data = $existingRecord;
        }
    
        // Handle file upload if a file is provided.
        if ($request->hasFile('hod_sign')) {
            $image = $request->file('hod_sign');
            $image_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/PMC_Meat_Registration/hod_sign/'), $image_name);
    
            $data->hod_sign = $image_name;
        }
    
        // Set other fields from the request data.
        $data->meat_pplication_id = $request->id;
        $data->total_recived_tax = $request->input('total_recived_tax');
        $data->mobile_number = $request->input('mobile_number');
        $data->receipt_no = $request->input('receipt_no');
        $data->date_of_receipt = $request->input('date_of_receipt') ? date("Y-m-d", strtotime($request->input('date_of_receipt'))) : null;
        $data->license_number = $request->input('license_number');
        $data->date_of_license_obtain = $request->input('date_of_license_obtain') ? date("Y-m-d", strtotime($request->input('date_of_license_obtain'))) : null;
        $data->date = $request->input('date') ? date("Y-m-d", strtotime($request->input('date'))) : null;
        $data->inserted_dt = now();
        $data->inserted_by = Auth::user()->id;
        // $data->status = 1; //Rejected
    
        $data->save();
    
    
             
             $update = [
                 'final_approve' => 1,
                 'final_approve_date' => date("Y-m-d"),
                 'final_approve_by' => Auth::user()->id,
             ];
             
             MeatRegistration_Model::where('id', $id)->update($update);
             $mob_number = $datanew->mobile_number;
            $unique_id = $datanew->meat_pplication_no;
            $scheme = 'meat licence';
            $sms = "Your application no:- " . $unique_id . " for " . $scheme . " has been approved by the PMC office successfully CORE OCEAN.";
            $this->sendsmsnew($sms,$mob_number);
                 
             return redirect('/final_approve_meat_registration_list/1')->with('message', 'Meat Registration Form Final Approved By Hod Successfully'); //Redirect user somewhere
         }
        
    
    public function RejectByHodRegistration(request $request, $id)
    {
        $data = MeatRegistration_Model::where('id', $id)->first();
        
         $update = [
             'final_approve' => 2,
             'final_reason_for_rejection'   =>$request->get('reject_resion'),
             'final_reject_dt' => date("Y-m-d"),
             'final_reject_by' => Auth::user()->id,
 
         ];
         
          MeatRegistration_Model::where('id', $id)->update($update);
          
         $mob_number = $data->mobile_number;
        $unique_id = $data->meat_pplication_no;
        $reason = $request->get('reject_resion');
    	$sms = "Your application no:- " . $unique_id . " for meat license is rejected, Reason for rejection: " . $reason . " CORE OCEAN.";
    	$this->sendsmsnew($sms,$mob_number);
    	
         return redirect('/final_approve_meat_registration_list/2')->with('message', 'Meat Registration Form Final Rejected By Hod Successfully'); //Redirect user somewhere
    }
    
    // View Meat Registration
    public function GenerateMeatRegistration(request $request, $id, $status)
    {
        
                                        
        return view('admin.meat_registration.generate_meat_registration_pdf');
    }
    
    public function EnglishGenerateMeatRegistration(request $request, $id, $status)
    {
         $unit_Meat_Type = DB::table('unit_Meat_Type')->get();
        
           $meat_registration_pdf =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.meat_pplication_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date', 't5.hod_sign')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        // ->where('t1.status', '=', $status)
                                        ->where('t1.final_approve', '=', $status)
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
        
         $current_date = $meat_registration_pdf->inserted_dt;
        // dd($current_date);
        
        $current_m = date('m', strtotime($current_date));
        $currentMonth = Carbon::today($current_m)->format('m');
        // dd($currentMonth);
        $fiscalYear = '';
        
        $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();
        
        // dd($fiscalYear);
                                        
        return view('hod.admin_approve_list.generate_english_meat_registration_pdf', compact('meat_registration_pdf', 'fiscalYear','unit_Meat_Type'));
    }
    
     public function MarathiGeneratemeatRegistration(request $request, $id, $status)
    {
         $unit_Meat_Type = DB::table('unit_Meat_Type')->get();
        // $meat_registration_pdf =  DB::table('dog_registration_tbl AS t1')
           $meat_registration_pdf =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.meat_pplication_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date', 't5.hod_sign')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        // ->where('t1.status', '=', $status)
                                        ->where('t1.final_approve', '=', $status)
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
        
           $current_date = $meat_registration_pdf->inserted_dt;
        // dd($current_date);
        
        $current_m = date('m', strtotime($current_date));
        $currentMonth = Carbon::today($current_m)->format('m');
        // dd($currentMonth);
        $fiscalYear = '';
        
        $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();
        
        // dd($fiscalYear);
                                        
        return view('hod.admin_approve_list.generate_marathi_meat_registration_pdf', compact('meat_registration_pdf','fiscalYear','unit_Meat_Type'));
    }
    
    
     public function GenerateaffidavitPdf(request $request, $id, $status)
    {
        
           $meat_registration_pdf =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.meat_pplication_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        // ->where('t1.status', '=', $status)
                                         ->where('t1.final_approve', '=', $status)
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
                                        
        return view('hod.admin_approve_list.affidavit', compact('meat_registration_pdf'));
    }
    
    public function adminRejectedList(request $request, $status)
     {
         $meat_registration_list =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->where('t1.status', '=', $status) 
                                        ->where('t1.hod_status', '=', 1)  
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
                                        
          return view('hod.admin_approve_list.rejected_list', compact('meat_registration_list', 'status'));
     }
    
    
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
        
        return view('hod.Report.meat_List_report', compact('meat_registration_list'));
     }
    
    
     public function Meat_SearchReport_List(request $request)
    {
        
         $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $status = $request->input('status');
        $adminstatus = $request->input('adminstatus');
        $finalstatus = $request->input('finalstatus');
        $meat_type = $request->input('meat_type');
        $business_type = $request->input('business_type');
     
     if($request->from_date && $request->to_date){
         
        $meat_search_registration_list =  DB::table('meat_registration_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        
                                        ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                        ->whereDate('t1.inserted_dt', '<=', $to_date)    
                                        
                                        // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                        // ->where('t1.status', '=', $status )
                                        
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
                                        
     }
     
     if($request->meat_type){
         
         $meat_search_registration_list =  DB::table('meat_registration_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
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
          
           $meat_search_registration_list =  DB::table('meat_registration_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
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
          
          $meat_search_registration_list =  DB::table('meat_registration_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                         ->Where('t1.hod_status', '=', $status )
                                        
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
      }
      
      if($request->adminstatus){
          
           $meat_search_registration_list =  DB::table('meat_registration_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
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
           
            $meat_search_registration_list =  DB::table('meat_registration_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                         ->Where('t1.final_approve', '=', $finalstatus )
                                        
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
       }
       
       if($request->status && $request->from_date && $request->to_date && $request->adminstatus && $request->finalstatus)
       {
            $meat_search_registration_list =  DB::table('meat_registration_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                        ->whereDate('t1.inserted_dt', '<=', $to_date)  
                                        ->Where('t1.hod_status', '=', $status )
                                        ->Where('t1.status', '=', $adminstatus )
                                        ->Where('t1.final_approve', '=', $finalstatus )
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
       }
        
        return view('hod.Report.meat_List_report',  compact('meat_search_registration_list'));
    }
    
    public function meatReportView(request $request, $id){
        
        $meat_registration_view =  DB::table('meat_registration_tbl AS t1')
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
        
        return view('hod.Report.meat_view', compact('meat_registration_view'));
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
