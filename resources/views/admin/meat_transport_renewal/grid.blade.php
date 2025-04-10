@include('common.header')



<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    @if ($status == 0)
                        <h2>Pending vehicle Renewal Application</h2>
                    @elseif ($status == 1)
                        <h2>Approve vehicle Renewal Application</h2>
                    @elseif ($status == 2)
                        <h2>Reject vehicle Renewal Application</h2>
                    @endif
                    
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <!--<li class="breadcrumb-item"><a href="{{ url('/#') }}">PET Application</a></li>-->
                        <li class="breadcrumb-item active">
                            @if ($status == 0)
                                Pending vehicle Renewal Application
                            @elseif ($status == 1)
                                Approve vehicle Renewal Application
                            @elseif ($status == 2)
                                Reject vehicle Renewal Application
                            @endif
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
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                @if ($status == 0)
                                    <strong style="text-transform: capitalize;">Pending vehicle Renewal Application</strong>
                                @elseif ($status == 1)
                                    <strong style="text-transform: capitalize;">Approve vehicle Renewal Application</strong>
                                @elseif ($status == 2)
                                    <strong style="text-transform: capitalize;">Reject vehicle Renewal Application</strong>
                                @endif
                                
                            </h2>
                        </div>
                         <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover data-table js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>vehicle Renewal Application no.</th>
                                            <th>Applicant Full Name</th>
                                          
                                           
                                            <th>Business Name</th>
                                            <th>vehicle registar Number</th>
                                            <th>Business Address</th>
                                            <th>Meat Name</th>
                                            <th>Per day capacity</th>
                                             @if (($status == 2))
                                             <th>Reasons for Rejection</th>
                                            
                                             @endif
                                            <th>View Details</th>
                                            
                                            @if($status == 1)
                                               <th>Invoice</th>
                                               @endif
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($meat_renewal_list as $key => $value)
                                            <tr>
                                                <td><b>{{ $key+1 }}</b></td>
                                                <td><b>{{ $value->trans_renwal_liceans_no }}</b></td>
                                                <?php
                                                    $applicant_title_id = '';
                                                    
                                                    if($value->applicant_title_id == 1)
                                                    {
                                                        $applicant_title_id = 'Kum.';
                                                    }
                                                    else if($value->applicant_title_id == 2)
                                                    {
                                                        $applicant_title_id = 'M/s';
                                                    }
                                                    else if($value->applicant_title_id == 3)
                                                    {
                                                        $applicant_title_id = 'Smt.';
                                                    }
                                                    else if($value->applicant_title_id == 4)
                                                    {
                                                        $applicant_title_id = 'Ms.';
                                                    }
                                                    else if($value->applicant_title_id == 5)
                                                    {
                                                        $applicant_title_id = 'Mr.';
                                                    }
                                                    else if($value->applicant_title_id == 6)
                                                    {
                                                        $applicant_title_id = 'MrS.';
                                                    }
                                                    else if($value->applicant_title_id == 7)
                                                    {
                                                        $applicant_title_id = 'Dr.';
                                                    }
                                                ?>
                                                <td>{{ $applicant_title_id }} {{ $value->applicant_fname }} {{ $value->applicant_mname }} {{ $value->applicant_lname }}</td>
                                              
                                             
                                                <td>{{ $value->business_name }}</td>
                                                
                                                <td>{{ $value->vehical_register_no }}</td>
                                                <td>{{ $value->business_address }}</td>
                                                <td>{{ $value->meat_name }}</td>
                                                <td>{{ $value->per_day_capacity }}</td>
                                                @if($value->status == 2)
                                                      
                                                  <td>{{ $value->tr_reason_rejection_by_admin }}</td>    
                                                  @endif  
                                                <td>
                                                    <a href='{{ url("/meat_transport_renewal_view/{$value->id}/{$value->status}") }}' class="btn btn-info btn-sm text-light">
                                                        <i class="zmdi zmdi-eye"></i>
                                                    </a>
                                                </td>

                                                @if($value->status == 1)
                                                 <td>  
                                                    <a href='{{ url("/meat_transport_renewal_invoice/{$value->id}/{$value->status}") }}'  class="btn btn-primary waves-effect m-r-20">
                                                        Invoice
                                                    </a>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
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