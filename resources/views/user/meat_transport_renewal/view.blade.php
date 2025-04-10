
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
				

<section class="content">
    <div class="body_scroll">
        <!--<div class="block-header">-->
        <!--    <div class="row">-->
        <!--        <div class="col-lg-7 col-md-6 col-sm-12">-->
        <!--            <h2>Vehicle Application</h2>-->
        <!--            <ul class="breadcrumb">-->
        <!--                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>-->
                        <!--<li class="breadcrumb-item"><a href="{{ url('/#') }}">PET Application</a></li>-->
        <!--                <li class="breadcrumb-item active">Vehicle Application</li>-->
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
                        <div class="body" style="padding:24px">
                             <form class=""  method="POST" action="#" enctype="multipart/form-data">
                            
                            <section class="pt-3">
                                <strong class="pt-2 text-primary">
                                     Basic Details / ( मूलभूत तपशील )
                                </strong>
                                <hr>
                            
                                
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
                                    
                                  
                                    
                                    <label class="col-sm-2"><strong>Aadhar Number / (आधार क्रमांक) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                          <input class="form-control " value="{{ $meat_renewal_view->aadhar_number }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong> Residential Address / (परवाना धारकाच्या पत्ता ) :  <span style="color:red;">*</span></strong></label>
                                     <div class="col-sm-4 col-md-4 p-2">
                                        <textarea type="text" class="form-control" value="{{ $meat_renewal_view->applicant_address }}" readonly  style="height:70px;">{{ $meat_renewal_view->applicant_address }}</textarea>
                                       
                                    </div>




                                </div>
                                
                                <!--<strong class="pt-2 text-primary">-->
                                <!--     Residential Address of Applicant / ( अर्जदाराचा निवासी पत्ता )-->
                                <!--</strong>-->
                                <!--<hr>-->
                                    
                                
                                <!--<div class="form-group row">-->
                                    <?php
                                        $country_id = '';
                                        
                                        if($meat_renewal_view->country_id == 1)
                                        {
                                            $country_id = 'India';
                                        }
                                        
                                    ?>
                            
                                    
                                    <?php
                                        $state_id = '';
                                        
                                       if($meat_renewal_view->state_id == 1)
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
                                         <input class="form-control " value="{{ $meat_renewal_view->business_name }}" readonly>
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Vehicle registration number / (वाहन नोंदणी क्रमांक ) : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input class="form-control " value="{{ $meat_renewal_view->vehical_register_no }}" readonly>

                                        
                                    </div>
                                    </div>

                            <div class="form-group row">
                                    
                                <label class="col-sm-2"><strong>Address of the vehicle / (वाहनाचा पत्ता ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <textarea type="text"   class="form-control " value="{{ $meat_renewal_view->vehical_address }}"  style="height:80px;"readonly> {{ $meat_renewal_view->vehical_address }} </textarea>
                                       
                                    </div>
                                    
                                      <label class="col-sm-2"><strong> Address of the business / (व्यायसायचा पत्ता    ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        
                                         <textarea type="text"  class="form-control" value="{{ $meat_renewal_view->business_address }}" style="height:80px;" readonly>{{ $meat_renewal_view->business_address }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2"><strong> From the validity period of license sale / <br> (परवाना विक्री ग्राह्य अवधी पासून ) ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="date"  class="form-control " readonly value="{{ $meat_renewal_view->from_date }}" placeholder="DD/MM/YYYY">
                                       
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>Up to the license sale validity period / <br> (परवाना विक्री ग्राह्य अवधी पर्यंत ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="date" class="form-control " readonly value="{{ $meat_renewal_view->to_date }}" >
                                      
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
                                    <label class="col-sm-2"><strong>Upload Driving License Copy  / ( ड्रायव्हिंग लायसन्सची प्रत अपल करा ) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                       
                                          <a href="{{url('/')}}/PMC_vehicle_Registration/meat_file/driving_licence/{{ $meat_renewal_view->driving_licence }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->driving_licence;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_vehicle_Registration/meat_file/driving_licence/{{ $meat_renewal_view->driving_licence }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_vehicle_Registration/meat_file/driving_licence/{{ $meat_renewal_view->driving_licence }}" target="_blank" download>
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
                                        
                                          <a href="{{url('/')}}/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc/{{ $meat_renewal_view->vehicle_insurance_doc }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->vehicle_insurance_doc;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc/{{ $meat_renewal_view->vehicle_insurance_doc }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_vehicle_Registration/meat_file/vehicle_insurance_doc/{{ $meat_renewal_view->vehicle_insurance_doc }}" target="_blank" download>
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
                                     
                                        <!--<input type="file" name="old_licence" id="old_licence" accept=".png, .jpg, .jpeg, .pdf" class="form-control @error('applicant_signature') is-invalid @enderror" value="{{ (!empty($data->old_licence)) ? $data->old_licence : ''  }}" placeholder="Upload applicant signature">-->
                                        <!--<small class="text-secondary text-justify "> Note : The file should be less than 2MB .</small>-->
                                        <!--<br>-->
                                        <!--<small class="text-secondary text-justify "> Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</small>-->
                                        <!--<br>-->
                                        <!--@error('old_licence')-->
                                        <!--    <span class="invalid-feedback" role="alert">-->
                                        <!--        <strong>{{ $message }}</strong>-->
                                        <!--    </span>-->
                                        <!--@enderror-->
                                        
                                         <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/transport_renewal/old_licence/{{ $meat_renewal_view->old_licence }}" target="_blank">
                                                    <div class="form-group">
                                                        <?php $document_path = $meat_renewal_view->old_licence;
                                                           $filter_path =  explode(".",$document_path);
                                                           $size_of_array = count($filter_path);
                                                           $filter_ext = $filter_path[$size_of_array - 1];
                                                           
                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' || 
                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                           {?>
                                                        <p class="mt-3 mb-0" id="image_div">
                                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/transport_renewal/old_licence/{{ $meat_renewal_view->old_licence }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:150px;">
                                                        </p>
                                                        <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/PMC_Meat_Registration/meat_file/transport_renewal/old_licence/{{ $meat_renewal_view->old_licence }}" target="_blank" download>
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
                                                    <a href="{{ url('/user/appli_form/') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;
                                                   
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
