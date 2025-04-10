<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>PMC || Application for Dog License</title>

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
    
    <div class="col-12">
        <div class="align-items-center">

            <div class="min-height-200px">
				<div class="page-header" >
					<div class="row">
					    
					    <div class="col-sm-2 col-xs-12 text-right d-flex justify-content-center d-block d-sm-none mb-4">
							<div class="dropdown">
							    <a  href="{{ url('/') }}" role="button" >
            						<span class="user-icon">
            							<img src="{{ url('/') }}/assets/images/PMC-logo.png" alt="" style="width: 100px; height: 80px;">
            						</span>
            					</a>
							</div>
						</div>
						
						<div class="col-sm-10 col-xs-12 d-flex flex-column align-items-center align-items-sm-start">
							<div class="title">
								<h4>Application for Dog License</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
									<!--<li class="breadcrumb-item"><a href="javascript:;">Documentation</a></li>-->
									<li class="breadcrumb-item active" aria-current="page">Application for Dog License</li>
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
    					<form method="POST" action="{{ url('/user/dog_registration') }}" enctype="multipart/form-data">
    					    @csrf
    					    
    						<section class="pt-3">
    							<div class="form-group row">
                                    <label class="col-sm-2 col-form-label"><strong>अर्जाचा प्रकार  /<br> Category of Application : &nbsp;<span class="text-danger">*</span> </strong></label>
                                    <div class="col-sm-4 pb-2">
                                        <select class="custom-select2 form-control @error('category_appli_id') is-invalid @enderror" name="category_appli_id" id="category_appli_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select अर्जाचा प्रकार / Category of Application</option>
                                            <optgroup label=" ">
                                                <option value="1" {{ old('category_appli_id') == "1" ? 'selected' : '' }}>Individual</option>
                                                <option value="2" {{ old('category_appli_id') == "2" ? 'selected' : '' }}>Others</option>
                                            </optgroup>
                                        </select>
                                        @error('category_appli_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <?php
                                        $ward_mst = DB::select('SELECT
                                                                    `ward_mst`.`id`, `ward_mst`.`ward_name`
                                                                FROM `ward_mst`
                                                                WHERE `ward_mst`.`deleted_at` is NULL
                                                                ORDER BY `ward_mst`.`id` DESC
                                                                ');
                                    ?>
                                    <label class="col-sm-2"><strong>प्रभाग / <br> Ward : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 pb-2">
                                        <select class="form-control custom-select2  @error('ward_id') is-invalid @enderror"  name="ward_id" id="ward_id" style="width: 100%; height: 38px;">
                                            <option value=" " >Select प्रभाग / Ward </option>
                                            @foreach ($ward_mst as $key => $value)
                                                <option value="{{ $value->id }}" {{ old('ward_id') == $value->id ? 'selected' : '' }}>{{ $value->ward_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('ward_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row pb-2">
                                    <label class="col-sm-2"><strong>विभाग / <br> Department : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4">
                                        <select class="form-control custom-select2 @error('dept_id') is-invalid @enderror"  name="dept_id" id="dept_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select विभाग / Department </option>
                                            
                                        </select>
                                        @error('dept_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <strong class="pb-1">अर्जदाराचे नाव /<br> Name of Applicant : <span style="color:red;">*</span> </strong>
                                <div class="form-group row">
                                    <!--<label class="col-sm-1"><strong>Title : <span style="color:red;">*</span></strong></label>-->
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <select class="form-control custom-select2 @error('applicant_title_id') is-invalid @enderror"  name="applicant_title_id" id="applicant_title_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Applicant Title</option>
                                            <option value="1" {{ old('applicant_title_id') == "1" ? 'selected' : '' }}>Kum.</option>
                                            <option value="2" {{ old('applicant_title_id') == "2" ? 'selected' : '' }}>M/s</option>
                                            <option value="3" {{ old('applicant_title_id') == "3" ? 'selected' : '' }}>Smt.</option>
                                            <option value="4" {{ old('applicant_title_id') == "4" ? 'selected' : '' }}>Ms.</option>
                                            <option value="5" {{ old('applicant_title_id') == "5" ? 'selected' : '' }}>Mr.</option>
                                            <option value="6" {{ old('applicant_title_id') == "6" ? 'selected' : '' }}>MrS.</option>
                                            <option value="7" {{ old('applicant_title_id') == "7" ? 'selected' : '' }}>Dr.</option>
                                        </select>
                                        @error('applicant_title_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    
                                    <!--<label class="col-sm-1"><strong>First Name : <span style="color:red;">*</span></strong></label>-->
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input type="text" name="applicant_fname" id="inputTextBox" class="form-control @error('applicant_fname') is-invalid @enderror" value="{{ old('applicant_fname') }}" placeholder="Applicant First Name.">
                                        @error('applicant_fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <!--<label class="col-sm-1"><strong>Middle Name : <span style="color:red;">*</span></strong></label>-->
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input type="text" name="applicant_mname" id="inputTextBox" class="form-control @error('applicant_mname') is-invalid @enderror" value="{{ old('applicant_mname') }}" placeholder="Applicant Middle Name.">
                                        @error('applicant_mname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <!--<label class="col-sm-1"><strong>Last Name : <span style="color:red;">*</span></strong></label>-->
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input type="text" name="applicant_lname" id="inputTextBox" class="form-control @error('applicant_lname') is-invalid @enderror" value="{{ old('applicant_lname') }}" placeholder="Applicant Last Name.">
                                        @error('applicant_lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <strong class="pb-1">मालकाचे नाव / <br> Name of Owner's : <span style="color:red;">*</span> </strong>
                                <div class="form-group row">
                                    <!--<label class="col-sm-1"><strong>Title : <span style="color:red;">*</span></strong></label>-->
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <select class="form-control custom-select2 @error('owner_title_id') is-invalid @enderror"  name="owner_title_id" id="owner_title_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Owner Title</option>
                                            <option value="1" {{ old('owner_title_id') == "1" ? 'selected' : '' }}>Kum.</option>
                                            <option value="2" {{ old('owner_title_id') == "2" ? 'selected' : '' }}>M/s</option>
                                            <option value="3" {{ old('owner_title_id') == "3" ? 'selected' : '' }}>Smt.</option>
                                            <option value="4" {{ old('owner_title_id') == "4" ? 'selected' : '' }}>Ms.</option>
                                            <option value="5" {{ old('owner_title_id') == "5" ? 'selected' : '' }}>Mr.</option>
                                            <option value="6" {{ old('owner_title_id') == "6" ? 'selected' : '' }}>MrS.</option>
                                            <option value="7" {{ old('owner_title_id') == "7" ? 'selected' : '' }}>Dr.</option>
                                        </select>
                                        @error('owner_title_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    
                                    <!--<label class="col-sm-1"><strong>First Name : <span style="color:red;">*</span></strong></label>-->
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input type="text" name="owner_fname" id="inputTextBox" class="form-control @error('owner_fname') is-invalid @enderror" value="{{ old('owner_fname') }}" placeholder="Owner First Name.">
                                        @error('owner_fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <!--<label class="col-sm-1"><strong>Middle Name : <span style="color:red;">*</span></strong></label>-->
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input type="text" name="owner_mname" id="inputTextBox" class="form-control @error('owner_mname') is-invalid @enderror" value="{{ old('owner_mname') }}" placeholder="Owner Middle Name.">
                                        @error('owner_mname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <!--<label class="col-sm-1"><strong>Last Name : <span style="color:red;">*</span></strong></label>-->
                                    <div class="col-sm-3 col-md-3 p-2">
                                        <input type="text" name="owner_lname" id="inputTextBox" class="form-control @error('owner_lname') is-invalid @enderror" value="{{ old('owner_lname') }}" placeholder="Owner Last Name.">
                                        @error('owner_lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <strong class="pt-2 text-danger">
                                     मालकाचा निवासी पत्ता / Residential Address of Owner's
                                </strong>
                                <hr>
                                    
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>घर क्रमांक / <br> House Number  :  <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="house_number" id="house_number" class="form-control @error('house_number') is-invalid @enderror" value="{{ old('house_number') }}" placeholder="घर क्रमांक / House Number.">
                                        @error('house_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>घराचे नाव / <br> House Name  : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="house_name" id="house_name" class="form-control @error('house_name') is-invalid @enderror" value="{{ old('house_name') }}" placeholder="घराचे नाव / House Name.">
                                        @error('house_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>रस्ता १ / <br> Street 1 : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="street_1" id="street_1" class="form-control @error('street_1') is-invalid @enderror" value="{{ old('street_1') }}" placeholder="रस्ता १ / Street 1.">
                                        @error('street_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>रस्ता 2 / <br> Street 2  : </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="street_2" id="street_2" class="form-control " value="{{ old('street_2') }}" placeholder="रस्ता 2 / Street 2.">
                                        
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>क्षेत्र १ / <br> Area 1 : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="area_1" id="area_1" class="form-control @error('area_1') is-invalid @enderror" value="{{ old('area_1') }}" placeholder="क्षेत्र १ / Area 1.">
                                        @error('area_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>क्षेत्र 2 / <br> Area 2  : </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="area_2" id="area_2" class="form-control " value="{{ old('area_2') }}" placeholder="क्षेत्र 2 /Area 2.">
                                        
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>देश / <br> Country : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('country_id') is-invalid @enderror"  name="country_id" id="country_id" style="width: 100%; height: 38px;" > 
                                            <option value=" ">Select देश / Country </option>
                                            <option value="1" {{ old('country_id') == "1" ? 'selected' : '' }}>India</option>
                                        </select>
                                        @error('country_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>राज्य / <br> State <span style="color:red;">*</span>: </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('state_id') is-invalid @enderror"  name="state_id" id="state_id" style="width: 100%; height: 38px;" >
                                            <option value=" ">Select राज्य / State</option>
                                            <option value="1"  {{ old('state_id') == "1" ? 'selected' : '' }}>Maharashtra</option>
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
                                    <label class="col-sm-2"><strong>जिल्हा / <br> District : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('district_id') is-invalid @enderror"  name="district_id" id="district_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select जिल्हा / District</option>
                                            @foreach ($mst_dist as $key => $value)
                                                <option value="{{ $value->id }}" {{ old('district_id') == $value->id ? 'selected' : '' }}>{{ $value->dist_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('district_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>तालुका / <br> Taluka  : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('taluka_id') is-invalid @enderror"  name="taluka_id" id="taluka_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select तालुका / Taluka</option>
                                            
                                        </select>
                                        @error('taluka_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>पिनकोड / <br> Zip Code : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="zipcode" id="zipcode" maxlength="6" class="form-control @error('zipcode') is-invalid @enderror" value="{{ old('zipcode') }}" placeholder="पिनकोड / Zip Code.">
                                        @error('zipcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>जीएसटी क्रमांक / <br> GST Number  : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="gst_number" id="gst_number" maxlength="15" class="form-control @error('gst_number') is-invalid @enderror" value="{{ old('gst_number') }}" placeholder="जीएसटी क्रमांक / GST Number.">
                                        @error('gst_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>मोबाईल नंबर / <br> Mobile Number : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="mobile_number" id="mobile_number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control @error('mobile_number') is-invalid @enderror" value="{{ old('mobile_number') }}" placeholder="मोबाईल नंबर / Mobile Number.">
                                        @error('mobile_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>ई - मेल आयडी / Email Id  : <span style="color:red;">*</span> <br><span class="text-danger"> (Receipt and Certificate will be sent on this Email ID)</span>  </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="ई - मेल आयडी / Email Id.">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>आधार क्रमांक / <br> Aadhar Number : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="aadhar_number" id="aadhar_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="12" class="form-control @error('aadhar_number') is-invalid @enderror" value="{{ old('aadhar_number') }}" placeholder="आधार क्रमांक / Aadhar Number.">
                                        @error('aadhar_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>पॅन कार्ड / <br> PAN Card  : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="pan_number" id="pan_number" maxlength="10"  class="form-control @error('pan_number') is-invalid @enderror" value="{{ old('pan_number') }}" placeholder="पॅन कार्ड / PAN Card.">
                                        @error('pan_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>मतदार कार्ड क्रमांक / <br> Voter’s Card Number : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="voter_card_no" id="voter_card_no" maxlength="10" class="form-control @error('voter_card_no') is-invalid @enderror" value="{{ old('voter_card_no') }}" placeholder="मतदार कार्ड क्रमांक / Voter’s Card Number.">
                                        @error('voter_card_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>संस्थेचे नाव / Name of the Firm  : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="name_of_firm" id="name_of_firm" class="form-control @error('name_of_firm') is-invalid @enderror" value="{{ old('name_of_firm') }}" placeholder="संस्थेचे नाव / Name of the Firm .">
                                        @error('name_of_firm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                    <label class="col-sm-2"><strong>कुत्र्याचे नाव / <br> Dog Name :  </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="dog_name" id="dog_name" class="form-control" value="{{ old('dog_name') }}" placeholder="कुत्र्याचे नाव / Dog Name.">
                                        
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>लिंग / <br> Sex  : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('sex_id') is-invalid @enderror" name="sex_id" id="sex_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select लिंग / Sex</option>
                                            <option value="1" {{ old('sex_id') == "1" ? 'selected' : '' }}>Male</option>
                                            <option value="2" {{ old('sex_id') == "2" ? 'selected' : '' }}>Female</option>
                                        </select>
                                        @error('sex_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>ओळख चिन्ह / <br> Identification Mark : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="identification_mark" id="identification_mark" class="form-control @error('identification_mark') is-invalid @enderror" value="{{ old('identification_mark') }}" placeholder="ओळख चिन्ह / Identification Mark.">
                                        @error('identification_mark')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <?php
                                        $mst_dog_breed = DB::select('SELECT
                                                                    `mst_dog_breed`.`id`, `mst_dog_breed`.`breeds_name`
                                                                FROM `mst_dog_breed`
                                                                WHERE `mst_dog_breed`.`deleted_at` is NULL
                                                                ORDER BY `mst_dog_breed`.`id` DESC
                                                                ');
                                    ?>
                                    <label class="col-sm-2"><strong>जाती / <br> Breed : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('breed_id') is-invalid @enderror"  name="breed_id" id="breed_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select जाती / Breed</option>
                                            <optgroup>
                                                @foreach ($mst_dog_breed as $key => $value)
                                                    <option value="{{ $value->id }}" {{ old('breed_id') == $value->id ? 'selected' : '' }}>{{ $value->breeds_name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        @error('breed_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>इतर जाती / <br> Other Breed : </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="other_breed" id="other_breed" class="form-control" value="{{ old('other_breed') }}" placeholder="इतर जाती / Other Breed.">
                                        
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>रंग /<br> Colour  : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="colour" id="colour" class="form-control @error('colour') is-invalid @enderror" value="{{ old('colour') }}" placeholder="रंग / Colour.">
                                        @error('colour')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>पशुवैद्यकीय डॉक्टरांचे नाव / <br> Veterinary Doctor Name : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="veterinary_doctor_name" id="inputTextBox" class="form-control @error('veterinary_doctor_name') is-invalid @enderror" value="{{ old('veterinary_doctor_name') }}" placeholder="पशुवैद्यकीय डॉक्टरांचे नाव / Veterinary Doctor Name.">
                                        @error('veterinary_doctor_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>पशुवैद्यकीय डॉक्टरांचा MSVC/VCI नोंदणी क्रमांक / <br> Veterinary doctor’s MSVC/VCI registration number  : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="veterinary_doctor_msvc_no" id="veterinary_doctor_msvc_no" class="form-control @error('veterinary_doctor_msvc_no') is-invalid @enderror" value="{{ old('veterinary_doctor_msvc_no') }}" placeholder="पशुवैद्यकीय डॉक्टरांचा MSVC/VCI नोंदणी क्रमांक / Veterinary doctor’s MSVC/VCI registration number.">
                                        @error('veterinary_doctor_msvc_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>रेबीज लसीकरणाची तारीख (DD/MM/YYYY) / <br> Date of Rabies Vaccination (DD/MM/YYYY) : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="date_of_rabies_vaccination" id="date_of_rabies_vaccination" class="form-control date-picker @error('date_of_rabies_vaccination') is-invalid @enderror" value="{{ old('date_of_rabies_vaccination') }}" placeholder="DD/MM/YYYY">
                                        @error('date_of_rabies_vaccination')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>लेप्टोस्पायरोसिस लसीकरणाची तारीख (DD/MM/YYYY) / <br> Date of Leptospirosis Vaccination (DD/MM/YYYY)  : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="date_of_leptospirosis_vaccination" id="date_of_leptospirosis_vaccination" class="form-control date-picker @error('date_of_leptospirosis_vaccination') is-invalid @enderror" value="{{ old('date_of_leptospirosis_vaccination') }}" placeholder="DD/MM/YYYY">
                                        @error('date_of_leptospirosis_vaccination')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>जन्मतारीख (MM/DD/YYY) / <br> Date of birth (MM/DD/YYY) : </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="text" name="dob" id="dob" class="form-control date-picker " value="{{ old('dob') }}" placeholder="DD/MM/YYYY">
                                        
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>वय वर्ष /<br> Age Year(s)  : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="age" name="age" id="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}" placeholder="वय वर्ष / Age Year(s)">
                                        @error('age')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>महिना / <br> Month  : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="number" name="month" id="month" maxlength="2" class="form-control @error('month') is-invalid @enderror" value="{{ old('month') }}" placeholder="महिना / Month">
                                        @error('month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>कुत्र्यांची संख्या / <br> No. of Dogs (In Words)  : <span style="color:red;">*</span></strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="no_of_dog" name="no_of_dog" id="inputTextBox"  class="form-control @error('no_of_dog') is-invalid @enderror" value="{{ old('no_of_dog') }}" placeholder="कुत्र्यांची संख्या / No. of Dogs (In Words)">
                                        @error('no_of_dog')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <strong class="pt-2 text-danger text-justify">
                                    Note : Please select "Yes" in any one of the below .
                                </strong>
                                <hr>
                                        
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>कुत्र्याचे हस्तांतरण केले जात आहे का? / <br> Is Dog being Transferred ? : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('dog_licen_id') is-invalid @enderror"  name="dog_licen_id" id="dog_licen_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Is Dog being Transferred ?</option>
                                            <option value="1" {{ old('dog_licen_id') == "1" ? 'selected' : '' }}>Yes</option>
                                            <option value="2" {{ old('dog_licen_id') == "2" ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('dog_licen_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>कुत्रा विकत घेतला जात आहे का? / <br> Is Dog being Bought ? : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('dog_bought_id') is-invalid @enderror"  name="dog_bought_id" id="dog_bought_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Is Dog being Bought ?</option>
                                            <option value="1" {{ old('dog_bought_id') == "1" ? 'selected' : '' }}>Yes</option>
                                            <option value="2" {{ old('dog_bought_id') == "2" ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('dog_bought_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>भटका कुत्रा दत्तक घेतला आहे का? / <br> Whether Stray Dog adopted ? : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('stray_dog_adopted_id') is-invalid @enderror"  name="stray_dog_adopted_id" id="stray_dog_adopted_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Whether Stray Dog adopted ?</option>
                                            <option value="1" {{ old('stray_dog_adopted_id') == "1" ? 'selected' : '' }}>Yes</option>
                                            <option value="2" {{ old('stray_dog_adopted_id') == "2" ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('stray_dog_adopted_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>कुत्रा मुंबईबाहेरून आणला का? / <br> Whether Dog brought from outside Mumbai ? : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('dog_brought_outside_id') is-invalid @enderror"  name="dog_brought_outside_id" id="dog_brought_outside_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Whether Dog brought from outside Mumbai ?</option>
                                            <option value="1" {{ old('dog_brought_outside_id') == "1" ? 'selected' : '' }}>Yes</option>
                                            <option value="2" {{ old('dog_brought_outside_id') == "2" ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('dog_brought_outside_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>पिल्लाचा जन्म मालकाच्या कुत्र्यापासून झाला आहे का? / <br> Is Puppy born to owner’s Dog ? : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <select class="form-control custom-select2 @error('puppy_born_id') is-invalid @enderror"  name="puppy_born_id" id="puppy_born_id" style="width: 100%; height: 38px;">
                                            <option value=" ">Select Is Puppy born to owner’s Dog ?</option>
                                            <option value="1" {{ old('puppy_born_id') == "1" ? 'selected' : '' }}>Yes</option>
                                            <option value="2" {{ old('puppy_born_id') == "2" ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('puppy_born_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>रेबीज लसीकरण प्रमाणपत्र अपलोड करा / <br> Upload Rabies Vaccination certificate : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="file" name="rabies_vaccination_certificate_doc" id="rabies_vaccination_certificate_doc"  class="form-control @error('rabies_vaccination_certificate_doc') is-invalid @enderror" value="{{ old('rabies_vaccination_certificate_doc') }}" accept=".jpg, .jpeg, .png, .pdf">
                                        <small class="text-secondary text-justify "> Note : The file should be less than 2MB .</small>
                                        <br>
                                        <small class="text-secondary text-justify "> Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</small>
                                        <br>
                                        @error('rabies_vaccination_certificate_doc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label class="col-sm-2"><strong>लेप्टोस्पायरोसिसचे लसीकरण प्रमाणपत्र अपलोड करा / <br> Upload Vaccination certificate of Leptospirosis : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="file" name="vaccination_certificate_of_Lepto_doc" id="vaccination_certificate_of_Lepto_doc" class="form-control @error('vaccination_certificate_of_Lepto_doc') is-invalid @enderror" value="{{ old('vaccination_certificate_of_Lepto_doc') }}" accept=".jpg, .jpeg, .png, .pdf">
                                        <small class="text-secondary text-justify "> Note : The file should be less than 2MB .</small>
                                        <br>
                                        <small class="text-secondary text-justify "> Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</small>
                                        <br>
                                        @error('vaccination_certificate_of_Lepto_doc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2"><strong>पत्ता पुरावा अपलोड करा / <br> Upload Address proof : <span style="color:red;">*</span> </strong></label>
                                    <div class="col-sm-4 col-md-4 p-2">
                                        <input type="file" name="address_proof_doc" id="address_proof_doc" class="form-control @error('address_proof_doc') is-invalid @enderror" value="{{ old('address_proof_doc') }}" accept=".jpg, .jpeg, .png, .pdf">
                                        <small class="text-secondary text-justify "> Note : The file should be less than 2MB .</small>
                                        <br>
                                        <small class="text-secondary text-justify "> Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</small>
                                        <br>
                                        @error('address_proof_doc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                        
                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ url('/') }}" class="btn btn-danger btn-lg">Cancel</a>&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-success btn-lg">Submit</button>
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
</body>

</html>
