@include('common.header')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>PET Application</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <!--<li class="breadcrumb-item"><a href="{{ url('/#') }}">PET Application</a></li>-->
                        <li class="breadcrumb-item active">PET Application</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form method="post" action="{{ url('/#') }}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="pd-20 card-box mb-30">
                                    <div class="form-group row">
                                        <?php
                                            $category_appli_id = '';
                                            
                                            if($pet_registration_view->category_appli_id == 1)
                                            {
                                                $category_appli_id = 'Individual';
                                            }
                                            else if($pet_registration_view->category_appli_id == 2)
                                            {
                                                $category_appli_id = 'Others';
                                            }
                                            
                                        ?>
                                        <label class="col-sm-2 col-form-label"><strong>अर्जाचा प्रकार  /<br> Category of Application : &nbsp; </strong></label>
                                        <div class="col-sm-4 pb-2">
                                            <input class="form-control " value="{{ $category_appli_id }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>प्रभाग / <br> Ward : </strong></label>
                                        <div class="col-sm-4 col-md-4 pb-2">
                                            <input class="form-control " value="{{ $pet_registration_view->ward_name }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row pb-2">
                                        <label class="col-sm-2"><strong>विभाग / <br> Department : </strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input class="form-control " value="{{ $pet_registration_view->dept_name }}" readonly>
                                        </div>
                                    </div>
                                    
                                    
                                    <strong class="pb-1">अर्जदाराचे नाव /<br> Name of Applicant :  </strong>
                                    <div class="form-group row">
                                        <?php
                                            $applicant_title_id = '';
                                            
                                            if($pet_registration_view->applicant_title_id == 1)
                                            {
                                                $applicant_title_id = 'Kum.';
                                            }
                                            else if($pet_registration_view->applicant_title_id == 2)
                                            {
                                                $applicant_title_id = 'M/s';
                                            }
                                            else if($pet_registration_view->applicant_title_id == 3)
                                            {
                                                $applicant_title_id = 'Smt.';
                                            }
                                            else if($pet_registration_view->applicant_title_id == 4)
                                            {
                                                $applicant_title_id = 'Ms.';
                                            }
                                            else if($pet_registration_view->applicant_title_id == 5)
                                            {
                                                $applicant_title_id = 'Mr.';
                                            }
                                            else if($pet_registration_view->applicant_title_id == 6)
                                            {
                                                $applicant_title_id = 'MrS.';
                                            }
                                            else if($pet_registration_view->applicant_title_id == 7)
                                            {
                                                $applicant_title_id = 'Dr.';
                                            }
                                            
                                        ?>
                                        <!--<label class="col-sm-1"><strong>Title : </strong></label>-->
                                        <div class="col-sm-3 col-md-3 p-2">
                                            <input class="form-control " value="{{ $applicant_title_id }}" readonly>
                                        </div>
                                        
                                        
                                        <!--<label class="col-sm-1"><strong>First Name : </strong></label>-->
                                        <div class="col-sm-3 col-md-3 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->applicant_fname }}" readonly>
                                        </div>
                                        
                                        <!--<label class="col-sm-1"><strong>Middle Name : </strong></label>-->
                                        <div class="col-sm-3 col-md-3 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->applicant_mname }}" readonly>
                                        </div>
                                        
                                        <!--<label class="col-sm-1"><strong>Last Name : </strong></label>-->
                                        <div class="col-sm-3 col-md-3 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->applicant_lname }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <strong class="pb-1">मालकाचे नाव / <br> Name of Owner's :  </strong>
                                    <div class="form-group row">
                                        <?php
                                            $owner_title_id = '';
                                            
                                            if($pet_registration_view->owner_title_id == 1)
                                            {
                                                $owner_title_id = 'Kum.';
                                            }
                                            else if($pet_registration_view->owner_title_id == 2)
                                            {
                                                $owner_title_id = 'M/s';
                                            }
                                            else if($pet_registration_view->owner_title_id == 3)
                                            {
                                                $owner_title_id = 'Smt.';
                                            }
                                            else if($pet_registration_view->owner_title_id == 4)
                                            {
                                                $owner_title_id = 'Ms.';
                                            }
                                            else if($pet_registration_view->owner_title_id == 5)
                                            {
                                                $owner_title_id = 'Mr.';
                                            }
                                            else if($pet_registration_view->owner_title_id == 6)
                                            {
                                                $owner_title_id = 'MrS.';
                                            }
                                            else if($pet_registration_view->owner_title_id == 7)
                                            {
                                                $owner_title_id = 'Dr.';
                                            }
                                            
                                        ?>
                                        <!--<label class="col-sm-1"><strong>Title : </strong></label>-->
                                        <div class="col-sm-3 col-md-3 p-2">
                                            <input class="form-control " value="{{ $owner_title_id }}" readonly>
                                        </div>
                                        
                                        
                                        <!--<label class="col-sm-1"><strong>First Name : </strong></label>-->
                                        <div class="col-sm-3 col-md-3 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->owner_fname }}" readonly>
                                        </div>
                                        
                                        <!--<label class="col-sm-1"><strong>Middle Name : </strong></label>-->
                                        <div class="col-sm-3 col-md-3 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->owner_mname }}" readonly>
                                        </div>
                                        
                                        <!--<label class="col-sm-1"><strong>Last Name : </strong></label>-->
                                        <div class="col-sm-3 col-md-3 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->owner_lname }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <strong class="pt-2 text-danger">
                                         मालकाचा निवासी पत्ता / Residential Address of Owner's
                                    </strong>
                                    <hr>
                                        
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>घर क्रमांक / <br> House Number  :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->house_number }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>घराचे नाव / <br> House Name  : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->house_name }}" readonly>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>रस्ता १ / <br> Street 1 : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->street_1 }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>रस्ता 2 / <br> Street 2  : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->street_2 }}" readonly>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>क्षेत्र १ / <br> Area 1 : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->area_1 }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>क्षेत्र 2 / <br> Area 2  : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->area_2 }}" readonly>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <?php
                                            $country_id = '';
                                            
                                            if($pet_registration_view->country_id == 1)
                                            {
                                                $country_id = 'India';
                                            }
                                            
                                        ?>
                                        
                                        <label class="col-sm-2"><strong>देश / <br> Country : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $country_id }}" readonly>
                                        </div>
                                        
                                        <?php
                                            $state_id = '';
                                            
                                            if($pet_registration_view->state_id == 1)
                                            {
                                                $state_id = 'Maharashtra';
                                            }
                                            
                                            
                                        ?>
                                        <label class="col-sm-2"><strong>राज्य / <br> State : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $state_id }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>जिल्हा / <br> District : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->dist_name }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>तालुका / <br> Taluka  : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->taluka_name }}" readonly>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>पिनकोड / <br> Zip Code : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->zipcode }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>जीएसटी क्रमांक / <br> GST Number  :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->gst_number }}" readonly>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>मोबाईल नंबर / <br> Mobile Number : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->mobile_number }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>ई - मेल आयडी / Email Id  :  <br><span class="text-danger"> (Receipt and Certificate will be sent on this Email ID)</span>  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->email }}" readonly>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>आधार क्रमांक / <br> Aadhar Number : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->aadhar_number }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>पॅन कार्ड / <br> PAN Card  :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->pan_number }}" readonly>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>मतदार कार्ड क्रमांक / <br> Voter’s Card Number : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->voter_card_no }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>संस्थेचे नाव / Name of the Firm  :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->name_of_firm }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <strong class="pt-2 text-danger text-justify">
                                        Note : <br>
                                        1. Please fill all the Dog details below, Since and Vaccination Date should be in mm/dd/yyyy format only Ex. 01/20/2018 .<br>
                                        2. Select Others in Breed and enter details if Dog Breed not found if drop down .<br>
                                        3. Vaccination Certificate of size upto 2 MB to be Uploaded as attachment .
                                    </strong>
                                    <hr>
                                    
                                    <strong class="pt-2 text-danger text-justify">
                                        नोंद : <br>
                                        1. कृपया खाली सर्व कुत्र्याचे तपशील भरा, पासून आणि लसीकरणाची तारीख फक्त mm/dd/yyyy स्वरूपात असावी उदा. 01/20/2018 .<br>
                                        2. जातीतील इतर निवडा आणि ड्रॉप डाउन असल्यास डॉग ब्रीड आढळले नसल्यास तपशील प्रविष्ट करा.<br>
                                        3. संलग्नक म्हणून अपलोड करण्यासाठी 2 MB पर्यंत आकाराचे लसीकरण प्रमाणपत्र.
                                    </strong>
                                    <hr>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>कुत्र्याचे नाव / <br> Dog Name : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->dog_name }}" readonly>
                                        </div>
                                        
                                        <?php
                                            $sex_id = '';
                                            
                                            if($pet_registration_view->sex_id == 1)
                                            {
                                                $sex_id = 'Male';
                                            }
                                            else if($pet_registration_view->sex_id == 2)
                                            {
                                                $sex_id = 'Female';
                                            }
                                            
                                        ?>
                                        <label class="col-sm-2"><strong>लिंग / <br> Sex  :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $sex_id }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>ओळख चिन्ह / <br> Identification Mark : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->identification_mark }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>जाती / <br> Breed :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->breeds_name }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>इतर जाती / <br> Other Breed : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->other_breed }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>रंग /<br> Colour  : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->colour }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>पशुवैद्यकीय डॉक्टरांचे नाव / <br> Veterinary Doctor Name : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->veterinary_doctor_name }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>पशुवैद्यकीय डॉक्टरांचा MSVC/VCI नोंदणी क्रमांक / <br> Veterinary doctor’s MSVC/VCI registration number  : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->veterinary_doctor_msvc_no }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>रेबीज लसीकरणाची तारीख (DD/MM/YYYY) / <br> Date of Rabies Vaccination (DD/MM/YYYY) : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->date_of_rabies_vaccination }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>लेप्टोस्पायरोसिस लसीकरणाची तारीख (DD/MM/YYYY) / <br> Date of Leptospirosis Vaccination (DD/MM/YYYY)  : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->date_of_leptospirosis_vaccination }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>जन्मतारीख (MM/DD/YYY) / <br> Date of birth (MM/DD/YYY) : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->dob }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>वय वर्ष /<br> Age Year(s)  : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->age }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>महिना / <br> Month  : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->month }}" readonly>
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>कुत्र्यांची संख्या / <br> No. of Dog  : </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $pet_registration_view->no_of_dog }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <strong class="pt-2 text-danger text-justify">
                                        Note : Please select "Yes" in any one of the below .
                                    </strong>
                                    <hr>
                                            
                                    <div class="form-group row">
                                        <?php
                                            $dog_licen_id = '';
                                            
                                            if($pet_registration_view->dog_licen_id == 1)
                                            {
                                                $dog_licen_id = 'Yes';
                                            }
                                            else if($pet_registration_view->dog_licen_id == 2)
                                            {
                                                $dog_licen_id = 'No';
                                            }
                                            
                                        ?>
                                        
                                        <label class="col-sm-2"><strong>कुत्र्याचे हस्तांतरण केले जात आहे का? / <br> Is Dog being Transferred ? :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $dog_licen_id }}" readonly>
                                        </div>
                                        
                                        <?php
                                            $dog_bought_id = '';
                                            
                                            if($pet_registration_view->dog_bought_id == 1)
                                            {
                                                $dog_bought_id = 'Yes';
                                            }
                                            else if($pet_registration_view->dog_bought_id == 2)
                                            {
                                                $dog_bought_id = 'No';
                                            }
                                            
                                        ?>
                                        
                                        <label class="col-sm-2"><strong>कुत्रा विकत घेतला जात आहे का? / <br> Is Dog being Bought ? :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $dog_bought_id }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <?php
                                            $stray_dog_adopted_id = '';
                                            
                                            if($pet_registration_view->stray_dog_adopted_id == 1)
                                            {
                                                $stray_dog_adopted_id = 'Yes';
                                            }
                                            else if($pet_registration_view->stray_dog_adopted_id == 2)
                                            {
                                                $stray_dog_adopted_id = 'No';
                                            }
                                            
                                        ?>
                                        
                                        <label class="col-sm-2"><strong>भटका कुत्रा दत्तक घेतला आहे का? / <br> Whether Stray Dog adopted ? :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $stray_dog_adopted_id }}" readonly>
                                        </div>
                                        
                                        <?php
                                            $dog_brought_outside_id = '';
                                            
                                            if($pet_registration_view->dog_brought_outside_id == 1)
                                            {
                                                $dog_brought_outside_id = 'Yes';
                                            }
                                            else if($pet_registration_view->dog_brought_outside_id == 2)
                                            {
                                                $dog_brought_outside_id = 'No';
                                            }
                                            
                                        ?>
                                        
                                        <label class="col-sm-2"><strong>कुत्रा मुंबईबाहेरून आणला का? / <br> Whether Dog brought from outside Mumbai ? :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $dog_brought_outside_id }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <?php
                                            $puppy_born_id = '';
                                            
                                            if($pet_registration_view->puppy_born_id == 1)
                                            {
                                                $puppy_born_id = 'Yes';
                                            }
                                            else if($pet_registration_view->puppy_born_id == 2)
                                            {
                                                $puppy_born_id = 'No';
                                            }
                                            
                                        ?>
                                        
                                        <label class="col-sm-2"><strong>पिल्लाचा जन्म मालकाच्या कुत्र्यापासून झाला आहे का? / <br> Is Puppy born to owner’s Dog ? :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            <input class="form-control " value="{{ $puppy_born_id }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>रेबीज लसीकरण प्रमाणपत्र अपलोड करा / <br> Upload Rabies Vaccination certificate :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            @if(!empty($pet_registration_view->rabies_vaccination_certificate_doc))
                                                <a href="{{ url('/') }}/PMC_PET_Registration/rabies_vaccination_certificate_doc/{{ $pet_registration_view->rabies_vaccination_certificate_doc }}" target="_blank" class="btn btn-info btn-sm text-light">
                                                    <i class="zmdi zmdi-eye"></i> &nbsp;&nbsp;View Document
                                                </a>
                                            @endif
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>लेप्टोस्पायरोसिसचे लसीकरण प्रमाणपत्र अपलोड करा / <br> Upload Vaccination certificate of Leptospirosis :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            @if(!empty($pet_registration_view->vaccination_certificate_of_Lepto_doc))
                                                <a href="{{ url('/') }}/PMC_PET_Registration/vaccination_certificate_of_Lepto_doc/{{ $pet_registration_view->vaccination_certificate_of_Lepto_doc }}" target="_blank" class="btn btn-info btn-sm text-light">
                                                    <i class="zmdi zmdi-eye"></i> &nbsp;&nbsp;View Document
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>पत्ता पुरावा अपलोड करा / <br> Upload Address proof :  </strong></label>
                                        <div class="col-sm-4 col-md-4 p-2">
                                            @if(!empty($pet_registration_view->address_proof_doc))
                                                <a href="{{ url('/') }}/PMC_PET_Registration/address_proof_doc/{{ $pet_registration_view->address_proof_doc }}" target="_blank" class="btn btn-info btn-sm text-light">
                                                    <i class="zmdi zmdi-eye"></i> &nbsp;&nbsp;View Document
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                
                                    <?php if($pet_registration_view->status == 0){ ?>
                                        <div class="form-group row mt-4">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                <a href="{{ url('/pet_registration_list/0') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;
                                                <a href="{{ url('/reject_pet_registration',$pet_registration_view->id) }}"><button type="button" class="btn btn-primary">Reject</button></a>&nbsp;&nbsp;
                                                <!--<a href="{{ url('/approve_pet_registration',$pet_registration_view->id) }}"><button  type="button" class="btn btn-success">Approve Student</button> </a>-->
                                                <button type="button" class="btn btn-success waves-effect m-r-20" data-toggle="modal" data-target="#largeModal">Approve</button>
                                            </div>
                                        </div>
                                    <?php } elseif($pet_registration_view->status == 1){ ?>
                                        <div class="form-group row mt-4">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                <a href="{{ url('/pet_registration_list/1') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;
                                                <a href="{{ url('/reject_pet_registration',$pet_registration_view->id) }}"><button type="button" class="btn btn-primary">Reject</button></a>
                                            </div>
                                        </div>
                                    <?php } elseif($pet_registration_view->status == 2){ ?>
                                        <div class="form-group row mt-4">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                <a href="{{ url('pet_registration_list/2') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>
                                            </div>
                                        </div>
                                    <?php }?>
                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Dialogs ====== --> 
