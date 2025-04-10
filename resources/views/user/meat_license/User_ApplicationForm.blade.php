<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>PMC || User Dashboard </title>

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
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    
    <!-- Toaster Message -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        
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
    input,
    input::placeholder {
        font: 14px/3 ;
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
						</div>
						
						<div class="col-sm-10 col-xs-12 d-flex flex-column align-items-center align-items-sm-start">
							<div class="title">
								<h4>PMC MEAT Application</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
									<!--<li class="breadcrumb-item"><a href="javascript:;">Documentation</a></li>-->
									<li class="breadcrumb-item active" aria-current="page">All PMC MEAT Application List</li>
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
                						<span class="user-name">
                						    {{ Auth::guard('meatregistereduser')->user()->name }} 
                						</span>
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
				
				
				<!-- Export Datatable start -->
    			<div class="card-box mb-30" style="border: 1px solid #000000;">
    					<div class="pd-20">
    						<h4 class="text-blue h4">PMC MEAT Application List</h4>
    					</div>
    					<div class="pb-20">
    						<table class="table hover multiple-select-row data-table-export nowrap">
    							<thead>
    								<tr>
    									<th>Sr. No.</th>
                                        <th>MEAT Application no.</th>
                                        <th>Applicant Full Name</th>
                                       
                                      
                                        <th>District Name</th>
                                        <th>Taluka Name</th>
        								<th>Meat Type</th>
        								<th>Application Status</th>
                                        <th>Action</th>
    								</tr>
    							</thead>
    							<tbody>
    								@foreach ($user_list as $key => $value)
                                        <tr>
                                            <td><b>{{ $key+1 }}</b></td>
                                            <td><b>{{ $value->pet_pplication_no }}</b></td>
                                            <td>{{ $value->applicant_fname }} {{ $value->applicant_mname }} {{ $value->applicant_lname }}</td>
                                            <td>{{ $value->ward_name }}</td>
                                            <td>{{ $value->dept_name }}</td>
                                            <td>{{ $value->dist_name }}</td>
                                            <td>{{ $value->taluka_name }}</td>
                							<td>{{ $value->breeds_name }}</td>
                                            @if($value->status == 0)
                                            <td><span class="badge badge-primary p-1">Pending</span></td>
                							@elseif($value->status == 1)
                                            <td><span class="badge badge-success p-1">Approved</span></td>
                                            @elseif($value->status == 2)
                                            <td><span class="badge badge-danger p-1">Rejected</span></td>
                                            @endif
                                            
                                            <td style="display:flex;">
                                                <a href='{{ url("/user/appli_form/View/{$value->id}/{$value->type}") }}' class="btn btn-primary btn-sm">
                                                    View
                                                </a>
                                                &nbsp;&nbsp;
                                                @if($value->status == 1 && $value->pet_activation_status == 1)
                                                    <a href="{{ url('/#') }}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#bd-example-modal-lg" type="button">
                                                        Apply for Refund
                                                    </a>
                                                @endif
                                            </td>
                                            
                                            
            							</tr>
            							
            							<!-- Large Refund modal -->
                                        <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        	<div class="modal-dialog modal-lg modal-dialog-centered">
                                        		<div class="modal-content p-3">
                                        			<div class="modal-header">
                                        				<h4 class="modal-title text-primary" id="myLargeModalLabel">Apply For Refund </h4>
                                        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        			</div>
                                        			<div class="modal-body ">
                                        			    
                                        				<form method="POST" action="{{ url('/user/appli_form/user_refund', $value->pet_pplication_no) }}" class="p-3" enctype="multipart/form-data">
                                                            @csrf
                                                            
                                                            <input type="hidden" name="user_id"  id="user_id"  class="form-control " value="{{ $value->inserted_by }}" >
                                                            <input type="hidden" name="pet_application_no"  id="pet_application_no"  class="form-control " value="{{ $value->pet_pplication_no }}" >
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-4"><strong>Name of the bank with which the applicant has an account <br/>(अर्जदाराचे ज्या बँकेत खाते आहे त्या बँकेचे नाव) :  <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-4 col-md-4 p-2">
                                                                    <input type="text" name="bank_name" id="bank_name" readonly class="form-control @error('bank_name') is-invalid @enderror" value="{{ $value->bank_name }}" >
                                                                    @error('bank_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                
                                                                <label class="col-sm-2"><strong>Branch <br/>(शाखा) : </strong></label>
                                                                <div class="col-sm-2 col-md-2 p-2">
                                                                    <input type="text" name="branch_name" id="branch_name" readonly class="form-control @error('branch_name') is-invalid @enderror" value="{{ $value->branch_name }}" >
                                                                    @error('branch_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="form-group row">
                                                                <label class="col-sm-2"><strong>Name of the account holder <br/>(खातेदाराचे नाव) : </strong></label>
                                                                <div class="col-sm-4 col-md-4 p-2">
                                                                    <input type="text" name="account_holder_name" id="account_holder_name" readonly  class="form-control @error('account_holder_name') is-invalid @enderror" value="{{ $value->account_holder_name }}" >
                                                                    @error('account_holder_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                
                                                                <label class="col-sm-2"><strong>Account No <br/>(खाते क्रमांक) : </strong></label>
                                                                <div class="col-sm-4 col-md-4 p-2">
                                                                    <input type="text" name="account_number" id="account_number" readonly class="form-control @error('account_number') is-invalid @enderror" value="{{ $value->account_number }}" >
                                                                    @error('account_number')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="form-group row">
                                                                <label class="col-sm-2"><strong>IFSC Code (आय.एफ.एस.सी कोड) : </strong></label>
                                                                <div class="col-sm-4 col-md-4 p-2">
                                                                    <input type="text" name="ifsc_code" id="ifsc_code" readonly class="form-control @error('ifsc_code') is-invalid @enderror" value="{{ $value->ifsc_code }}">
                                                                    @error('ifsc_code')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                
                                                                <label class="col-sm-2"><strong>Duration : </strong></label>
                                                                <div class="col-sm-4 col-md-4">
                                                                    <input type="hidden" name="duration_id" id="duration_id" class="form-control" value="{{ $value->duration }}">
                                                                    <input type="text" name="duration" id="duration" readonly class="form-control @error('duration') is-invalid @enderror" value="{{ $value->pet_duration }} Months">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2"><strong>Amount : </strong></label>
                                                                <div class="col-sm-4 col-md-4">
                                                                    <input type="hidden" name="amount_id" id="amount_id" class="form-control" value="{{ $value->amount }}">
                                                                    <input type="text" name="amount" id="amount" readonly class="form-control @error('amount') is-invalid @enderror" value="{{ $value->pet_amount }} Rs.">
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            
                                                            <?php
                                                                $all_dog_status = DB::table('mst_dog_status AS t1')
                                                                                    ->select('t1.id', 't1.dog_status')
                                                                                    ->whereNull('t1.deleted_by')
                                                                                    ->orderBy('id','DESC')
                                                                                    ->get();
                                                            ?>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2"><strong>Dog Status : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-4 col-md-4 p-2">
                                                                    <select class="form-control custom-select2  @error('dog_status') is-invalid @enderror"  name="dog_status" id="myselection" style="width: 100%; height: 38px;">
                                                                        <option value="" >Select Dog Status </option>
                                                                        @foreach ($all_dog_status as $key => $value)
                                                                            <option value="{{ $value->id }}" {{ old('dog_status') == $value->id ? 'selected' : '' }}>{{ $value->dog_status }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('dog_status')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                
                                                                <label class="col-sm-2"><strong>Date : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-4 col-md-4 p-2">
                                                                    <input type="text" name="date"   id="date"  class="form-control date-picker @error('date') is-invalid @enderror" value="{{ old('remark') }}" placeholder="DD/MM/YYYY">
                                                                    @error('date')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="form-group row 1 box" style="display: none;">
                                                                <label class="col-sm-2"><strong>Upload Death of proof : </strong></label>
                                                                <div class="col-sm-4 col-md-4 p-2">
                                                                    <input type="file" name="death_proof"  id="death_proof"  class="form-control" value="{{ old('death_proof') }}" placeholder="Upload Death of proof">
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2"><strong>Remarks : <span style="color:red;">*</span> </strong></label>
                                                                <div class="col-12 p-2">
                                                                    <textarea type="text" name="remark"   rows="4" id="remark" class="form-control @error('remark') is-invalid @enderror" value="{{ old('remark') }}" placeholder="Remarks ">{{ old('remark') }}</textarea>
                                                                    @error('remark')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row mt-4">
                                                                <label class="col-md-3"></label>
                                                                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                                    <a href="{{ url('/user/appli_form',) }}" class="btn btn-danger btn-lg">Cancel</a>&nbsp;&nbsp;
                                                                    <button type="submit" class="btn btn-success btn-lg">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                        			</div>
                                        			
                                        		</div>
                                        	</div>
                                        </div>
                                        
                                    @endforeach
    							</tbody>
    						</table>
    					</div>
    				</div>
    			<!-- Export Datatable End -->
			</div>
			
        </div>
    </div>
	
	
	
    <!-- js -->
	<script src="{{ url('/') }}/userend/assets/vendors/scripts/core.js"></script>
	<script src="{{ url('/') }}/userend/assets/vendors/scripts/script.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/vendors/scripts/process.js"></script>
	<script src="{{ url('/') }}/userend/assets/vendors/scripts/layout-settings.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	
	<!-- buttons for Export datatable -->
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/vfs_fonts.js"></script>
	
	<!-- Datatable Setting js -->
	<script src="{{ url('/') }}/userend/assets/vendors/scripts/datatable-setting.js"></script></body>
	
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
        
	<script>
        $(document).ready(function(){
            $("select").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>
</body>

</html>
