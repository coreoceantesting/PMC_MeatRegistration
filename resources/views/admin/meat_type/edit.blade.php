@include('common.header')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Meat</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/meat_type_master') }}">Master</a></li>
                        <li class="breadcrumb-item active">Edit Meat</li>
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
                            <form method="post" action="{{ route('meat_type_master.update', $data->id) }}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                
                                @if (!empty($data->id) || 1 == 1)
                                    <input type="hidden" name="_method" value="PATCH">
                                @endif
                
                                <input type="hidden" id="id" name="id" value="{{ $data['id'] or '' }}">
                                
                                <div class="pd-20 card-box mb-30">
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>Meat Name : <span style="color:red;">*</span></strong></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="meat_name" id="meat_name" class="form-control @error('meat_name') is-invalid @enderror" value="{{ $data->meat_name }}" placeholder="Enter Meat Name.">
                                            @error('meat_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                
                                    <div class="form-group row mt-4">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                            <a href="{{ url('/meat_type_master') }}" class="btn btn-danger text-light">Cancel</a>&nbsp;&nbsp;
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