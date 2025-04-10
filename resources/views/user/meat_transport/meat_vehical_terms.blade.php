<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>PMC || मांस  / पशुधन वाहतूक व्यवसाय परवाना अटी व शर्ती </title>

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
								<h4>मांस  / पशुधन वाहतूक व्यवसाय अटी व शर्ती </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
									<!--<li class="breadcrumb-item"><a href="javascript:;">Documentation</a></li>-->
									<li class="breadcrumb-item active" aria-current="page">मांस  / पशुधन वाहतूक व्यवसाय अटी व शर्ती </li>
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
				    <h6 class="text-blue mb-3">मांस / पशुधन वाहतूक व्यवसाय परवाना- अटी  : - </h6><br>
					
					<ul style="font-size:17px; font-weight:900px;">
						<li class="d-flex pb-20">
						   १. हा परवाना म्हणजे वाहनाच्या अधिकृततेचा परवाना नसून, त्यात नमूद केलेल्या बाबीच्या वाहतुकीकरिताच मर्यादित आहे.
						</li>
						<li class="d-flex pb-20">
						    २. हा परवाना अहस्तांतरणीय आहे.
						</li>
						<li class="d-flex pb-20">
						    ३. परवाना धारकांनी त्याचा परवाना वाहनांमध्येच ठेवावा.
						</li>
						<li class="d-flex pb-20">
						    ४. परवानाधारकांनी त्यांचे वाहन स्वच्छ ठेवावे.
						</li>
						<li class="d-flex pb-20">
						    ५. परवान्यामध्ये स्पष्ट करण्यात आलेल्या मांसाच्या / पशुधनाच्या व्यतिरिक्त कोणत्याही प्रकारच्या बाबीची वाहतूक करू नये.
						</li>
						<li class="d-flex pb-20">
						    ६. मांसाचा / पशुधनाची वाहतूक मर्यादेपेक्षा जास्त प्रमाणात करू नये
						</li>
						<li class="d-flex pb-20">
						    ७. वाहतुकीदरम्यान प्राणीज्यन्य  कचऱ्याची तसेच अतिरिक्त व खाण्यास अयोग्य असलेल्या मासाची अथवा त्यातून निघणाऱ्या रक्तमिश्रीत स्त्रावाची नियमितपणे विल्हेवाट लावण्याची जबाबदारी परवाना धारकाची असेल. कोणत्याही परिस्थितीत असे विवक्षित पदार्थ रस्त्यावर साडणार नाहीत याची खबरदारी घ्यावी
						</li>
							<li class="d-flex pb-20">
						    ८. परवानाधारकाने मांस / पशुधन वाहतुकीदरम्यान जनतेस कोणत्याही प्रकारचा प्रादुर्भाव होणार नाही याची दक्षता घ्यावी अन्यथा आपणाला देण्यात आलेला परवाना रद्द करण्यात येईल.
						</li>
							<li class="d-flex pb-20">
						    ९. प्रचलीत कायद्यानुसार अधिकृत असलेली वजन व मापे व्यतिरिक्त अन्य वजन व मापे वापरू नये.
						</li>
							<li class="d-flex pb-20">
						    १०. जेव्हा जेव्हा महापालिकेचे प्राधिकृत अधिकारी स्थानिक पोलीस अधिकारी वाहनाचे निरीक्षण / तपासणी करण्यासाठी येतील तेव्हा त्यांची निरीक्षण / तपासणीसाठी सर्व प्रकारची व्यवस्था करावी व त्यांना अपेक्षित असलेली कागदपत्रे व पूरक माहिती तपासणीच्या ठिकाणी तात्काळ उपलब्ध करून देण्यात येईल.
						</li>
							<li class="d-flex pb-20">
						    ११. अनुज्ञप्तीच्या समाप्तीच्या विहीत कालावधीपूर्वी (१ मार्च पूर्वी ) परवानाधारकास नुतनीकरणासाठी अर्ज करणे बंधनकारक आहे.
						</li>
						<li class="d-flex pb-20">
						    १२. अनुज्ञप्तीच्या समाप्तीनंतर परवाना धारकांस कोणतेही कृती करण्याचे थांबवावे आणि बंद करावे लागेल.
						</li>

						<li class="d-flex pb-20">
						    १३. मांस / पशुधना वाहतूकी दरम्यान, संसर्गजन्य रोगांपासून ग्रस्त  असलेल्या अशा कोणत्याही व्यक्तीस वाहनात प्रवेश अथवा मांस / पशुधन हाताळणे निषिध्द असेल.
						</li>
						
							<li class="d-flex pb-20">
						    १४. परवानाधारकांस मांस / पशुधन वाहतूक करणाऱ्या वाहनात कार्यरत असलेल्या कामगारांची सहा महिन्याने वैद्यकीय तपासणी करणे बंधनकारक असेल.
						</li>
						
						
							<li class="d-flex pb-20">
						    १५. परवानाधारकांस मांस / पशुधन वाहतूक करणाऱ्या वाहनात दर सहा महिन्याने किटकनाशक फवारणी करणे बंधनकारक असेल.
						</li>
    					
    					<li class="d-flex pb-20">
						    १६. परवानाधारकांस, महाराष्ट्र महानगरपालिका कायदा १९४९ चे कलम ३३१, ३३५, ३८२, व ४५८ चे पोटकलम (२६) (२७) (२८) व (४८) अन्वये तयार करण्यात आलेली पनवेल महानगरपालिकेची बाजार, खाजगी बाजार व कत्तलखाने या उपविधीतील व इत्तर प्रचलित कायद्यातील नियमांचे काटेकोरपणे पालन करणे बंधनकारक असेल त्यांचे उल्लंघन करू नये , उल्लंघन केल्यास परवाना धारकाचा परवाना रद्द करण्याचा अधिकार मा. आयुक्त पनवेल महानगरपालिका यांनी राखून ठेवलेला आहे.
						</li>
						
						
						<p class="mb-0">
						   १७. मांस विक्री व्यावसायधारकाने खालील कायद्यातील तरतुदीचे काटेकोरपणे पालन करणे बंधनकारक आहे
						    <div class="row pt-2" style="padding-left:30px; ">
                                <div class="col-md-12">
                                    <ul>
                                        <li class="p-1">
                                             1 महाराष्ट्र प्राणी संरक्षण कायदा, 1976 (Maharashtra Animal Preservation Act, 1976 )
                                        </li>
                                        <li class="p-1">
                                           २. महाराष्ट्र प्राणी संरक्षण (सुधारित) कायदा 1995 Maharashtra Animal Preservation (Amendement Act 1995)
                                        </li>
                                        <li class="p-1">
                                            3. प्राणी क्लेश प्रतीबंधक ( कत्तलखाने ) नियम 2001 [Prevention of Cruelty to Animals (Slaughter House) Rule, २०००
                                        </li>
                                         <li class="p-1">
                                            ४. अन्न सुरक्षा व मानदे अधिनियम 2006 व नियमन 2011 [Food safety and Standards Act, 2006 & Food safety and Standards (Licensing And Registration of Food Businesses, २०११]
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
    					</p>

    					<br><br>
    					
    				      <div class="row pt-3"> 
                                <div class="col-md-12 col-sm-12 text-right">
                                    <p class="mb-0">
                                        <strong>पशुधन विकास अधिकारी  </strong><br>
                                        <strong>पनवेल महानगरपालिका  </strong>
                                    </p>
                                </div>
                            </div>
    					
    				</ul>	
					<div class="form-group row mt-4">

                        <div class="col-md-12" style="display: flex; justify-content: center;">
                            <a href="{{ url('/') }}" class="btn btn-danger ">Cancel</a>&nbsp;&nbsp;
                            <a href="{{ url('/user/meat_transport_registration') }}" class="btn btn-success ">Accept </a>
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
