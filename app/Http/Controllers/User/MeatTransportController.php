<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MeatTransport_Model;
use App\Models\MeatType_Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MeatTransportController extends Controller
{

	 public function Transport_Terms_Conditions()
    {
        // if (Auth::guard('meatregistereduser')->check()) {
        //     return view('user.meat_transport.meat_vehical_terms');
        // } else {
        //     return redirect('/user/login');
        // }
        
         if (Auth::guard('meatregistereduser')->check()) {
            
             $mainid = Auth::guard('meatregistereduser')->user()->id;
        
       
        
        $data =   DB::table('meat_transport_register_tbl AS t1')
                            ->select('t1.*', 't2.meat_name','t3.dist_name','t4.taluka_name'
                                    ) 
                            ->leftJoin('meat_type_mst AS t2', 't2.id', '=', 't1.meat_type')
                            ->leftJoin('mst_dist AS t3', 't3.id', '=', 't1.district_id')
                            ->leftJoin('mst_taluka AS t4', 't4.id', '=', 't1.taluka_id')
                          
                            ->where('t1.inserted_by', '=', $mainid)
                            ->whereNull('t1.deleted_at')
                            ->whereNull('t2.deleted_at')
                            ->whereNull('t3.deleted_at')
                            ->whereNull('t4.deleted_at')
                            ->orderBy('t1.id', 'DESC')
                            ->first();
                            
        
         
      if(!empty($data)) {
             
                return redirect('/')->with('warning','You Have already apply for this form');
                
      } else {
             return view('user.meat_transport.meat_vehical_terms');
        
        }
        
           
        } else {
            return redirect('/user/login');
        }
        
        
        
    }

     public function create()
    {
        $meattype_mst = MeatType_Master::orderBy('id','desc')->pluck('meat_name', 'id')->whereNull('deleted_at');
        // return $meattype_mst;
        
        return view('user.meat_transport.meat_transport_registration', compact('meattype_mst'));
    }


    public function store(Request $request)
    {

      $mainid = Auth::guard('meatregistereduser')->user()->id;

      $check =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('*')
                                        ->where('t1.inserted_by', '=', $mainid)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();


      if($check > 0){

        return redirect('/')->with('message','You Have already apply this Form.');

      }else{


        $this->validate($request, [
            
            // Basic Details
            'applicant_title_id' => 'required|numeric',
            'applicant_fname' => 'required|string',
            'applicant_mname' => 'required|string',
            'applicant_lname' => 'required|string',
            'mobile_number' => 'required|string',
            'aadhar_number' => 'required|string',
            'applicant_address' => 'required|string',
            
         
            // Business Details
            'business_name' => 'required|string',
            'vehical_register_no' => 'required|string',
            'vehical_address' => 'required|string',
            'business_address' => 'required|string',
            
            'from_date' => 'required|string',
            'to_date' => 'required|string',
            'meat_type' => 'required|numeric',
            'per_day_capacity' => 'required|numeric',
            'driving_licence' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
         
           'vehicle_insurance_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',

         ],[
              // Basic Details
              'applicant_title_id.required' => 'Applicant Title is required',
              'applicant_fname.required' => 'Applicant First Name is required',
              'applicant_mname.required' => 'Applicant Middle Name is required',
              'applicant_lname.required' => 'Applicant Last Name is required',
            
              'mobile_number.required' => 'Mobile Number is required',
             
              'aadhar_number.required' => 'Aadhar Number is required',
              
              'applicant_address.required' => 'applicant address is required',
           
            //   'country_id.required' => 'Country is required',
            //   'state_id.required' => 'State is required',
            //   'district_id.required' => 'District is required',
            //   'taluka_id.required' => 'Taluka is required',
            //   'zipcode.required' => 'Zip Code is required',
              
              // Business Details
              'business_name.required' => 'Name of the business is required',
              'vehical_register_no.required' => 'vehical register number  is required',
              'vehical_address.required' => 'vehical address is required',
              'business_address.required' => 'business address is required',
              'from_date.required' => 'from Date is required',
              'to_date.required' => 'To date is required',
              'meat_type.required' => 'meat type is required',
              'per_day_capacity.required' => 'per day capacity is required',
              
              
              'driving_licence.required' => 'applicant driving licence is required',
              'driving_licence.max' => 'The file size should be less than 2MB.',
              'driving_licence.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
              'vehicle_insurance_doc.required' => 'applicant vehicle insurance Certificate is required',
              'vehicle_insurance_doc.max' => 'The file size should be less than 2MB.',
              'vehicle_insurance_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
                             
             ]);

        $data = new MeatTransport_Model();
        
        if(!empty($request->hasFile('driving_licence'))){
            $image = $request->file('driving_licence');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_vehicle_Registration/meat_file/driving_licence'),$new_name);
            $image_path = "/PMC_vehicle_Registration/meat_file/driving_licence" . $image_name;
            $data->driving_licence = $new_name;
        }
        
        if(!empty($request->hasFile('vehicle_insurance_doc'))){
            $image = $request->file('vehicle_insurance_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc'),$new_name);
            $image_path = "/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc" . $image_name;
            $data->vehicle_insurance_doc = $new_name;
        }
        
        
       
        // Basic Details
        $data->applicant_title_id = $request->get('applicant_title_id');
        $data->applicant_fname = $request->get('applicant_fname');
        $data->applicant_mname = $request->get('applicant_mname');
        $data->applicant_lname = $request->get('applicant_lname');
        
        $data->mobile_number = $request->get('mobile_number');
       
        $data->aadhar_number = $request->get('aadhar_number');
        
        $data->applicant_address = $request->get('applicant_address');
   
        
        // Business Details
        $data->business_name = $request->get('business_name');
        $data->vehical_register_no = $request->get('vehical_register_no');
        $data->vehical_address = $request->get('vehical_address');
        $data->business_address = $request->get('business_address');
        $data->from_date = $request->get('from_date');
        $data->to_date = $request->get('to_date');
        $data->meat_type = $request->get('meat_type');
        $data->per_day_capacity = $request->get('per_day_capacity');
        
        
        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::guard('meatregistereduser')->user()->id;
        $data->save();
        
        $unique_id = "PMC-MET-VEH".rand(1000,10000000);
        $update = [
            'transport_license_no' => $unique_id.$data->id ,
            // 'inserted_by' => $data->id,
        ];
        
        
        MeatTransport_Model::where('id', $data->id)->update($update);
        
        $unique_id_new =$unique_id.$data->id;
        $mob_number = $request->get('mobile_number');
        $scheme = 'Meat Transport Business License';
        $domain = "https://smartpmc.co.in/";
        $sms = "Your application no:- " . $unique_id_new . " for " . $scheme . " is received at PMC office. You can also track your application on " . $domain . " CORE OCEAN.";
        $this->sendsmsnew($sms,$mob_number);

        // return redirect('/user/self_decleration')->with('message','Your Record Added Successfully.');

         return redirect('user/appli_form')->with('message','Your Record Added Successfully.');

     }

    }

     public function User_vehicalForm_View(Request $request, $application_id, $user_type)
    {
        $meattype_mst = MeatType_Master::orderBy('id','desc')->pluck('meat_name', 'id')->whereNull('deleted_at');
        
        if($user_type == 'Transport_Registration')
        {
            $data =   DB::table('meat_transport_register_tbl AS t1')
                            ->select('t1.*', 't2.meat_name','t3.dist_name','t4.taluka_name'
                                    )
                                    
                            ->leftJoin('meat_type_mst AS t2', 't2.id', '=', 't1.meat_type')
                           
                            ->leftJoin('mst_dist AS t3', 't3.id', '=', 't1.district_id')
                            ->leftJoin('mst_taluka AS t4', 't4.id', '=', 't1.taluka_id')
                           

                             ->where('t1.id', '=', $application_id)
                            ->whereNull('t1.deleted_at')
                            ->whereNull('t2.deleted_at')
                            ->whereNull('t3.deleted_at')
                            ->whereNull('t4.deleted_at')
                            
                            ->orderBy('t1.id', 'DESC')
                            ->first();
                            
            // return $data;
            
             return view('user.meat_transport.user_transport_form_view', compact('data', 'user_type','meattype_mst'));
        }
        
    }
    
     public function meatTransportInvoice(Request $request, $application_id, $user_type)
    {
      if($user_type == 'Transport_Registration')
        {
         $invoice =  DB::table('meat_transport_register_tbl AS t1')
                        ->select('t1.*')
                        ->where('t1.id', '=', $application_id)
                        ->orderBy('t1.id', 'DESC')
                        ->first();
        return view('user.meat_transport.invoice',compact('invoice'));
        
        }
    }
    
    
    public function updateTransportRegiter(Request $request, $id)
    {
        $this->validate($request, [
            
            // Basic Details
            'applicant_title_id' => 'required|numeric',
            'applicant_fname' => 'required|string',
            'applicant_mname' => 'required|string',
            'applicant_lname' => 'required|string',
            'mobile_number' => 'required|string',
            'aadhar_number' => 'required|string',
            
            // Business Details
            'business_name' => 'required|string',
            'vehical_address' => 'required|string',
            'business_address' => 'required|string',
            'vehical_register_no' => 'required|string',
            'from_date' => 'required|string',
            'to_date' => 'required|string',
            'meat_type' => 'required|numeric',
            'per_day_capacity' => 'required|numeric',
          

         ],[
              // Basic Details
              'applicant_title_id.required' => 'Applicant Title is required',
              'applicant_fname.required' => 'Applicant First Name is required',
              'applicant_mname.required' => 'Applicant Middle Name is required',
              'applicant_lname.required' => 'Applicant Last Name is required',
            
              'mobile_number.required' => 'Mobile Number is required',
             
              'aadhar_number.required' => 'Aadhar Number is required',
              
              // Residential Address of Applicant
              'applicant_address.required' => 'applicant address is required',
           
          
              
              // Business Details
              'business_name.required' => 'Name of the business is required',
              'vehical_register_no.required' => 'vehical register number  is required',
              'vehical_address.required' => 'vehical address is required',
              'business_address.required' => 'business address is required',
              'from_date.required' => 'from Date is required',
              'to_date.required' => 'To date is required',
              'meat_type.required' => 'meat type is required',
              'per_day_capacity.required' => 'per day capacity is required',
              
                             
             ]);

     

        //  $data = MeatTransport_Model::find($id);
           $data = MeatTransport_Model::updateOrCreate(['id' => $id]);
           
            if(!empty($request->hasFile('driving_licence'))){
            $image = $request->file('driving_licence');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_vehicle_Registration/meat_file/driving_licence'),$new_name);
            $image_path = "/PMC_vehicle_Registration/meat_file/driving_licence" . $image_name;
            $data->driving_licence = $new_name;
        }
        
         if(!empty($request->hasFile('vehicle_insurance_doc'))){
            $image = $request->file('vehicle_insurance_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc'),$new_name);
            $image_path = "/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc" . $image_name;
            $data->vehicle_insurance_doc = $new_name;
        }
      
        // Basic Details
        $data->applicant_title_id = $request->get('applicant_title_id');
        $data->applicant_fname = $request->get('applicant_fname');
        $data->applicant_mname = $request->get('applicant_mname');
        $data->applicant_lname = $request->get('applicant_lname');
        
        $data->mobile_number = $request->get('mobile_number');
       
        $data->aadhar_number = $request->get('aadhar_number');
        
        // Residential Address of Applicant
        $data->applicant_address = $request->get('applicant_address');
      
      
        
        // Business Details
        $data->business_name = $request->get('business_name');
        $data->vehical_register_no = $request->get('vehical_register_no');
        $data->vehical_address = $request->get('vehical_address');
        $data->business_address = $request->get('business_address');
        $data->from_date = $request->get('from_date');
        $data->to_date = $request->get('to_date');
        $data->meat_type = $request->get('meat_type');
        $data->per_day_capacity = $request->get('per_day_capacity');
        // $data->status = '0';
        
         if($data->status=1 && $data->t_hod_status == 2 && $data->t_final_approve =2){
            $data->t_hod_status = 0;
            $data->status = 0;
            $data->t_final_approve = 0;
       }
       
       if($data->status=1 && $data->t_hod_status == 1 && $data->t_final_approve =2){
           $data->t_hod_status = 0;
            $data->status = 0;
            $data->t_final_approve = 0;
       }
       
       if($data->status=2 && $data->t_hod_status == 1 && $data->t_final_approve =1){
           $data->t_hod_status = 0;
            $data->status = 0;
            $data->t_final_approve = 0;
       }
       
       if($data->status=1 && $data->t_hod_status == 2 && $data->t_final_approve =1){
           $data->t_hod_status = 0;
            $data->status = 0;
            $data->t_final_approve = 0;
       }
       
       if($data->status=2 && $data->t_hod_status == 2 && $data->t_final_approve =2){
           $data->t_hod_status = 0;
            $data->status = 0;
            $data->t_final_approve = 0;
       }
        
        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::guard('meatregistereduser')->user()->id;
        $data->save();

        return redirect('user/appli_form')->with('message','Your Record Updated Successfully.');


    }
    
      public function EnglishVehiclelicensepdf(request $request, $id)
    {
        
           $meat_transport_pdf =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.transport_register_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date', 't5.t_hod_sign')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')
                                        // ->where('t1.status', '=', $status)
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
                          
                                        
        return view('user.meat_transport.generate_english_meat_transport_pdf', compact('meat_transport_pdf','fiscalYear'));
    }
    
    public function MarathiVeiclelicensepdf(request $request, $id)
    {
        
           $meat_transport_pdf =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.transport_register_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date', 't5.t_hod_sign')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_vehical_tbl AS t5', 't5.transport_register_id', '=', 't1.id')
                                        // ->where('t1.status', '=', $status)
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
                          
                                        
        return view('user.meat_transport.generate_marathi_meat_transport_pdf', compact('meat_transport_pdf','fiscalYear'));
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
    
    
    
      public function vehicalForm_View(request $request, $application_id)
    {
        $meattype_mst = MeatType_Master::orderBy('id','desc')->pluck('meat_name', 'id')->whereNull('deleted_at');
        
        $meat_transport_view =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')

                                        // ->where('t1.status', '=', $status)
                                        ->where('t1.id', '=', $application_id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
        // return $meat_registration_view;
        
        return view('user.meat_transport.view', compact('meat_transport_view','meattype_mst'));
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