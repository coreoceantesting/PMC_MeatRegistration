@include('common.header')

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Meat Vehicle Registration Report</h2>
                    
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <!--<li class="breadcrumb-item"><a href="{{ url('/#') }}">PET Application</a></li>-->
                        <li class="breadcrumb-item active">
                            Meat Vehicle Registration Report
                        </li>
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
                        <!--<div class="header">-->
                        <!--    <h2>-->
                        <!--        <strong style="text-transform: capitalize;">All PET Application</strong>-->
                        <!--    </h2>-->
                        <!--</div>-->
                        <div class="body p-3">
                            <form method="post" action="{{ url('/search_all_vehicle_list') }}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="p-3 card-box mb-30">
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>From Date &nbsp;:&nbsp; <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="date" class="form-control @error('from_date') is-invalid @enderror" id="from_date" required name="from_date" placeholder="Enter From Date">
                                            @error('from_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <label class="col-sm-2"><strong>To Date &nbsp;:&nbsp; <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="date" class="form-control @error('to_date') is-invalid @enderror" id="to_date" required name="to_date" placeholder="Enter From Date">
                                            @error('to_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong> Vehicle Application Status &nbsp;:&nbsp; <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <select class="form-control  @error('status') is-invalid @enderror" data-live-search="true" required name="status" id="status" style="width: 100%; height: 38px;">
                                                <option value=" ">Select Status</option>
                                                <option value="0">Pending</option>
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-sm-4 col-md-4">
                                            <button type="submit" class="btn btn-success text-light">Submit</button>
                                        </div>
                                    </div>
                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong style="text-transform: capitalize;"> Meat Vehicle Application List</strong>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Vehicle License no.</th>
                                            <th>Applicant Full Name</th>
                                           
                                            <th style="display:none">mobile</th>
                                            <th style="display:none">Aadhar number</th>
                                         
                                            <th>Applicant Address</th>
                                         
        							    	<th>Business Name</th>
        							    	
        							    	<th style="display:none">Vehicle Registration No.</th>
                                            <th style="display:none">Vehicle Address</th>
                                            <th style="display:none">Business Address</th>
                                            <th style="display:none">license sale validity period From </th>
                                            <th style="display:none">license sale validity period Till</th>
                                          
                                            <th>Meat Name</th>
                                            <th>Per day capacity</th>
                                            
        									<th>Registration Date</th>
        									<th>Application Status</th>
        									
        									<th style="display:none">total recived Amount</th>
                                            <th style="display:none">Receipt No</th>
                                            <th style="display:none">Date of Receipt</th>
                                            <th style="display:none">license number</th>
                                            <th style="display:none">Date of license obtain</th>
        								</tr>
                                    </thead>
                                    
                                    <tbody>
                                     
                                        @if(!empty($meat_search_vehical_list))
                                            @foreach ($meat_search_vehical_list as $key => $value)
                                                <tr>
                                                    <td><b>{{ $key+1 }}</b></td>
                                                    <td><b>{{ $value->transport_license_no }}</b></td>
                                                    <td>{{ $value->applicant_fname }} {{ $value->applicant_mname }} {{ $value->applicant_lname }}</td>
                                                    
                                                    <td style="display:none">{{ $value->mobile_number }}</td>
                                                    <td style="display:none">{{ $value->aadhar_number }}</td>
                                                    <td>{{ $value->applicant_address }}</td>
                                                    
                                                    <td>{{ $value->business_name }}</td>
                                                    
                                                    <td style="display:none">{{ $value->vehical_register_no }}</td>
                                                    <td style="display:none">{{ $value->vehical_address }}</td>
                                                    <td style="display:none">{{ $value->business_address }}</td>
                                                    <td style="display:none">{{ $value->from_date }}</td>
                                                    <td style="display:none">{{ $value->to_date }}</td>
                								
                                                 <td>{{ $value->meat_name }}</td>
                                                 <td>{{ $value->per_day_capacity }}</td>
                								 <td>{{ date('d-m-Y', strtotime($value->inserted_dt)) }}</td>
                									
                                                    @if($value->status == 0)
                                                    <td><span class="badge badge-primary p-1">Pending</span></td>
                									@elseif($value->status == 1)
                                                    <td><span class="badge badge-success p-1">Approved</span></td>
                                                    @else
                                                    <td><span class="badge badge-danger p-1">Rejected</span></td>
                                                    @endif
                							    	<td style="display:none">{{ $value->total_recived_tax }}</td>
                                                    <td style="display:none">{{ $value->receipt_no }}</td>
                                                    <td style="display:none">{{ $value->date_of_receipt }}</td>
                                                    <td style="display:none">{{ $value->license_number }}</td>
                                                    <td style="display:none">{{ $value->date_of_license_obtain }}</td>
                								</tr>
                                            @endforeach
                                        @else
                                            @foreach ($meat_vehical_list as $key => $value)
                                                <tr>
                                                    <td><b>{{ $key+1 }}</b></td>
                                                    <td><b>{{ $value->transport_license_no }}</b></td>
                                                    <td>{{ $value->applicant_fname }} {{ $value->applicant_mname }} {{ $value->applicant_lname }}</td>
                                                    
                                                    <td style="display:none">{{ $value->mobile_number }}</td>
                                                    <td style="display:none">{{ $value->aadhar_number }}</td>
                                                    <td>{{ $value->applicant_address }}</td>
                                                   
                                                   
                                                    
                                                    <td>{{ $value->business_name }}</td>
                                                    
                                                    <td style="display:none">{{ $value->vehical_register_no }}</td>
                                                    <td style="display:none">{{ $value->vehical_address }}</td>
                                                    <td style="display:none">{{ $value->business_address }}</td>
                                                    <td style="display:none">{{ $value->from_date }}</td>
                                                    <td style="display:none">{{ $value->to_date }}</td>
                								
                                                 <td>{{ $value->meat_name }}</td>
                                                 <td>{{ $value->per_day_capacity }}</td>
                							     <td>{{ date('d-m-Y', strtotime($value->inserted_dt)) }}</td>
                							 		
                                                    @if($value->status == 0)
                                                    <td><span class="badge badge-primary p-1">Pending</span></td>
                									@elseif($value->status == 1)
                                                    <td><span class="badge badge-success p-1">Approved</span></td>
                                                    @else
                                                    <td><span class="badge badge-danger p-1">Rejected</span></td>
                                                    @endif
                									
                	                                <td style="display:none">{{ $value->total_recived_tax }}</td>
                                                    <td style="display:none">{{ $value->receipt_no }}</td>
                                                    <td style="display:none">{{ $value->date_of_receipt }}</td>
                                                    <td style="display:none">{{ $value->license_number }}</td>
                                                    <td style="display:none">{{ $value->date_of_license_obtain }}</td>
                								</tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>



@include('common.footer')  


<script>
    $(".dropdown-menu .dropdown-item").click(function(){
      var selText = $(this).text();
      $(this).parents('.dropdown').find('#dropdownMenuButton').html(selText+' <span class="caret"></span>');
    });
</script>