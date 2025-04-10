<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>PMC || Application for Meat view Application</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
    
    <!-- Toaster Message -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
</head>

<style>
    .error{
        color:red;
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
                                <h4>Application for view Application</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <!--<li class="breadcrumb-item"><a href="javascript:;">Documentation</a></li>-->
                                    <li class="breadcrumb-item active" aria-current="page">Application for Meat View</li>
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
                
              
                
                <section class="content">
    <div class="body_scroll">
        <!--<div class="block-header">-->
        <!--    <div class="row">-->
        <!--        <div class="col-lg-7 col-md-6 col-sm-12">-->
        <!--            <h2>Meat Application</h2>-->
        <!--            <ul class="breadcrumb">-->
        <!--                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>-->
                        <!--<li class="breadcrumb-item"><a href="{{ url('/#') }}">PET Application</a></li>-->
        <!--                <li class="breadcrumb-item active">Meat Application</li>-->
        <!--            </ul>-->
        <!--            <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>-->
        <!--        </div>-->
                
        <!--        <div class="col-lg-5 col-md-6 col-sm-12">-->
        <!--            <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->

        <div class="container-fluid">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form method="post" action="{{ url('#') }}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="pd-20 card-box mb-30">
                                   <section class="pt-3">
                                <strong class="pt-2 text-primary">
                                     Basic Details / ( मूलभूत तपशील )
                                </strong>
                                <hr>
                            <?php //print_r($meat_registration_view);exit;?>
                                
                                <strong class="pb-1">Name of Applicant / ( अर्जदाराचे नाव ) : <span style="color:red;">*</span> </strong>
                                <div class="form-group row">
                                    <?php
                                        $applicant_title_id = '';
                                        
                                        if($meat_registration_view->applicant_title_id == 1)
                                        {
                                            $applicant_title_id = 'Kum.';
                                        }
                                        else if($meat_registration_view->applicant_title_id == 2)
                                        {
                                            $applicant_title_id = 'M/s';
                                        }
                                        else if($meat_registration_view->applicant_title_id == 3)
                                        {
                                            $applicant_title_id = 'Smt.';
                                        }
                                        else if($meat_registration_view->applicant_title_id == 4)
                                        {
                                            $applicant_title_id = 'Ms.';
                                        }
                                        else if($meat_registration_view->applicant_title_id == 5)
                                        {
                                            $applicant_title_id = 'Mr.';
                                        }
                                        else if($meat_registration_view->applicant_title_id == 6)
                                        {
                                            $applicant_title_id = 'MrS.';
                                        }
                                        else if($meat_registration_view->applicant_title_id == 7)
                                        {
                                            $applicant_title_id = 'Dr.';
                                        }
                                        
                                    ?>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input class="form-control " value="{{ $applicant_title_id }}" readonly>
                                    </div>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input class="form-control " value="{{ $meat_registration_view->applicant_fname }}" readonly>
                                    </div>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input class="form-control " value="{{ $meat_registration_view->applicant_mname }}" readonly>
                                    </div>
                                    
                                    
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input class="form-control " value="{{ $meat_registration_view->applicant_lname }}" readonly>
                                    </div>
                                </div>
                                
                                
                                    <div class="form-group row">
                                     <label class="col-sm-2"><strong>Mobile Number / (मोबाईल नंबर) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <input class="form-control " value="{{ $meat_registration_view->mobile_number }}" readonly>
                                       
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Email Id / (ई - मेल आयडी) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                          <input class="form-control " value="{{ $meat_registration_view->email }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Aadhar Number / (आधार क्रमांक) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                          <input class="form-control " value="{{ $meat_registration_view->aadhar_number }}" readonly>
                                    </div>
                                </div>
                                
                                <strong class="pt-2 text-primary">
                                     Residential Address of Applicant / ( अर्जदाराचा निवासी पत्ता )
                                </strong>
                                <hr>
                                    
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>House Number / <br> ( घर क्रमांक ) :  <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_registration_view->house_number }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>House Name / <br> ( घराचे नाव ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_registration_view->house_name }}" readonly>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Street 1 / <br> ( रस्ता १ ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_registration_view->street_1 }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Street 2 / <br> ( रस्ता 2 ) : </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_registration_view->street_2 }}" readonly>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Area 1 / ( क्षेत्र १ ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_registration_view->area_1 }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Area 2 / <br> ( क्षेत्र  २ ) : </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_registration_view->area_2 }}" readonly>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <?php
                                        $country_id = '';
                                        
                                        if($meat_registration_view->country_id == 1)
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
                                        
                                        if($meat_registration_view->state_id == 1)
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
                                        <input class="form-control " value="{{ $meat_registration_view->dist_name }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Taluka / <br> ( तालुका ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_registration_view->taluka_name }}" readonly>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Zip Code / <br> ( पिनकोड ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_registration_view->zipcode }}" readonly>
                                    </div>
                                    
                                 
                                </div>
                            
                               <strong class="pt-2 text-primary">
                                    Business Details / ( व्यवसाय तपशील )
                                </strong>
                                <hr>
                                
                                 <div class="form-group row">
                                    <label class="col-sm-2"><strong>Name of the business / (व्यवसायाचे नाव) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <input class="form-control " value="{{ $meat_registration_view->business_name }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Kind of Business / (व्यवसायाचा प्रकार) : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       <?php
                                                $business_type = '';
                                                
                                                if($meat_registration_view->business_type == 1)
                                                {
                                                    $business_type = 'Meat/Fish Shop ( मांस/मासे दुक';
                                                }
                                                if($meat_registration_view->business_type == 5)
                                                {
                                                    $business_type = 'Meat Product Selling Center ( मांस उत्पादन विक्री';
                                                }
                                               
                                                if($meat_registration_view->business_type == 4)
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
                                                <input readonly  class="form-control " value="{{ $meat_registration_view->meat_name }}" >
                                            </div>
                                            
                                            <label class="col-sm-2"><strong>Per Day Capacity / (प्रतिदिन क्षमता) : <span style="color:red;">*</span> </strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                <input readonly class="form-control" value="{{ $meat_registration_view->per_day_capacity  }}" >
                                            </div>
                                             <label class="col-sm-2"><strong>Unit / (युनिट) :<span style="color:red;">*</span> </strong></label>
                                                           <div class="col-sm-4 col-md-4 p-2">
                                       <select class="form-control custom-select2 @error('unit') is-invalid @enderror" name="unit" id="meat_type" style="width: 100%; height: 38px;">
                                            <option value="">Select Unit / (युनिट) </option>
                                            @foreach ($unit_Meat_Type as $item)
                                                <option value="{{ $item->id }}" {{ (old('unit') ?? $meat_registration_view->unit) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->unit_name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        
                                        @error('meat_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        
                                    </div>
                            </div>
                            
                             <div class="form-group row">
                                            <?php
                                                $provision_water = '';
                                                
                                                if($meat_registration_view->provision_water == 1)
                                                {
                                                    $provision_water = 'Yes';
                                                }
                                                if($meat_registration_view->provision_water == 2)
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
                                                
                                                if($meat_registration_view->provision_electricty == 1)
                                                {
                                                    $provision_electricty = 'Yes';
                                                }
                                                if($meat_registration_view->provision_electricty == 2)
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
                                                <textarea readonly class="form-control" value="{{ $meat_registration_view->business_address }}" style="height:120px;">{{ $meat_registration_view->business_address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <?php
                                                $sewerage_disposing = '';
                                                
                                                if($meat_registration_view->sewerage_disposing == 1)
                                                {
                                                    $sewerage_disposing = 'Yes';
                                                }
                                                if($meat_registration_view->sewerage_disposing == 2)
                                                {
                                                    $sewerage_disposing = 'No';
                                                }
                                            ?>
                                            <label class="col-sm-2"><strong>Provision of sewerage for disposing effluent / (सांडपाण्याची भूमिगत गटाराची व्यवस्था आहे का ?)  : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                <input readonly class="form-control" value="{{ $sewerage_disposing }}" >
                                            </div>
                                            @if(isset($meat_registration_view->prcision_dispose_id))
                                            <label class="col-sm-2"><strong>If not explain provision to dispose effluent / (नसल्यास सांडपाण्याची विल्हेवाट कशी लावली जाते ) : </strong></label>
                                            <div class="col-sm-4 col-md-4 p-2">
                                                <textarea readonly class="form-control " value="{{ $meat_registration_view->prcision_dispose_id }}"   style="height:80px;">{{ $meat_registration_view->prcision_dispose_id }}</textarea>
                                            </div>
                                            @endif
                                        </div>
                                        
                                        
                                         <strong class="pt-2 text-primary">
                                    Business registration details / ( व्यवसाय नोंदणी तपशील )
                                </strong>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong> Registration authority name  / (नोंदणी प्राधिकरणाचे नाव) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                         <input readonly class="form-control" value="{{ $meat_registration_view->regi_authority_name  }}" >
                                    </div>
                                    
                                    <label class="col-sm-2"><strong> Registration Number   / (नोंदणी क्रमांक) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                      
                                        <input readonly class="form-control" value="{{ $meat_registration_view->register_number  }}" >
                                    </div>
                                    </div>
                                  <div class="form-group row">   
                                    <label class="col-sm-2"><strong> Valid till / (पर्यंत वैध) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4">
                                        <?php
                                       
                                       $date = $meat_registration_view->valid_till;
                                       
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
                                    
                                         <input readonly class="form-control" value="{{ $meat_registration_view->areaof_business_place  }}" >
                                    </div>
                                    
                                     <label class="col-sm-2"><strong> Place   / (ठिकाण) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                        
                                          <?php
                                                $business_place = '';
                                                
                                                if($meat_registration_view->business_place == 1)
                                                {
                                                    $business_place = 'महानगर पालिका बाजार/ Mahanagara Palika Bazar';
                                                }
                                                if($meat_registration_view->business_place == 2)
                                                {
                                                    $business_place = 'खाजगी जागा/ Private space';
                                                }
                                               
                                            ?>
                                               <input readonly class="form-control" id="business_place" value="{{ $business_place  }}" >
                                    </div>
                                    </div>
                                  <div class="form-group row other_b" id="hidden_div" style="display:none">   
                                    <label class="col-sm-2"><strong> Other  : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4">
                                      
                                         <input readonly class="form-control" value="{{ $meat_registration_view->business_place_other  }}" >
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
                                    टीप :- कृपया दस्तऐवजाच्या साक्षांकित छायाप्रती संलग्न करा  
                                </strong>
                                <hr>    
                                         <div id="div2" style="display: none;">
                                <div class="form-group row">
                                   
                                  <label class="col-sm-2"><strong>Upload ID proof (Adharcard) of the applicant  <br> (अर्जदाराचा आयडी पुरावा (आधारकार्ड) अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                             <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/adharcard_doc/{{ $meat_registration_view->adharcard_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->adharcard_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/adharcard_doc/{{ $meat_registration_view->adharcard_doc }}  " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/adharcard_doc/{{ $meat_registration_view->adharcard_doc }}" target="_blank">
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else { ?> <p>No Document Found</p> <?php } ?>
                                                    </div>
                                                </a>
                                                
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Upload Ration card, electricity / telephone bill. <br> ( रेशन कार्ड, वीज / टेलिफोन बिल अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                      
                                       <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/residitional_proof_doc/{{ $meat_registration_view->residitional_proof_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->residitional_proof_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/residitional_proof_doc/{{ $meat_registration_view->residitional_proof_doc }}" alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/residitional_proof_doc/{{ $meat_registration_view->residitional_proof_doc }} " target="_blank">
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
                                  <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload legal document of the business place <br> ( व्यवसायाच्या ठिकाणाचे कायदेशीर दस्तऐवज अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                        <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/legal_business_doc/{{ $meat_registration_view->legal_business_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->legal_business_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/legal_business_doc/{{ $meat_registration_view->legal_business_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/legal_business_doc/{{ $meat_registration_view->legal_business_doc }}" target="_blank">
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
                                    
                                    <label class="col-sm-2"><strong>Upload business registration certificate <br> ( व्यवसाय नोंदणी प्रमाणपत्र अपलोड करा ) : <span style="color:red;"></span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                        
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/business_registration_doc/{{ $meat_registration_view->business_registration_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->business_registration_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/business_registration_doc/{{ $meat_registration_view->business_registration_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/business_registration_doc/{{ $meat_registration_view->business_registration_doc }}" target="_blank">
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else{ ?> <a href="#">No Document Found</a> <?php  }?>
                                                    </div>
                                                </a>
                                    </div> 
                                </div>
                                
                                  
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload receipt of recently paid property tax <br> ( नुकत्याच भरलेल्या मालमत्ता कराची पावती अपलोड करा ): <span style="color:red;"></span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                         <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/property_tax_doc/{{ $meat_registration_view->property_tax_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->property_tax_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/property_tax_doc/{{ $meat_registration_view->property_tax_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/property_tax_doc/{{ $meat_registration_view->property_tax_doc }}" target="_blank">
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else{ ?> <a href="#">Document Not Uploaded</a> <?php } ?>
                                                    </div>
                                                </a>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Upload receipt of recently paid water ( पानी पट्टी पावती अपलोड करा ) : <span style="color:red;"></span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                       <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/paid_water_doc/{{ $meat_registration_view->paid_water_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->paid_water_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/paid_water_doc/{{ $meat_registration_view->paid_water_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/paid_water_doc/{{ $meat_registration_view->paid_water_doc }}" target="_blank" >
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else{ ?> <a>No Document Uploaded</a> <?php } ?>
                                                    </div>
                                                </a>
                                    </div> 
                                    
                                    
                                </div>
                                
                                <div class="form-group row">
                                  
                                      <label class="col-sm-2"><strong>Upload Official Slaughterhouse Information e-certificate <br>( अधिकृत कत्तलखाण्याची माहिती ई संमातीपत्र अपलोड करा ) : <span style="color:red;"></span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                         <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/slaughter_letter_doc/{{ $meat_registration_view->slaughter_letter_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->slaughter_letter_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/slaughter_letter_doc/{{ $meat_registration_view->slaughter_letter_doc }}" alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/slaughter_letter_doc/{{ $meat_registration_view->slaughter_letter_doc }}" target="_blank">
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else{ ?> <a href="#">No Document Uploaded</a>  <?php } ?>
                                                    </div>
                                                </a>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Upload pest control treatment certificate issued from authorized agency <br> ( नोंदणीकृत  संस्थेकडून  कीटनाशक फवारणी केल्याचे प्रमाणपत्र अपलोड करा ): <span style="color:red;"></span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/treatment_authorized_doc/{{ $meat_registration_view->treatment_authorized_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->treatment_authorized_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/treatment_authorized_doc/{{ $meat_registration_view->treatment_authorized_doc }}" alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/treatment_authorized_doc/{{ $meat_registration_view->treatment_authorized_doc }} " target="_blank">
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php }else { ?><a>No Document Uploaded</a> <?php } ?>
                                                    </div>
                                                </a>
                                         </div>
                                       </div>
                                
                                 <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload medical fitness certificate issued by MBBS Doctor <br> ( एमबीबीएस डॉक्टरांनी दिलेले वैद्यकीय फिटनेस प्रमाणपत्र अपलोड करापत्र अपलोड करा ): <span style="color:red;"></span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                       <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/fitness_certificate_doc/{{ $meat_registration_view->fitness_certificate_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->fitness_certificate_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/fitness_certificate_doc/{{ $meat_registration_view->fitness_certificate_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/fitness_certificate_doc/{{ $meat_registration_view->fitness_certificate_doc }} " target="_blank">
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else { ?> <a href="#">No Document Uploaded</a> <?php } ?>
                                                    </div>
                                                </a>
                                    </div> 
                                    
                                    <label class="col-sm-2"><strong>Upload Gumaste Certificate <br>  (गुमास्ते प्रमाणपत्र अपलोड ): <span style="color:red;"></span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                         <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/gumaste_doc/{{ $meat_registration_view->gumaste_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->gumaste_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/gumaste_doc/{{ $meat_registration_view->gumaste_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                elseif($filter_ext == 'pdf'){
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/gumaste_doc/{{ $meat_registration_view->gumaste_doc }}" target="_blank">
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-info">
                                                                            View File
                                                                        </button>
                                                                        </p>                                                                
                                                                    </a>
                                                        <?php } else{ ?> <a href="#">Document Not Uploaded</a> <?php } ?>
                                                    </div>
                                                </a>
                                    </div>
                                    
                                    <label class="col-sm-2 d-none"><strong>Upload FSSAI Registration Certificate  <br> (अन्न  सुरक्षा व मानदे अधिनियम २००६ व नियम  व नियमन,२०११ अन्वये, व्यवसाय नोंदणी प्रमाणपत्र )करा ) : <span style="color:red;"></span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2 d-none">
                                       
                                         <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/issued_doc/{{ $meat_registration_view->issued_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->issued_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/issued_doc/{{ $meat_registration_view->issued_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/issued_doc/{{ $meat_registration_view->issued_doc }}" target="_blank">
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
                                  <div class="form-group row">
                                    <label class="col-sm-2"><strong>Upload applicant signature / ( अर्जदाराची स्वाक्षरी अपलोड करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $meat_registration_view->applicant_signature }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->applicant_signature;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $meat_registration_view->applicant_signature }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $meat_registration_view->applicant_signature }}" target="_blank">
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
                                    
                                    <label class="col-sm-2"><strong>Upload applicant profile photo / ( अर्जदाराचा प्रोफाइल फोटो अपलोड करा ): <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                          <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/profile_photo/{{ $meat_registration_view->profile_photo }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->profile_photo;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/profile_photo/{{ $meat_registration_view->profile_photo }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/profile_photo/{{ $meat_registration_view->profile_photo }}" target="_blank">
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
</div>
                                  <div id="div1" style="display: none;">
                                     <div class="form-group row">
                                  
                                  <label class="col-sm-2"><strong>Upload Municipal Corporation Permission Letter <br> (महापालिकेचे परवानगी पत्र करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                         <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/municipal_corpor_doc/{{ $meat_registration_view->municipal_corpor_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_registration_view->municipal_corpor_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/municipal_corpor_doc/{{ $meat_registration_view->municipal_corpor_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/municipal_corpor_doc/{{ $meat_registration_view->municipal_corpor_doc }}" target="_blank">
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
                                                    <a href="{{ url('/user/appli_form') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;
                                                    
                                                </div>
                                         
                                         </div>
            						</section>
                                </div>
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
    
    <!-- js -->
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/core.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/script.min.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/process.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/layout-settings.js"></script>
    <script src="{{ url('/') }}/userend/assets/src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/steps-setting.js"></script>
    
    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    
    <!-- Get Ward List -->
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
                        $('#dept_id').html('<option value="">Select Ward / ( प्रभाग )</option>');
                        $.each(result.departmentlist, function (key, value) {
                            $("#dept_id").append('<option value="' + value
                                .id + '">' + value.dept_name + '</option>');
                        });
                        
                    }
                });
            });
            
        });
    </script>
    
    <!-- Get Taluka List -->
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
                        $('#taluka_id').html('<option value="">Select Taluka / ( तालुका ) </option>');
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
    
    <!-- Future Date Disable -->
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
    
    
    <!-- Same as the Name of Applicant. (Jquary) -->
    <script>
    
        $("#customCheck1").click(function(){
            
            if($("#customCheck1").prop('checked') == true){
                
                var applicant_title_id = $('#applicant_title_id').val();
                var applicant_fname = $('#applicant_fname').val();
                var applicant_mname = $('#applicant_mname').val();
                var applicant_lname = $('#applicant_lname').val();
      
                $('#owner_fname').val(applicant_fname);
                $('#owner_mname').val(applicant_mname);
                $('#owner_lname').val(applicant_lname);
                
                //$('select[name^="owner_title_id"] option[value="'+applicant_title_id+'"]').attr("selected","selected");
                $('#owner_title_id').val(applicant_title_id).change();
            }else{
                
                $('#owner_fname').val('');
                $('#owner_mname').val('');
                $('#owner_lname').val('');
            }
  
        });
    
    </script>
    
    <script>
        var input = document.getElementById('age');
        input.onkeydown = function(e) {
            var k = e.which;
        
            if ( (k < 48 || k > 57) && (k < 96 || k > 105) && k!=8) {
                e.preventDefault();
                return false;
            }
        };
    </script>
    
    <script>
        var input = document.getElementById('month');
        input.onkeydown = function(e) {
            var k = e.which;
        
            if ( (k < 48 || k > 57) && (k < 96 || k > 105) && k!=8) {
                e.preventDefault();
                return false;
            }
        };
    </script>
 <script>
function showRelevantDiv() {
    var div1 = document.getElementById('div1');
    var div2 = document.getElementById('div2');
    var businessPlaceInput = $('#business_place').val();

    // Check if the input value exists
    if (businessPlaceInput === undefined || businessPlaceInput === null) {
        console.error('The value of #business_place is undefined or null.');
        return;
    }

    var selectedValue = businessPlaceInput.trim();

    // Hide both divs initially
    div1.style.display = 'none';
    div2.style.display = 'none';

    // Show the relevant div based on the selected option
    if (selectedValue.includes('महानगर पालिका बाजार')) {
        div1.style.display = 'block';
    } else if (selectedValue.includes('खाजगी जागा')) {
        div2.style.display = 'block';
    }
}

// Run the function when the page loads
$(document).ready(function() {
    showRelevantDiv();
});

</script>
    
</body>

</html>
