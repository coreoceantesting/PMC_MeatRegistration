<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>PMC || Application for Meat / Livestock Transport Business License</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/') }}/assets/images/PMC-logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/assets/images/PMC-logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/assets/images/PMC-logo.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/src/plugins/jquery-steps/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
    
</head>

<body>
    
    <div class="col-12" style="padding-top:20px; padding-bottom:20px;">
        <div class="align-items-center">

            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-2 col-xs-12 text-right d-flex justify-content-center d-block d-sm-none mb-4">
                            <div class="dropdown">
                                <a  href="{{ url('/') }}" role="button" >
                                    <span class="user-icon">
                                        <img src="{{ url('/') }}/assets/images/PMC-logo.png" alt="" style="width: 100px; height: 80px;">
                                    </span>
                                        <span class="user-name">
                                            {{ Auth::guard('meatregistereduser')->user()->name }} 
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="{{ url('/user/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="dw dw-logout"></i> Log Out
                                        </a>
                                        <form id="logout-form" action="{{ url('/user/logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                            </div>
                        </div>
                        <div class="col-sm-10 col-xs-12 d-flex flex-column align-items-center align-items-sm-start">
                            <div class="title">
                                <h4>Application for Meat / Livestock Transport Business License </h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <!--<li class="breadcrumb-item"><a href="javascript:;">Documentation</a></li>-->
                                    <li class="breadcrumb-item active" aria-current="page">Application for Meat / Livestock Transport Business License</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-sm-2 col-xs-12 text-right d-none d-sm-block">
                            <div class="dropdown">
                                <a  href="{{ url('/') }}" role="button" >
                                    <span class="user-icon">
                                        <img src="{{ url('/') }}/assets/images/PMC-logo.png" alt="" style="width: 100px; height: 80px;">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="pd-20 card-box mb-30" >
                    
                    <div class="wizard-content p-4">
                        <!-- <form method="POST" action="{{ url('/user/meat_transport_registration') }}" enctype="multipart/form-data"> -->
                        <form class="tab-wizard wizard-circle wizard"  method="POST" action="{{ url('/user/update_transport_registration', $data->id) }}" enctype="multipart/form-data">
                             @csrf
                            
                             <input type="hidden" id="id" name="id" value="{{ $data->id or '' }}">
                
                            
                            
                            
                            <section class="pt-3">
                                <strong class="pt-2 text-primary">
                                     Basic Details / ( मूलभूत तपशील )
                                </strong>
                                <hr>
                                
                                <strong class="pb-1">Name of Applicant / ( अर्जदाराचे नाव ) : <span style="color:red;">*</span> </strong>
                                <div class="form-group row">
                                    <!--<label class="col-sm-1"><strong>Title : <span style="color:red;">*</span></strong></label>-->
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <select class="form-control custom-select2 @error('applicant_title_id') is-invalid @enderror"  name="applicant_title_id" id="applicant_title_id" style="width: 100%; height: 38px;">
                                           <option value=" ">Select Applicant Title</option>
                                            <option value="1" {{ $data->applicant_title_id == '1' ? 'selected' : '' }}>Kum.</option>
                                            <option value="2" {{ $data->applicant_title_id == '2' ? 'selected' : '' }}>M/s</option>
                                            <option value="3" {{ $data->applicant_title_id == '3' ? 'selected' : '' }}>Smt.</option>
                                            <option value="4" {{ $data->applicant_title_id == '4' ? 'selected' : '' }}>Ms.</option>
                                            <option value="5" {{ $data->applicant_title_id == '5' ? 'selected' : '' }}>Mr.</option>
                                            <option value="6" {{ $data->applicant_title_id == '6' ? 'selected' : '' }}>MrS.</option>
                                            <option value="7" {{ $data->applicant_title_id == '7' ? 'selected' : '' }}>Dr.</option>
                                        </select>
                                        @error('applicant_title_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input type="text" name="applicant_fname" id="inputTextBox" class="form-control @error('applicant_fname') is-invalid @enderror" value="{{ $data->applicant_fname }}" placeholder="Applicant First Name.">
                                        @error('applicant_fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       
                                    </div>

                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input type="text" name="applicant_mname" id="inputTextBox" class="form-control @error('applicant_mname') is-invalid @enderror" value="{{ $data->applicant_mname }}" placeholder="Applicant Middle Name.">
                                        @error('applicant_mname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <!--<label class="col-sm-1"><strong>Last Name : <span style="color:red;">*</span></strong></label>-->
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input type="text" name="applicant_lname" id="inputTextBox" class="form-control @error('applicant_lname') is-invalid @enderror" value="{{ $data->applicant_lname }}" placeholder="Applicant Last Name.">
                                        @error('applicant_lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              
                                
                                  <div class="form-group row">
                                     <label class="col-sm-2"><strong>Mobile Number / (मोबाईल नंबर) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="mobile_number" id="mobile_number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control @error('mobile_number') is-invalid @enderror" value="{{ $data->mobile_number }}" placeholder="Mobile Number / (मोबाईल नंबर)">
                                        @error('mobile_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    
                                    <label class="col-sm-2"><strong>Aadhar Number / (आधार क्रमांक) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="aadhar_number" id="aadhar_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="12" class="form-control @error('aadhar_number') is-invalid @enderror" value="{{ $data->aadhar_number }}" placeholder="Aadhar Number / (आधार क्रमांक)">
                                        @error('aadhar_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                <!--<strong class="pt-2 text-primary">-->
                                <!--     Residential Address of Applicant / ( अर्जदाराचा निवासी पत्ता )-->
                                <!--</strong>-->
                                <!--<hr>-->
                                    
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong> Residential Address / (परवाना धारकाच्या पत्ता ) :  <span style="color:red;">*</span></strong></label>
                                     <div class="col-sm-4 col-md-4 p-2">
                                        <textarea type="text" name="applicant_address" id="applicant_address" class="form-control @error('applicant_address') is-invalid @enderror" value="{{ $data->applicant_address }}" placeholder="Residential Address / (परवाना धारकाच्या पत््ता)" style="height:85px;">{{ $data->applicant_address }}</textarea>
                                        @error('applicant_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>




                                </div>
                                    
                                   <?php
                                    $mst_dist = DB::select('SELECT
                                                                `mst_dist`.`id`, `mst_dist`.`dist_name`
                                                            FROM `mst_dist`
                                                            WHERE `mst_dist`.`deleted_at` is NULL
                                                            ORDER BY `mst_dist`.`id` DESC
                                                            ');
                                ?>
                                <!--<div class="form-group row">-->
                                <!--    <label class="col-sm-2"><strong>District / (जिल्हा) : <span style="color:red;">*</span></strong></label>-->
                                <!--    <div class="col-sm-4 col-md-4 p-2">-->
                                <!--        <select class="form-control custom-select2 @error('district_id') is-invalid @enderror"  name="district_id" id="district_id" style="width: 100%; height: 38px;">-->
                                <!--            <option value=" ">Select District / (जिल्हा) </option>-->
                                <!--            @foreach ($mst_dist as $key => $value)-->
                                <!--                <option value="{{ $value->id }}" {{ old('district_id') == $value->id ? 'selected' : '' }}>{{ $value->dist_name }}</option>-->
                                <!--            @endforeach-->
                                <!--        </select>-->
                                <!--        @error('district_id')-->
                                <!--            <span class="invalid-feedback" role="alert">-->
                                <!--                <strong>{{ $message }}</strong>-->
                                <!--            </span>-->
                                <!--        @enderror-->
                                <!--    </div>-->
                                    
                                <!--    <label class="col-sm-2"><strong>Taluka / (तालुका) : <span style="color:red;">*</span></strong></label>-->
                                <!--    <div class="col-sm-4 col-md-4 p-2">-->
                                <!--        <select class="form-control custom-select2 @error('taluka_id') is-invalid @enderror"  name="taluka_id" id="taluka_id" style="width: 100%; height: 38px;">-->
                                <!--            <option value=" ">Select Taluka / (तालुका)</option>-->
                                            
                                <!--        </select>-->
                                <!--        @error('taluka_id')-->
                                <!--            <span class="invalid-feedback" role="alert">-->
                                <!--                <strong>{{ $message }}</strong>-->
                                <!--            </span>-->
                                <!--        @enderror-->
                                <!--    </div>-->
                                <!--</div>-->
                            
                            
                                <!--<div class="form-group row">-->
                                <!--    <label class="col-sm-2"><strong>Country / (देश) : <span style="color:red;">*</span></strong></label>-->
                                <!--    <div class="col-sm-4 col-md-4 p-2">-->
                                <!--        <select class="form-control custom-select2 @error('country_id') is-invalid @enderror"  name="country_id" id="country_id" style="width: 100%; height: 38px;" > -->
                                <!--            <option value=" ">Select Country / (देश) </option>-->
                                <!--            <option value="1" {{ old('country_id') == 1 ? 'selected' : '' }}>India</option>-->
                                <!--        </select>-->
                                <!--        @error('country_id')-->
                                <!--            <span class="invalid-feedback" role="alert">-->
                                <!--                <strong>{{ $message }}</strong>-->
                                <!--            </span>-->
                                <!--        @enderror-->
                                <!--    </div>-->
                                    
                                <!--    <label class="col-sm-2"><strong>State / (राज्य)  <span style="color:red;">*</span>: </strong></label>-->
                                <!--    <div class="col-sm-4 col-md-4 p-2">-->
                                <!--        <select class="form-control custom-select2 @error('state_id') is-invalid @enderror"  name="state_id" id="state_id" style="width: 100%; height: 38px;" >-->
                                <!--            <option value=" ">Select State / (राज्य) </option>-->
                                <!--            <option value="1"  {{ old('state_id') == 1 ? 'selected' : '' }}>Maharashtra</option>-->
                                <!--        </select>-->
                                <!--        @error('state_id')-->
                                <!--            <span class="invalid-feedback" role="alert">-->
                                <!--                <strong>{{ $message }}</strong>-->
                                <!--            </span>-->
                                <!--        @enderror-->
                                <!--    </div>-->
                                <!--</div>-->
                                
                            
                                <!--<div class="form-group row">-->
                                <!--    <label class="col-sm-2"><strong>Zip Code / (पिनकोड) : <span style="color:red;">*</span></strong></label>-->
                                <!--    <div class="col-sm-4 col-md-4 p-2">-->
                                <!--        <input type="text" name="zipcode" id="zipcode" maxlength="6" class="form-control @error('zipcode') is-invalid @enderror" value="{{ old('zipcode') }}" placeholder="Zip Code / पिनकोड ">-->
                                <!--        @error('zipcode')-->
                                <!--            <span class="invalid-feedback" role="alert">-->
                                <!--                <strong>{{ $message }}</strong>-->
                                <!--            </span>-->
                                <!--        @enderror-->
                                <!--    </div>-->
                                <!--</div>-->
                                
                                
                                <strong class="pt-2 text-primary">
                                    Business Details / ( व्यवसाय तपशील )
                                </strong>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Name of Meat Selling / Processing Centre / (मांस विक्री / प्रक्रिया केंद्राचे नाव ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="business_name" id="business_name"  class="form-control @error('business_name') is-invalid @enderror" value="{{ $data->business_name }}" placeholder="Name of the business / व्यवसायाचे नाव">
                                        @error('business_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <label class="col-sm-2"><strong>Vehicle registration number / (वाहन नोंदणी क्रमांक ) : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <input type="text" name="vehical_register_no" id="vehical_register_no" class="form-control @error('vehical_register_no') is-invalid @enderror" value="{{ $data->vehical_register_no }}" placeholder="Vehicle registration number / (वाहन नोंदणी क्रमांक ) ">
                                        @error('vehical_register_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                  
                                </div>
                                
                               
                                
                                <div class="form-group row">
                                    
                                     <label class="col-sm-2"><strong>Address of the vehicle / (वाहनाचा पत्ता ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <textarea type="text" name="vehical_address" id="vehical_address" class="form-control @error('vehical_address') is-invalid @enderror" value="{{ $data->vehical_address }}" placeholder="Address of the vehicle / (वाहनाचा पत्ता)" style="height:100px;">{{ $data->vehical_address }}</textarea>
                                        @error('vehical_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong> Address of the business / (व्यवसायाचा पत्ता    ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <textarea type="text" name="business_address" id="business_address" class="form-control @error('business_address') is-invalid @enderror" value="{{ $data->business_address }}" placeholder="Address of the business / (व्यवसायाचा पत्त्ता)" style="height:100px;">{{ $data->business_address }}</textarea>
                                        @error('business_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>

                                 <div class="form-group row">
                                    <label class="col-sm-2"><strong> From the validity period of license sale / <br> (परवाना विक्री ग्राह्य अवधी पासून ) ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="date" name="from_date" id="from_date" class="form-control  @error('from_date') is-invalid @enderror" value="{{ $data->from_date }}" placeholder="DD/MM/YYYY">
                                        @error('from_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Up to the license sale validity period / <br> (परवाना विक्री ग्राह्य अवधी पर्यंत ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="date" name="to_date" id="to_date" class="form-control  @error('to_date') is-invalid @enderror" value="{{ $data->to_date }}" placeholder="DD/MM/YYYY">
                                        @error('to_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-sm-2"><strong>Meat Type / (मांसाचा प्रकार) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('meat_type') is-invalid @enderror"  name="meat_type" id="meat_type" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Meat Type / (मांसाचा प्रकार) </option>
                                            @foreach ($meattype_mst as $key => $value)
                                            <option value="{{ $key }}" {{ $data->meat_type == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        
                                        @error('meat_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Per Day Capacity / (प्रतिदिन क्षमता)  : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="per_day_capacity" id="per_day_capacity" class="form-control @error('per_day_capacity') is-invalid @enderror" value="{{ $data->per_day_capacity }}" placeholder="Per Day Capacity / प्रतिदिन क्षमता  (टन/Ton)">
                                        @error('per_day_capacity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong> Upload Driving License Copy  / ( ड्रायव्हिंग लायसन्सची प्रत अपलो करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="file" name="driving_licence" id="driving_licence" accept=".png, .jpg, .jpeg, .pdf" class="form-control @error('applicant_signature') is-invalid @enderror" value="{{$data->driving_licence }}" placeholder="Upload applicant driving licence">
                                        <small class="text-secondary text-justify "> Note : The file should be less than 2MB .</small>
                                        <br>
                                        <small class="text-secondary text-justify "> Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</small>
                                        <br>
                                        @error('driving_licence')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                         <a href="{{url('/')}}/PMC_vehicle_Registration/meat_file/driving_licence/{{ $data->driving_licence }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->driving_licence;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_vehicle_Registration/meat_file/driving_licence/{{ $data->driving_licence }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_vehicle_Registration/meat_file/driving_licence/{{ $data->driving_licence }}" target="_blank" download>
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            Download File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php }?>
                                                    </div>
                                                </a>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Upload Vehicle Insurance Certificate  / (वाहन विमा प्रमाणपत्र अपलोड करा ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                        <input type="file" name="vehicle_insurance_doc" id="vehicle_insurance_doc" accept=".png, .jpg, .jpeg, .pdf"  class="form-control @error('profile_photo') is-invalid @enderror" value="{{ $data->vehicle_insurance_doc }}" placeholder="Upload vehicle insurance">
                                      
                                      
                                        <small class="text-secondary text-justify "> Note : The file should be less than 2MB .</small>
                                        <br>
                                        <small class="text-secondary text-justify "> Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</small>
                                        <br>
                                        @error('profile_photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                         <a href="{{url('/')}}/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc/{{ $data->vehicle_insurance_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->vehicle_insurance_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc/{{ $data->vehicle_insurance_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc/{{ $data->vehicle_insurance_doc }}" target="_blank" download>
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            Download File
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
                                        <a href="{{ url('user/appli_form') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                                
                            </section>
                            
                        </form>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    
    
    
    <!-- js -->
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/core.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/script.min.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/process.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/layout-settings.js"></script>
    <script src="{{ url('/') }}/userend/assets/src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/steps-setting.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/advanced-components.js"></script>
    
    <script>
        $(document).ready(function () {
            
            $('#ward_id').on('change', function () {
                var idCountry = this.value;
                $("#dept_id").html('');
                $.ajax({
                    url: "{{url('department_list')}}",
                    type: "POST",
                    data: {
                        ward_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#dept_id').html('<option value="">Select प्रभाग / Ward </option>');
                        $.each(result.departmentlist, function (key, value) {
                            $("#dept_id").append('<option value="' + value
                                .id + '">' + value.dept_name + '</option>');
                        });
                        
                    }
                });
            });
            
        });
    </script>
    
    
    
    <script>
        $(document).ready(function () {
            
            $('#district_id').on('change', function () {
                var idCountry = this.value;
                $("#taluka_id").html('');
                $.ajax({
                    url: "{{url('taluka_list')}}",
                    type: "POST",
                    data: {
                        district_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#taluka_id').html('<option value="">Select तालुका / Taluka </option>');
                        $.each(result.talukalist, function (key, value) {
                            $("#taluka_id").append('<option value="' + value
                                .id + '">' + value.taluka_name + '</option>');
                        });
                        // $('#taluka_id').html('<option value=""></option>');
                    }
                });
            });
            
        });
    </script>
    
    <script>
      function showDiv(divId, element) {
         document.getElementById(divId).style.display = element.value == 4 ? 'block' : 'none';
      }
   </script>
    
    <script>
        $(document).ready(function () {
            var today = new Date();
            $('.date-picker').datepicker({
                format: 'mm-dd-yyyy',
                autoclose:true,
                endDate: "today",
                maxDate: today
            }).on('changeDate', function (ev) {
                    $(this).datepicker('hide');
                });
    
    
            $('.date-picker').keyup(function () {
                if (this.value.match(/[^0-9]/g)) {
                    this.value = this.value.replace(/[^0-9^-]/g, '');
                }
            });
        });
    </script>
    <script>
        $(document).on('keypress', '#inputTextBox', function (event) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
    </script>
    
    <script>
          function isNumber(evt)
          {
              evt = (evt) ? evt : window.event;
              var charCode = (evt.which) ? evt.which : evt.keyCode;
              if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                  return false;
              }
              return true; }
              </script>
              
    
</body>

</html>
