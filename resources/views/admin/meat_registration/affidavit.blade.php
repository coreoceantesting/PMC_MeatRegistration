
 @include('common.header')
<!--JSPDF CDN-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>-->

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Affidavit</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Affidavit </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        

       
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    
                    <div class="card"  id="divToPrint">
                        <div class="body" style="padding:60px;">
                            
                            
                            
                            
                          
                          
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-5 text-center">
                                    <h5><strong> Affidavit / प्रतिज्ञापत्र </strong></h5>
                                    <!--<p class="font-weight-bold"Self declaration>License to keep dogs </p>--><br>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-8">
                                     <p class="mb-0">
                                       मी <span></span> <strong>
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

                                                <?php
                                                $business_type = '';
                                                
                                                if($meat_registration_pdf->business_type == 1)
                                                {
                                                    $business_type = 'Buture Shope ( मांस  विक्री  केंद्र )';
                                                }
                                                if($meat_registration_pdf->business_type == 2)
                                                {
                                                    $business_type = 'Meat Processing Plant ( मांस प्रक्रिया केंद् )';
                                                }
                                                if($meat_registration_pdf->business_type == 3)
                                                {
                                                    $business_type = 'Transportation of Meat ( मांसाची  वाहतूक )';
                                                }
                                                if($meat_registration_pdf->business_type == 4)
                                                {
                                                    $business_type = 'Other ( इतर )';
                                                }
                                            ?>


                                         {{ $applicant_title_id }} {{ $meat_registration_pdf->applicant_fname }} {{ $meat_registration_pdf->applicant_mname }} {{ $meat_registration_pdf->applicant_lname }}</strong> राहणार <strong> {{ $meat_registration_pdf->house_number }} {{ $meat_registration_pdf->house_name }} {{ $meat_registration_pdf->street_1 }} {{ $meat_registration_pdf->area_1 }} {{ $meat_registration_pdf->dist_name }} </strong> असे लिहून  देतो / देते  कि, वर नमूद केलेली माहिती सत्य असून सोबत जोडलेला सर्व कागदपत्र योग्य व वैध आहेत. तसेच खालील नियमातील तरतुदीचे व महापालिकेच्या सूचनांचे पालन करणे माझ्यावर  बंधनकारक  राहतील.</p>
<br>
                                       

                                    <ul style="font-size:17px; font-weight:900px;">
                                         <li class="d-flex pb-20">
                                            १. प्राणी संरक्षण अधिनियम , १९७६ व महाराष्ट्र प्राणी संरक्षण (सुधारित) कायदा , १९९५.
                                        </li>
                                        <li class="d-flex pb-20">
                                           २. प्राणी क्लेश प्रतिबंधक (कत्तलखाने) अधिनियम,  २००० 
                                        </li>
                                        <li class="d-flex pb-20">
                                           ३. मुंबई प्रांतिक महानगरपालिका अधिनियम ,  १९४९ (महाराष्ट्र महानगरपालिका अधिनियम, १९४९) व त्याअन्वये तयार करण्यात आलेली उपविधी.  
                                        </li>
                                         <li class="d-flex pb-20">
                                           ४. अन्न सुरक्षा व मानदे अधिनियम , २००६ व अधिनियम , व अधिनियम  २०११
                                        </li>
                                         <li class="d-flex pb-20">
                                           ५. इतर लागू असलेले कायदे व नियम 
                                        </li>
                                         <li class="d-flex pb-20">
                                           ६. वेळोवेळी सुधारित नियम व कायदे . 
                                        </li>
                                   </ul>
