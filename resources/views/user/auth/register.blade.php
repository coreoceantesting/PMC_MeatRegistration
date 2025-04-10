<!doctype html>
<html class="no-js " lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Panvel Municipal Corporation Pet License">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>PMC || Meat License Registration</title>
        
        <!-- Favicon-->
        <link rel="icon" href="{{ url('/') }}/assets/images/PMC-logo.png" >
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
       <style>
        form.card.auth_form.transpert {
            position: absolute;
            top: 49%;
            left: 50%;
            transform: translate(-50%,-43%);
            width: 503px;
            padding: 20px;
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
         i.zmdi.zmdi-account-circle {
    color: white;
}
    </style>

   <body class="theme-blush" style='background-image:url("{{ url('/') }}/assets/images/meat 1.jpg"); background-position: center; background-repeat: no-repeat; background-size: cover; height: 100%;'>


        <div class="authentication">    
            <div class="container" style="justify-content: center;
    display: flex;
    max-width: 550px;">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <form class="card auth_form transpert" method="POST" action="{{ url('/user/register') }}" enctype="multipart/form">
                            @csrf
                            
                            <div class="header">
                                <img class="logo" src="{{ url('/') }}/assets/images/PMC-logo.png" alt="" >
                                 <h5 style="font-weight: bold;font-size: 26px;color: #ff7c00;"><b>{{ __('पनवेल महानगरपालिका') }}</b></h5>
                                <span style="color: white;font-weight: 800;">Register a new User (नवीन वापरकर्ता)</span>
                            </div>
                            
                            <div class="body">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                    </div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus Placeholder="Enter Username (वापरकर्तानाव)">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" Placeholder="Enter Email Id (ईमेल)">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>  
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-phone" style="font-size:20px;color: white;"></i></span>
                                    </div>
                                    <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" oninput="this.value = this.value.slice(0, 10).replace(/[^0-9]/g, '')" value="{{ old('mobile') }}"  autocomplete="mobile" Placeholder="Enter mobile Number (मोबाईल नंबर)">

                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>  
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-append">                                
                                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" Placeholder="Enter Password (पासवर्ड)">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                           
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-append">                                
                                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" Placeholder="Enter Your Confirm Password (पासवर्डची पुष्टी करा)">
                                                            
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">{{ __('Register') }}</button>
                                
                                <div class="signin_with mt-3" style="color: white">
                                    Already have an account?
                                    <a class="link" href="{{ url('/admin/login') }}" style="color: #ff7c00;">Sign In</a>
                                </div>
                                
                            </div>
                        </form>
                        
                    </div>
                    <!--<div class="col-lg-8 col-sm-12 d-none d-md-block">-->
                    <!--    <div class="card">-->
                    <!--        <img src="{{ url('/') }}/assets/images/signup.svg" alt="Sign Up" />-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        
        
        <!-- Jquery Core Js -->
        <script src="{{ url('/') }}/assets/bundles/libscripts.bundle.js"></script>
        <script src="{{ url('/') }}/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
    </body>

</html>


