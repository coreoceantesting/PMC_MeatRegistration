<!doctype html>
<html class="no-js " lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Panvel Municipal Corporation Pet License">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>PMC || PET License</title>
        
        <!-- Favicon-->
        <link rel="icon" href="{{ url('/') }}/assets/images/PMC-logo.png" >
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.min.css">
    </head>

    <body class="theme-blush">

        <div class="authentication">    
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <form class="card auth_form" method="POST" action="{{ url('/admin/register') }}" enctype="multipart/form">
                            @csrf
                            
                            <div class="header">
                                <img class="logo" src="{{ url('/') }}/assets/images/PMC-logo.png" alt="">
                                <h5>Sign Up</h5>
                                <span>Register a new membership</span>
                            </div>
                            
                            <div class="body">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                    </div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus Placeholder="Enter Your Username">

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" Placeholder="Enter Your Email Id">

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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" Placeholder="Enter Your Password">

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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" Placeholder="Enter Your Confirm Password">
                                                            
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">{{ __('Register') }}</button>
                                
                                <div class="signin_with mt-3">
                                    Already have an account?
                                    <a class="link" href="{{ url('/admin/login') }}">Sign In</a>
                                </div>
                                
                            </div>
                        </form>
                        
                    </div>
                    <div class="col-lg-8 col-sm-12 d-none d-md-block">
                        <div class="card">
                            <img src="{{ url('/') }}/assets/images/signup.svg" alt="Sign Up" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Jquery Core Js -->
        <script src="{{ url('/') }}/assets/bundles/libscripts.bundle.js"></script>
        <script src="{{ url('/') }}/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
    </body>

</html>


