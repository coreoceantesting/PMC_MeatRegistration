<!doctype html>
<html class="no-js " lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Panvel Municipal Corporation Pet License">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>PMC ||Meat Registration Login</title>
        
        <!-- Favicon-->
        <link rel="icon" href="{{ url('/') }}/assets/images/PMC-logo.png" >
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.min.css">   
        
        <!-- Toaster Message -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        
    </head>
    <style>
        form.card.auth_form.transpert {
            position: absolute;
            top: 49%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 503px;
            padding: 40px;
            background: #0f5a5f;
            border: none;
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0,0,0,.5);
            border-radius: 10px;
      }
        i.zmdi.zmdi-email {
        color: white;
      }
        i.zmdi.zmdi-lock {
        color: white;
      }

      .form-control {
        background: white;
      }
        
    </style>
    
    <body class="theme-blush" style='background-image:url("{{ url('/') }}/assets/images/meat 1.jpg"); background-position: center; background-repeat: no-repeat; background-size: cover; height: 100%;'>

        <div class="authentication">
            <div class="container" style="justify-content: center; display: flex;max-width: 550px;">
               
                        <form class="card auth_form transpert" method="POST" action="{{ url('/user/login') }}"  enctype="multipart/form">
                            @csrf
                            
                            <div class="header">
                                <img class="logo" src="{{ url('/') }}/assets/images/PMC-logo.png" alt="" style="width: 135px;">
                                  <h5 style="font-weight: bold;font-size: 26px;color: #ff7c00;;;"><b>{{ __('पनवेल महानगरपालिका') }}</b></h5>
                                <h5 style="color: white;font-weight: 800;">{{ __('Login(लॉगिन करा)') }}</h5>
                            </div>
                            
                            <div class="body">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus Placeholder="Enter Email Id (ईमेल)">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                        
                                <div class="input-group mb-3">
                                    <div class="input-group-append">                                
                                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                    </div>  
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" Placeholder="Enter Password (पासवर्ड)">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                      
                                </div>
                                
                                <!--@if (Route::has('password.request'))-->
                                <!--    <a class="btn btn-link float-right" href="{{ route('password.request') }}">-->
                                <!--        <b>{{ __('Forgot Your Password?') }}</b>-->
                                <!--    </a>-->
                                <!--@endif-->
                                    
                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">{{ __('Login') }}</button> 
                                
                                <!--<div class="signin_with mt-3">-->
                                <!--    I don't have an account?-->
                                <!--    <a class="link" href="{{ url('/user/register') }}">Sign UP</a>-->
                                <!--</div>-->
                            </div>
                        </form>
                        
                <!--    </div>-->
                    
                <!--</div>-->
            </div>
        </div>
        
        <!-- Jquery Core Js -->
        <script src="{{ url('/') }}/assets/bundles/libscripts.bundle.js"></script>
        <script src="{{ url('/') }}/assets/bundles/vendorscripts.bundle.js"></script> 
        <!-- Lib Scripts Plugin Js -->
        
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
    </body>

</html>
