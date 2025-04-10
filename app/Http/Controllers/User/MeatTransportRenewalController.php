<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MeatTransportRenewalLicense_Model;
use App\Models\MeatRegisteredUser;
use App\Models\MeatType_Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class MeatTransportRenewalController extends Controller
{


	 public function create()
    {

    	//$pp = Auth::guard('meatregistereduser')->user()->id;

    	// print_r($pp);exit;
          

        if (Auth::guard('meatregistereduser')->check()) {
       
       $meattype_mst = MeatType_Master::orderBy('id','desc')->pluck('meat_name', 'id')->whereNull('deleted_at');

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


                            //print_r($data);exit;
                if(empty($data)) {
                
                    return redirect('/')->with('warning','Register your Application For Transport Business License First');
                
                }elseif($data->approve_date == ""){
            
                   return redirect('/')->with('warning','Your Application status is still Pending');
            
           
                }else {

        
                return view('user.meat_transport_renewal.meat_transport_renewal_form', compact('data','meattype_mst'));

       
            } 
            } else {
            return redirect('/user/login');
        }      
                            
           
    }


     public function store(Request $request)
     {

      $mainid = Auth::guard('meatregistereduser')->user()->id;

      $check =  DB::table('meat_transport_renewal_tbl AS t1')
                                        ->select('*')
                                        ->where('t1.inserted_by', '=', $mainid)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();


      if($check > 0){

        return redirect('/')->with('message','You Have already apply for this Form.');

      }else{


      $this->validate($request, [
            
            // Basic Details
            'applicant_title_id' => 'required|numeric',
            'applicant_fname' => 'required|string',
            'applicant_mname' => 'required|string',
            'applicant_lname' => 'required|string',
            
            'mobile_number' => 'required|string',
            
            'aadhar_number' => 'required|string',
            
            // Residential Address of Applicant
            'applicant_address' => 'required|string',
           
            // 'country_id' => 'required|string',
            // 'state_id' => 'required|string',
            // 'district_id' => 'required|string',
            // 'taluka_id' => 'required|string',
            // 'zipcode' => 'required|string',
            
            // Business Details
            'business_name' => 'required|string',
            'vehical_register_no' => 'required|string',
            'vehical_address' => 'required|string',
            'business_address' => 'required|string',
            'from_date' => 'required|string',
            'to_date' => 'required|string',
            'meat_type' => 'required|numeric',
            'per_day_capacity' => 'required|string',
           
            // 'old_licence' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            // 'old_licence' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
           
            'old_licence' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',

         ],[
              // Basic Details
              'applicant_title_id.required' => 'Applicant Title is required',
              'applicant_fname.required' => 'Applicant First Name is required',
              'applicant_mname.required' => 'Applicant Middle Name is required',
              'applicant_lname.required' => 'Applicant Last Name is required',
           
              'mobile_number.required' => 'Mobile Number is required',
             
              'aadhar_number.required' => 'Aadhar Number is required',
              
              // Residential Address of Applicant
              'applicant_address.required' => 'Applicant Address is required',
           
              'country_id.required' => 'Country is required',
              'state_id.required' => 'State is required',
              'district_id.required' => 'District is required',
              'taluka_id.required' => 'Taluka is required',
              'zipcode.required' => 'Zip Code is required',
              
              // Business Details
              // Business Details
              'business_name.required' => 'Name of the business is required',
              'vehical_register_no.required' => 'vehical register number  is required',
              'business_address.required' => 'business address is required',
              'from_date.required' => 'from Date is required',
              'to_date.required' => 'To date is required',
              'meat_type.required' => 'meat type is required',
              'per_day_capacity.required' => 'per day capacity is required',
               
              
              

              'old_licence.required' => 'Applicant old licence Copy is required',
              'old_licence.max' => 'The file size should be less than 2MB.',
              'old_licence.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
             ]);

        $data = new MeatTransportRenewalLicense_Model();
        
       
      
        
         if(!empty($request->hasFile('old_licence'))){
            $image = $request->file('old_licence');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/transport_renewal/old_licence'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/transport_renewal/old_licence" . $image_name;
            $data->old_licence = $new_name;
        }
        
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

        $data->meat_transport_oldid = $request->get('meat_transport_oldid');
        // $data->trans_renwal_liceans_no = $request->get('trans_renwal_liceans_no');
        $data->applicant_title_id = $request->get('applicant_title_id');
        $data->applicant_fname = $request->get('applicant_fname');
        $data->applicant_mname = $request->get('applicant_mname');
        $data->applicant_lname = $request->get('applicant_lname');
        
        $data->mobile_number = $request->get('mobile_number');
       
        $data->aadhar_number = $request->get('aadhar_number');
        
        // Residential Address of Applicant
        $data->applicant_address = $request->get('applicant_address');
      
        $data->country_id = $request->get('country_id');
        $data->state_id = $request->get('state_id');
        $data->district_id = $request->get('district_id');
        $data->taluka_id = $request->get('taluka_id');
        $data->zipcode = $request->get('zipcode');
        
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
            'trans_renwal_liceans_no' => $unique_id.$data->id ,
            // 'inserted_by' => $data->id,
        ];
        
        
        MeatTransportRenewalLicense_Model::where('id', $data->id)->update($update);
        
        $app_no = $unique_id.$data->id;
        $scheme = 'Meat / Livestock Transport Business Renewal License Registration Form ';
        $domain = "https://".$_SERVER['HTTP_HOST'];
        $project_folder = 'PMC_Meat_Registration';
        
        $msg = "Your application no:- $app_no for $scheme is received at PMC office. You can also track your application on $domain/$project_folder/ PMC.";
        $tempID= '1207167447455213113';
        $this->sendsms($msg,$request->mobile_number,$tempID);

        return redirect('user/appli_form')->with('message','Your Transport License Renawal Record Added Successfully.');

        // return redirect('/')->with('message','Your Record Added Successfully.');

     }

    }
    
     public function meatTransportRenewalInvoice(Request $request, $application_id, $user_type)
    {
         $invoice =  DB::table('meat_transport_renewal_tbl AS t1')
                        ->select('t1.*')
                       ->where('t1.id', '=', $application_id)
                        ->orderBy('t1.id', 'DESC')
                        ->first();
        return view('user.meat_transport_renewal.invoice',compact('invoice'));
    }
    
    
    public function UpdatevehicalRenewalForm_View(Request $request, $application_id, $user_type)
    {
         $meattype_mst = MeatType_Master::orderBy('id','desc')->pluck('meat_name', 'id')->whereNull('deleted_at');

        if($user_type == 'Transport_Registration')
        {
            $data =   DB::table('meat_transport_renewal_tbl AS t1')
                            ->select('t1.*', 't2.meat_name','t3.dist_name','t4.taluka_name'
                                    ,'t5.driving_licence as driving_licence_doc','t5.vehicle_insurance_doc as vehicle_insurance')
                                    
                            ->leftJoin('meat_type_mst AS t2', 't2.id', '=', 't1.meat_type')
                           
                            ->leftJoin('mst_dist AS t3', 't3.id', '=', 't1.district_id')
                            ->leftJoin('mst_taluka AS t4', 't4.id', '=', 't1.taluka_id')
                            ->leftJoin('meat_transport_register_tbl AS t5', 't5.id', '=', 't1.meat_transport_oldid')
                           

                             ->where('t1.id', '=', $application_id)
                            ->whereNull('t1.deleted_at')
                            ->whereNull('t2.deleted_at')
                            ->whereNull('t3.deleted_at')
                            ->whereNull('t4.deleted_at')
                             ->whereNull('t5.deleted_at')
                            ->orderBy('t1.id', 'DESC')
                            ->first();
                            
            // return $data;
            
            return view('user.meat_transport_renewal.user_transport_renewal_form_view', compact('data', 'user_type','meattype_mst'));
        }
        
    }

    public function UpdateTransportRenewal(Request $request, $id)
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

       
        //  $data = MeatTransportRenewalLicense_Model::find($id);
           $data = MeatTransportRenewalLicense_Model::updateOrCreate(['id' => $id]);


         if(!empty($request->hasFile('old_licence'))){
            $image = $request->file('old_licence');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/transport_renewal/old_licence'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/transport_renewal/old_licence" . $image_name;
            $data->old_licence = $new_name;
        }
        
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
        
         if($data->status=1 && $data->tr_hod_status == 2 && $data->tr_final_approve =2){
            $data->tr_hod_status = 0;
            $data->status = 0;
            $data->tr_final_approve = 0;
       }
       
       if($data->status=1 && $data->tr_hod_status == 1 && $data->tr_final_approve =2){
           $data->tr_hod_status = 0;
            $data->status = 0;
            $data->tr_final_approve = 0;
       }
       
       if($data->status=2 && $data->tr_hod_status == 1 && $data->tr_final_approve =1){
           $data->tr_hod_status = 0;
            $data->status = 0;
            $data->tr_final_approve = 0;
       }
       
       if($data->status=1 && $data->tr_hod_status == 2 && $data->tr_final_approve =1){
           $data->tr_hod_status = 0;
            $data->status = 0;
            $data->tr_final_approve = 0;
       }
       
       if($data->status=2 && $data->tr_hod_status == 2 && $data->tr_final_approve =2){
           $data->tr_hod_status = 0;
            $data->status = 0;
            $data->tr_final_approve = 0;
       }
        
        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::guard('meatregistereduser')->user()->id;
        $data->save();

        return redirect('user/appli_form')->with('message','Your Transport Renewal Record Updated Successfully.');


    }

    
    public function sendsms($sms,$mobile_number,$tempID) { 
	    
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
    
        public function EnglishVehiclerenewallicensepdf(request $request, $id)
    {
        
         
                                        
             
             $meat_renewal_pdf =  DB::table('meat_transport_renewal_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't6.transport_license_no', 't5.transport_register_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date', 't5.tr_hod_sign')
		                                ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
		                                ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
		                                ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
		                                 ->leftJoin('meat_transport_register_tbl AS t6', 't6.inserted_by', '=', 't1.inserted_by')
                                        ->leftJoin('approve_by_admin_vehical_renewal_tbl AS t5', 't5.transport_register_id', '=', 't1.id')
                                        
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
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
                                   
        return view('user.meat_transport_renewal.generate_english_vehicle_renewal_pdf', compact('meat_renewal_pdf', 'fiscalYear'));
      }
    
    public function MarathiVehicleRenewallicensepdf(request $request, $id)
    {
        
       
                                        
             $meat_transport_pdf =  DB::table('meat_transport_renewal_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.transport_register_id as approve_PET_UniqueID', 't6.transport_license_no', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date', 't5.tr_hod_sign')
		                                ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
		                                ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
		                                ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
		                                  ->leftJoin('meat_transport_register_tbl AS t6', 't6.inserted_by', '=', 't1.inserted_by')
                                        ->leftJoin('approve_by_admin_vehical_renewal_tbl AS t5', 't5.transport_register_id', '=', 't1.id')
                                        
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();                            
                                        
            $current_date = $meat_transport_pdf->inserted_dt;
        // dd($current_date);
        
        $current_m = date('m', strtotime($current_date));
        $currentMonth = Carbon::today($current_m)->format('m');
        // dd($currentMonth);
        $fiscalYear = '';
        
        $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();
        
        // dd($fiscalYear);
                                   
        return view('user.meat_transport_renewal.generate_marathi_vehicle_renewal_pdf', compact('meat_transport_pdf', 'fiscalYear'));
      }
      
      
       public function ViewTransportRenewal(Request $request, $application_id)
    {
        
        $meattype_mst = MeatType_Master::orderBy('id','desc')->pluck('meat_name', 'id')->whereNull('deleted_at');


       $meat_renewal_view = DB::table('meat_transport_renewal_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        // ->leftJoin('meat_transport_register_tbl AS t5', 't5.id', '=', 't1.meat_transport_oldid')
                                        // ->where('t1.status', '=', $status)
                                        ->where('t1.id', '=', $application_id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
        // return $meat_registration_view;
        
        return view('user.meat_transport_renewal.view', compact('meat_renewal_view','meattype_mst'));
            
          //return view('user.meat_license.user_applicant_form_view', compact('data', 'user_type','meattype_mst'));
        }


}