<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title text-danger" id="largeModalLabel">Approved By Admin</h4>
            </div>
            <div class="modal-body"> 
                <form method="POST" action="{{ url('approve_pet_registration', $pet_registration_view->id ) }}" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="hidden" class="form-control " id="id" name="id" value="{{ $pet_registration_view->id }}" >
                    <input type="hidden" class="form-control " id="pet_pplication_no" name="pet_pplication_no" value="{{ $pet_registration_view->pet_pplication_no }}" >
                    
                    <div class="form-group row">
                        <label class="col-sm-2"><strong>स्विकारलेल्या एकूण कराची रक्कम / <br>  Total Amount of tax received  :  <span style="color:red;">*</span></strong></label>
                        <div class="col-sm-4 col-md-4 p-2">
                            <input type="text" name="total_recived_tax" id="total_recived_tax" required class="form-control @error('total_recived_tax') is-invalid @enderror" value="{{ old('total_recived_tax') }}" placeholder="स्विकारलेल्या एकूण कराची रक्कम / Total Amount of tax received.">
                            @error('total_recived_tax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <label class="col-sm-2"><strong>पावती क्रमांक / <br>  Receipt No : <span style="color:red;">*</span></strong></label>
                        <div class="col-sm-4 col-md-4 p-2">
                            <input type="text" name="receipt_no" id="receipt_no" required class="form-control @error('receipt_no') is-invalid @enderror" value="{{ old('receipt_no') }}" placeholder="पावती क्रमांक / Receipt No.">
                            @error('receipt_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2"><strong>पावती दिनांक / Date of Receipt  : <span style="color:red;">*</span> </strong></label>
                        <div class="col-sm-4 col-md-4 p-2">
                            <input type="date" name="date_of_receipt" max="<?php echo date("Y-m-d"); ?>" id="date_of_receipt"  required class="form-control @error('date_of_receipt') is-invalid @enderror" value="{{ old('date_of_receipt') }}" placeholder="जीएसटी क्रमांक / GST Number.">
                            @error('date_of_receipt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <label class="col-sm-2"><strong>परवाना क्रमांक / License Number : <span style="color:red;">*</span></strong></label>
                        <div class="col-sm-4 col-md-4 p-2">
                            <input type="text" name="license_number" id="license_number" readonly class="form-control @error('license_number') is-invalid @enderror" value="{{ $pet_registration_view->pet_pplication_no }}" placeholder="परवाना क्रमांक / License Number.">
                            @error('license_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2"><strong>परवाना दिल्याची दिनांक / Date of License Obtained  : <span style="color:red;">*</span> </strong></label>
                        <div class="col-sm-4 col-md-4 p-2">
                            <input type="date" name="date_of_license_obtain" required max="<?php echo date("d-m-Y"); ?>" id="date_of_license_obtain" class="form-control @error('date_of_license_obtain') is-invalid @enderror" value="{{ old('date_of_license_obtain') }}" placeholder="जीएसटी क्रमांक / GST Number.">
                            @error('date_of_license_obtain')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <label class="col-sm-2"><strong>दिनांक /  Date : <span style="color:red;">*</span></strong></label>
                        <div class="col-sm-4 col-md-4 p-2">
                            <input type="date" name="date" readonly max="<?php echo date("d-m-Y"); ?>" id="date" required class="form-control @error('date') is-invalid @enderror" value="<?php echo date('Y-m-d'); ?>" placeholder="परवाना क्रमांक / License Number.">
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row mt-4">
                        <label class="col-md-3"></label>
                        <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                            <a href='{{ url("/pet_registration_view/{$pet_registration_view->id}/{$pet_registration_view->status}") }}' class="btn btn-danger btn-lg">Cancel</a>&nbsp;&nbsp;
                            <button type="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('common.footer')  