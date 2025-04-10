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
use Carbon\Carbon;

class MeatTransportRenewalListController extends Controller
{

	public function MeatTransportRenewalList(request $request, $status)
    {
        // Display All PET Renewal Form ( Status - 0 )
        $meat_renewal_list = DB::table('meat_transport_renewal_tbl AS t1')
                                ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                               
                                ->where('t1.status', '=', $status)
                                // ->where('t1.id', '=', $id)
                                ->where('t1.tr_hod_status', '=', 1)
                                ->whereNull('t1.deleted_at')
                                ->whereNull('t2.deleted_at')
                                ->whereNull('t3.deleted_at')
                                ->whereNull('t4.deleted_at')
                                
                                ->orderBy('t1.id', 'DESC')
                                ->get();
        // return $pet_renewal_list;

        return view('admin.meat_transport_renewal.grid', compact('meat_renewal_list', 'status'));
    }

     public function MeatTransportRenewalView(request $request, $id, $status)
    {
        $meat_transport_view = DB::table('meat_transport_renewal_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.driving_licence as driving_licence_doc','t5.vehicle_insurance_doc as vehicle_insurance')
		                                ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
		                                ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
		                                ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
		                               ->leftJoin('meat_transport_register_tbl AS t5', 't5.id', '=', 't1.meat_transport_oldid')
		                                ->where('t1.status', '=', $status)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                         ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
          //dd($meat_renewal_view);

        return view('admin.meat_transport_renewal.view', compact('meat_transport_view'));
    }
    
     public function meatTransportRenewalInvoice(request $request, $id, $status)
    {
         $invoice =  DB::table('meat_transport_renewal_tbl AS t1')
                        ->select('t1.*')
                        ->where('t1.status', '=', $status)
                        ->where('t1.id', '=', $id)
                        ->orderBy('t1.id', 'DESC')
                        ->first();
        return view('admin.meat_transport_renewal.invoice',compact('invoice'));
    }

    public function ApproveMeatRenewalTransport(request $request, $id)
    {
        
        
        
        $update = [
            'status' => 1,
            'approve_date' => date("Y-m-d H:i:s"),
            'approve_by' => Auth::user()->id,
        ];
        
        MeatTransportRenewalLicense_Model::where('id', $id)->update($update);

        return redirect('/meat_transport_renewal_list/1')->with('message', 'Meat Transport Renewal Form Approved Successfully'); //Redirect user somewhere
    }

     public function RejectMeatRenewalTransport(request $request, $id){
         
         $update = [
            'status' => 2,
            'tr_reason_rejection_by_admin' => $request->get('reject_resion'),
            'reject_date' => date("Y-m-d H:i:s"),
            'reject_by' => Auth::user()->id,
        ];
        
        MeatTransportRenewalLicense_Model::where('id', $id)->update($update);
        
        
        // $app_no = $request->get('meat_pplication_no');
        // $resion = $request->get('reject_resion');
        // $mobile = $request->get('mobile_number');
        // //$domain = "https://".$_SERVER['HTTP_HOST'];

        // //print_r($data->mobile_number);exit; 
        // //$project_folder = 'PMC_MeatRegistration';
        
        // $msg = "Your application no:- $app_no is Rejected Resion For  $resion .";

        // $tempID= '1207167447455213113';
        // $this->sendsms($msg,$mobile,$tempID);
        
        
        return redirect('/meat_transport_renewal_list/2')->with('message', 'Meat Transport Renewal Form Rejected Successfully'); //Redirect user somewhere
    }

     public function EnglishGenerateMeatRenewalTransport(request $request, $id, $status)
    {
        
           $meat_transport_pdf =  DB::table('meat_transport_renewal_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.transport_register_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date')
		                                ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
		                                ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
		                                ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_vehical_renewal_tbl AS t5', 't5.transport_register_id', '=', 't1.id')
                                        ->where('t1.status', '=', $status)
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
                                        
        return view('admin.meat_transport_renewal.generate_english_meat_transport_renewal_pdf', compact('meat_transport_pdf','fiscalYear'));
    }

     public function MarathiGeneratemeatRenewalTransport(request $request, $id, $status)
    {
        
           $meat_transport_pdf =  DB::table('meat_transport_renewal_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.transport_register_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date')
		                                ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
		                                ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
		                                ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_vehical_renewal_tbl AS t5', 't5.transport_register_id', '=', 't1.id')
                                        ->where('t1.status', '=', $status)
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
                              
                                        
        return view('admin.meat_transport_renewal.generate_marathi_meat_transport_renewal_pdf', compact('meat_transport_pdf','fiscalYear'));
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




}