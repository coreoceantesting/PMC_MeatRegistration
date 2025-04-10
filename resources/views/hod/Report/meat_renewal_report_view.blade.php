@include('common.header')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                      @if ($meat_renewal_view->status == 0)
                    <h2>Pending Meat Renewal  Application</h2>
                      @elseif ($meat_renewal_view->status == 1)
                       <h2>Approve Meat Renewal  Application</h2>
                                  
                                @elseif ($meat_renewal_view->status == 2)
                                 <h2>Reject Meat Renewal  Application</h2>
                                
                                @endif
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/hod/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <!--<li class="breadcrumb-item"><a href="{{ url('/#') }}">PET Application</a></li>-->
                                 @if ($meat_renewal_view->status == 0)
                                 <li class="breadcrumb-item active">Pending Meat Renewal  Application</li>
                                
                                @elseif ($meat_renewal_view->status == 1)
                                 <li class="breadcrumb-item active">Approve Meat Renewal  Application</li>
                                    
                                @elseif ($meat_renewal_view->status == 2)
                                 <li class="breadcrumb-item active">Reject Meat Renewal  Application</li>
                                
                                @endif
                        <!--<li class="breadcrumb-item active">Meat Application</li>-->
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
                            

                            <form method="post" action="{{ url('#') }}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                            
                            <section class="pt-3">
                                <strong class="pt-2 text-primary">
                                     Basic Details / ( मूलभूत तपशील )
                                </strong>
                                <hr>
                            <?php //print_r($meat_renewal_view);exit;?>
                                
                                <strong class="pb-1">Name of Applicant / ( अर्जदाराचे नाव ) : <span style="color:red;">*</span> </strong>
                                <div class="form-group row">
                                    <?php
                                        $applicant_title_id = '';
                                        
                                        if($meat_renewal_view->applicant_title_id == 1)
                                        {
                                            $applicant_title_id = 'Kum.';
                                        }
                                        else if($meat_renewal_view->applicant_title_id == 2)
                                        {
                                            $applicant_title_id = 'M/s';
                                        }
                                        else if($meat_renewal_view->applicant_title_id == 3)
                                        {
                                            $applicant_title_id = 'Smt.';
                                        }
                                        else if($meat_renewal_view->applicant_title_id == 4)
                                        {
                                            $applicant_title_id = 'Ms.';
                                        }
                                        else if($meat_renewal_view->applicant_title_id == 5)
                                        {
                                            $applicant_title_id = 'Mr.';
                                        }
                                        else if($meat_renewal_view->applicant_title_id == 6)
                                        {
                                            $applicant_title_id = 'MrS.';
                                        }
                                        else if($meat_renewal_view->applicant_title_id == 7)
                                        {
                                            $applicant_title_id = 'Dr.';
                                        }
                                        
                                    ?>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input class="form-control " value="{{ $applicant_title_id }}" readonly>
                                    </div>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->applicant_fname }}" readonly>
                                    </div>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->applicant_mname }}" readonly>
                                    </div>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->applicant_lname }}" readonly>
                                    </div>
                                </div>
                                
                                
                                    <div class="form-group row">
                                     <label class="col-sm-2"><strong>Mobile Number / (मोबाईल नंबर) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <input class="form-control " value="{{ $meat_renewal_view->mobile_number }}" readonly>
                                       
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Email Id / (ई - मेल आयडी) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                          <input class="form-control " value="{{ $meat_renewal_view->email }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Aadhar Number / (आधार क्रमांक) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                          <input class="form-control " value="{{ $meat_renewal_view->aadhar_number }}" readonly>
                                    </div>
                                </div>
                                
                                <strong class="pt-2 text-primary">
                                     Residential Address of Applicant / ( अर्जदाराचा निवासी पत्ता )
                                </strong>
                                <hr>
                                    
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>House Number / <br> ( घर क्रमांक ) :  <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->house_number }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>House Name / <br> ( घराचे नाव ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->house_name }}" readonly>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Street 1 / <br> ( रस्ता १ ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->street_1 }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Street 2 / <br> ( रस्ता 2 ) : </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->street_2 }}" readonly>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Area 1 / ( क्षेत्र १ ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->area_1 }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Area 2 / <br> ( क्षेत्र  २ ) : </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->area_2 }}" readonly>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <?php
                                        $country_id = '';
                                        
                                        if($meat_renewal_view->country_id == 1)
                                        {
                                            $country_id = 'India';
                                        }
                                        
                                    ?>
                                    <label class="col-sm-2"><strong>Country / <br> ( देश ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $country_id }}" readonly>
                                    </div>
                                    
                                    <?php
                                        $state_id = '';
                                        
                                        if($meat_renewal_view->state_id == 1)
                                        {
                                            $state_id = 'Maharashtra';
                                        }                                         
                                        
                                    ?>
                                    <label class="col-sm-2"><strong>State / ( राज्य ) <span style="color:red;">*</span>: </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $state_id }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>District / <br> ( जिल्हा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->dist_name }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Taluka / <br> ( तालुका ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->taluka_name }}" readonly>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Zip Code / <br> ( पिनकोड ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->zipcode }}" readonly>
                                    </div>
                                    
                                 
                                </div>
                            
                               <strong class="pt-2 text-primary">
                                    Business Details / ( व्यवसाय तपशील )
                                </strong>
                                <hr>
                                
                                 <div class="form-group row">
                                    <label class="col-sm-2"><strong>Name of the business / (व्यवसायाचे नाव) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <input class="form-control " value="{{ $meat_renewal_view->business_name }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Kind of Business / (व्यवसायाचा प्रकार) : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       <?php
                                                $business_type = '';
                                                
                                                if($meat_renewal_view->business_type == 1)
                                                {
                                                    $business_type = 'Buture Shope ( मांस  विक्री  केंद्र )';
                                                }
                                                if($meat_renewal_view->business_type == 2)
                                                {
                                                    $business_type = 'Meat Processing Plant ( मांस प्रक्रिया केंद् )';
                                                }
                                                if($meat_renewal_view->business_type == 3)
                                                {
                                                    $business_type = 'Transportation of Meat ( मांसाची  वाहतूक )';
                                                }
                                                if($meat_renewal_view->business_type == 4)
                                                {
                                                    $business_type = 'Other ( इतर )';
                                                }
                                            ?>
                                         <input class="form-control " value="{{ $business_type }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                            <label class="col-sm-2"><strong>Meat Type / (मांसाचा प्रकार) : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                <input readonly  class="form-control " value="{{ $meat_renewal_view->meat_name }}" >
                                            </div>
                                            
                                            <label class="col-sm-2"><strong>Per Day Capacity / (प्रतिदिन क्षमता) : <span style="color:red;">*</span> </strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                <input readonly class="form-control" value="{{ $meat_renewal_view->per_day_capacity  }}" >
                                            </div>
                            </div>
                            
                             <div class="form-group row">
                                            <?php
                                                $provision_water = '';
                                                
                                                if($meat_renewal_view->provision_water == 1)
                                                {
                                                    $provision_water = 'Yes';
                                                }
                                                if($meat_renewal_view->provision_water == 2)
                                                {
                                                    $provision_water = 'No';
                                                }
                                            ?>
                                            <label class="col-sm-2"><strong>Provision of water / (पाण्याची व्यवस्था आहे का ?) : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                <input readonly class="form-control" value="{{ $provision_water }}" >
                                            </div>
                                            
                                            <?php
                                                $provision_electricty = '';
                                                
                                                if($meat_renewal_view->provision_electricty == 1)
                                                {
                                                    $provision_electricty = 'Yes';
                                                }
                                                if($meat_renewal_view->provision_electricty == 2)
                                                {
                                                    $provision_electricty = 'No';
                                                }
                                            ?>
                                            <label class="col-sm-2"><strong>Provision of electricity / (विजेची व्यवस्था आहे का ? ) : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                <input readonly class="form-control" value="{{ $provision_electricty }}" >
                                            </div>
                                        </div>
                                        
                                         <div class="form-group row">
                                            <label class="col-sm-12"><strong>Address of the business / (व्यवसायाचा पत्ता) : <span style="color:red;">*</span> </strong></label>
                                            <div class="col-sm-12 col-md-12 p-2">
                                                <textarea readonly class="form-control" value="{{ $meat_renewal_view->business_address }}" style="height:120px;">{{ $meat_renewal_view->business_address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <?php
                                                $sewerage_disposing = '';
                                                
                                                if($meat_renewal_view->sewerage_disposing == 1)
                                                {
                                                    $sewerage_disposing = 'Yes';
                                                }
                                                if($meat_renewal_view->sewerage_disposing == 2)
                                                {
                                                    $sewerage_disposing = 'No';
                                                }
                                            ?>
                                            <label class="col-sm-2"><strong>Provision of sewerage for disposing effluent / (सांडपाण्याची भूमिगत गटाराची व्यवस्था आहे का ?)  : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                <input readonly class="form-control" value="{{ $sewerage_disposing }}" >
                                            </div>
                                            
                                            <label class="col-sm-2"><strong>If not explain provision to dispose effluent / (नसल्यास सांडपाण्याची विल्हेवाट कशी लावली जाते ) : </strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                <textarea readonly class="form-control " value="{{ $meat_renewal_view->prcision_dispose_id }}"   style="height:80px;">{{ $meat_renewal_view->prcision_dispose_id }}</textarea>
                                            </div>
                                        </div>
                                        
                                        
                                         <strong class="pt-2 text-primary">
                                    Business registration details / ( व्यवसाय नोंदणी तपशील )
                                </strong>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong> Registration authority name  / (नोंदणी प्राधिकरणाचे नाव) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                         <input readonly class="form-control" value="{{ $meat_renewal_view->regi_authority_name  }}" >
                                    </div>
                                    
                                    <label class="col-sm-2"><strong> Registration Number   / (नोंदणी क्रमांक) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                      
                                        <input readonly class="form-control" value="{{ $meat_renewal_view->register_number  }}" >
                                    </div>
                                    </div>
                                  <div class="form-group row">   
                                    <label class="col-sm-2"><strong> Valid till / (पर्यंत वैध) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4">
                                       <?php
                                       
                                       $date = $meat_renewal_view->valid_till;
                                       
                                         $newDate = date("d-m-Y", strtotime($date));  
                                       ?>
                                        <input readonly class="form-control" value="{{ $newDate  }}" >
                                    </div>
                                </div>
                                        
                                   <strong class="pt-2 text-primary">
                                    Details of business place / ( व्यवसायाच्या ठिकाणाचा तपशील )
                                </strong>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong> Area of business place(sq/mtr)  / (व्यवसायाच्या ठिकाणाचे क्षेत्रफळ (चौरस/मीटर) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                    
                                         <input readonly class="form-control" value="{{ $meat_renewal_view->areaof_business_place  }}" >
                                    </div>
                                    
                                    <label class="col-sm-2"><strong> Place   / (ठिकाण) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                        
                                          <?php
                                                $business_place = '';
                                                
                                                if($meat_renewal_view->business_place == 1)
                                                {
                                                    $business_place = 'सिडको  मार्केटमधील जागा/ Place in CIDCO Mark';
                                                }
                                                if($meat_renewal_view->business_place == 2)
                                                {
                                                    $business_place = 'वाणिज्य वापराखालील जागा/ Space under commercial ';
                                                }
                                                 if($meat_renewal_view->business_place == 3)
                                                {
                                                    $business_place = 'गावठाण भागातील  जागा/ Places in village( Gavthan ) are';
                                                }
                                                if($meat_renewal_view->business_place == 4)
                                                {
                                                    $business_place = 'इतर नमूद करणे/ To mention other';
                                                }
                                            ?>
                                               <input readonly class="form-control" value="{{ $business_place  }}" >
                                    </div>
                                    </div>
                                  <div class="form-group row other_b" id="hidden_div" style="display:none">   
                                    <label class="col-sm-2"><strong> Other  : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4">
                                      
                                         <input readonly class="form-control" value="{{ $meat_renewal_view->business_place_other  }}" >
                                    </div>
                                </div>       
                                        
                                      <strong class="pt-2 text-primary">
                                    Upload Document / ( दस्तऐवज अपलोड करा )
                                </strong>
                                <br>
                                <br>
                                <strong class="text-danger text-justify "> 
                                    Note :- please attach attested photocopies of document
                                </strong><br>
                                <strong class="text-danger text-justify ">
                                    टीप :- कृपया  छायांकित  प्रती प्रमाणित करून सादर  करणे
                                </strong>
                                <hr>    
                                        
                                <div class="form-group row">
                                   
                                  <label class="col-sm-2"><strong>Upload ID proof (Adharcard) of the applicant  <br> (अर्जदाराचा आयडी पुरावा (आधारकार्ड) अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">

                                          <?php if(!empty($meat_renewal_view->adharcard_doc)) { ?>
                                             <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/adharcard_doc/{{ $meat_renewal_view->adharcard_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->adharcard_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/adharcard_doc/{{ $meat_renewal_view->adharcard_doc }}  " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/adharcard_doc/{{ $meat_renewal_view->adharcard_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>
                                                <?php } else {  ?>

                                                     <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/adharcard_doc/{{ $meat_renewal_view->regi_adharcard_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->regi_adharcard_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/adharcard_doc/{{ $meat_renewal_view->regi_adharcard_doc }}  " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/adharcard_doc/{{ $meat_renewal_view->regi_adharcard_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>


                                             <?php   } ?>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Upload Ration card, electricity / telephone bill. <br> ( रेशन कार्ड, वीज / टेलिफोन बिल अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       <?php if(!empty($meat_renewal_view->residitional_proof_doc)) { ?>
                                       <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/residitional_proof_doc/{{ $meat_renewal_view->residitional_proof_doc }}" target="_blank">
                                           <div class="form-group">
                                                <?php $document_path = $meat_renewal_view->residitional_proof_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/residitional_proof_doc/{{ $meat_renewal_view->residitional_proof_doc }}" alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/residitional_proof_doc/{{ $meat_renewal_view->residitional_proof_doc }} " target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>
                                                <?Php }else { ?>

                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/residitional_proof_doc/{{ $meat_renewal_view->regi_residitional_proof_doc }}" target="_blank">
                                           <div class="form-group">
                                                <?php $document_path = $meat_renewal_view->regi_residitional_proof_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/residitional_proof_doc/{{ $meat_renewal_view->regi_residitional_proof_doc }}" alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/residitional_proof_doc/{{ $meat_renewal_view->regi_residitional_proof_doc }} " target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                       <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>



                                             <?php   }?>
                                              </div> 
                                    
                                            </div> 
                                  <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload legal document of the business place <br> ( जागेचा अधिकृततेचा पुरावा अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       <?php if(!empty($meat_renewal_view->legal_business_doc)) { ?>
                                        <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/legal_business_doc/{{ $meat_renewal_view->legal_business_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->legal_business_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/legal_business_doc/{{ $meat_renewal_view->legal_business_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                               elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/legal_business_doc/{{ $meat_renewal_view->legal_business_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>

                                            <?php } else { ?>

                                                 <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/legal_business_doc/{{ $meat_renewal_view->regi_legal_business_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->regi_legal_business_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/legal_business_doc/{{ $meat_renewal_view->regi_legal_business_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/legal_business_doc/{{ $meat_renewal_view->regi_legal_business_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>


                                        <?php   } ?>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Upload business registration certificate <br> ( व्यवसाय नोंदणी प्रमाणपत्र अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                        <?php if(!empty($meat_renewal_view->business_registration_doc)) { ?>
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/business_registration_doc/{{ $meat_renewal_view->business_registration_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->business_registration_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/business_registration_doc/{{ $meat_renewal_view->business_registration_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/business_registration_doc/{{ $meat_renewal_view->business_registration_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>

                                            <?php }else { ?>

                                                  <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/business_registration_doc/{{ $meat_renewal_view->regi_business_registration_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->regi_business_registration_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/business_registration_doc/{{ $meat_renewal_view->regi_business_registration_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/business_registration_doc/{{ $meat_renewal_view->regi_business_registration_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>


                                        <?php } ?>
                                    </div> 
                                </div>
                                
                                  
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload receipt of recently paid property tax <br> ( मालमत्ता कर भरल्याचा पुरावा अपलोड करा ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                     <?php if(!empty($meat_renewal_view->property_tax_doc)) { ?>   
                                         <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/property_tax_doc/{{ $meat_renewal_view->property_tax_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->property_tax_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/property_tax_doc/{{ $meat_renewal_view->property_tax_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/property_tax_doc/{{ $meat_renewal_view->property_tax_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>

                                            <?php } else { ?>

                                                     <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/property_tax_doc/{{ $meat_renewal_view->property_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->property_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/property_tax_doc/{{ $meat_renewal_view->property_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/property_tax_doc/{{ $meat_renewal_view->property_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>



                                            <?php } ?>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Upload receipt of recently paid water ( पानी पट्टी पावती अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                     <?php if(!empty($meat_renewal_view->paid_water_doc)) { ?>    
                                       <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/paid_water_doc/{{ $meat_renewal_view->paid_water_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->paid_water_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/paid_water_doc/{{ $meat_renewal_view->paid_water_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/paid_water_doc/{{ $meat_renewal_view->paid_water_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>

                                            <?php } else { ?>

                                                  <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/paid_water_doc/{{ $meat_renewal_view->paid_water }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->paid_water;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/paid_water_doc/{{ $meat_renewal_view->paid_water }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/paid_water_doc/{{ $meat_renewal_view->paid_water }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>


                                            <?php } ?>
                                    </div> 
                                </div>
                                
                                <div class="form-group row">
                                  
                                      <label class="col-sm-2"><strong>Upload details & authority letter from authorized slaughter house / poultry form & authority letter <br>( अधिकृत कुक्कुट पालन करणाऱ्या संस्थेचे व कत्तलखाण्याची माहिती ई संमातीपत्र अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                          <?php if(!empty($meat_renewal_view->slaughter_letter_doc)) { ?>    
                                         <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/slaughter_letter_doc/{{ $meat_renewal_view->slaughter_letter_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->slaughter_letter_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/slaughter_letter_doc/{{ $meat_renewal_view->slaughter_letter_doc }}" alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/slaughter_letter_doc/{{ $meat_renewal_view->slaughter_letter_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>

                                            <?php } else { ?>

                                                  <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/slaughter_letter_doc/{{ $meat_renewal_view->letter_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->letter_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/slaughter_letter_doc/{{ $meat_renewal_view->letter_doc }}" alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/slaughter_letter_doc/{{ $meat_renewal_view->letter_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>


                                            <?php } ?>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Upload pest control treatment certificate issued from authorized agency <br> ( नोंदणीकृत  संस्थेकडून  कीटनाशक फवारणी केल्याचे प्रमाणपत्र अपलोड करा ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       <?php if(!empty($meat_renewal_view->treatment_authorized_doc)) { ?>     
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/treatment_authorized_doc/{{ $meat_renewal_view->treatment_authorized_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->treatment_authorized_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/treatment_authorized_doc/{{ $meat_renewal_view->treatment_authorized_doc }}" alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                               elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/treatment_authorized_doc/{{ $meat_renewal_view->treatment_authorized_doc }} " target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>

                                            <?php } else { ?>

                                                 <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/treatment_authorized_doc/{{ $meat_renewal_view->tre_authority_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->tre_authority_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/treatment_authorized_doc/{{ $meat_renewal_view->tre_authority_doc }}" alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                               elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/treatment_authorized_doc/{{ $meat_renewal_view->tre_authority_doc }} " target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>

                                            <?php } ?>
                                         </div>
                                       </div>
                                
                                 <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload medical fitness certificate issued by Municipal hospital <br> ( कामगारांचे पालिका रुग्णालयाने दिलेले आरोग्याचे  प्रमाणपत्र अपलोड करा ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                   <?php if(!empty($meat_renewal_view->fitness_certificate_doc)) { ?>         
                                       <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/fitness_certificate_doc/{{ $meat_renewal_view->fitness_certificate_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->fitness_certificate_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/fitness_certificate_doc/{{ $meat_renewal_view->fitness_certificate_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/fitness_certificate_doc/{{ $meat_renewal_view->fitness_certificate_doc }} " target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>

                                            <?php } else { ?>

                                                 <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/fitness_certificate_doc/{{ $meat_renewal_view->fitness_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->fitness_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/fitness_certificate_doc/{{ $meat_renewal_view->fitness_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/fitness_certificate_doc/{{ $meat_renewal_view->fitness_doc }} " target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                       <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>


                                            <?php } ?>
                                    </div> 
                                    
                                    <label class="col-sm-2"><strong>Upload FSSAI Registration Certificate  <br> (अन्न  सुरक्षा व मानदे अधिनियम २००६ व नियम  व नियमन,२०११ अन्वये, व्यवसाय नोंदणी प्रमाणपत्र )करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                      <?php if(!empty($meat_renewal_view->issued_doc)) { ?>   
                                         <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/issued_doc/{{ $meat_renewal_view->issued_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->issued_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/issued_doc/{{ $meat_renewal_view->issued_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/issued_doc/{{ $meat_renewal_view->issued_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>

                                            <?php } else { ?>

                                                <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/issued_doc/{{ $meat_renewal_view->regi_issued_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->regi_issued_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/issued_doc/{{ $meat_renewal_view->regi_issued_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                               elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/issued_doc/{{ $meat_renewal_view->regi_issued_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>



                                          <?php } ?>
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload applicant signature / ( अर्जदाराची स्वाक्षरी अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <?php if(!empty($meat_renewal_view->applicant_signature)) { ?>   
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $meat_renewal_view->applicant_signature }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->applicant_signature;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $meat_renewal_view->applicant_signature }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $meat_renewal_view->applicant_signature }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>


                                            <?php } else { ?>

                                                 <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $meat_renewal_view->regi_app_sign }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->regi_app_sign;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $meat_renewal_view->regi_app_sign }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                               elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $meat_renewal_view->regi_app_sign }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>


                                           <?php } ?>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Upload applicant profile photo / ( अर्जदाराचा प्रोफाइल फोटो अपलोड करा ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <?php if(!empty($meat_renewal_view->profile_photo)) { ?>   
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/profile_photo/{{ $meat_renewal_view->profile_photo }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->profile_photo;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/profile_photo/{{ $meat_renewal_view->profile_photo }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/profile_photo/{{ $meat_renewal_view->profile_photo }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>

                                            <?php } else { ?>

                                                 <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/profile_photo/{{ $meat_renewal_view->regi_profile_photo }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->regi_profile_photo;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/profile_photo/{{ $meat_renewal_view->regi_profile_photo }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/profile_photo/{{ $meat_renewal_view->regi_profile_photo }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>



                                       <?php   } ?>
                                    </div> 
                                </div>     

                                 <div class="form-group row">
                                     <label class="col-sm-2"><strong>Upload previous year licence copy  / ( मागील वर्षाच्या परवान्याची प्रत अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/old_licence/{{ $meat_renewal_view->old_licence }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->old_licence;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/old_licence/{{ $meat_renewal_view->old_licence }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/old_licence/{{ $meat_renewal_view->old_licence }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else {?> <a href="#">Document Not Uploaded</a><?php } ?>
                                                    </div>
                                                </a>
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                            <a href="{{url('hod_meat_report_renewal')}}"><button type="button"  class="btn btn-danger">Cancel</button></a>
                                        </div>
                                    </div>   
                                        
                                        
                                        
                        </section>
                            
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


                   
            </div>
        </div>
    </div>
</div>




@include('common.footer')  