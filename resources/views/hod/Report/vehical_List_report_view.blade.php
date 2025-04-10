@include('common.header')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Vehicle Application</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/hod/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <!--<li class="breadcrumb-item"><a href="{{ url('/#') }}">PET Application</a></li>-->
                        <li class="breadcrumb-item active">Vehicle Application</li>
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
                             <form class="tab-wizard wizard-circle wizard"  method="POST" action="#" enctype="multipart/form-data">
                            
                            <section class="pt-3">
                                <strong class="pt-2 text-primary">
                                     Basic Details / ( मूलभूत तपशील )
                                </strong>
                                <hr>
                            
                                
                                <strong class="pb-1">Name of Applicant / ( अर्जदाराचे नाव ) : <span style="color:red;">*</span> </strong>
                                <div class="form-group row">
                                    <?php
                                        $applicant_title_id = '';
                                        
                                        if($meat_transport_view->applicant_title_id == 1)
                                        {
                                            $applicant_title_id = 'Kum.';
                                        }
                                        else if($meat_transport_view->applicant_title_id == 2)
                                        {
                                            $applicant_title_id = 'M/s';
                                        }
                                        else if($meat_transport_view->applicant_title_id == 3)
                                        {
                                            $applicant_title_id = 'Smt.';
                                        }
                                        else if($meat_transport_view->applicant_title_id == 4)
                                        {
                                            $applicant_title_id = 'Ms.';
                                        }
                                        else if($meat_transport_view->applicant_title_id == 5)
                                        {
                                            $applicant_title_id = 'Mr.';
                                        }
                                        else if($meat_transport_view->applicant_title_id == 6)
                                        {
                                            $applicant_title_id = 'MrS.';
                                        }
                                        else if($meat_transport_view->applicant_title_id == 7)
                                        {
                                            $applicant_title_id = 'Dr.';
                                        }
                                        
                                    ?>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input class="form-control " value="{{ $applicant_title_id }}" readonly>
                                    </div>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input class="form-control " value="{{ $meat_transport_view->applicant_fname }}" readonly>
                                    </div>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input class="form-control " value="{{ $meat_transport_view->applicant_mname }}" readonly>
                                    </div>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input class="form-control " value="{{ $meat_transport_view->applicant_lname }}" readonly>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                     <label class="col-sm-2"><strong>Mobile Number / (मोबाईल नंबर) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <input class="form-control " value="{{ $meat_transport_view->mobile_number }}" readonly>
                                       
                                    </div>
                                    
                                  
                                    
                                    <label class="col-sm-2"><strong>Aadhar Number / (आधार क्रमांक) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                          <input class="form-control " value="{{ $meat_transport_view->aadhar_number }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong> Residential Address / (परवाना धारकाच्या पत्ता ) :  <span style="color:red;">*</span></strong></label>
                                     <div class="col-sm-4 col-md-4 p-2">
                                        <textarea type="text" class="form-control" value="{{ $meat_transport_view->applicant_address }}" readonly  style="height:70px;">{{ $meat_transport_view->applicant_address }}</textarea>
                                       
                                    </div>




                                </div>
                                
                                <!--<strong class="pt-2 text-primary">-->
                                <!--     Residential Address of Applicant / ( अर्जदाराचा निवासी पत्ता )-->
                                <!--</strong>-->
                                <!--<hr>-->
                                    
                                
                                <!--<div class="form-group row">-->
                                    <?php
                                        $country_id = '';
                                        
                                        if($meat_transport_view->country_id == 1)
                                        {
                                            $country_id = 'India';
                                        }
                                        
                                    ?>
                            
                                    
                                    <?php
                                        $state_id = '';
                                        
                                       if($meat_transport_view->state_id == 1)
                                      {
                                          $state_id = 'Maharashtra';
                                       }                                        
                                        
                                   ?>
                             
                            
                               <strong class="pt-2 text-primary">
                                    Business Details / ( व्यवसाय तपशील )
                                </strong>
                                <hr>
                                
                                 <div class="form-group row">
                                    <label class="col-sm-2"><strong>Name of the business / (व्यवसायाचे नाव) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <input class="form-control " value="{{ $meat_transport_view->business_name }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Vehicle registration number / (वाहन नोंदणी क्रमांक ) : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_transport_view->vehical_register_no }}" readonly>

                                        
                                    </div>
                                    </div>

                            <div class="form-group row">
                                    
                                <label class="col-sm-2"><strong>Address of the vehicle / (वाहनाचा पत्ता ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <textarea type="text"   class="form-control " value="{{ $meat_transport_view->vehical_address }}"  style="height:80px;"readonly> {{ $meat_transport_view->vehical_address }} </textarea>
                                       
                                    </div>
                                    
                                      <label class="col-sm-2"><strong> Address of the business / (व्यायसायचा पत्ता    ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                         <textarea type="text"  class="form-control" value="{{ $meat_transport_view->business_address }}" style="height:80px;" readonly>{{ $meat_transport_view->business_address }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2"><strong> From the validity period of license sale / <br> (परवाना विक्री ग्राह्य अवधी पासून ) ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="date"  class="form-control " readonly value="{{ $meat_transport_view->from_date }}" placeholder="DD/MM/YYYY">
                                       
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Up to the license sale validity period / <br> (परवाना विक्री ग्राह्य अवधी पर्यंत ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="date" class="form-control " readonly value="{{ $meat_transport_view->to_date }}" >
                                      
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                            <label class="col-sm-2"><strong>Meat Type / (मांसाचा प्रकार) : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                <input readonly  class="form-control " value="{{ $meat_transport_view->meat_name }}" >
                                            </div>
                                            
                                            <label class="col-sm-2"><strong>Per Day Capacity / (प्रतिदिन क्षमता) : <span style="color:red;">*</span> </strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                <input readonly class="form-control" value="{{ $meat_transport_view->per_day_capacity  }}" >
                                            </div>
                            </div>
                            
                             <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload Driving License Copy  / ( ड्रायव्हिंग लायसन्सची प्रत अपल करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                          <a href="{{url('/')}}/PMC_vehicle_Registration/meat_file/driving_licence/{{ $meat_transport_view->driving_licence }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_transport_view->driving_licence;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_vehicle_Registration/meat_file/driving_licence/{{ $meat_transport_view->driving_licence }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_vehicle_Registration/meat_file/driving_licence/{{ $meat_transport_view->driving_licence }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php }?>
                                                    </div>
                                                </a>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Upload Vehicle Insurance Certificate  / (वाहन विमा प्रमाणपत्र अपलोड करा ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                          <a href="{{url('/')}}/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc/{{ $meat_transport_view->vehicle_insurance_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_transport_view->vehicle_insurance_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc/{{ $meat_transport_view->vehicle_insurance_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc/{{ $meat_transport_view->vehicle_insurance_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php }?>
                                                    </div>
                                                </a>
                                    </div> 
                                </div>    

                                  <div class="form-group row mt-4">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                            <a href="{{url('hod_vehicle_report_list')}}"><button type="button"  class="btn btn-danger">Cancel</button></a>
                                        </div>
                                    </div>   
                            
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