<br><br>

                                   <p class="mb-0">
                                       I <span></span> <strong>
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

                                                <?php
                                                $business_type = '';
                                                
                                                if($meat_registration_pdf->business_type == 1)
                                                {
                                                    $business_type = 'Butcher shop ( मांस  विक्री  केंद्र )';
                                                }
                                                if($meat_registration_pdf->business_type == 2)
                                                {
                                                    $business_type = 'Meat Processing Plant ( मांस प्रक्रिया केंद् )';
                                                }
                                                if($meat_registration_pdf->business_type == 3)
                                                {
                                                    $business_type = 'Transportation of Meat ( मांसाची  वाहतूक )';
                                                }
                                                if($meat_registration_pdf->business_type == 4)
                                                {
                                                    $business_type = 'Other ( इतर )';
                                                }
                                            ?>


                                         {{ $applicant_title_id }} {{ $meat_registration_pdf->applicant_fname }} {{ $meat_registration_pdf->applicant_mname }} {{ $meat_registration_pdf->applicant_lname }}</strong> Residing at <strong> {{ $meat_registration_pdf->house_number }} {{ $meat_registration_pdf->house_name }} {{ $meat_registration_pdf->street_1 }} {{ $meat_registration_pdf->area_1 }} {{ $meat_registration_pdf->dist_name }} </strong>  that all information furnished above all documents submitted by me is true & valid the best of my knowledge and belief. Also I further state that provisions of following laws and instructions given by Corporation is binding on me.</p>

<br>
                                         <ul style="font-size:17px; font-weight:900px;">
                                         <li class="d-flex pb-20">
                                           1. Animal Preservation Act, 1976 & Maharashtra Animal Preservation(Amendment) Act, 1995
                                        </li>
                                        <li class="d-flex pb-20">
                                          2. Prevention of Cruelty to Animals (Slaughter House) Rules, 2000
                                        </li>
                                        <li class="d-flex pb-20">
                                          3. Bombay Provincial Municipal Corporation Act, 1949 (Maharashtra Municipal Corporation Act, 1949) and Bye-laws made there under. 
                                        </li>
                                         <li class="d-flex pb-20">
                                          4. Food Safety and Standards Act, 2006 AND Food Safety and Standards (Licensing and Registration of Food Businesses) Regulations, 2011)
                                        </li>
                                         <li class="d-flex pb-20">
                                          5. Other laws in force for the time being. 
                                        </li>
                                         <li class="d-flex pb-20">
                                          6. Times to Time Revise Rules and Regulations 
                                        </li>
                                   </ul>
                                </div>
                                <!--<div class="col-md-4 col-sm-4 ">-->
                                <!--    <p class="mb-0">-->
                                <!--        <strong>License No. - </strong>  -->
                                <!--        {{ $meat_registration_pdf->meat_pplication_no }}-->
                                <!--    </p>-->
                                <!--</div>-->
                            </div>
                           
                            
                           
                          
                             <div class="row pt-3"> 

                                <div class="col-md-6 col-sm-12 ">
                                    <p class="mb-0">
                                       
                                        <strong>दिनांक / Date :  {{ \Carbon\Carbon::now()->format('d/m/Y') }}    </strong><br><br>
                                        <strong>ठिकाण / Place :      </strong>
                                    </p>
                                </div>

                                <div class="col-md-6 col-sm-12 text-right">
                                    <p class="mb-0">
                                        
                                        <strong>
                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $meat_registration_pdf->applicant_signature }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:100px;">
                                       </strong> <br>
                                      
                                       
                                        <strong> {{ $applicant_title_id }} {{ $meat_registration_pdf->applicant_fname }} {{ $meat_registration_pdf->applicant_mname }} {{ $meat_registration_pdf->applicant_lname }}</strong><br>
                                       
                                        <strong>अर्जदाराची सही व नाव  </strong><br>
                                        <strong>Signature and Name of Applicant's </strong>
                                    </p>
                                </div>
                            </div>
                          
                           
                            
                           
                            
                        </div>    
                    </div>

                   
                            
                       
                    <div class="submit-section text-right pt-5" >
                        <a href='{{ url("/meat_registration_list/$meat_registration_pdf->status") }}' class="btn btn-danger btn-lg text-light" >Cancel</a>
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
