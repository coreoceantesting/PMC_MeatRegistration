@include('common.header')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Department</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/department_master') }}">Master</a></li>
                        <li class="breadcrumb-item active">Add Department</li>
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
                            <form method="post" action="{{ url('/department_master') }}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="pd-20 card-box mb-30">
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>Ward Name : <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <select class="form-control show-tick @error('ward_id') is-invalid @enderror" data-live-search="true" name="ward_id" id="ward_id" style="width: 100%; height: 38px;">
                                                <option value=" ">Select Ward Name</option>
                                                @foreach ($ward_mst as $key => $value)
                                                    <option value="{{ $key }}" {{ old('ward_id') == "$key" ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('ward_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                
                                        <label class="col-sm-2"><strong>Department Name : <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="dept_name" id="dept_name" class="form-control @error('dept_name') is-invalid @enderror" value="{{ old('dept_name') }}" placeholder="Enter Department Name.">
                                            @error('dept_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                
                                    <div class="form-group row mt-4">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                            <a href="{{ url('/department_master') }}" class="btn btn-danger text-light ">Cancel</a>&nbsp;&nbsp;
                                            <button type="submit" class="btn btn-success text-light">Submit</button>
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