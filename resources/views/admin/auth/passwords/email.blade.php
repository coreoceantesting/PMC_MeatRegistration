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
                        <form class="card auth_form" method="POST" action="{{ route('password.email') }}" >
                            @csrf
                            
                            <div class="header">
                                <img class="logo" src="{{ url('/') }}/assets/images/PMC-logo.png" alt="">
                                <h5>Forgot Password?</h5>
                                <span>Enter your e-mail address below to reset your password.</span>
                            </div>
                            
                            <div class="body">
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" Placeholder="Enter Your Email Address">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">{{ __('Send Password Reset Link') }}</button>
                                
                                <div class="signin_with mt-3">
                                    Already have an account?
                                    <a class="link" href="{{ route('login') }}">Sign In</a>
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



<!--@extends('layouts.app')-->

<!--@section('content')-->
<!--<div class="container">-->
<!--    <div class="row justify-content-center">-->
<!--        <div class="col-md-8">-->
<!--            <div class="card">-->
<!--                <div class="card-header">{{ __('Reset Password') }}</div>-->

<!--                <div class="card-body">-->
<!--                    @if (session('status'))-->
<!--                        <div class="alert alert-success" role="alert">-->
<!--                            {{ session('status') }}-->
<!--                        </div>-->
<!--                    @endif-->

<!--                    <form method="POST" action="{{ route('password.email') }}">-->
<!--                        @csrf-->

<!--                        <div class="row mb-3">-->
<!--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>-->

<!--                                @error('email')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                @enderror-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="row mb-0">-->
<!--                            <div class="col-md-6 offset-md-4">-->
<!--                                <button type="submit" class="btn btn-primary">-->
<!--                                    {{ __('Send Password Reset Link') }}-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--@endsection-->
