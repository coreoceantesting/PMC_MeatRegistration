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
                                <h4>Affidavit </h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <!--<li class="breadcrumb-item"><a href="javascript:;">Documentation</a></li>-->
                                    <li class="breadcrumb-item active" aria-current="page">Affidavit</li>
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
        <!--            <h2>Affidavit</h2>-->
        <!--            <ul class="breadcrumb">-->
        <!--                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>-->
        <!--                <li class="breadcrumb-item active">Affidavit </li>-->
        <!--            </ul>-->
        <!--            <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>-->
        <!--        </div>-->
        <!--        <div class="col-lg-5 col-md-6 col-sm-12">                -->
        <!--            <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        

       
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


                                        {{ $applicant_title_id }} {{ $meat_registration_pdf->applicant_fname }} {{ $meat_registration_pdf->applicant_mname }} {{ $meat_registration_pdf->applicant_lname }}</strong> राहणार <strong> {{ $meat_registration_pdf->house_number }} {{ $meat_registration_pdf->house_name }} {{ $meat_registration_pdf->street_1 }} {{ $meat_registration_pdf->area_1 }}, {{ $meat_registration_pdf->taluka_name }}, {{ $meat_registration_pdf->dist_name }} </strong> असे लिहून  देतो / देते  कि, वर नमूद केलेली माहिती सत्य असून सोबत जोडलेला सर्व कागदपत्र योग्य व वैध आहेत. तसेच खालील नियमातील तरतुदीचे व महापालिकेच्या सूचनांचे पालन करणे माझ्यावर बंधनकारक राहतील.</p>
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


                                         {{ $applicant_title_id }} {{ $meat_registration_pdf->applicant_fname }} {{ $meat_registration_pdf->applicant_mname }} {{ $meat_registration_pdf->applicant_lname }}</strong> Residing at <strong> {{ $meat_registration_pdf->house_number }} {{ $meat_registration_pdf->house_name }} {{ $meat_registration_pdf->street_1 }} {{ $meat_registration_pdf->area_1 }}, {{ $meat_registration_pdf->taluka_name }}, {{ $meat_registration_pdf->dist_name }} </strong>  that all information furnished above all documents submitted by me is true & valid the best of my knowledge and belief. Also I further state that provisions of following laws and instructions given by Corporation is binding on me.</p>

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
                              
                            </div>
                           
                            
                           
                          
                             <div class="row pt-3"> 

                                <div class="col-md-6 col-sm-12 ">
                                    <p class="mb-0">
                                       
                                        <strong>दिनांक / Date : -  {{ \Carbon\Carbon::now()->format('d/m/Y') }}  </strong><br><br>
                                        <strong>ठिकाण / Place :    {{ $meat_registration_pdf->taluka_name }}  </strong>
                                    </p>
                                </div>

                                <div class="col-md-6 col-sm-12 text-right">
                                    <p class="mb-0">
                                        
                                        
                                        <strong>
                                            <img src="{{url('/')}}/PMC_Meat_Registration/meat_file/applicant_signature/{{ $data->applicant_signature }} " alt="image" class="img-fluid rounded" width="200" height="100" style="max-height:100px;">
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
                        <a href='{{ url("/user/appli_form/") }}' class="btn btn-danger btn-lg text-light" >Cancel</a>
                        <button  class="btn btn-success btn-lg" type="button" onClick="printDiv('divToPrint')" ><i class="fa fa-print fa-lg text-light"></i> &nbsp;&nbsp;Print</button>
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

</body>

</html>

