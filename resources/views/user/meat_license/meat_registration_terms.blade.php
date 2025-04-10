<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>PMC || पशुवधगृह अटी व शर्ती </title>

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
            					</a>
							</div>
						</div>
						
						<div class="col-sm-10 col-xs-12 d-flex flex-column align-items-center align-items-sm-start">
							<div class="title">
								<h4>पशुवधगृह अटी व शर्ती </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
									<!--<li class="breadcrumb-item"><a href="javascript:;">Documentation</a></li>-->
									<li class="breadcrumb-item active" aria-current="page">पशुवधगृह अटी व शर्ती </li>
								</ol>
							</nav>
						</div>
						
						<div class="col-sm-2 col-xs-12 text-right d-none d-sm-block">
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
					</div>
				</div>
				
				
				<div class="pd-20 card-box mb-30" >
				    <h6 class="text-blue mb-3">चिकन ,मटण ,फिश  विक्री व्यवसाय परवाना अटी व शर्ती  : - </h6><br>
					
					<ul style="font-size:17px; font-weight:900px;">
						<li class="d-flex pb-20">
						    १. हा परवाना म्हणजे जागेच्या अधिकृततेचा परवाना नसून ,त्यात नमूद केलेल्या बाबीची विक्री करिताच मर्यादित राहील .
						</li>
						<li class="d-flex pb-20">
						    २. हा परवाना अहस्तांतरणीय  आहे . 
						</li>
						<li class="d-flex pb-20">
						    ३. कोणताही परवाना धारक त्याचे  विक्री केंद्र किंवा  त्याविक्री केंद्राचा भाग पोट भाड्याने देऊ शकणार नाही . 
						</li>
						<li class="d-flex pb-20">
						    ४. परवानाधारकांनी त्यांचा  परवाना दर्शनी भागात ठेवावा .
						</li>
						<li class="d-flex pb-20">
						    ५. परवाना धारकांनी विक्री केंद्र व बसण्याची जागा स्वच्छ ठेवावी.
						</li>
						<li class="d-flex pb-20">
						    ६. परवान्यामध्ये  स्पष्ट करण्यात आलेल्या मांसाच्या व्यतिरिक्त  कोणत्याही प्रकारच्या मांसाची विक्री करू नये .
						</li>
						<li class="d-flex pb-20">
						    ७. मांसाचा / पशुधनाचा साठा मर्यादेपेक्षा  जास्त करू नये .
						</li>
							<li class="d-flex pb-20">
						    ८. मांस कटाईनंतर शिल्लक राहिलेल्या प्राणीजन्य कचऱ्याची तसेच अतिरिक्त व खाण्यास अयोग्य असलेल्या मांसाची विल्हेवाट लावण्याची जबाबदारी परवाना धारकाची राहील  .
						</li>
							<li class="d-flex pb-20">
						    ९. प्रचलित कायदयानुसार अधिकृत असलेली वजन व मापे या व्यतिरिक्त अन्य वजन व मापे वापरू नये .
						</li>
							<li class="d-flex pb-20">
						    १०. महापालिकेने  बाजारात उपलब्ध केलेल्या पाण्याच्या विधेचा दुरुपयोग अथवा अपव्यय करू नये.
						</li>
							<li class="d-flex pb-20">
						    ११. जेव्हा जेव्हा महापालिकेचे  प्राधिकृत अधिकारी विक्री / प्रक्रिया केंद्राचे निरीक्षण / तपासणी करण्यासाठी येतील तेव्हा त्यांची निरीक्षण /तपासणी साठी सर्व प्रकारची व्यवस्था करावी व त्यांना अपेक्षित  असलेली  कागदपत्रे व पूरक माहिती तपासणीच्या ठिकाणी तात्काळ उपलब्ध करून देण्यात येईल .
						</li>
						<li class="d-flex pb-20">
						    १२. अनुज्ञप्तीच्या समाप्तीच्या विहित कालावधीपूर्वी (१ मार्च पूर्वी ) परवानाधारकास नूतनीकरणासाठी अर्ज करणे बंधनकारक आहे .
						</li>
						
					<p class="mb-0">
						    १३. परवाना धारकावर विक्रीस  ठेवण्यात येणाऱ्या  मांसाचे खालीलप्रमाणे विहित साठा नोंदवही ठेवणे व ती तपासणी साठी येणाऱ्या निरीक्षण अधिकाऱ्यास पडताळणीसाठी दाखवणे व त्यातील नोंद अदयावत ठेवणे बंधनकारक  असेल.
						    <div class="row pt-2" style="padding-left:30px; ">
                                <div class="col-md-12">
                                    <ul>
                                        <li class="p-1">
                                           <table>
                                               <th>अ .क्र</th>
                                               <th>दिनांक  </th>
                                               <th>परवान्यातील पशुधनाचा /मासांचा तपशील </th>
                                               <th> सुरवातीची पशुधनाचा / मासांची संख्या / वजन</th>
                                               <th>दिवसातील पशुधनांचा / मासांची खरेदी व स्रोत</th>
                                              <th>दिवसातील पशुधनांची कत्तल / मासांची विक्री</th>
                                              <th>
                                                  निव्वळ शिल्लक 
                                              </th>
                                               <tr>
                                                   <td></td>
                                                    <td></td>
                                                     <td></td>
                                                      <td></td>
                                                       <td></td>
                                                        <td></td>
                                               </tr>
                                           </table>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
    					</p>
						
						
						
						<li class="d-flex pb-20">
						    १४. अनुज्ञप्तीच्या समाप्तीनंतर परवाना धारकास कोणतेही कृती करण्याचे थांबवावे आणि बंद करावे लागेल. 
						</li>
						
							<li class="d-flex pb-20">
						    १५. मांस विक्री केंद्रामध्ये संसर्गजन्य रोगापासून ग्रस्त असलेल्या अश्या कोणत्याही व्यक्तीस  प्रवेश अथवा कृती करणे निषिद्ध असेल. 
						</li>
						
						
						<li class="d-flex pb-20">
						    १६. परवानाधारकांस मांस विक्री केंद्राची दर सहा महिन्याने वैद्यकीय तपासणी करणे  बंधनकारक असेल. 
						</li>
    					<li class="d-flex pb-20">
						    १७. परवानाधारकांस मांसविक्री केंद्राची दर सहा महिन्याने किटकनाशक  फवारणी करणे  बंधनकारक असेल.
						</li>
    					<li class="d-flex pb-20">
						    १८. परवानाधारकांस, महाराष्ट्र महानगरपालिका कायदा १९४९ चे कलम ३३१, ३३५, ३८२, व ४५ चे पोटकलम (२६) (२७) (२८) व (४८) अन्वये तयार तयार करण्यात आलेली पनवेल महानगरपालिकेची बाजार, खाजगी बाजार व कत्तलखाने या उपविधीतील व इत्तर प्रचलित कायद्यातील नियमांचे काटेकोरपणे पालन करणे बंधनकारक असेल त्यांचे उल्लंघन करू नये , उल्लंघन केल्यास परवाना धारकाचा परवाना रद्द करण्याचा अधिकार मा. आयुक्त पनवेल महानगरपालिका यांनी राखून ठेवलेला आहे.
						</li>
						
						
						
						
						<p class="mb-0">
						    १९. मांस  विक्री व्यवसायधारकाने खालील कायद्यातील तरतुदीचे काटेकोरपणे पालन करणे बंधनकारक आहे. 
						    <div class="row pt-2" style="padding-left:30px; ">
                                <div class="col-md-12">
                                    <ul>
                                        <li class="p-1">
                                            १. महाराष्ट्र प्राणी संरक्षण कायदा, 1976 ( Maharashtra animal preservation act, 1976).
                                        </li>
                                        <li class="p-1">
                                            २. महाराष्ट्र प्राणी संरक्षण (सुधारित ) कायदा 1995  Maharashtra animal preservation (amendement act 1995).
                                        </li>
                                        <li class="p-1">
                                            ३. प्राणी क्लेश प्रतिबंधक (कत्तलखाने ) नियम , 2001 [Pevention of cruuly to animals (slaughter house) Rule, 2000].
                                        </li>
                                        <li class="p-1">
                                            ४. अन्न सुरक्षा व मानदे अधिनियम 2006 व नियमन 2011 [Food safety and Standers Act, 2006 & Food safety and Standers (Licensing and registration of Food Businesses २०११)].
                                        </li>
                                    </ul>
                                </div>
                            </div>
    					</p>
    					
    				
    					
    					
					<div class="form-group row mt-4">
                        <!--<label class="col-md-3"></label>-->
                        <div class="col-md-12" style="display: flex; justify-content: center;">
                            <a href="{{ url('/') }}" class="btn btn-danger ">Cancel</a>&nbsp;&nbsp;
                            <a href="{{ url('/user/meat_registration') }}" class="btn btn-success ">Accept</a>
                        </div>
                    </div>
				</div>
			</div>
			
        </div>
    </div>
	<style>
	    table, th, td {
  border: solid 1px #000;
  padding: 10px;
}

table {
    border-collapse:collapse;
    caption-side:bottom;
}

caption {
  font-size: 16px;
  font-weight: bold;
  padding-top: 5px;
}
	</style>
	
    <!-- js -->
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/core.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/script.min.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/process.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/layout-settings.js"></script>
    <script src="{{ url('/') }}/userend/assets/src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="{{ url('/') }}/userend/assets/vendors/scripts/steps-setting.js"></script>
	<script src="{{ url('/') }}/userend/assets/vendors/scripts/advanced-components.js"></script>
	
</body>

</html>
