@include('common.header')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>User</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <!--<li class="breadcrumb-item"><a href="{{ url('/ward_master') }}">Master</a></li>-->
                        <li class="breadcrumb-item active">Add User</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form method="post" action="{{ url('/user_master') }}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="pd-20 card-box mb-30">
                                     <div class="form-group row">
                                        <!--<label class="col-sm-2"><strong> Name : </strong></label>-->
                                        <!--<div class="col-sm-4 col-md-4">-->
                                        <!--    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Name.">-->
                                        <!--    @error('name')-->
                                        <!--        <span class="invalid-feedback" role="alert">-->
                                        <!--            <strong>{{ $message }}</strong>-->
                                        <!--        </span>-->
                                        <!--    @enderror-->
                                        <!--</div>-->
                                        <label class="col-sm-2"><strong> First Name : <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter First Name.">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label class="col-sm-2"><strong> Middle Name : <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="m_name" id="m_namem_name" class="form-control @error('m_name') is-invalid @enderror" value="{{ old('m_name') }}" placeholder="Enter Middle Name.">
                                            @error('m_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        

                                         
                                         <label class="col-sm-2"><strong> Last Name : <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="l_name" id="l_name" class="form-control @error('l_name') is-invalid @enderror" value="{{ old('l_name') }}" placeholder="Enter Last Name.">
                                            @error('l_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <label class="col-sm-2"><strong> Mobile Number : </strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="mobile_number" id="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror" value="{{ old('mobile_number') }}" placeholder="Enter Mobile Number.">
                                            @error('mobile_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                     
                                    </div>

                                    <div class="form-group row">
                                        
                                         <label class="col-sm-2"><strong>User Type : <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <select class="form-control custom-select2 @error('user_type') is-invalid @enderror" name="user_type" id="user_type" style="width: 100%; height: 38px;">
                                                <option value=" ">Select User type</option>
                                                <option value="1" {{ old("user_type") == '1' ? 'selected' : '' }}>Admin</option>
                                                <!--<option value="2" {{ old('user_type') == "2" ? 'selected' : '' }}>Veterinary</option>-->
                                                <option value="3" {{ old('user_type') == "3" ? 'selected' : '' }}>HOD</option>
                                            </select>                                           
                                                 @error('ward_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <label class="col-sm-2"><strong> Email : <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email .">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        
                                         <label class="col-sm-2"><strong> Password : <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter password .">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                       
                                        
                                    </div>
                
                                    <div class="form-group row mt-4">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                            <a href="{{ url('/user_master') }}" class="btn btn-danger text-light">Cancel</a>&nbsp;&nbsp;
                                            <button type="submit" class="btn btn-success ">Submit</button>
                                        </div>
                                    </div>
                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('common.footer')  