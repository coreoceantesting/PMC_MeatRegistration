@include('common.header')
<!--JSPDF CDN-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>-->

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Meat Application</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/hod/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Meat Application</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <!--<div class="container-fluid">-->
        <!--    <div class="row clearfix">-->
        <!--        <div class="col-lg-12">-->
                    
        <!--            <div class="card"  id="divToPrint">-->
        <!--                <div class="body" style="padding:60px;">-->
        <!--                    <div class="row">-->
        <!--                        <div class="col-md-3" >-->
        <!--                            <div class="icon-box">-->
        <!--                                <img class="img-fluid " src="{{ url('/') }}/assets/images/PMC-logo.png" alt="Awesome Image" style="height:150px; width:220px;">-->
        <!--                            </div>-->
        <!--                        </div>-->
        
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    
                    <div class="card"  id="divToPrint">
                        <div class="body" style="padding:60px;">
                           <div class="row">
                                <div class="col-md-3">
                                    <div class="icon-box" style="text-align: center;">
                                         <img class="img-fluid " src="{{ url('/') }}/assets/images/PMC-logo.png" alt="Awesome Image" style="height: 105px;width: 140px;"> 
                                      
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="icon-box" style="text-align: center;">
                                      
                                        <img class="img-fluid " src="{{ url('/') }}/assets/images/75th_logo.png" alt="Awesome Image" style="height: 107px;width: 131px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="icon-box" style="text-align: center;">
                                        <img class="img-fluid " src="{{ url('/') }}/assets/images/rajbhishek_logo.png" alt="Awesome Image" style="height: 129px;width: 164px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="icon-box" style="text-align: center;">
                                        <img class="img-fluid " src="{{ url('/') }}/assets/images/vasundara.png" alt="Awesome Image" style="height: 141px;width: 153px;">
                                    </div>
                                </div>
                                 </div>
        
                                 <div class="row">
                                 <div class="col-md-12 text-center">
                                <!--<div class="col-md-8 text-center">-->
                                    <h1 style="font-size: 35px;margin-bottom: 6px;"><strong>Panvel Municipal Corporation </strong></h1>
                                    <h4><strong>Department of Animal Husbandry</strong></h4>
                                    <h5><strong>Office :- Opposite Devale Lake, Gokhale Hall  </strong><br></h5>
                                    <h5><strong>Panvel - 410206.</strong></h5>
                                <!--</div>-->
                                <!--<div class="col-md-1" >-->
                                </div>
                            </div>
                            
                            <hr>
                            <div class="row">                                
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-1"><strong>Telephone Office : </strong> 022-27458040/41/42 </p>
                                    <p class="mb-1"><strong>Office of the Deputy Commissioner : </strong> 022-27455751 </p>
                                    <p class="mb-1"><strong>e-mail : </strong> panvelcorporation@gmail.com</p>
                                </div>
                                <div class="col-md-4 col-sm-4 text-left" style="padding-left:60px;">
                                    <p class="mb-1"><strong>Fax Number . : </strong> 022-27452233 </p>
                                    <p class="mb-1"><strong>Commissioner's Office : </strong> 022-27452339 </p>
                                    <p class="mb-1"><strong>Website : </strong> www.panvelcorporation.com</p>
                                </div>
                            </div>
                            <hr class="mb-1">
                            
                            
                            <div class="row pt-0">
                                <!--<div class="col-md-9   col-sm-9 ">-->
                                <!--   जा.क्र.पमपा / वै.आ.वि. &nbsp; &nbsp; &nbsp;   / पशुवैद्यकीय सेवा / प्र.क.  {{ $meat_registration_pdf->meat_pplication_no }} / {{ now()->year }}   -->
                                <!--</div>-->
                                 <div class="col-md-9   col-sm-9 ">
                                  Read on -  <br> 1.Section 69 (1) of the Maharashtra Municipal Corporation Act, 1949   
                                </div>
                                <div class="col-md-3   col-sm-3 ">
                                   Date :
                                   {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                </div>
                            </div>
                            
                            <div class="row">
                               
                                 <div class="col-md-12 col-sm-12 pt-5 text-center">
                                    <!--<h5><strong>License Number  {{ $meat_registration_pdf->meat_pplication_no }}</strong></h5>-->
                                    <h5><strong>License Number : -  {{ $meat_registration_pdf->meat_pplication_no }} </strong></h5>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-1 text-center">
                                    <h4><strong>Chicken/Mutton/Fish/Buffalo Meat Selling Business License </strong></h4>
                                    <!--<p class="font-weight-bold">License to keep dogs </p>-->
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-1 text-start">
                                    <p>Pursuant to the bye-law of the Panvel Municipal Corporation relating to markets, private markets and slaughterhouses made under sub-sections (26) (27) (28) (29) and (48) of sections 331 and 458 of the Maharashtra Municipal Corporation Act, 1949, and section 335 and Selling of chicken/mutton/fish/buffalo meat to persons and places specified under 382</p>
                                </div>
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-8 col-sm-8">
                                     <p class="mb-0">
                                        <strong>Name of Licensee - </strong>
                                        <?php
                                                    $applicant_title_id = '';
                                                    
                                                    if($meat_registration_pdf->applicant_title_id == 1)
                                                    {
                                                        $applicant_title_id = 'Kum.';
                                                    }
                                                    else if($meat_registration_pdf->applicant_title_id == 2)
                                                    {
                                                        $applicant_title_id = 'M/s';
                                                    }
                                                    else if($meat_registration_pdf->applicant_title_id == 3)
                                                    {
                                                        $applicant_title_id = 'Smt.';
                                                    }
                                                    else if($meat_registration_pdf->applicant_title_id == 4)
                                                    {
                                                        $applicant_title_id = 'Ms.';
                                                    }
                                                    else if($meat_registration_pdf->applicant_title_id == 5)
                                                    {
                                                        $applicant_title_id = 'Mr.';
                                                    }
                                                    else if($meat_registration_pdf->applicant_title_id == 6)
                                                    {
                                                        $applicant_title_id = 'MrS.';
                                                    }
                                                    else if($meat_registration_pdf->applicant_title_id == 7)
                                                    {
                                                        $applicant_title_id = 'Dr.';
                                                    }
                                                ?>
                                        {{ $applicant_title_id }} {{ $meat_registration_pdf->applicant_fname }} {{ $meat_registration_pdf->applicant_mname }} {{ $meat_registration_pdf->applicant_lname }}
                                    </p>
                                </div>
                                <!--<div class="col-md-4 col-sm-4 ">-->
                                <!--    <p class="mb-0">-->
                                <!--        <strong>License No. - </strong>  -->
                                <!--        {{ $meat_registration_pdf->meat_pplication_no }}-->
                                <!--    </p>-->
                                <!--</div>-->
                            </div>
                           
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>Meat business name - </strong>
                                        {{ $meat_registration_pdf->business_name  }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>Business address - </strong>
                                        {{ $meat_registration_pdf->business_address  }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <?php
                                                $business_type = '';
                                                
                                                if($meat_registration_pdf->business_type == 1)
                                                {
                                                    $business_type = 'Meat/Fish Shop ( मांस/मासे दुकान)';
                                                }
                                                if($meat_registration_pdf->business_type == 5)
                                                {
                                                    $business_type = 'Meat Product Selling Center (मांस उत्पादन विक्री)';
                                                }
                                               
                                                if($meat_registration_pdf->business_type == 4)
                                                {
                                                    $business_type = 'Other ( इतर )';
                                                }
                                            ?>
                                        <strong>Kind Of Business - </strong>
                                        {{ $business_type  }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>Meat Type - </strong>
                                        {{ $meat_registration_pdf->meat_name  }}
                                    </p>
                                </div>
                            </div>
                            
                             <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>Business registration number - </strong>
                                        {{ $meat_registration_pdf->register_number  }}
                                    </p>
                                </div>
                            </div>
                            
                            
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        @php
                                            $unitName = $unit_Meat_Type->firstWhere('id', $meat_registration_pdf->unit);
                                        @endphp
                                        <strong>Meat business Per day capacity - </strong>
                                        {{ $meat_registration_pdf->per_day_capacity  }} {{ $unitName ? $unitName->unit_name : 'Unit not found' }}
                                    </p>
                                </div>
                            </div>
                            
                        
                             
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>Date of issue of Licence - </strong>
                                        {{ (!empty($meat_registration_pdf->final_approve_date) ? date("d/m/Y", strtotime($meat_registration_pdf->final_approve_date)) : NULL) }}
                                    </p>
                                </div>
                            </div>
                            <?php 
                            $approve_date = $meat_registration_pdf->approve_date_of_license_obtain;
                            
                            $newEndingDate = date("d-m-Y", strtotime(date("d-m-Y", strtotime($approve_date)) . " + 1 year"));
                            
                            ?>
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <!--<p class="mb-0">-->
                                    <!--    <strong>License Valid Date From . {{ $meat_registration_pdf->approve_date_of_license_obtain}} To {{$newEndingDate}} </strong>-->
                                    <!--</p>-->
                                     <p class="mb-0">
                                        <p class="mb-0">
                                            <strong>License Valid Date - </strong>
                                        </p>
                                        From  {{ (!empty($meat_registration_pdf->approve_date_of_license_obtain) ? date("d/m/Y", strtotime($meat_registration_pdf->approve_date_of_license_obtain)) : NULL) }} &nbsp;To &nbsp;{{ date("d/m/Y", strtotime($fiscalYear)) }}
                                    </p>
                                </div>
                            </div>
                           
                            
                            <div class="row pt-3"> 
                                <div class="col-md-12 col-sm-12 text-right">
                                    <p class="mb-0">
                                         <strong>
                                            <img src="{{url('/')}}/PMC_Meat_Registration/hod_sign/{{ $meat_registration_pdf->hod_sign }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:100px;">
                                       </strong> <br>
                                    
                                        <strong>Livestock Development Officer </strong><br>
                                        <strong>Panvel Municipal Corporation, Panvel </strong>
                                    </p>
                                </div>
                            </div>
                            
                        </div>    
                    </div>
                    <div class="submit-section text-right pt-5" >
					    <a href='{{ url("/final_approve_meat_registration_list/{$meat_registration_pdf->final_approve}") }}' class="btn btn-danger btn-lg text-light" >Cancel</a>
						<button  class="btn btn-success btn-lg" type="button" onClick="printDiv('divToPrint')" ><i class="fa fa-print fa-lg text-light"></i> &nbsp;&nbsp;Print</button>
					</div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function printDiv(divName) {
        $("#print").css("display", "none");
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        $("#print").css("display", "block");
        // location.reload();
    
    }
</script>
@include('common.footer')  