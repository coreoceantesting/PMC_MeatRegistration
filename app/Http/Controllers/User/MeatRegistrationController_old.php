<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MeatRegistration_Model;
use App\Models\MeatType_Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MeatRegistrationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


       public function check_application_status(Request $request)
    {
        
        $application_no = $request->application_no;
         //dd($application_no);
         //$empty='';
                                
        $get_meat_application_status = DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*')
                                        ->whereNull('t1.deleted_at')
                                        // ->where('t1.meat_pplication_no','=',$application_no)
                                        ->where('t1.meat_pplication_no','LIKE','%'.$application_no)
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
       $get_meat_appli_renewal_status = DB::table('meat_renewal_license_tbl AS t1')
                                        ->select('t1.*')
                                        ->whereNull('t1.deleted_at')
                                        // ->where('t1.meat_pplication_no','=',$application_no)
                                        ->where('t1.renwal_liceans_no','LIKE','%'.$application_no)
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();                                


        $get_vehical_application_status = DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.*')
                                        ->whereNull('t1.deleted_at')
                                        // ->where('t1.transport_license_no','=',$application_no)
                                        ->where('t1.transport_license_no','LIKE','%'.$application_no)
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                
        $get_vehical_appli_renewal_status = DB::table('meat_transport_renewal_tbl AS t1')
                                        ->select('t1.*')
                                        ->whereNull('t1.deleted_at')
                                        // ->where('t1.transport_license_no','=',$application_no)
                                        ->where('t1.trans_renwal_liceans_no','LIKE','%'.$application_no)
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
        
        if(empty($get_meat_application_status) && empty($get_vehical_application_status) && empty($get_meat_appli_renewal_status) && empty($get_vehical_appli_renewal_status))
        {
            $serch_result = 'none';
            return view('user.home', compact('serch_result'));
        }
        
          if(!empty($get_vehical_appli_renewal_status))
        {  
            $type= "vehical_renewal_license";
            if($get_vehical_appli_renewal_status->status == 0)
            {
               $serch_result = "Pending";    
            }
            else if($get_vehical_appli_renewal_status->status == 1)
            {
               $serch_result = "Approve";    
            }
            else if($get_vehical_appli_renewal_status->status == 2)
            {
               $serch_result = "Reject";    
            }
            
            $get_details = $get_vehical_appli_renewal_status;
            
            // dd($get_details);
            
            return view('user.home', compact('serch_result','type','get_details'));
        }
        
         if(!empty($get_meat_appli_renewal_status))
        {  
            $type= "meat_renewal_license";
            if($get_meat_appli_renewal_status->status == 0)
            {
               $serch_result = "Pending";    
            }
            else if($get_meat_appli_renewal_status->status == 1)
            {
               $serch_result = "Approve";    
            }
            else if($get_meat_appli_renewal_status->status == 2)
            {
               $serch_result = "Reject";    
            }
            
            $get_details = $get_meat_appli_renewal_status;
            
            // dd($get_details);
            
            return view('user.home', compact('serch_result','type','get_details'));
        }

        if(!empty($get_vehical_application_status))
        {  
            $type= "vehical_license";
            if($get_vehical_application_status->status == 0)
            {
               $serch_result = "Pending";    
            }
            else if($get_vehical_application_status->status == 1)
            {
               $serch_result = "Approve";    
            }
            else if($get_vehical_application_status->status == 2)
            {
               $serch_result = "Reject";    
            }
            
            $get_details = $get_vehical_application_status;
            
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
    

    public function create()
    {
        $meattype_mst = MeatType_Master::orderBy('id','desc')->pluck('meat_name', 'id')->whereNull('deleted_at');
        // return $meattype_mst;
        
        return view('user.meat_license.meat_registration', compact('meattype_mst'));
    }

     public function self_decleration_view(request $request)
      {
        $mainid = Auth::guard('meatregistereduser')->user()->id;
        $meat_registration_pdf =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')

                                        ->where('t1.inserted_by', '=', $mainid)
                                      
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
        // return $meat_registration_view;
        
        return view('user.meat_license.self_decleration', compact('meat_registration_pdf'));
       }
    
    public function store(Request $request)
    {

    //   echo "hfdhg"; die;
      $mainid = Auth::guard('meatregistereduser')->user()->id;

      $check =  DB::table('meat_registration_tbl AS t1')
                                        ->select('*')
                                        ->where('t1.inserted_by', '=', $mainid)
                                        ->whereNull('t1.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        // ->whereMonth('inserted_dt', Carbon::now()->month)
                                        ->count();


      if($check > 0){

        return redirect('user/appli_form')->with('message','You Have already apply this Form.');

      }else{


        $this->validate($request, [
            
            // Basic Details
            'applicant_title_id' => 'required|numeric',
            'applicant_fname' => 'required|string',
            'applicant_mname' => 'required|string',
            'applicant_lname' => 'required|string',
            // 'appl_dob' => 'required|string',
            // 'appl_age' => 'required|string',
            'mobile_number' => 'required|string',
            'email' => 'required|string',
            // 'gender' => 'required|string',
            'aadhar_number' => 'required|string',
            
            // Residential Address of Applicant
            'house_number' => 'required|string',
            // 'house_name' => 'required|string',
            'street_1' => 'required|string',
            // 'street_2' => 'required|string',
            'area_1' => 'required|string',
            // 'area_2' => 'required|string',
            'country_id' => 'required|string',
            'state_id' => 'required|string',
            'district_id' => 'required|string',
            'taluka_id' => 'required|string',
            'zipcode' => 'required|string',
            
            // Business Details
            'business_name' => 'required|string',
            'business_type' => 'required|numeric',
            'meat_type' => 'required|string',
            'per_day_capacity' => 'required|string',
            'provision_water' => 'required|numeric',
            'provision_electricty' => 'required|numeric',
            'business_address' => 'required|string',
            'sewerage_disposing' => 'required|numeric',
            // 'prcision_dispose_id' => 'required|string',
            'place_id' => 'required|numeric',
            
            'regi_authority_name' => 'required|string',
            'register_number' => 'required|string',
            'valid_till' => 'required|string',
             
             'areaof_business_place' => 'required|string',
             'business_place' => 'required|numeric',
            //  'business_place_other' => 'required|string',
            
            // Upload Document
            // 'meat_license_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            // 'fee_receipt_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            // 'authority_letter_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'adharcard_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'residitional_proof_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'legal_business_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'business_registration_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            
            // 'agreement_owner_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            // 'noc_owner_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
           
            'property_tax_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            
            'paid_water_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            // 'paid_receipt_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'treatment_authorized_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            
            'fitness_certificate_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'issued_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            // 'registration_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            
            'slaughter_letter_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'applicant_signature' => 'required|mimes:jpeg,png,jpg|max:2048',
            'profile_photo' => 'required|mimes:jpeg,png,jpg|max:2048',

         ],[
              // Basic Details
              'applicant_title_id.required' => 'Applicant Title is required',
              'applicant_fname.required' => 'Applicant First Name is required',
              'applicant_mname.required' => 'Applicant Middle Name is required',
              'applicant_lname.required' => 'Applicant Last Name is required',
            //   'appl_dob.required' => 'Date of Birth is required',
            //   'appl_age.required' => 'Age is required',
              'mobile_number.required' => 'Mobile Number is required',
              'email.required' => 'Email Id is required',
            //   'gender.required' => 'Gender is required',
            //   'aadhar_number.required' => 'Aadhar Number is required',
              
              // Residential Address of Applicant
              'house_number.required' => 'House Number is required',
            //   'house_name.required' => 'House Name is required',
              'street_1.required' => 'Street 1 is required',
              'area_1.required' => 'Area 1 is required',
              'country_id.required' => 'Country is required',
              'state_id.required' => 'State is required',
              'district_id.required' => 'District is required',
              'taluka_id.required' => 'Taluka is required',
              'zipcode.required' => 'Zip Code is required',
              
              // Business Details
              'business_name.required' => 'Name of the business is required',
              'business_type.required' => 'Kind of Business is required',
              'meat_type.required' => 'Meat Type is required',
              'per_day_capacity.required' => 'Per Day Capacity is required',
              'provision_water.required' => 'Provision of water is required',
              'provision_electricty.required' => 'Provision of electricity is required',
              'business_address.required' => 'Address of the business is required',
              'sewerage_disposing.required' => 'Provision of sewerage for disposing effluent is required',
            //   'prcision_dispose_id.required' => 'If not explain provision to dispose effluent is required',
              'place_id.required' => 'Is place is located at least 50mt. away form place of worship / educational institute / hospital & clinic is required',
              
              'regi_authority_name.required' => 'Registration authority name is required',
              
              'regi_authority_name.required' => 'Registration authority name is required',
              'register_number.required' => 'Registration nuber is required',
              'valid_till.required' =>     'valid till Date is required',
              'areaof_business_place.required' => 'area of business place is required',
              
               'business_place.required' => 'business place is required',
                // 'business_place_other.required' => 'area of business place other is required',
              
              // Upload Document
            //   'meat_license_doc.required' => 'Meat license form is required',
            //   'meat_license_doc.max' => 'The file size should be less than 2MB.',
            //   'meat_license_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
            
            //   'fee_receipt_doc.required' => 'Fee receipt is required',
            //   'fee_receipt_doc.max' => 'The file size should be less than 2MB.',
            //   'fee_receipt_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
            //   'authority_letter_doc.required' => 'Authority letter / power of attorney in the name of applicant is required',
            //   'authority_letter_doc.max' => 'The file size should be less than 2MB.',
            //   'authority_letter_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
            
              'adharcard_doc.required' => 'applicant Adharcard is required',
              'adharcard_doc.max' => 'The file size should be less than 2MB.',
              'adharcard_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
              'residitional_proof_doc.required' => 'Ration card, electricity / telephone bill. is required',
              'residitional_proof_doc.max' => 'The file size should be less than 2MB.',
              'residitional_proof_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
            
              'legal_business_doc.required' => 'legal document of the business place is required',
              'legal_business_doc.max' => 'The file size should be less than 2MB.',
              'legal_business_doc.mimes' => 'Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
              'business_registration_doc.required' => 'Business registration certificate is required',
              'business_registration_doc.max' => 'The file size should be less than 2MB.',
              'business_registration_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
            //   'agreement_owner_doc.required' => 'Agreement duly executed with owner is required',
            //   'agreement_owner_doc.max' => 'The file size should be less than 2MB.',
            //   'agreement_owner_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
            
            //   'noc_owner_doc.required' => 'NOC from owner is required',
            //   'noc_owner_doc.max' => 'The file size should be less than 2MB.',
            //   'noc_owner_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
              'property_tax_doc.required' => 'Receipt of recently paid property tax is required',
              'property_tax_doc.max' => 'The file size should be less than 2MB.',
              'property_tax_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
              'paid_water_doc.required' => 'Receipt of recently paid water is required',
              'paid_water_doc.max' => 'The file size should be less than 2MB.',
              'paid_water_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
            
            //   'paid_receipt_doc.required' => 'CESS / LBT Registration certificate and recently paid receipt is required',
            //   'paid_receipt_doc.max' => 'The file size should be less than 2MB.',
            //   'paid_receipt_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
              'treatment_authorized_doc.required' => 'Pest control treatment certificate issued from authorized agency is required',
              'treatment_authorized_doc.max' => 'The file size should be less than 2MB.',
              'treatment_authorized_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
              'fitness_certificate_doc.required' => 'Medical fitness certificate issued by Municipal hospital is required',
              'fitness_certificate_doc.max' => 'The file size should be less than 2MB.',
              'fitness_certificate_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
            
              'issued_doc.required' => 'Document issued by APEDA, MPCB(ETP), FSSAI  is required',
              'issued_doc.max' => 'The file size should be less than 2MB.',
              'issued_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
            //   'registration_doc.required' => 'Address proof is required',
            //   'registration_doc.max' => 'The file size should be less than 2MB.',
            //   'registration_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
              'rabies_vaccination_certificate_doc.required' => 'Registration documents of all vehicles is required',
              'rabies_vaccination_certificate_doc.max' => 'The file size should be less than 2MB.',
              'rabies_vaccination_certificate_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
            
              'slaughter_letter_doc.required' => 'Details & authority letter from authorized slaughter house / poultry form & authority letter is required',
              'slaughter_letter_doc.max' => 'The file size should be less than 2MB.',
              'slaughter_letter_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
              
              'applicant_signature.required' => 'Applicant signature is required',
              'applicant_signature.max' => 'The file size should be less than 2MB.',
              'applicant_signature.mimes' => ' Only files in .jpg, .jpeg, .png format can be uploaded .',
              
              'profile_photo.required' => 'Applicant profile photo is required',
              'profile_photo.max' => 'The file size should be less than 2MB.',
              'profile_photo.mimes' => ' Only files in .jpg, .jpeg, .png format can be uploaded .',
              
             ]);

        $data = new MeatRegistration_Model();
        
        // ====== Dog registration Document Upload
        // if(!empty($request->hasFile('meat_license_doc'))){
        //     $image = $request->file('meat_license_doc');
        //     $image_name = $image->getClientOriginalName();
        //     $extension = $image->getClientOriginalExtension();
        //     $new_name = time().rand(10,999).'.'.$extension;
        //     $image->move(public_path('/PMC_PET_Registration/meat_file/meat_license_doc'),$new_name);

        //     $image_path = "/PMC_PET_Registration/meat_file/meat_license_doc" . $image_name;
        //     $data->meat_license_doc = $new_name;
        // }
        
        // if(!empty($request->hasFile('fee_receipt_doc'))){
        //     $image = $request->file('fee_receipt_doc');
        //     $image_name = $image->getClientOriginalName();
        //     $extension = $image->getClientOriginalExtension();
        //     $new_name = time().rand(10,999).'.'.$extension;
        //     $image->move(public_path('/PMC_PET_Registration/meat_file/fee_receipt_doc'),$new_name);

        //     $image_path = "/PMC_PET_Registration/meat_file/fee_receipt_doc" . $image_name;
        //     $data->fee_receipt_doc = $new_name;
        // }
        
        // if(!empty($request->hasFile('authority_letter_doc'))){
        //     $image = $request->file('authority_letter_doc');
        //     $image_name = $image->getClientOriginalName();
        //     $extension = $image->getClientOriginalExtension();
        //     $new_name = time().rand(10,999).'.'.$extension;
        //     $image->move(public_path('/PMC_PET_Registration/meat_file/authority_letter_doc'),$new_name);

        //     $image_path = "/PMC_PET_Registration/meat_file/authority_letter_doc" . $image_name;
        //     $data->authority_letter_doc = $new_name;
        // }
        
        if(!empty($request->hasFile('adharcard_doc'))){
            $image = $request->file('adharcard_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/adharcard_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/adharcard_doc" . $image_name;
            $data->adharcard_doc = $new_name;
        }
        
        
        
        if(!empty($request->hasFile('residitional_proof_doc'))){
            $image = $request->file('residitional_proof_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/residitional_proof_doc'),$new_name);
            $image_path = "/PMC_Meat_Registration/meat_file/residitional_proof_doc" . $image_name;
            $data->residitional_proof_doc = $new_name;
        }
        
        if(!empty($request->hasFile('legal_business_doc'))){
            $image = $request->file('legal_business_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/legal_business_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/legal_business_doc" . $image_name;
            $data->legal_business_doc = $new_name;
        }
        
        if(!empty($request->hasFile('business_registration_doc'))){
            $image = $request->file('business_registration_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/business_registration_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/business_registration_doc" . $image_name;
            $data->business_registration_doc = $new_name;
        }
        
        
        // if(!empty($request->hasFile('agreement_owner_doc'))){
        //     $image = $request->file('agreement_owner_doc');
        //     $image_name = $image->getClientOriginalName();
        //     $extension = $image->getClientOriginalExtension();
        //     $new_name = time().rand(10,999).'.'.$extension;
        //     $image->move(public_path('/PMC_PET_Registration/meat_file/agreement_owner_doc'),$new_name);

        //     $image_path = "/PMC_PET_Registration/meat_file/agreement_owner_doc" . $image_name;
        //     $data->agreement_owner_doc = $new_name;
        // }
        
        // if(!empty($request->hasFile('noc_owner_doc'))){
        //     $image = $request->file('noc_owner_doc');
        //     $image_name = $image->getClientOriginalName();
        //     $extension = $image->getClientOriginalExtension();
        //     $new_name = time().rand(10,999).'.'.$extension;
        //     $image->move(public_path('/PMC_PET_Registration/meat_file/noc_owner_doc'),$new_name);

        //     $image_path = "/PMC_PET_Registration/meat_file/noc_owner_doc" . $image_name;
        //     $data->noc_owner_doc = $new_name;
        // }
        
        if(!empty($request->hasFile('property_tax_doc'))){
            $image = $request->file('property_tax_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/property_tax_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/property_tax_doc" . $image_name;
            $data->property_tax_doc = $new_name;
        }
        
        
        if(!empty($request->hasFile('paid_water_doc'))){
            $image = $request->file('paid_water_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/paid_water_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/paid_water_doc" . $image_name;
            $data->paid_water_doc = $new_name;
        }
        
        // if(!empty($request->hasFile('paid_receipt_doc'))){
        //     $image = $request->file('paid_receipt_doc');
        //     $image_name = $image->getClientOriginalName();
        //     $extension = $image->getClientOriginalExtension();
        //     $new_name = time().rand(10,999).'.'.$extension;
        //     $image->move(public_path('/PMC_PET_Registration/meat_file/paid_receipt_doc'),$new_name);

        //     $image_path = "/PMC_PET_Registration/meat_file/paid_receipt_doc" . $image_name;
        //     $data->paid_receipt_doc = $new_name;
        // }
        
        if(!empty($request->hasFile('treatment_authorized_doc'))){
            $image = $request->file('treatment_authorized_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/treatment_authorized_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/treatment_authorized_doc" . $image_name;
            $data->treatment_authorized_doc = $new_name;
        }
        
        
        
        if(!empty($request->hasFile('fitness_certificate_doc'))){
            $image = $request->file('fitness_certificate_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/fitness_certificate_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/fitness_certificate_doc" . $image_name;
            $data->fitness_certificate_doc = $new_name;
        }
        
        
        if(!empty($request->hasFile('issued_doc'))){
            $image = $request->file('issued_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/issued_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/issued_doc" . $image_name;
            $data->issued_doc = $new_name;
        }
        
        // if(!empty($request->hasFile('registration_doc'))){
        //     $image = $request->file('registration_doc');
        //     $image_name = $image->getClientOriginalName();
        //     $extension = $image->getClientOriginalExtension();
        //     $new_name = time().rand(10,999).'.'.$extension;
        //     $image->move(public_path('/PMC_PET_Registration/meat_file/registration_doc'),$new_name);

        //     $image_path = "/PMC_PET_Registration/meat_file/registration_doc" . $image_name;
        //     $data->registration_doc = $new_name;
        // }
        
        
        if(!empty($request->hasFile('slaughter_letter_doc'))){
            $image = $request->file('slaughter_letter_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/slaughter_letter_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/slaughter_letter_doc" . $image_name;
            $data->slaughter_letter_doc = $new_name;
        }
        
        if(!empty($request->hasFile('applicant_signature'))){
            $image = $request->file('applicant_signature');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/applicant_signature'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/applicant_signature" . $image_name;
            $data->applicant_signature = $new_name;
        }
        
        if(!empty($request->hasFile('profile_photo'))){
            $image = $request->file('profile_photo');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/profile_photo'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/profile_photo" . $image_name;
            $data->profile_photo = $new_name;
        }
        
        // Basic Details
        $data->applicant_title_id = $request->get('applicant_title_id');
        $data->applicant_fname = $request->get('applicant_fname');
        $data->applicant_mname = $request->get('applicant_mname');
        $data->applicant_lname = $request->get('applicant_lname');
        // $data->appl_dob = date('d-m-Y', strtotime($request->get('appl_dob')));
        // $data->appl_age = $request->get('appl_age');
        $data->mobile_number = $request->get('mobile_number');
        $data->email = $request->get('email');
        // $data->gender = $request->get('gender');
        $data->aadhar_number = $request->get('aadhar_number');
        
        // Residential Address of Applicant
        $data->house_number = $request->get('house_number');
        $data->house_name = $request->get('house_name');
        $data->street_1 = $request->get('street_1');
        $data->street_2 = $request->get('street_2');
        $data->area_1 = $request->get('area_1');
        $data->area_2 = $request->get('area_2');
        $data->country_id = $request->get('country_id');
        $data->state_id = $request->get('state_id');
        $data->district_id = $request->get('district_id');
        $data->taluka_id = $request->get('taluka_id');
        $data->zipcode = $request->get('zipcode');
        
        // Business Details
        $data->business_name = $request->get('business_name');
        $data->business_type = $request->get('business_type');
        $data->meat_type = $request->get('meat_type');
        $data->per_day_capacity = $request->get('per_day_capacity');
        $data->provision_water = $request->get('provision_water');
        $data->provision_electricty = $request->get('provision_electricty');
        $data->business_address = $request->get('business_address');
        $data->sewerage_disposing = $request->get('sewerage_disposing');
        $data->prcision_dispose_id = $request->get('prcision_dispose_id');
        $data->place_id = $request->get('place_id');
        
        $data->regi_authority_name = $request->get('regi_authority_name');
        $data->register_number = $request->get('register_number');
        $data->valid_till = $request->get('valid_till');
        
        $data->areaof_business_place = $request->get('areaof_business_place');
        $data->business_place = $request->get('business_place');
        $data->business_place_other = $request->get('business_place_other');
        
        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::guard('meatregistereduser')->user()->id;
        $data->save();
        
        $unique_id = "PMC-MET".rand(1000,10000000);
        $update = [
            'meat_pplication_no' => $unique_id.$data->id ,
            // 'inserted_by' => $data->id,
        ];
        
        
        MeatRegistration_Model::where('id', $data->id)->update($update);
        
        $app_no = $unique_id.$data->id;
        $scheme = 'Meat Registration Form';
        $domain = "https://".$_SERVER['HTTP_HOST'];
        $project_folder = 'PMC_MeatRegistration';
        
        $msg = "Your application no:- $app_no for $scheme is received at PMC office. You can also track your application on $domain/$project_folder/ PMC.";
        $tempID= '1207167447455213113';
        $this->sendsms($msg,$request->mobile_number,$tempID);

        // return redirect('/user/self_decleration')->with('message','Your Record Added Successfully.');

        return redirect('user/appli_form')->with('message','Your Record Added Successfully.');

     }

    }
    
    
    // Meat Registration Terms & Conditions
    public function Terms_Conditions()
    {
        // if (Auth::guard('meatregistereduser')->check()) {
        //     return view('user.meat_license.meat_registration_terms');
        // } else {
        //     return redirect('/user/login');
        // }
        
         if (Auth::guard('meatregistereduser')->check()) {
            
             $mainid = Auth::guard('meatregistereduser')->user()->id;
        
       
        
        $data =   DB::table('meat_registration_tbl AS t1')
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
             return view('user.meat_license.meat_registration_terms');
        
        }
        
           
        } else {
            return redirect('user/appli_form');
        }
        
        
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
    
    
    
     public function User_ApplicationForm(Request $request)
    {
        if (Auth::guard('meatregistereduser')->check()) {
            $user_id = Auth::guard('meatregistereduser')->user()->id;
            
            $user_list =  DB::table('meat_registration_tbl AS t1')
                            ->select('t1.*', 't2.meat_name','t3.dist_name','t4.taluka_name'
                                    )
                                    
                            ->leftJoin('meat_type_mst AS t2', 't2.id', '=', 't1.meat_type')
                          
                            ->leftJoin('mst_dist AS t3', 't3.id', '=', 't1.district_id')
                            ->leftJoin('mst_taluka AS t4', 't4.id', '=', 't1.taluka_id')
                           
                            ->where('t1.inserted_by', '=',$user_id)
                            ->whereNull('t1.deleted_at')
                            ->whereNull('t2.deleted_at')
                            ->whereNull('t3.deleted_at')
                            ->whereNull('t4.deleted_at')
                            ->orderBy('t1.id', 'DESC')
                            ->get();
                            
              $meats_license_status =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.id', 't1.status')
                                        ->where('t1.inserted_by', '=',$user_id)
                                        ->orderBy('t1.id', 'DESC')
                                        ->whereNull('t1.deleted_at')
                                        ->first();
            $meat_license_status  = $meats_license_status ? $meats_license_status->status : 0;        
                            
                            
           $renewal_list =  DB::table('meat_renewal_license_tbl AS t1')
                            ->select('t1.*', 't2.meat_name','t3.dist_name','t4.taluka_name'
                                    )
                                    
                            ->leftJoin('meat_type_mst AS t2', 't2.id', '=', 't1.meat_type')
                          
                            ->leftJoin('mst_dist AS t3', 't3.id', '=', 't1.district_id')
                            ->leftJoin('mst_taluka AS t4', 't4.id', '=', 't1.taluka_id')
                           

                            ->where('t1.inserted_by', '=',$user_id)
                            ->whereNull('t1.deleted_at')
                            ->whereNull('t2.deleted_at')
                            ->whereNull('t3.deleted_at')
                            ->whereNull('t4.deleted_at')
                           
                            ->orderBy('t1.id', 'DESC')
                            ->get();                 
       
       
 $meats_renewal_license_status =  DB::table('meat_renewal_license_tbl AS t1')
                                        ->select('t1.id', 't1.status')
                                        ->where('t1.inserted_by', '=',$user_id)
                                        ->orderBy('t1.id', 'DESC')
                                        ->whereNull('t1.deleted_at')
                                        ->first();
            $meatrenewal_license_status  = $meats_renewal_license_status ? $meats_renewal_license_status->status : 0;        


            //$users_id = Auth::guard('meatregistereduser')->user()->id;
            // return $user_id;
            
            $users_list =   DB::table('meat_transport_register_tbl AS t1')
                            ->select('t1.*', 't2.meat_name','t3.dist_name','t4.taluka_name'
                                    )
                                    
                            ->leftJoin('meat_type_mst AS t2', 't2.id', '=', 't1.meat_type')
                            
                            ->leftJoin('mst_dist AS t3', 't3.id', '=', 't1.district_id')
                            ->leftJoin('mst_taluka AS t4', 't4.id', '=', 't1.taluka_id')
                            

                            ->where('t1.inserted_by', '=',$user_id)
                            ->whereNull('t1.deleted_at')
                            ->whereNull('t2.deleted_at')
                            ->whereNull('t3.deleted_at')
                            ->whereNull('t4.deleted_at')
                           
                            ->orderBy('t1.id', 'DESC')
                            ->get();
                            
                            
        $transport_license_status =  DB::table('meat_transport_register_tbl AS t1')
                                        ->select('t1.id', 't1.status')
                                        ->where('t1.inserted_by', '=',$user_id)
                                        ->orderBy('t1.id', 'DESC')
                                        ->whereNull('t1.deleted_at')
                                        ->first();
        $vehicle_license_status  = $transport_license_status ? $transport_license_status->status : 0; 
                            
                            
  $transport_renewal_list =   DB::table('meat_transport_renewal_tbl AS t1')
                            ->select('t1.*', 't2.meat_name','t3.dist_name','t4.taluka_name'
                                    )
                                    
                            ->leftJoin('meat_type_mst AS t2', 't2.id', '=', 't1.meat_type')
                            
                            ->leftJoin('mst_dist AS t3', 't3.id', '=', 't1.district_id')
                            ->leftJoin('mst_taluka AS t4', 't4.id', '=', 't1.taluka_id')
                            

                            ->where('t1.inserted_by', '=',$user_id)
                            ->whereNull('t1.deleted_at')
                            ->whereNull('t2.deleted_at')
                            ->whereNull('t3.deleted_at')
                            ->whereNull('t4.deleted_at')
                           
                            ->orderBy('t1.id', 'DESC')
                            ->get();
            // return $user_list;
            
        $transport_renewal_license_status =  DB::table('meat_transport_renewal_tbl AS t1')
                                        ->select('t1.id', 't1.status')
                                        ->where('t1.inserted_by', '=',$user_id)
                                        ->orderBy('t1.id', 'DESC')
                                        ->whereNull('t1.deleted_at')
                                        ->first();
        $vehicle_renewal_license_status  = $transport_renewal_license_status ? $transport_renewal_license_status->status : 0; 
        
            
            return view('user.meat_license.user_applicant_form', compact('user_list', 'meat_license_status','users_list','meatrenewal_license_status','renewal_list','vehicle_license_status','transport_renewal_list','vehicle_renewal_license_status'));
        } else {
            return redirect('/user/login');
        }
        
    }
    
    // ======== View Auth User Application Form 
    public function User_ApplicationForm_View(Request $request, $application_id, $user_type)
    {
        
        $meattype_mst = MeatType_Master::orderBy('id','desc')->pluck('meat_name', 'id')->whereNull('deleted_at');


        if($user_type == 'Meat_Registration')
        {
            $data =   DB::table('meat_registration_tbl AS t1')
                            ->select('t1.*', 't2.meat_name','t3.dist_name','t4.taluka_name'
                                    )
                                    
                            ->leftJoin('meat_type_mst AS t2', 't2.id', '=', 't1.meat_type')
                            // ->leftJoin('department_mst AS t3', 't3.id', '=', 't1.dept_id')
                            ->leftJoin('mst_dist AS t3', 't3.id', '=', 't1.district_id')
                            ->leftJoin('mst_taluka AS t4', 't4.id', '=', 't1.taluka_id')
                            // ->leftJoin('mst_dog_breed AS t6', 't6.id', '=', 't1.breed_id')
                            // ->leftJoin('user_bank_details_tbl AS t7', 't7.user_id', '=', 't1.inserted_by')
                            // ->leftJoin('mst_packege AS t8', 't8.id', '=', 't7.duration')
                            // ->leftJoin('mst_packege AS t9', 't9.id', '=', 't7.amount')

                             ->where('t1.id', '=', $application_id)
                            ->whereNull('t1.deleted_at')
                            ->whereNull('t2.deleted_at')
                            ->whereNull('t3.deleted_at')
                            ->whereNull('t4.deleted_at')
                            // ->whereNull('t5.deleted_at')
                            // ->whereNull('t6.deleted_at')
                            ->orderBy('t1.id', 'DESC')
                            ->first();
                            
            // return $data;
            
          return view('user.meat_license.user_applicant_form_view', compact('data', 'user_type','meattype_mst'));
        }
        
    }
    
    
       // ======== View Auth User Application Form 
    public function ApplicationForm_View(Request $request, $application_id)
    {
        
        $meattype_mst = MeatType_Master::orderBy('id','desc')->pluck('meat_name', 'id')->whereNull('deleted_at');


       $meat_registration_view =  DB::table('meat_registration_tbl AS t1')
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
        
        return view('user.meat_license.view', compact('meat_registration_view','meattype_mst'));
            
          //return view('user.meat_license.user_applicant_form_view', compact('data', 'user_type','meattype_mst'));
        }
        
    
    public function self_decleration_accept(request $request, $id)
    {

        $update = [
            'self_decleration' => 1,
            // 'approve_date' => date("Y-m-d H:i:s"),
            // 'approve_by' => Auth::user()->id,
        ];
        
        MeatRegistration_Model::where('id', $id)->update($update);

        return redirect('/')->with('message', 'Meat Registration Form Record Added Successfully'); //Redirect user somewhere
    }


    public function self_affadevit_pdf(request $request,$id)
    {
        // $mainid = Auth::guard('meatregistereduser')->user()->id;
        $meat_registration_pdf =  DB::table('meat_registration_tbl AS t1')
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
        
        return view('user.meat_license.self_affadevit_pdf', compact('meat_registration_pdf'));
       }
    
    

    public function updatemeatregiter(Request $request, $id)
    {
        $this->validate($request, [
            
            // Basic Details
            'applicant_title_id' => 'required|numeric',
            'applicant_fname' => 'required|string',
            'applicant_mname' => 'required|string',
            'applicant_lname' => 'required|string',
           
            'mobile_number' => 'required|string',
            'email' => 'required|string',
           
            'aadhar_number' => 'required|string',
            
            // Residential Address of Applicant
            'house_number' => 'required|string',
          
            'street_1' => 'required|string',
            
            'area_1' => 'required|string',
           
            'country_id' => 'required|string',
            'state_id' => 'required|string',
            'district_id' => 'required|string',
            'taluka_id' => 'required|string',
            'zipcode' => 'required|string',
            
            // Business Details
            'business_name' => 'required|string',
            'business_type' => 'required|numeric',
            'meat_type' => 'required|string',
            'per_day_capacity' => 'required|string',
            'provision_water' => 'required|numeric',
            'provision_electricty' => 'required|numeric',
            'business_address' => 'required|string',
            'sewerage_disposing' => 'required|numeric',
           
            'place_id' => 'required|numeric',
            
            'regi_authority_name' => 'required|string',
            'register_number' => 'required|string',
            'valid_till' => 'required|string',
             
             'areaof_business_place' => 'required|string',
             'business_place' => 'required|numeric',
           
           

         ],[
              // Basic Details
              'applicant_title_id.required' => 'Applicant Title is required',
              'applicant_fname.required' => 'Applicant First Name is required',
              'applicant_mname.required' => 'Applicant Middle Name is required',
              'applicant_lname.required' => 'Applicant Last Name is required',
            
              'mobile_number.required' => 'Mobile Number is required',
              'email.required' => 'Email Id is required',
           
              'aadhar_number.required' => 'Aadhar Number is required',
              
              // Residential Address of Applicant
              'house_number.required' => 'House Number is required',
         
              'street_1.required' => 'Street 1 is required',
              'area_1.required' => 'Area 1 is required',
              'country_id.required' => 'Country is required',
              'state_id.required' => 'State is required',
              'district_id.required' => 'District is required',
              'taluka_id.required' => 'Taluka is required',
              'zipcode.required' => 'Zip Code is required',
              
              // Business Details
              'business_name.required' => 'Name of the business is required',
              'business_type.required' => 'Kind of Business is required',
              'meat_type.required' => 'Meat Type is required',
              'per_day_capacity.required' => 'Per Day Capacity is required',
              'provision_water.required' => 'Provision of water is required',
              'provision_electricty.required' => 'Provision of electricity is required',
              'business_address.required' => 'Address of the business is required',
              'sewerage_disposing.required' => 'Provision of sewerage for disposing effluent is required',
            
              'place_id.required' => 'Is place is located at least 50mt. away form place of worship / educational institute / hospital & clinic is required',
              
              'regi_authority_name.required' => 'Registration authority name is required',
              
              'regi_authority_name.required' => 'Registration authority name is required',
              'register_number.required' => 'Registration nuber is required',
              'valid_till.required' =>     'valid till Date is required',
              'areaof_business_place.required' => 'area of business place is required',
              
               'business_place.required' => 'business place is required',
            
             
             ]);

        //$data = new ColdStorageRegistration_Model();

        //  $data = MeatRegistration_Model::find($id);
         
         $data = MeatRegistration_Model::updateOrCreate(['id' => $id]);
        
        
        
        if(!empty($request->hasFile('adharcard_doc'))){
            $image = $request->file('adharcard_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/adharcard_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/adharcard_doc" . $image_name;
            $data->adharcard_doc = $new_name;
        
         }else{
            unset($data->adharcard_doc);
        }
        
        
        
        if(!empty($request->hasFile('residitional_proof_doc'))){
            $image = $request->file('residitional_proof_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/residitional_proof_doc'),$new_name);
            $image_path = "/PMC_Meat_Registration/meat_file/residitional_proof_doc" . $image_name;
            $data->residitional_proof_doc = $new_name;
        
        }else{
            unset($data->residitional_proof_doc);
        }
        
        if(!empty($request->hasFile('legal_business_doc'))){
            $image = $request->file('legal_business_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/legal_business_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/legal_business_doc" . $image_name;
            $data->legal_business_doc = $new_name;

        }else{
            unset($data->legal_business_doc);
        }
        
        if(!empty($request->hasFile('business_registration_doc'))){
            $image = $request->file('business_registration_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/business_registration_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/business_registration_doc" . $image_name;
            $data->business_registration_doc = $new_name;
       }else{
            unset($data->business_registration_doc);
        }
        
        
       
        
        if(!empty($request->hasFile('property_tax_doc'))){
            $image = $request->file('property_tax_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/property_tax_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/property_tax_doc" . $image_name;
            $data->property_tax_doc = $new_name;
        }else{
            unset($data->property_tax_doc);
        }
        
        
        if(!empty($request->hasFile('paid_water_doc'))){
            $image = $request->file('paid_water_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/paid_water_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/paid_water_doc" . $image_name;
            $data->paid_water_doc = $new_name;
         }else{
            unset($data->paid_water_doc);
        }
        
        
        
        if(!empty($request->hasFile('treatment_authorized_doc'))){
            $image = $request->file('treatment_authorized_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/treatment_authorized_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/treatment_authorized_doc" . $image_name;
            $data->treatment_authorized_doc = $new_name;
         }else{
            unset($data->treatment_authorized_doc);
        }
        
        
        
        if(!empty($request->hasFile('fitness_certificate_doc'))){
            $image = $request->file('fitness_certificate_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/fitness_certificate_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/fitness_certificate_doc" . $image_name;
            $data->fitness_certificate_doc = $new_name;
         }else{
            unset($data->fitness_certificate_doc);
        }
        
        if(!empty($request->hasFile('issued_doc'))){
            $image = $request->file('issued_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/issued_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/issued_doc" . $image_name;
            $data->issued_doc = $new_name;
       }else{
            unset($data->issued_doc);
        }
        
     
        
        
        if(!empty($request->hasFile('slaughter_letter_doc'))){
            $image = $request->file('slaughter_letter_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/slaughter_letter_doc'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/slaughter_letter_doc" . $image_name;
            $data->slaughter_letter_doc = $new_name;
        }else{
            unset($data->slaughter_letter_doc);
        }
        
        if(!empty($request->hasFile('applicant_signature'))){
            $image = $request->file('applicant_signature');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/applicant_signature'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/applicant_signature" . $image_name;
            $data->applicant_signature = $new_name;
        }else{
            unset($data->applicant_signature);
        }
        
        if(!empty($request->hasFile('profile_photo'))){
            $image = $request->file('profile_photo');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time().rand(10,999).'.'.$extension;
            $image->move(public_path('/PMC_Meat_Registration/meat_file/profile_photo'),$new_name);

            $image_path = "/PMC_Meat_Registration/meat_file/profile_photo" . $image_name;
            $data->profile_photo = $new_name;
         }else{
            unset($data->profile_photo);
        }
        
        // Basic Details
        $data->applicant_title_id = $request->get('applicant_title_id');
        $data->applicant_fname = $request->get('applicant_fname');
        $data->applicant_mname = $request->get('applicant_mname');
        $data->applicant_lname = $request->get('applicant_lname');
        
        $data->mobile_number = $request->get('mobile_number');
        $data->email = $request->get('email');
     
        $data->aadhar_number = $request->get('aadhar_number');
        
        // Residential Address of Applicant
        $data->house_number = $request->get('house_number');
        $data->house_name = $request->get('house_name');
        $data->street_1 = $request->get('street_1');
        $data->street_2 = $request->get('street_2');
        $data->area_1 = $request->get('area_1');
        $data->area_2 = $request->get('area_2');
        $data->country_id = $request->get('country_id');
        $data->state_id = $request->get('state_id');
        $data->district_id = $request->get('district_id');
        $data->taluka_id = $request->get('taluka_id');
        $data->zipcode = $request->get('zipcode');
        
        // Business Details
        $data->business_name = $request->get('business_name');
        $data->business_type = $request->get('business_type');
        $data->meat_type = $request->get('meat_type');
        $data->per_day_capacity = $request->get('per_day_capacity');
        $data->provision_water = $request->get('provision_water');
        $data->provision_electricty = $request->get('provision_electricty');
        $data->business_address = $request->get('business_address');
        $data->sewerage_disposing = $request->get('sewerage_disposing');
        $data->prcision_dispose_id = $request->get('prcision_dispose_id');
        $data->place_id = $request->get('place_id');
        
        $data->regi_authority_name = $request->get('regi_authority_name');
        $data->register_number = $request->get('register_number');
        $data->valid_till = $request->get('valid_till');
        
        $data->areaof_business_place = $request->get('areaof_business_place');
        $data->business_place = $request->get('business_place');
        $data->business_place_other = $request->get('business_place_other');
        // $data->status = '0';
        
         if($data->status=1 && $data->hod_status == 2 && $data->final_approve =2){
            $data->hod_status = 0;
            $data->status = 0;
            $data->final_approve = 0;
       }
       
       if($data->status=1 && $data->hod_status == 1 && $data->final_approve =2){
           $data->hod_status = 0;
            $data->status = 0;
            $data->final_approve = 0;
       }
       
       if($data->status=2 && $data->hod_status == 1 && $data->final_approve =1){
           $data->hod_status = 0;
            $data->status = 0;
            $data->final_approve = 0;
       }
       
       if($data->status=1 && $data->hod_status == 2 && $data->final_approve =1){
           $data->hod_status = 0;
            $data->status = 0;
            $data->final_approve = 0;
       }
       
       if($data->status=2 && $data->hod_status == 2 && $data->final_approve =2){
           $data->hod_status = 0;
            $data->status = 0;
            $data->final_approve = 0;
       }
        
        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();
            // 'inserted_by' => $data->id,
    
        
        
        // ColdStorageRegistration_Model::where('id', $data->id)->update($update);
        
        // $app_no = $unique_id.$data->id;
        // $scheme = 'Meat Registration Form';
        // $domain = "https://".$_SERVER['HTTP_HOST'];
        // $project_folder = 'PMC_Meat_Registration';
        
        // $msg = "Your application no:- $app_no for $scheme is received at PMC office. You can also track your application on $domain/$project_folder/ PMC.";
        // $tempID= '1207167447455213113';
        // $this->sendsms($msg,$request->mobile_number,$tempID);

        return redirect('user/appli_form')->with('message','Your Record Updated Successfully.');


        

        // return redirect()->route('taluka_master.index')->with('message','Your Record Updated Successfully.');
    }
    
    public function englishlicensepdf(request $request, $id, $status)
    {
        
           $user_id = Auth::guard('meatregistereduser')->user()->id;
        
           $meat_registration_pdf =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.meat_pplication_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date', 't5.hod_sign')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        ->where('t1.status', '=', $status)
                                        ->where('t1.id', '=', $id)
                                        ->where('t1.inserted_by', $user_id)
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
                          
                                        
        return view('user.meat_license.generate_english_meat_registration_pdf', compact('meat_registration_pdf','fiscalYear'));
    }
    
     public function marathilicensepdf(request $request, $id ,$status)
    {
           $user_id = Auth::guard('meatregistereduser')->user()->id;
           $meat_registration_pdf =  DB::table('meat_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.meat_pplication_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date', 't5.hod_sign')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        ->where('t1.status', '=', $status)
                                        ->where('t1.id', '=', $id)
                                        ->where('t1.inserted_by', $user_id)
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
                            
                                                        
                return view('user.meat_license.generate_marathi_meat_registration_pdf', compact('meat_registration_pdf', 'fiscalYear'));
    }
    
    
}
