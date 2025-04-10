@include('common.header')

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    @if ($status == 0)
                        <h2>Pending PET Application</h2>
                    @elseif ($status == 1)
                        <h2>Approve PET Application</h2>
                    @elseif ($status == 2)
                        <h2>Reject PET Application</h2>
                    @endif
                    
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <!--<li class="breadcrumb-item"><a href="{{ url('/#') }}">PET Application</a></li>-->
                        <li class="breadcrumb-item active">
                            @if ($status == 0)
                                Pending PET Application
                            @elseif ($status == 1)
                                Approve PET Application
                            @elseif ($status == 2)
                                Reject PET Application
                            @endif
                        </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                @if ($status == 0)
                                    <strong style="text-transform: capitalize;">Pending PET Application</strong>
                                @elseif ($status == 1)
                                    <strong style="text-transform: capitalize;">Approve PET Application</strong>
                                @elseif ($status == 2)
                                    <strong style="text-transform: capitalize;">Reject PET Application</strong>
                                @endif
                                
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>PET Application no.</th>
                                            <th>Applicant Full Name</th>
                                            <th>Ward Name</th>
                                            <th>Department Name</th>
                                            <th>District Name</th>
                                            <th>Taluka Name</th>
        									<th>Dog Breed Name</th>
                                            <th>View Details</th>
                                            <th>Generate Pdf</th>
        								</tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pet_registration_list as $key => $value)
                                            <tr>
                                                <td><b>{{ $key+1 }}</b></td>
                                                <td><b>{{ $value->pet_pplication_no }}</b></td>
                                                <td>{{ $value->applicant_fname }} {{ $value->applicant_mname }} {{ $value->applicant_lname }}</td>
                                                <td>{{ $value->ward_name }}</td>
                                                <td>{{ $value->dept_name }}</td>
                                                <td>{{ $value->dist_name }}</td>
                                                <td>{{ $value->taluka_name }}</td>
            									<td>{{ $value->breeds_name }}</td>
            									<td>
                                                    <a href='{{ url("/pet_registration_view/{$value->id}/{$value->status}") }}' class="btn btn-info btn-sm text-light">
                                                        <i class="zmdi zmdi-eye"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href='{{ url("/generate_pet_registration_pdf/{$value->id}/{$value->status}") }}' class="btn btn-danger btn-sm text-light">
                                                        <i class="zmdi zmdi-collection-pdf"></i>
                                                    </a>
                                                </td>
            								</tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@include('common.footer')  