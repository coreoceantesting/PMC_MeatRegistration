@include('common.header')
<!--JSPDF CDN-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>-->

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>PET Application</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">PET Application</li>
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
                                <div class="col-md-3" >
                                    <div class="icon-box">
                                        <img class="img-fluid " src="{{ url('/') }}/assets/images/PMC-logo.png" alt="Awesome Image" style="height:150px; width:220px;">
                                    </div>
                                </div>
                                <div class="col-md-8 text-center">
                                    <h1><strong>पनवेल महानगरपालिका</strong></h1>
                                    <h4><strong>पशुसंवर्धन विभाग</strong></h4>
                                    <h5><strong>कार्यालय : - देवाळे तलावाच्या  समोर, गोखले  हॉलच्या शेजारी ,  </strong><br></h5>
                                    <h5><strong>पनवेल - ४१०२०६.</strong></h5>
                                </div>
                                <div class="col-md-1" >
                                </div>
                            </div>
                            
                            <hr>
                            <div class="row">                                
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-1"><strong>दूरध्वनी कार्यालय : </strong> ०२२-२७४५८०४०/४१/४२ </p>
                                    <p class="mb-1"><strong>उपायुक्त्त कार्यालय : </strong> ०२२-२७४५५७५१ </p>
                                    <p class="mb-1"><strong>ई-मेल : </strong> panvelcorporation@gmail.com</p>
                                </div>
                                <div class="col-md-4 col-sm-4 text-left" style="padding-left:60px;">
                                    <p class="mb-1"><strong>फॅक्स  नं . : </strong> ०२२-२७४५२२३३ </p>
                                    <p class="mb-1"><strong>आयुक्त्त कार्यालय : </strong> ०२२-२७४५२३३९ </p>
                                    <p class="mb-1"><strong>वेबसाईट : </strong> www.panvelcorporation.com</p>
                                </div>
                            </div>
                            <hr class="mb-1">
                            
                            
                            <div class="row pt-0">
                                <div class="col-md-9   col-sm-9 ">
                                   जा.क्र.पमपा / वै.आ.वि. &nbsp; &nbsp; &nbsp;   / पशुवैद्यकीय सेवा / प्र.क्र.  {{ $pet_registration_pdf->pet_pplication_no }} / {{ now()->year }}   
                                </div>
                                <div class="col-md-3   col-sm-3 ">
                                   दिनांक :
                                   {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-5 text-center">
                                    <h5><strong>प्रपत्र "ब"</strong></h5>
                                    <p class="font-weight-bold">श्वान पाळण्याकरिता परवाना </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-1 text-start">
                                    <p>कलम 455  च्या  पोटकलम (1) द्वारे प्रदान केलेल्या या अधिकारांचा वापर करताना महाराष्ट्र महानगरपालिका अधिनियम 1949 , महाराष्ट्र महानगरपालिका अधिनियम 1949 च्या कलम 457 (13)(एफ) नुसार तयार केलेल्या नियमांचा मसुदा मधील तरतुदीनुसार .  </p>
                                </div>
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-0">
                                        <strong>वॉर्ड क्र - </strong>
                                         {{ $pet_registration_pdf->ward_name }}
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <p class="mb-0">
                                        <strong>परवाना क्र - </strong>  
                                        {{ $pet_registration_pdf->pet_pplication_no }}
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-3">                                
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-0">
                                        <strong>वर्ष -</strong>
                                        {{ now()->year }}
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <p class="mb-0">
                                        <strong>जुना परवाना क्र - </strong>
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12 ">
                                    <p class="mb-0">
                                        <strong>श्वान मालकाचे नाव - </strong>
                                        {{ $pet_registration_pdf->owner_fname }} {{ $pet_registration_pdf->owner_mname }} {{ $pet_registration_pdf->owner_lname }}
                                    </p>
                                </div>
                            </div>
                            <?php
                                $country_id = '';
                                
                                if($pet_registration_pdf->country_id == 1)
                                {
                                    $country_id = 'India';
                                }
                                
                            ?>
                            
                            <?php
                                $state_id = '';
                                
                                if($pet_registration_pdf->state_id == 1)
                                {
                                    $state_id = 'Maharashtra';
                                }
                                
                                
                            ?>
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12 ">
                                    <p class="mb-0">
                                        <strong>पत्ता - </strong>
                                        {{ $pet_registration_pdf->house_number }}, {{ $pet_registration_pdf->house_name }}, {{ $pet_registration_pdf->street_1 }}
                                        {{ $pet_registration_pdf->area_1 }}, {{ $country_id }}, {{ $state_id }} .
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-3">                                
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-0">
                                        <strong>संपर्क क्र - </strong>
                                        {{ $pet_registration_pdf->mobile_number }}
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <p class="mb-0">
                                        <strong>पिनकोड - </strong>
                                        {{ $pet_registration_pdf->zipcode }}
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-3">                                
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-0">
                                        <strong>श्वानाचे नाव - </strong>
                                        {{ $pet_registration_pdf->dog_name }}
                                    </p>
                                </div>
                                <?php
                                    $sex_id = '';
                                    
                                    if($pet_registration_pdf->sex_id == 1)
                                    {
                                        $sex_id = 'Male';
                                    }
                                    else if($pet_registration_pdf->sex_id == 2)
                                    {
                                        $sex_id = 'Female';
                                    }
                                    
                                ?>
                                <div class="col-md-4 col-sm-4 ">
                                    <p class="mb-0">
                                        <strong>लिंग - </strong>
                                        {{ $sex_id }}
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-3">                                
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-0">
                                        <strong>वर्षे - </strong>
                                        {{ $pet_registration_pdf->age }}
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <p class="mb-0">
                                        <strong>महीने - </strong>
                                        {{ $pet_registration_pdf->month }}
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-3">                                
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-0">
                                        <strong>श्वानाची जात - </strong>
                                        {{ $pet_registration_pdf->breeds_name }}
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <p class="mb-0">
                                        <strong>रंग - </strong>
                                        {{ $pet_registration_pdf->colour }}
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-3">                                
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-0">
                                        <strong>लसीकरण  केलेली दिनांक - </strong>
                                        {{ \Carbon\Carbon::parse($pet_registration_pdf->date_of_rabies_vaccination)->format('d/m/Y')}}
                                        
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <p class="mb-0">
                                        <strong>ओळखखूण -<strong>     
                                        {{ $pet_registration_pdf->identification_mark }}
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>नाव व नोंदणीक्रमांक, पशुवैद्यकीय डॉक्टर - </strong>
                                        {{ $pet_registration_pdf->veterinary_doctor_msvc_no }}
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>परवाना  दिल्याची दिनांक - </strong>
                                        {{ (!empty($pet_registration_pdf->approve_date_of_license_obtain) ? date("d/m/Y", strtotime($pet_registration_pdf->approve_date_of_license_obtain)) : NULL) }}
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>परवाना वैध दिनांक   दि .___________ ते ___________ </strong>
                                    </p>
                                </div>
                            </div>
                           
                            
                            <div class="row pt-3"> 
                                <div class="col-md-12 col-sm-12 text-right">
                                    <p class="mb-0">
                                        @if(!empty($pet_registration_pdf->approve_by == Auth::id()))
                                        <strong>{{ Auth::user()->name }}</strong><br>
                                        @endif
                                        <strong>पशुधनविकास अधिकारी </strong><br>
                                        <strong>पनवेल महानगरपालिका </strong>
                                    </p>
                                </div>
                            </div>
                            
                        </div>    
                    </div>
                    <div class="submit-section text-right pt-5" >
					    <a href='{{ url("/pet_registration_list/{$pet_registration_pdf->status}") }}' class="btn btn-danger btn-lg text-light" >Cancel</a>
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