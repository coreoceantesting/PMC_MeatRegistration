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
                        <li class="breadcrumb-item active">Edit User</li>
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
                            <form method="post" action="{{ route('user_master.update', $data->id) }}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                
                                @if (!empty($data->id) || 1 == 1)
                                    <input type="hidden" name="_method" value="PATCH">
                                @endif
                
                                <input type="hidden" id="id" name="id" value="{{ $data['id'] or '' }}">
                                
                                <div class="pd-20 card-box mb-30">
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2"><strong>Ward Name : <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="ward_name" id="ward_name" class="form-control @error('ward_name') is-invalid @enderror" value="{{ $data->ward_name }}" placeholder="Enter Ward Name.">
                                            @error('ward_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> -->

                                     <div class="form-group row">
                                        <!--<label class="col-sm-2"><strong> Name : </strong></label>-->
                                        <!--<div class="col-sm-4 col-md-4">-->
                                        <!--    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}" placeholder="Enter Name.">-->
                                        <!--    @error('name')-->
                                        <!--        <span class="invalid-feedback" role="alert">-->
                                        <!--            <strong>{{ $message }}</strong>-->
                                        <!--        </span>-->
                                        <!--    @enderror-->
                                        <!--</div>-->
                                        <label class="col-sm-2"><strong> First Name : </strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}" placeholder="Enter First Name.">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        

                                         <label class="col-sm-2"><strong> Middle Name : </strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="m_name" id="m_namem_name" class="form-control @error('m_name') is-invalid @enderror" value="{{ $data->m_name }}" placeholder="Enter Middle Name.">
                                            @error('m_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                         <label class="col-sm-2"><strong> Last Name : </strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="l_name" id="l_name" class="form-control @error('l_name') is-invalid @enderror" value="{{ $data->l_name }}" placeholder="Enter Last Name.">
                                            @error('l_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong> Mobile Number : </strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="mobile_number" id="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror" value="{{ $data->mobile_number }}" placeholder="Enter Mobile Number.">
                                            @error('mobile_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                     
                                         <label class="col-sm-2"><strong>User Type : <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                             <select class="form-control custom-select2 @error('user_type') is-invalid @enderror"  name="user_type" id="user_type" >
                                        <option value=" ">Select User Type</option>
                                        <option value="1" {{ $data->user_type  == '1' ? 'selected' : '' }}>Admin</option>
                                        <!--<option value="2" {{ $data->user_type  == '2' ? 'selected' : '' }}> Veterinary</option>-->
                                        <option value="3" {{ $data->user_type  == '3' ? 'selected' : '' }}>HOD</option>
                                       
                                    </select>                                          
                                                 @error('ward_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong> Email : </strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}" placeholder="Enter email .">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                      <!--    <label class="col-sm-2"><strong> Password : </strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ $data->password }}" placeholder="Enter password .">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> -->
                                       
                                        
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