<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title> PMC MEAT Application</title>

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

<style>
    .error{
        color:red;
    }
    
    .wizard-content .wizard>.steps>ul>li.current>a {
        color: #1b00ff;
        font-size: 18px;
        cursor: default;
        font-weight: bolder;
    }
    
    .wizard-content .wizard>.steps>ul>li.current .step {
        border-color: #1b00ff;
        background-color: #fff;
        color: #1b00ff;
    }
    
    .wizard-content .wizard>.actions>ul>li>a {
        background: #1b00ff;
        color: #fff;
        display: block;
        padding: 7px 12px;
        border-radius: 4px;
        border: 1px solid transparent;
        min-width: 100px;
        text-align: center;
    }
    
    .wizard-content .wizard>.actions>ul>li>a[href="#previous"] {
        background-color: #fff;
        color: #1b00ff;
        border: 1px solid #1b00ff;
    }
    
    .wizard-content .wizard>.steps>ul>li.done .step {
        background-color: #1b00ff;
        border-color: #1b00ff;
        color: #fff;
    }
    
    .wizard-content .wizard.wizard-circle>.steps>ul>li:after, .wizard-content .wizard.wizard-circle>.steps>ul>li:before {
        top: 45px;
        width: 50%;
        height: 3px;
        background-color: #1b00ff;
    }
</style>

