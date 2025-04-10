<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PET_Activation;
use App\Models\PET_Dispute;
use App\Models\PET_Refund;
use App\Models\MeatRenewalLicense_Model;
use App\Models\ApproveAdminRenewalLicense_Model;
use App\Models\ApproverenewalAdmin_Model;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MeatRenewalListController extends Controller
{


   public function MeatRenewalList(request $request, $status)
    {
        // Display All PET Renewal Form ( Status - 0 )
        $meat_renewal_list = DB::table('meat_renewal_license_tbl AS t1')
                                ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                ->where('t1.status', '=', $status)
                                 ->where('t1.re_hod_status', '=', 1)
                                // ->where('t1.id', '=', $id)
                                ->whereNull('t1.deleted_at')
                                ->whereNull('t2.deleted_at')
                                ->whereNull('t3.deleted_at')
                                ->whereNull('t4.deleted_at')
                                
                                ->orderBy('t1.id', 'DESC')
                                ->get();
        // return $pet_renewal_list;

        return view('admin.meat_renewal.grid', compact('meat_renewal_list', 'status'));
    }

     public function MeatRenewalView(request $request, $id, $status)
    {
        // $meat_renewal_view = DB::table('meat_renewal_license_tbl AS t1')
        //                                 ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.adharcard_doc','t5.residitional_proof_doc','t5.legal_business_doc','t5.business_registration_doc','t5.property_tax_doc','t5.paid_water_doc','t5.slaughter_letter_doc','t5.treatment_authorized_doc','t5.fitness_certificate_doc','t5.issued_doc','t5.applicant_signature','t5.inserted_by')
        //                                 ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
        //                                 ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
        //                                 ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
        //                                 ->leftJoin('meat_registration_tbl AS t5', 't5.inserted_by', '=', 't1.inserted_by')
        //                                 ->where('t1.status', '=', $status)
        //                                 ->where('t1.id', '=', $id)
        //                                 ->whereNull('t1.deleted_at')
        //                                 ->whereNull('t2.deleted_at')
        //                                 ->whereNull('t3.deleted_at')
        //                                 ->whereNull('t4.deleted_at')
        //                                 ->orderBy('t1.id', 'DESC')
        //                                 ->first();
        
        
        
         $meat_renewal_view = DB::table('meat_renewal_license_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.adharcard_doc as regi_adharcard_doc','t5.residitional_proof_doc as regi_residitional_proof_doc','t5.authority_letter_doc as regi_authority_letter_doc','t5.legal_business_doc as regi_legal_business_doc','t5.business_registration_doc as regi_business_registration_doc','t5.agreement_owner_doc as agreement_owner_renewal','t5.noc_owner_doc as doc_owner','t5.property_tax_doc as property_doc','t5.paid_water_doc as paid_water','t5.paid_receipt_doc as receipt_doc','t5.treatment_authorized_doc as tre_authority_doc','t5.fitness_certificate_doc as fitness_doc','t5.issued_doc as regi_issued_doc','t5.registration_doc as regi_doc','t5.slaughter_letter_doc as letter_doc','t5.profile_photo as regi_profile_photo','t5.applicant_signature as regi_app_sign')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('meat_registration_tbl AS t5', 't5.id', '=', 't1.meat_register_oldid')
                                        ->where('t1.status', '=', $status)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
          //dd($meat_renewal_view);

        return view('admin.meat_renewal.view', compact('meat_renewal_view'));
    }

 //Cold_renewal_invoice
    public function meatRenewalInvoice(request $request, $id, $status)
    {
         $invoice =  DB::table('meat_renewal_license_tbl AS t1')
                        ->select('t1.*')
                        ->where('t1.status', '=', $status)
                        ->where('t1.id', '=', $id)
                        ->orderBy('t1.id', 'DESC')
                        ->first();
        return view('admin.meat_renewal.invoice',compact('invoice'));
    }

     public function ApproveMeatRenewal(request $request, $id)
    {
        
        //  $data = new ApproverenewalAdmin_Model();

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
            'status' => 1,
            'approve_date' => date("Y-m-d H:i:s"),
            'approve_by' => Auth::user()->id,
        ];
        
        MeatRenewalLicense_Model::where('id', $id)->update($update);

        // $app_no = $request->get('license_number');
        // $scheme = 'Meat Registration Form';
        // //$domain = "https://".$_SERVER['HTTP_HOST'];

        // //print_r($data->mobile_number);exit; 
        // //$project_folder = 'PMC_MeatRegistration';
        
        // $msg = "Your application no:- $app_no for $scheme is Approved Successfully.";

        // $tempID= '1207167447455213113';
        // $this->sendsms($msg,$data->mobile_number,$tempID);
        
       

        return redirect('/meat_renewal_list/1')->with('message', 'Meat Renewal Form Approved Successfully'); //Redirect user somewhere
    }
    
    

    // Rejected Meat Registration Form ( Status - 2 )
    public function RejectMeatRenewal(request $request, $id){
        
       $update = [
            'status' => 2,
            're_reason_rejection_by_admin' => $request->get('reject_resion'),
            'reject_date' => date("Y-m-d H:i:s"),
            'reject_by' => Auth::user()->id,
        ];
        
        MeatRenewalLicense_Model::where('id', $id)->update($update);
        
        // $app_no = $request->get('meat_pplication_no');
        // $resion = $request->get('reject_resion');
        //  $mobile = $request->get('mobile_number');
        // //$domain = "https://".$_SERVER['HTTP_HOST'];

        // //print_r($data->mobile_number);exit; 
        // //$project_folder = 'PMC_MeatRegistration';
        
        // $msg = "Your application no:- $app_no is Rejected Resion For :- $resion .";

        // $tempID= '1207167447455213113';
        // $this->sendsms($msg,$mobile,$tempID);
        
      

        return redirect('/meat_renewal_list/2')->with('message', 'Meat Renewal Form Rejected Successfully'); //Redirect user somewhere
    }
    
    

     public function EnglishGenerateMeatRenewal(request $request, $id, $status)
      {
        
           $meat_renewal_pdf =  DB::table('meat_renewal_license_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.meat_pplication_no as license_no','t5.adharcard_doc','t5.residitional_proof_doc','t5.legal_business_doc','t5.business_registration_doc','t5.property_tax_doc','t5.paid_water_doc','t5.slaughter_letter_doc','t5.treatment_authorized_doc','t5.fitness_certificate_doc','t5.issued_doc','t5.applicant_signature','t5.inserted_by','t6.id as approve_id', 't6.meat_pplication_id as approve_PET_UniqueID','t6.date_of_license_obtain as approve_date_of_license_obtain')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('meat_registration_tbl AS t5', 't5.inserted_by', '=', 't1.inserted_by')
                                        ->leftJoin('approve_by_admin_renewal_license_tbl AS t6', 't6.meat_pplication_id', '=', 't1.id')
                                        ->where('t1.status', '=', $status)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->whereNull('t6.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
            
         $current_date = $meat_renewal_pdf->inserted_dt;
        // dd($current_date);
        
        $current_m = date('m', strtotime($current_date));
        $currentMonth = Carbon::today($current_m)->format('m');
        // dd($currentMonth);
        $fiscalYear = '';
        
        $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();
        
        // dd($fiscalYear);
                                   
        return view('admin.meat_renewal.generate_english_meat_renewal_pdf', compact('meat_renewal_pdf','fiscalYear'));
      }
    

    public function MarathiGeneratemeatRenewal(request $request, $id, $status)
    {
        
           $meat_renewal_pdf =  DB::table('meat_renewal_license_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.meat_pplication_no as license_no','t5.adharcard_doc','t5.residitional_proof_doc','t5.legal_business_doc','t5.business_registration_doc','t5.property_tax_doc','t5.paid_water_doc','t5.slaughter_letter_doc','t5.treatment_authorized_doc','t5.fitness_certificate_doc','t5.issued_doc','t5.applicant_signature','t5.inserted_by','t6.id as approve_id', 't6.meat_pplication_id as approve_PET_UniqueID','t6.date_of_license_obtain as approve_date_of_license_obtain')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('meat_registration_tbl AS t5', 't5.inserted_by', '=', 't1.inserted_by')
                                        ->leftJoin('approve_by_admin_renewal_license_tbl AS t6', 't6.meat_pplication_id', '=', 't1.id')
                                        ->where('t1.status', '=', $status)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->whereNull('t6.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
              $current_date = $meat_renewal_pdf->inserted_dt;
        // dd($current_date);
        
        $current_m = date('m', strtotime($current_date));
        $currentMonth = Carbon::today($current_m)->format('m');
        // dd($currentMonth);
        $fiscalYear = '';
        
        $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();
        
        // dd($fiscalYear);
      
            return view('admin.meat_renewal.generate_marathi_meat_renewal_pdf', compact('meat_renewal_pdf','fiscalYear'));
    }
    
      
     public function GeneraterenewalaffidavitPdf(request $request, $id, $status)
    {
        
           $meat_registration_pdf =  DB::table('meat_renewal_license_tbl AS t1')
           
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.applicant_signature as app_sign','t5.inserted_by','t6.id as approve_id', 't6.meat_pplication_id as approve_PET_UniqueID',
                                        't6.date_of_license_obtain as approve_date_of_license_obtain')
                                      
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('meat_registration_tbl AS t5', 't5.id', '=', 't1.meat_register_oldid')
                                        ->leftJoin('approve_by_admin_renewal_license_tbl AS t6', 't6.meat_pplication_id', '=', 't1.id')
                                        ->where('t1.status', '=', $status)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->whereNull('t6.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
      
            //dd($meat_registration_pdf);
                                        
        return view('admin.meat_renewal.affidavit', compact('meat_registration_pdf'));
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