<body>
    
    <div class="col-12" style="padding-top:20px; padding-bottom:20px;">
        <div class="align-items-center">

            <div class="min-height-200px">
                <div class="page-header" style="border: 1px solid #000000;">
                    <div class="row">
                        
                        <div class="col-sm-2 col-xs-12 text-right d-flex justify-content-center d-block d-sm-none mb-4">
                            <div class="user-info-dropdown">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <span class="user-icon">
                                            <img src="{{ url('/') }}/assets/images/PMC-logo.png" alt="">
                                        </span>
                                        @if(Auth::guard('meatregistereduser')->check())
                                           <span class="user-name">
                                                {{ Auth::guard('meatregistereduser')->user()->name }}
                                            </span>
                                        @elseif(Auth::guard('web')->check())
                                           <span class="user-name">
                                                {{ Auth::user()->name }} 
                                            </span>
                                        @else
                                           <span class="user-name">
                                                
                                            </span>
                                        @endif
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list" >
                                        <a class="dropdown-item" href="{{ url('/user/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="dw dw-logout"></i> Log Out
                                        </a>
                                        <form id="logout-form" action="{{ url('/user/logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-10 col-xs-12 d-flex flex-column align-items-center align-items-sm-start">
                            <div class="title">
                                <h4>Application for Meat License</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <!--<li class="breadcrumb-item"><a href="javascript:;">Documentation</a></li>-->
                                    <li class="breadcrumb-item active" aria-current="page">Application for Meat License</li>
                                </ol>
                            </nav>
                        </div>
                        
                        <div class="col-sm-2 col-xs-12 text-right d-none d-sm-block">
                            <div class="user-info-dropdown">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <span class="user-icon">
                                            <img src="{{ url('/') }}/assets/images/PMC-logo.png" alt="">
                                        </span>
                                        @if(Auth::guard('meatregistereduser')->check())
                                           <span class="user-name">
                                                {{ Auth::guard('meatregistereduser')->user()->name }}
                                            </span>
                                        @elseif(Auth::guard('web')->check())
                                           <span class="user-name">
                                                {{ Auth::user()->name }} 
                                            </span>
                                        @else
                                           <span class="user-name">
                                                
                                            </span>
                                        @endif
                    
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list" >
                                        <a class="dropdown-item" href="{{ url('/user/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="dw dw-logout"></i> Log Out
                                        </a>
                                        <form id="logout-form" action="{{ url('/user/logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                
                <div class="pd-20 card-box mb-30" style="border: 1px solid #000000;">
                    
                    <div class="wizard-content p-3">
                        <form class="tab-wizard wizard-circle wizard"  method="POST" action="{{ url('/user/meat_renewal_form') }}" enctype="multipart/form-data">
                             @csrf
                            
                            <section class="pt-3">
                                <strong class="pt-2 text-primary">
                                     Basic Details / ( मूलभूत तपशील )
                                </strong>
                                <hr>
                            

                                 <input type="hidden" name="meat_register_oldid" id="meat_register_oldid"  value="{{ $data->id }}" >
                                 <input type="hidden" name="renwal_liceans_no" id="renwal_liceans_no"  value="{{ $data->meat_pplication_no }}" >

                                <strong class="pb-1">Name of Applicant / ( अर्जदाराचे नाव ) : <span style="color:red;">*</span> </strong>
                                <div class="form-group row">
                                   
                                    <div class="col-sm-3 col-md-3 ">
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
                                    
                                    <label class="col-sm-2"><strong>Email Id / (ई - मेल आयडी) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}" placeholder="Email Id / (ई - मेल आयडी)">
                                        @error('email')
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
                                
                                
                                <strong class="pt-2 text-primary">
                                     Residential Address of Applicant / ( अर्जदाराचा निवासी पत्ता )
                                </strong>
                                <hr>

                                 <div class="form-group row">
                                    <label class="col-sm-2"><strong>House Number / (घर क्रमांक) :  <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="house_number" id="house_number" class="form-control @error('house_number') is-invalid @enderror" value="{{ $data->house_number }}" placeholder="House Number / (घर क्रमांक)">
                                        @error('house_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>House Name / (घराचे नाव) :</strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="house_name" id="house_name" class="form-control @error('house_name') is-invalid @enderror" value="{{ $data->house_name }}" placeholder="House Name / (घराचे नाव)">
                                        @error('house_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                    
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Street 1 / <br> ( रस्ता १ ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="street_1" id="street_1" class="form-control @error('street_1') is-invalid @enderror" value="{{ $data->street_1 }}" placeholder="Street 1 / (रस्ता १)">
                                        @error('street_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                     
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Street 2 / <br> ( रस्ता 2 ) : </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " name="street_2" id="street_2" value="{{ $data->street_2 }}" >
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Area 1 / ( क्षेत्र १ ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <input type="text" name="area_1" id="area_1" class="form-control @error('area_1') is-invalid @enderror" value="{{ $data->area_1 }}" placeholder="Area 1 / (क्षेत्र १)">
                                        @error('area_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Area 2 / <br> ( क्षेत्र  २ ) : </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " name="area_2" id="area_2" value="{{ $data->area_2 }}" >
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <?php
                                        $country_id = '';
                                        
                                        if($data->country_id == 1)
                                        {
                                            $country_id = 'India';
                                        }
                                        
                                    ?>
                                    <label class="col-sm-2"><strong>Country / <br> ( देश ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <select class="form-control custom-select2 @error('country_id') is-invalid @enderror"  name="country_id" id="country_id" style="width: 100%; height: 38px;" > 
                                            <option value=" ">Select Country / (देश) </option>
                                            <option value="1" {{ $data->country_id == '1' ? 'selected' : '' }}>India</option>
                                        </select>
                                        @error('country_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    
                                    <label class="col-sm-2"><strong>State / ( राज्य ) <span style="color:red;">*</span>: </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <select class="form-control custom-select2 @error('state_id') is-invalid @enderror"  name="state_id" id="state_id" style="width: 100%; height: 38px;" >
                                            <option value=" ">Select State / (राज्य) </option>
                                            <option value="1"  {{ $data->state_id == '1' ? 'selected' : '' }}>Maharashtra</option>
                                        </select>
                                        @error('state_id')
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
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>District / <br> ( जिल्हा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('district_id') is-invalid @enderror"  name="district_id" id="district_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select District / (जिल्हा) </option>
                                            @foreach ($mst_dist as $key => $value)
                                                <option value="{{ $value->id }}" {{ $data->district_id == $value->id ? 'selected' : '' }}>{{ $value->dist_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('district_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <?php
                                    $mst_taluka = DB::select('SELECT
                                                                `mst_taluka`.`id`, `mst_taluka`.`taluka_name`
                                                            FROM `mst_taluka`
                                                            WHERE `mst_taluka`.`deleted_at` is NULL
                                                            ORDER BY `mst_taluka`.`id` DESC
                                                            ');
                                ?>
                                    <label class="col-sm-2"><strong>Taluka / <br> ( तालुका ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <select class="form-control custom-select2 @error('taluka_id') is-invalid @enderror"  name="taluka_id" id="taluka_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Taluka / (तालुका)</option>
                                          @foreach ($mst_taluka as $key => $value)
                                                <option value="{{ $value->id }}" {{ $data->taluka_id == $value->id ? 'selected' : '' }}>{{ $value->taluka_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('taluka_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                       
                                    </div>
                                
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Zip Code / <br> ( पिनकोड ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">

                                        <input type="text" name="zipcode" id="zipcode" maxlength="6" class="form-control @error('zipcode') is-invalid @enderror" value="{{ $data->zipcode }}"  placeholder="Zip Code / पिनकोड ">
                                        @error('zipcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                     
                                    </div>
                                    
                                 
                                </div>
                            
                               <strong class="pt-2 text-primary">
                                    Business Details / ( व्यवसाय तपशील )
                                </strong>
                                <hr>
                                
                                 <div class="form-group row">
                                    <label class="col-sm-2"><strong>Name of the business / (व्यवसायाचे नाव) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="business_name" id="business_name"  class="form-control @error('business_name') is-invalid @enderror" value="{{ $data->business_name }}" placeholder="Name of the business / व्यवसायाचे नाव">
                                        @error('business_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Kind of Business / (व्यवसायाचा प्रकार) : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       

                                    <select class="form-control custom-select2 @error('business_type') is-invalid @enderror"  name="business_type" id="business_type" style="width: 100%; height: 38px;">
                                        <option value=" ">Select Kind of Business / (व्यवसायाचा प्रकार)</option>
                                        <option value="1" {{ $data->business_type  == '1' ? 'selected' : '' }}>Butcher Shope ( मांस  विक्री  केंद्र )</option>
                                        <option value="2" {{ $data->business_type  == '2' ? 'selected' : '' }}>Meat Processing Plant ( मांस  प्रक्रिया   केंद्र  )</option>
                                        <option value="3" {{ $data->business_type  == '3' ? 'selected' : '' }}>Transportation of Meat ( मांसाची  वाहतूक )</option>
                                        <option value="4" {{ $data->business_type  == '4' ? 'selected' : '' }}>Other ( इतर )</option>
                                    </select>

                                        @error('business_type')
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
                                    
                                    <label class="col-sm-2"><strong>Per Day Capacity / (प्रतिदिन क्षमता) : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <input type="text" name="per_day_capacity" id="per_day_capacity" class="form-control @error('per_day_capacity') is-invalid @enderror" value="{{ $data->per_day_capacity  }}" placeholder="Per Day Capacity / प्रतिदिन क्षमता">
                                        @error('per_day_capacity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      
                                    </div>
                                </div>
                            
                             <div class="form-group row">
                                         
                                            <label class="col-sm-2"><strong>Provision of water / (पाण्याची व्यवस्था आहे का ?) : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                 <select class="form-control custom-select2 @error('provision_water') is-invalid @enderror"  name="provision_water" id="provision_water" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Provision of water / (पाण्याची व्यवस्था आहे का ?) </option>
                                            <option value="1" {{ $data->provision_water == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="2" {{ $data->provision_water == '2' ? 'selected' : '' }}>No</option>
                                        </select>
                                        
                                        @error('provision_water')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                               
                                            </div>
                                          
                                            <label class="col-sm-2"><strong>Provision of electricity / (विजेची व्यवस्था आहे का ? ) : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                 <select class="form-control custom-select2 @error('provision_electricty') is-invalid @enderror"  name="provision_electricty" id="provision_electricty" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Provision of electricity / (विजेची व्यवस्था आहे का ?) </option>
                                            <option value="1" {{ $data->provision_electricty == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="2" {{ $data->provision_electricty == '2' ? 'selected' : '' }}>No</option>
                                        </select>
                                        
                                        @error('provision_electricty')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                                
                                            </div>
                                        </div>
                                        
                                         <div class="form-group row">
                                            <label class="col-sm-2"><strong>Address of the business / (व्यवसायाचा पत्ता) : <span style="color:red;">*</span> </strong></label>
                                            <div class="col-sm-12 col-md-12 p-2">
                                                <textarea type="text" name="business_address" id="business_address" class="form-control @error('business_address') is-invalid @enderror" value="{{ $data->business_address }}" placeholder="Address of the business / (व्यवसायाचा पत्ता)" style="height:120px;">{{ $data->business_address }} }}</textarea>
                                        @error('business_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                               

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            
                                             <label class="col-sm-2"><strong>Provision of sewerage for disposing effluent / (सांडपाण्याची भूमिगत गटाराची व्यवस्था आहे का ?) : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                <select class="form-control custom-select2 @error('sewerage_disposing') is-invalid @enderror"  name="sewerage_disposing" id="sewerage_disposing" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Provision of sewerage for disposing effluent / (सांडपाण्याची भूमिगत गटाराची व्यवस्था आहे का ?) </option>
                                            <option value="1" {{ $data->sewerage_disposing == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="2" {{ $data->sewerage_disposing == '2' ? 'selected' : '' }}>No</option>
                                        </select>
                                        
                                        @error('sewerage_disposing')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                            </div>
                                            
                                            <label class="col-sm-2"><strong>If not explain provision to dispose effluent / (नसल्यास सांडपाण्याची विल्हेवाट कशी लावली जाते ) : </strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                 <textarea type="text" name="prcision_dispose_id" id="prcision_dispose_id" class="form-control @error('prcision_dispose_id') is-invalid @enderror" value="{{ $data->prcision_dispose_id }}" placeholder="If not explain provision to dispose effluent /(नसल्यास सांडपाण्याची  विल्हेवाट कशी  लावली जाते ) " style="height:80px;">{{ $data->prcision_dispose_id }}</textarea>
                                        @error('prcision_dispose_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                               
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                    <label class="col-sm-12">
                                        <strong>Is place is located at least 50mt. away form <br> Place of worship / educational institute / hospital & clinic <br> (जागेपासून प्रार्थनास्थळे / शिक्षणसंस्था /इस्पितळे व दवाखाने कमीत कमी ५० मीटर पेक्षा जास्त अंतरावर आहेत का ? ) : <span style="color:red;">*</span></strong>
                                    </label>
                                    <div class="col-sm-12 col-md-12 ">
                                        <select class="form-control custom-select2 @error('place_id') is-invalid @enderror"  name="place_id" id="place_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Is place is located at least 50mt. away form place of worship / educational institute / hospital & clinic  </option>
                                            <option value="1" {{ $data->place_id == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="2" {{ $data->place_id == '2' ? 'selected' : '' }}>No</option>
                                        </select>
                                        
                                        @error('place_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                        
                                        
                            <strong class="pt-2 text-primary">
                                    Business registration details / ( व्यवसाय नोंदणी तपशील )
                                </strong>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong> Registration authority name  / (नोंदणी प्राधिकरणाचे नाव) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 ">

                                         <input type="text" name="regi_authority_name" id="regi_authority_name"  class="form-control @error('regi_authority_name') is-invalid @enderror" value="{{ $data->regi_authority_name }}" placeholder="Registration authority name  / नोंदणी प्राधिकरणाच नाव">
                                        @error('regi_authority_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       
                                        
                                    </div>
                                    
                                    <label class="col-sm-2"><strong> Registration Number   / (नोंदणी क्रमांक) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 ">

                                        <input type="text" name="register_number" id="register_number"  class="form-control @error('register_number') is-invalid @enderror" value="{{ $data->register_number  }}" placeholder="Registration Number  / नोंदणी क्रमांक">
                                        @error('register_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      
                                        
                                    </div>
                                    </div>
                                  <div class="form-group row">   
                                    <label class="col-sm-2"><strong> Valid till / (पर्यंत वैध) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4">
                                       <input type="Date" name="valid_till" id="valid_till" class="form-control  @error('valid_till') is-invalid @enderror" value="{{ $data->valid_till  }}" placeholder="valid till ">
                                        @error('valid_till')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       
                                    </div>
                                </div>
                                        
                                   <strong class="pt-2 text-primary">
                                    Details of business place / ( व्यवसायाच्या ठिकाणाचा तपशील )
                                </strong>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong> Area of business place(sq/mtr)  / (व्यवसायाच्या ठिकाणाचे क्षेत्रफळ (चौरस/मीटर) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       <input type="text" name="areaof_business_place" id="areaof_business_place"  class="form-control @error('areaof_business_place') is-invalid @enderror" value="{{ $data->areaof_business_place  }}" placeholder="Area of business place(sq/mtr)  / (व्यवसायाच्या ठिकाणाचे क्षेत्रफळ (च नाव">
                                        @error('areaof_business_place')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>
                                    
                                    <label class="col-sm-2"><strong> Place   / (ठिकाण) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                        
                                        
                                            <select class="form-control custom-select2 @error('business_place') is-invalid @enderror"  name="business_place" id="business_place" style="width: 100%; height: 38px;"  onchange="showDiv('hidden_div', this)">
                                            <option value=" ">Select  place   </option>
                                            <option value="1" {{ $data->business_place == '1' ? 'selected' : '' }}>सिडको  मार्केटमधील जागा/ Place in CIDCO Market </option>
                                            <option value="2" {{ $data->business_place == '2' ? 'selected' : '' }}>वाणिज्य वापराखालील जागा/ Space under commercial use </option>
                                            <option value="3" {{ $data->business_place == '3' ? 'selected' : '' }}>गावठाण भागातील  जागा/ Places in village( Gavthan ) area </option>
                                            <option value="4" {{ $data->business_place == '4' ? 'selected' : '' }}> इतर नमूद करणे/ To mention others </option>
                                        </select>
                                        @error('business_place')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                              
                                    </div>
                                    </div>
                                  <div class="form-group row other_b" id="hidden_div" style="display:none">   
                                    <label class="col-sm-2"><strong> Other  : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4">
                                      
                                         <input  class="form-control" value="{{ $data->business_place_other  }}" >
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
                                             <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/adharcard_doc/{{ $data->adharcard_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->adharcard_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/adharcard_doc/{{ $data->adharcard_doc }}  " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/adharcard_doc/{{ $data->adharcard_doc }}" target="_blank" download>
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
                                    
                                    <label class="col-sm-2"><strong>Upload Ration card, electricity / telephone bill. <br> ( रेशन कार्ड, वीज / टेलिफोन बिल अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                      
                                       <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/residitional_proof_doc/{{ $data->residitional_proof_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->residitional_proof_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/residitional_proof_doc/{{ $data->residitional_proof_doc }}" alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/residitional_proof_doc/{{ $data->residitional_proof_doc }} " target="_blank" download>
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
                                  <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload legal document of the business place <br> ( जागेचा अधिकृततेचा पुरावा अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                        <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/legal_business_doc/{{ $data->legal_business_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->legal_business_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/legal_business_doc/{{ $data->legal_business_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/legal_business_doc/{{ $data->legal_business_doc }}" target="_blank" download>
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
                                    
                                    <label class="col-sm-2"><strong>Upload business registration certificate <br> ( व्यवसाय नोंदणी प्रमाणपत्र अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                        
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/business_registration_doc/{{ $data->business_registration_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->business_registration_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/business_registration_doc/{{ $data->business_registration_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/business_registration_doc/{{ $data->business_registration_doc }}" target="_blank" download>
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
                                
                                  
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload receipt of recently paid property tax <br> ( मालमत्ता कर भरल्याचा पुरावा अपलोड करा ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                         <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/property_tax_doc/{{ $data->property_tax_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->property_tax_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/property_tax_doc/{{ $data->property_tax_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/property_tax_doc/{{ $data->property_tax_doc }}" target="_blank" download>
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
                                    
                                    <label class="col-sm-2"><strong>Upload receipt of recently paid water ( पानी पट्टी पावती अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                       <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/paid_water_doc/{{ $data->paid_water_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->paid_water_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/paid_water_doc/{{ $data->paid_water_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/paid_water_doc/{{ $data->paid_water_doc }}" target="_blank" download>
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
                                
                                <div class="form-group row">
                                  
                                      <label class="col-sm-2"><strong>Upload details & authority letter from authorized slaughter house / poultry form & authority letter <br>( अधिकृत कुक्कुट पालन करणाऱ्या संस्थेचे व कत्तलखाण्याची माहिती ई संमातीपत्र अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                         <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/slaughter_letter_doc/{{ $data->slaughter_letter_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->slaughter_letter_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/slaughter_letter_doc/{{ $data->slaughter_letter_doc }}" alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/slaughter_letter_doc/{{ $data->slaughter_letter_doc }}" target="_blank" download>
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
                                    
                                    <label class="col-sm-2"><strong>Upload pest control treatment certificate issued from authorized agency <br> ( नोंदणीकृत  संस्थेकडून  कीटनाशक फवारणी केल्याचे प्रमाणपत्र अपलोड करा ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/treatment_authorized_doc/{{ $data->treatment_authorized_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->treatment_authorized_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/treatment_authorized_doc/{{ $data->treatment_authorized_doc }}" alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/treatment_authorized_doc/{{ $data->treatment_authorized_doc }} " target="_blank" download>
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
                                
                                 <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload medical fitness certificate issued by Municipal hospital <br> ( कामगारांचे पालिका रुग्णालयाने दिलेले आरोग्याचे  प्रमाणपत्र अपलोड करा ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                       <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/fitness_certificate_doc/{{ $data->fitness_certificate_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->fitness_certificate_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/fitness_certificate_doc/{{ $data->fitness_certificate_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/fitness_certificate_doc/{{ $data->fitness_certificate_doc }} " target="_blank" download>
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
                                    
                                    <label class="col-sm-2"><strong>Upload FSSAI Registration Certificate  <br> (अन्न  सुरक्षा व मानदे अधिनियम २००६ व नियम  व नियमन,२०११ अन्वये, व्यवसाय नोंदणी प्रमाणपत्र )करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                         <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/issued_doc/{{ $data->issued_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->issued_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/issued_doc/{{ $data->issued_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/issued_doc/{{ $data->issued_doc }}" target="_blank" download>
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
                                    <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload applicant signature / ( अर्जदाराची स्वाक्षरी अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $data->applicant_signature }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->applicant_signature;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $data->applicant_signature }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $data->applicant_signature }}" target="_blank" download>
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
                                    
                                    <label class="col-sm-2"><strong>Upload applicant profile photo / ( अर्जदाराचा प्रोफाइल फोटो अपलोड करा ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/profile_photo/{{ $data->profile_photo }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $data->profile_photo;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/profile_photo/{{ $data->profile_photo }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/profile_photo/{{ $data->profile_photo }}" target="_blank" download>
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

                                 <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload previous year licence copy  / ( मागील वर्षाच्या परवान्याची प्रत अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                          <input type="file" name="old_licence" id="old_licence" accept=".png, .jpg, .jpeg, .pdf" class="form-control @error('applicant_signature') is-invalid @enderror" value="{{ (!empty($data->old_licence)) ? $data->old_licence : ''  }}" placeholder="Upload applicant signature">
                                        <small class="text-secondary text-justify "> Note : The file should be less than 2MB .</small>
                                        <br>
                                        <small class="text-secondary text-justify "> Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</small>
                                        <br>
                                        @error('old_licence')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    
                                   
                                </div>     
                                        
                                  <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ url('/') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>       
                                        
                        </section>
                            
                        </form>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- success Popup html Start -->
    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ url('/user/dog_registration/store') }}" enctype="multipart/form-data">
                  @csrf
                <div class="modal-body text-center font-18">
                    <h5 class="mb-20">Are you sure you want to cancel?</h5>
                    <div class="mb-30 text-center"><img src="{{ url('/') }}/userend/assets/vendors/images/success.png"></div>
                </div>
                <div class="modal-footer justify-content-center">
                    @if(Auth::guard('meatregistereduser')->check())
                       <a href="{{ url('/user/appli_form') }}" class="btn btn-danger ">Cancel</a>&nbsp;&nbsp; 
                    @elseif(Auth::guard('web')->check())
                       <a href="{{ url('/user/appli_form') }}" class="btn btn-danger ">Cancel</a>&nbsp;&nbsp;
                    @else
                       <a href="{{ url('/user/appli_form') }}" class="btn btn-danger ">Cancel</a>&nbsp;&nbsp;
                    @endif
                    <!--<button type="submit" class="btn btn-primary" >Done</button>-->
                </div>
                
                </form>
            </div>
        </div>
    </div>
    <!-- success Popup html End -->
    
    <!-- js -->
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/core.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/script.min.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/process.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/layout-settings.js"></script>
    <script src="{{ url('/') }}/userend/assets/src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/steps-setting.js"></script>
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
</body>

</html>
