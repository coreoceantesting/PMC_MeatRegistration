
<!doctype html>
<html class="no-js " lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>पनवेल महानगरपालिका || Meat License </title>
        
        <!-- Favicon-->
        <link rel="icon" href="{{ url('/') }}/assets/images/PMC-logo.png" >
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/charts-c3/plugin.css"/>
        
        <!-- JQuery DataTable Css -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
        
        
        <!-- Multi Select Css -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/multi-select/css/multi-select.css">
        
        <!-- Bootstrap Select Css -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
        
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/select2/select2.css" />

        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/morrisjs/morris.min.css" />
        
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.min.css">
        
        <!-- Toaster Message -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
        
    </head>

    <body class="theme-blush">

        <!-- Page Loader -->
        <!--<div class="page-loader-wrapper">-->
        <!--    <div class="loader">-->
        <!--        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ url('/') }}/assets/images/loader.svg" width="48" height="48" alt="Aero"></div>-->
        <!--        <p>Please wait...</p>-->
        <!--    </div>-->
        <!--</div>-->
        
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        
        <!-- Main Search -->
        <div id="search">
            <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
            <form>
              <input type="search" value="" placeholder="Search..." />
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <!-- Right Icon menu Sidebar -->
        <div class="navbar-right">
            <ul class="navbar-nav">
                <button type="submit" class="btn btn-primary rv-btn-toggle"><i class="zmdi zmdi-settings"></i></button>
                <!--<li><a href="#search" class="main_search" title="Search..."><i class="zmdi zmdi-search"></i></a></li>-->
                <!--<li class="dropdown">-->
                <!--    <a href="javascript:void(0);" class="dropdown-toggle" title="App" data-toggle="dropdown" role="button"><i class="zmdi zmdi-apps"></i></a>-->
                <!--    <ul class="dropdown-menu slideUp2">-->
                <!--        <li class="header">App Sortcute</li>-->
                <!--        <li class="body">-->
                <!--            <ul class="menu app_sortcut list-unstyled">-->
                <!--                <li>-->
                <!--                    <a href="image-gallery.html">-->
                <!--                        <div class="icon-circle mb-2 bg-blue"><i class="zmdi zmdi-camera"></i></div>-->
                <!--                        <p class="mb-0">Photos</p>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <a href="javascript:void(0);">-->
                <!--                        <div class="icon-circle mb-2 bg-amber"><i class="zmdi zmdi-translate"></i></div>-->
                <!--                        <p class="mb-0">Translate</p>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <a href="events.html">-->
                <!--                        <div class="icon-circle mb-2 bg-green"><i class="zmdi zmdi-calendar"></i></div>-->
                <!--                        <p class="mb-0">Calendar</p>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <a href="contact.html">-->
                <!--                        <div class="icon-circle mb-2 bg-purple"><i class="zmdi zmdi-account-calendar"></i></div>-->
                <!--                        <p class="mb-0">Contacts</p>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <a href="javascript:void(0);">-->
                <!--                        <div class="icon-circle mb-2 bg-red"><i class="zmdi zmdi-tag"></i></div>-->
                <!--                        <p class="mb-0">News</p>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <a href="javascript:void(0);">-->
                <!--                        <div class="icon-circle mb-2 bg-grey"><i class="zmdi zmdi-map"></i></div>-->
                <!--                        <p class="mb-0">Maps</p>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--        </li>-->
                <!--    </ul>-->
                <!--</li>-->
                <!--<li class="dropdown">-->
                <!--    <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>-->
                <!--        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>-->
                <!--    </a>-->
                <!--    <ul class="dropdown-menu slideUp2">-->
                <!--        <li class="header">Notifications</li>-->
                <!--        <li class="body">-->
                <!--            <ul class="menu list-unstyled">-->
                <!--                <li>-->
                <!--                    <a href="javascript:void(0);">-->
                <!--                        <div class="icon-circle bg-blue"><i class="zmdi zmdi-account"></i></div>-->
                <!--                        <div class="menu-info">-->
                <!--                            <h4>8 New Members joined</h4>-->
                <!--                            <p><i class="zmdi zmdi-time"></i> 14 mins ago </p>-->
                <!--                        </div>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <a href="javascript:void(0);">-->
                <!--                        <div class="icon-circle bg-amber"><i class="zmdi zmdi-shopping-cart"></i></div>-->
                <!--                        <div class="menu-info">-->
                <!--                            <h4>4 Sales made</h4>-->
                <!--                            <p><i class="zmdi zmdi-time"></i> 22 mins ago </p>-->
                <!--                        </div>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <a href="javascript:void(0);">-->
                <!--                        <div class="icon-circle bg-red"><i class="zmdi zmdi-delete"></i></div>-->
                <!--                        <div class="menu-info">-->
                <!--                            <h4><b>Nancy Doe</b> Deleted account</h4>-->
                <!--                            <p><i class="zmdi zmdi-time"></i> 3 hours ago </p>-->
                <!--                        </div>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <a href="javascript:void(0);">-->
                <!--                        <div class="icon-circle bg-green"><i class="zmdi zmdi-edit"></i></div>-->
                <!--                        <div class="menu-info">-->
                <!--                            <h4><b>Nancy</b> Changed name</h4>-->
                <!--                            <p><i class="zmdi zmdi-time"></i> 2 hours ago </p>-->
                <!--                        </div>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <a href="javascript:void(0);">-->
                <!--                        <div class="icon-circle bg-grey"><i class="zmdi zmdi-comment-text"></i></div>-->
                <!--                        <div class="menu-info">-->
                <!--                            <h4><b>John</b> Commented your post</h4>-->
                <!--                            <p><i class="zmdi zmdi-time"></i> 4 hours ago </p>-->
                <!--                        </div>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <a href="javascript:void(0);">-->
                <!--                        <div class="icon-circle bg-purple"><i class="zmdi zmdi-refresh"></i></div>-->
                <!--                        <div class="menu-info">-->
                <!--                            <h4><b>John</b> Updated status</h4>-->
                <!--                            <p><i class="zmdi zmdi-time"></i> 3 hours ago </p>-->
                <!--                        </div>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <a href="javascript:void(0);">-->
                <!--                        <div class="icon-circle bg-light-blue"><i class="zmdi zmdi-settings"></i></div>-->
                <!--                        <div class="menu-info">-->
                <!--                            <h4>Settings Updated</h4>-->
                <!--                            <p><i class="zmdi zmdi-time"></i> Yesterday </p>-->
                <!--                        </div>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--        </li>-->
                <!--        <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>-->
                <!--    </ul>-->
                <!--</li>-->
                <!--<li class="dropdown">-->
                <!--    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-flag"></i>-->
                <!--    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>-->
                <!--    </a>-->
                <!--    <ul class="dropdown-menu slideUp2">-->
                <!--        <li class="header">Tasks List <small class="float-right"><a href="javascript:void(0);">View All</a></small></li>-->
                <!--        <li class="body">-->
                <!--            <ul class="menu tasks list-unstyled">-->
                <!--                <li>-->
                <!--                    <div class="progress-container progress-primary">-->
                <!--                        <span class="progress-badge">eCommerce Website</span>-->
                <!--                        <div class="progress">-->
                <!--                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">-->
                <!--                                <span class="progress-value">86%</span>-->
                <!--                            </div>-->
                <!--                        </div>                        -->
                <!--                        <ul class="list-unstyled team-info">-->
                <!--                            <li class="m-r-15"><small>Team</small></li>-->
                <!--                            <li>-->
                <!--                                <img src="{{ url('/') }}/assets/images/xs/avatar2.jpg" alt="Avatar">-->
                <!--                            </li>-->
                <!--                            <li>-->
                <!--                                <img src="{{ url('/') }}/assets/images/xs/avatar3.jpg" alt="Avatar">-->
                <!--                            </li>-->
                <!--                            <li>-->
                <!--                                <img src="{{ url('/') }}/assets/images/xs/avatar4.jpg" alt="Avatar">-->
                <!--                            </li>                            -->
                <!--                        </ul>-->
                <!--                    </div>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <div class="progress-container">-->
                <!--                        <span class="progress-badge">iOS Game Dev</span>-->
                <!--                        <div class="progress">-->
                <!--                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">-->
                <!--                                <span class="progress-value">45%</span>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                        <ul class="list-unstyled team-info">-->
                <!--                            <li class="m-r-15"><small>Team</small></li>-->
                <!--                            <li>-->
                <!--                                <img src="{{ url('/') }}/assets/images/xs/avatar10.jpg" alt="Avatar">-->
                <!--                            </li>-->
                <!--                            <li>-->
                <!--                                <img src="{{ url('/') }}/assets/images/xs/avatar9.jpg" alt="Avatar">-->
                <!--                            </li>-->
                <!--                            <li>-->
                <!--                                <img src="{{ url('/') }}/assets/images/xs/avatar8.jpg" alt="Avatar">-->
                <!--                            </li>-->
                <!--                            <li>-->
                <!--                                <img src="{{ url('/') }}/assets/images/xs/avatar7.jpg" alt="Avatar">-->
                <!--                            </li>-->
                <!--                            <li>-->
                <!--                                <img src="{{ url('/') }}/assets/images/xs/avatar6.jpg" alt="Avatar">-->
                <!--                            </li>-->
                <!--                        </ul>-->
                <!--                    </div>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <div class="progress-container progress-warning">-->
                <!--                        <span class="progress-badge">Home Development</span>-->
                <!--                        <div class="progress">-->
                <!--                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;">-->
                <!--                                <span class="progress-value">29%</span>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                        <ul class="list-unstyled team-info">-->
                <!--                            <li class="m-r-15"><small>Team</small></li>-->
                <!--                            <li>-->
                <!--                                <img src="{{ url('/') }}/assets/images/xs/avatar5.jpg" alt="Avatar">-->
                <!--                            </li>-->
                <!--                            <li>-->
                <!--                                <img src="{{ url('/') }}/assets/images/xs/avatar2.jpg" alt="Avatar">-->
                <!--                            </li>-->
                <!--                            <li>-->
                <!--                                <img src="{{ url('/') }}/assets/images/xs/avatar7.jpg" alt="Avatar">-->
                <!--                            </li>                            -->
                <!--                        </ul>-->
                <!--                    </div>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--        </li>-->
                <!--    </ul>-->
                <!--</li>-->
                <!--<li><a href="javascript:void(0);" class="app_calendar" title="Calendar"><i class="zmdi zmdi-calendar"></i></a></li>-->
                <!--<li><a href="javascript:void(0);" class="app_google_drive" title="Google Drive"><i class="zmdi zmdi-google-drive"></i></a></li>-->
                <!--<li><a href="javascript:void(0);" class="app_group_work" title="Group Work"><i class="zmdi zmdi-group-work"></i></a></li>-->
                <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
                <li>
                    <a href="{{ url('/admin/logout') }}" class="mega-menu" title="Sign Out" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-power"></i>
                    </a>
                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        
        <!-- Left Sidebar -->
         @if(Auth::user()->user_type == 1)
        <aside id="leftsidebar" class="sidebar" >
            <div class="navbar-brand">
                <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
                <a href="{{ url('/admin/dashboard') }}"><span class="m-l-10">पनवेल महानगरपालिका</span></a>
            </div>
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <a class="image" href="{{ url('/admin/dashboard') }}"><img src="{{ url('/') }}/assets/images/PMC-logo.png" alt="User"></a>
                            <div class="detail">
                                <span>{{ Auth::user()->name }}</span><br>
                                <small>पनवेल महानगरपालिका</small>                        
                            </div>
                        </div>
                    </li>
                    <li class="{{ Request::is('admin/dashboard*') ? 'active' : '' }} open"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    <!--<li>-->
                    <!--    <a href="my-profile.html"><i class="zmdi zmdi-account"></i><span>Our Profile</span></a>-->
                    <!--</li>-->
                    <li class="{{ Request::is('district_master') || Request::is('taluka_master') || Request::is('meat_type_master') ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-toggle {{ Request::is('district_master') || Request::is('taluka_master') || Request::is('meat_type_master') ? 'active' : '' }}"><i class="zmdi zmdi-apps"></i><span>Master</span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('district_master') ? 'active' : '' }}"><a href="{{ url('/district_master') }}">District</a></li>
                            <li class="{{ Request::is('taluka_master') ? 'active' : '' }}"><a href="{{ url('/taluka_master') }}">Taluka</a></li>
                            <!--<li><a href="{{ url('/dog_breeds_master') }}">Dog Breed</a></li>-->
                            <!--<li><a href="{{ url('/ward_master') }}">Ward</a></li>-->
                            <!--<li><a href="{{ url('/department_master') }}">Department</a></li>-->
                            <li class="{{ Request::is('meat_type_master') ? 'active' : '' }}"><a href="{{ url('/meat_type_master') }}">Meat</a></li>
                        </ul>
                    </li>
                    <!--<li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>PET Application</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="{{ url('/pet_registration_list', 0 ) }}">Pending PET Application</a></li>-->
                    <!--        <li><a href="{{ url('/pet_registration_list', 1 ) }}">Approved PET Application</a></li>-->
                    <!--        <li><a href="{{ url('/pet_registration_list', 2 ) }}">Rejected PET Application</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <li class="{{ Request::is('meat_registration_list/0') || Request::is('meat_registration_list/1') || Request::is('meat_registration_list/2') ? 'active open' : '' }}"> 
                        <a href="javascript:void(0);" class="menu-toggle {{ Request::is('meat_registration_list/0') || Request::is('meat_registration_list/1') || Request::is('meat_registration_list/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Meat Application</span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('meat_registration_list/0') ? 'active' : '' }}"><a href="{{ url('/meat_registration_list', 0 ) }}">Pending Meat Application</a></li>
                            <li class="{{ Request::is('meat_registration_list/1') ? 'active' : '' }}"><a href="{{ url('/meat_registration_list', 1 ) }}">Approved Meat Application</a></li>
                            <li class="{{ Request::is('meat_registration_list/2') ? 'active' : '' }}"><a href="{{ url('/meat_registration_list', 2 ) }}">Rejected Meat Application</a></li>
                        </ul>
                    </li>

                     <li class="{{ Request::is('meat_renewal_list/0') || Request::is('meat_renewal_list/1') || Request::is('meat_renewal_list/2') ? 'active open' : '' }}"> 
                        <a href="javascript:void(0);" class="menu-toggle {{ Request::is('meat_renewal_list/0') || Request::is('meat_renewal_list/1') || Request::is('meat_renewal_list/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Meat Renewal Application</span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('meat_renewal_list/0') ? 'active' : '' }}"><a href="{{ url('/meat_renewal_list', 0 ) }}">Pending Meat Renewal Application</a></li>
                            <li class="{{ Request::is('meat_renewal_list/1') ? 'active' : '' }}"><a href="{{ url('/meat_renewal_list', 1 ) }}">Approved Meat Renewal Application</a></li>
                            <li class="{{ Request::is('meat_renewal_list/2') ? 'active' : '' }}"><a href="{{ url('/meat_renewal_list', 2 ) }}">Rejected Meat Renewal Application</a></li>
                        </ul>
                    </li>

                   <hr>
                     <li class="{{ Request::is('meat_transport_list/0') || Request::is('meat_transport_list/1') || Request::is('meat_transport_list/2') ? 'active open' : '' }}"> 
                        <a href="javascript:void(0);" class="menu-toggle {{ Request::is('meat_transport_list/0') || Request::is('meat_transport_list/1') || Request::is('meat_transport_list/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Vehicle Application</span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('meat_transport_list/0') ? 'active' : '' }}"><a href="{{ url('/meat_transport_list', 0 ) }}">Pending Vehicle Application</a></li>
                            <li class="{{ Request::is('meat_transport_list/1') ? 'active' : '' }}"><a href="{{ url('/meat_transport_list', 1 ) }}">Approved Vehicle Application</a></li>
                            <li class="{{ Request::is('meat_transport_list/2') ? 'active' : '' }}"><a href="{{ url('/meat_transport_list', 2 ) }}">Rejected Vehicle Application</a></li>
                        </ul>
                    </li>

                    <li class="{{ Request::is('meat_transport_renewal_list/0') || Request::is('meat_transport_renewal_list/1') || Request::is('meat_transport_renewal_list/2') ? 'active open' : '' }}"> 
                        <a href="javascript:void(0);" class="menu-toggle {{ Request::is('meat_transport_renewal_list/0') || Request::is('meat_transport_renewal_list/1') || Request::is('meat_transport_renewal_list/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Vehicle Renewal Application</span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('meat_transport_renewal_list/0') ? 'active' : '' }}"><a href="{{ url('/meat_transport_renewal_list', 0 ) }}">Pending Vehicle Renewal Application</a></li>
                            <li class="{{ Request::is('meat_transport_renewal_list/1') ? 'active' : '' }}"><a href="{{ url('/meat_transport_renewal_list', 1 ) }}">Approved Vehicle Renewal Application</a></li>
                            <li class="{{ Request::is('meat_transport_renewal_list/2') ? 'active' : '' }}"><a href="{{ url('/meat_transport_renewal_list', 2 ) }}">Rejected Vehicle Renewal Application</a></li>
                        </ul>
                    </li>
                    <hr>
                     <li class="{{ Request::is('all_register_meat') || Request::is('all_renewal_report') || Request::is('all_vehical_report') || Request::is('all_vehical_renewal_report') ? 'active open' : '' }}"> 
                        <a href="javascript:void(0);" class="menu-toggle {{ Request::is('all_register_meat') || Request::is('all_renewal_report') || Request::is('all_vehical_report') || Request::is('all_vehical_renewal_report') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Report</span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('all_register_meat') ? 'active' : '' }}"><a href="{{ url('/all_register_meat', )}}">All Meat Application Report</a></li>
                            <li class="{{ Request::is('all_renewal_report') ? 'active' : '' }}"><a href="{{ url('/all_renewal_report', ) }}">All Meat Application Renewal Report</a></li>
                            <li class="{{ Request::is('all_vehical_report') ? 'active' : '' }}"><a href="{{ url('/all_vehical_report', ) }}">All Vehicle Application Report</a></li>
                            <li class="{{ Request::is('all_vehical_renewal_report') ? 'active' : '' }}"><a href="{{ url('/all_vehical_renewal_report',  ) }}">All Vehicle Application Renewal Report</a></li>
                        </ul>
                    </li>
                    
                     <li class="{{ Request::is('user_master') ? 'active open' : '' }}"> 
                        <a href="javascript:void(0);" class="menu-toggle {{ Request::is('user_master') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>User</span></a>
                        <ul class="ml-menu">
                            <li>
                                <a class="{{ Request::is('user_master') ? 'active' : '' }}" href="{{ url('/user_master') }}"><i class="zmdi zmdi-assignment"></i>&nbsp;User List</a>
                            </li>
                        </ul>
                    </li>

                       @elseif(Auth::user()->user_type == 3)
                       
                        <aside id="leftsidebar" class="sidebar" >
            <div class="navbar-brand">
                <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
                <a href="{{ url('/hod/dashboard') }}"><span class="m-l-10">पनवेल महानगरपालिका</span></a>
            </div>
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <a class="image" href="{{ url('/hod/dashboard') }}"><img src="{{ url('/') }}/assets/images/PMC-logo.png" alt="User"></a>
                            <div class="detail">
                                <span>{{ Auth::user()->name }}</span><br>
                                <small>पनवेल महानगरपालिका</small>                        
                            </div>
                        </div>
                    </li>
                    <li class="open {{ Request::is('hod/dashboard*') ? 'active' : '' }}"><a href="{{ url('/hod/dashboard') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    
                     <li class="{{ Request::is('meat_registration_list_hod/0') || Request::is('meat_registration_list_hod/1') || Request::is('meat_registration_list_hod/2') ? 'active open' : '' }}"> 
                        <a href="javascript:void(0);" class="menu-toggle {{ Request::is('meat_registration_list_hod/0') || Request::is('meat_registration_list_hod/1') || Request::is('meat_registration_list_hod/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Meat Application</span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('meat_registration_list_hod/0') ? 'active' : '' }}"><a href="{{ url('/meat_registration_list_hod', 0 ) }}">Pending Meat Application</a></li>
                            <li class="{{ Request::is('meat_registration_list_hod/1') ? 'active' : '' }}"><a href="{{ url('/meat_registration_list_hod', 1 ) }}">Approved Meat Application</a></li>
                            <li class="{{ Request::is('meat_registration_list_hod/2') ? 'active' : '' }}"><a href="{{ url('/meat_registration_list_hod', 2 ) }}">Rejected Meat Application</a></li>
                        </ul>
                    </li>
                    
                     <li class="{{ Request::is('final_approve_meat_registration_list/0') || Request::is('final_approve_meat_registration_list/1') || Request::is('final_approve_meat_registration_list/2') ? 'active open' : '' }}"> 
                        <a href="javascript:void(0);" class="menu-toggle {{ Request::is('final_approve_meat_registration_list/0') || Request::is('final_approve_meat_registration_list/1') || Request::is('final_approve_meat_registration_list/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Final Approve List </span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('final_approve_meat_registration_list/0') ? 'active' : '' }}"><a href="{{ url('/final_approve_meat_registration_list', 0 ) }}">Final HOD Pending List </a></li>
                            <li class="{{ Request::is('final_approve_meat_registration_list/1') ? 'active' : '' }}"><a href="{{ url('/final_approve_meat_registration_list', 1 ) }}">Final HOD Approved List</a></li>
                            <li class="{{ Request::is('final_approve_meat_registration_list/2') ? 'active' : '' }}"><a href="{{ url('/final_approve_meat_registration_list', 2 ) }}">Final HOD Rejected List</a></li>
                        </ul>
                    </li>
                    
                     <li class="{{ Request::is('meat_renewal_list_hod/0') || Request::is('meat_renewal_list_hod/1') || Request::is('meat_renewal_list_hod/2') ? 'active open' : '' }}"> 
                        <a href="javascript:void(0);" class="menu-toggle {{ Request::is('meat_renewal_list_hod/0') || Request::is('meat_renewal_list_hod/1') || Request::is('meat_renewal_list_hod/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Meat Renewal Application</span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('meat_renewal_list_hod/0') ? 'active' : '' }}"><a href="{{ url('/meat_renewal_list_hod', 0 ) }}">Pending Meat Renewal Application</a></li>
                            <li class="{{ Request::is('meat_renewal_list_hod/1') ? 'active' : '' }}"><a href="{{ url('/meat_renewal_list_hod', 1 ) }}">Approved Meat Renewal Application</a></li>
                            <li class="{{ Request::is('meat_renewal_list_hod/2') ? 'active' : '' }}"><a href="{{ url('/meat_renewal_list_hod', 2 ) }}">Rejected Meat Renewal Application</a></li>
                        </ul>
                    </li>
                    
                     <li class="{{ Request::is('final_meat_renewal_list/0') || Request::is('final_meat_renewal_list/1') || Request::is('final_meat_renewal_list/2') ? 'active open' : '' }}"> 
                        <a href="javascript:void(0);" class="menu-toggle {{ Request::is('final_meat_renewal_list/0') || Request::is('final_meat_renewal_list/1') || Request::is('final_meat_renewal_list/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Final Approve Renewal List </span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('final_meat_renewal_list/0') ? 'active' : '' }}"><a href="{{ url('/final_meat_renewal_list', 0 ) }}">Final HOD Pending Meat Renewal List </a></li>
                            <li class="{{ Request::is('final_meat_renewal_list/1') ? 'active' : '' }}"><a href="{{ url('/final_meat_renewal_list', 1 ) }}">Final HOD Approved Meat Renewal List</a></li>
                            <li class="{{ Request::is('final_meat_renewal_list/2') ? 'active' : '' }}"><a href="{{ url('/final_meat_renewal_list', 2 ) }}">Final HOD Rejected Meat Renewal List</a></li>
                        </ul>
                    </li>
                    <hr>
                    <li class="{{ Request::is('meat_transport_list_hod/0') || Request::is('meat_transport_list_hod/1') || Request::is('meat_transport_list_hod/2') ? 'active open' : '' }}"> 
                        <a href="javascript:void(0);" class="menu-toggle {{ Request::is('meat_transport_list_hod/0') || Request::is('meat_transport_list_hod/1') || Request::is('meat_transport_list_hod/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Vehicle Application</span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('meat_transport_list_hod/0') ? 'active' : '' }}"><a href="{{ url('/meat_transport_list_hod', 0 ) }}">Pending Vehicle Application</a></li>
                            <li class="{{ Request::is('meat_transport_list_hod/1') ? 'active' : '' }}"><a href="{{ url('/meat_transport_list_hod', 1 ) }}">Approved Vehicle Application</a></li>
                            <li class="{{ Request::is('meat_transport_list_hod/2') ? 'active' : '' }}"><a href="{{ url('/meat_transport_list_hod', 2 ) }}">Rejected Vehicle Application</a></li>
                        </ul>
                    </li>
                    
                     <li class="{{ Request::is('final_meat_transport_list/0') || Request::is('final_meat_transport_list/1') || Request::is('final_meat_transport_list/2') ? 'active open' : '' }}"> 
                       <a href="javascript:void(0);" class="menu-toggle {{ Request::is('final_meat_transport_list/0') || Request::is('final_meat_transport_list/1') || Request::is('final_meat_transport_list/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Final Vehicle Approve List </span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('final_meat_transport_list/0') ? 'active' : '' }}"><a href="{{ url('/final_meat_transport_list', 0 ) }}">Final HOD Pending List </a></li>
                            <li class="{{ Request::is('final_meat_transport_list/1') ? 'active' : '' }}"><a href="{{ url('/final_meat_transport_list', 1 ) }}">Final HOD Approved List</a></li>
                            <li class="{{ Request::is('final_meat_transport_list/2') ? 'active' : '' }}"><a href="{{ url('/final_meat_transport_list', 2 ) }}">Final HOD Rejected List</a></li>
                        </ul>
                    </li>
                    
                    <li class="{{ Request::is('meat_transport_renewal_list_hod/0') || Request::is('meat_transport_renewal_list_hod/1') || Request::is('meat_transport_renewal_list_hod/2') ? 'active open' : '' }}"> 
                         <a href="javascript:void(0);" class="menu-toggle {{ Request::is('meat_transport_renewal_list_hod/0') || Request::is('meat_transport_renewal_list_hod/1') || Request::is('meat_transport_renewal_list_hod/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Vehicle Renewal Application</span></a>
                        <ul class="ml-menu">
                            <li  class="{{ Request::is('meat_transport_renewal_list_hod/0') ? 'active' : '' }}"><a href="{{ url('/meat_transport_renewal_list_hod', 0 ) }}">Pending Vehicle Renewal Application</a></li>
                            <li  class="{{ Request::is('meat_transport_renewal_list_hod/1') ? 'active' : '' }}"><a href="{{ url('/meat_transport_renewal_list_hod', 1 ) }}">Approved Vehicle Renewal Application</a></li>
                            <li  class="{{ Request::is('meat_transport_renewal_list_hod/2') ? 'active' : '' }}"><a href="{{ url('/meat_transport_renewal_list_hod', 2 ) }}">Rejected Vehicle Renewal Application</a></li>
                        </ul>
                    </li>
                    
                    <li class="{{ Request::is('final_meat_transport_renewal_list/0') || Request::is('final_meat_transport_renewal_list/1') || Request::is('final_meat_transport_renewal_list/2') ? 'active open' : '' }}"> 
                         <a href="javascript:void(0);" class="menu-toggle {{ Request::is('final_meat_transport_renewal_list/0') || Request::is('final_meat_transport_renewal_list/1') || Request::is('final_meat_transport_renewal_list/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Final Vehicle Renewal Application</span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('final_meat_transport_renewal_list/0') ? 'active' : '' }}"><a href="{{ url('/final_meat_transport_renewal_list', 0 ) }}">Final HOD Pending Vehicle Renewal Application</a></li>
                            <li class="{{ Request::is('final_meat_transport_renewal_list/1') ? 'active' : '' }}"><a href="{{ url('/final_meat_transport_renewal_list', 1 ) }}">Final HOD Approved Vehicle Renewal Application</a></li>
                            <li class="{{ Request::is('final_meat_transport_renewal_list/2') ? 'active' : '' }}"><a href="{{ url('/final_meat_transport_renewal_list', 2 ) }}">Final HOD Rejected Vehicle Renewal Application</a></li>
                        </ul>
                    </li>
                    
                    <hr>
                     <li class="{{ Request::is('admin_rejected_list/2') || Request::is('admin_rejected_list_renewal/2') || Request::is('admin_rejected_list_meat_transport/2') || Request::is('admin_rejected_list_meat_transport_renewal/2') ? 'active open' : '' }}"> 
                         <a href="javascript:void(0);" class="menu-toggle {{ Request::is('admin_rejected_list/2') || Request::is('admin_rejected_list_renewal/2') || Request::is('admin_rejected_list_meat_transport/2') || Request::is('admin_rejected_list_meat_transport_renewal/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Admin Rejected List </span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('admin_rejected_list/2') ? 'active' : '' }}"><a href="{{ url('/admin_rejected_list', 2 ) }}">Admin Rejected Meat List </a></li>
                            <li class="{{ Request::is('admin_rejected_list_renewal/2') ? 'active' : '' }}"><a href="{{ url('/admin_rejected_list_renewal', 2 ) }}">Admin Rejected Renewal Meat List </a></li>
                            <li class="{{ Request::is('admin_rejected_list_meat_transport/2') ? 'active' : '' }}"><a href="{{ url('/admin_rejected_list_meat_transport', 2 ) }}">Admin Rejected Vehicle List </a></li>
                            <li class="{{ Request::is('admin_rejected_list_meat_transport_renewal/2') ? 'active' : '' }}"><a href="{{ url('/admin_rejected_list_meat_transport_renewal', 2 ) }}">Admin Rejected Vehicle Renewal List </a></li>
                        </ul>
                    </li>
                    
                      <li class="{{ Request::is('hod_report_meat') || Request::is('hod_meat_report_renewal') || Request::is('hod_vehicle_report_list') || Request::is('hod_vehicle_renewal_report_list/2') ? 'active open' : '' }}"> 
                         <a href="javascript:void(0);" class="menu-toggle {{ Request::is('hod_report_meat') || Request::is('hod_meat_report_renewal') || Request::is('hod_vehicle_report_list') || Request::is('hod_vehicle_renewal_report_list/2') ? 'active' : '' }}"><i class="zmdi zmdi-assignment"></i><span>Report</span></a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('hod_report_meat') ? 'active' : '' }}"><a href="{{ url('/hod_report_meat', )}}">All Meat Application Report</a></li>
                            <li class="{{ Request::is('hod_meat_report_renewal') ? 'active' : '' }}"><a href="{{ url('/hod_meat_report_renewal', ) }}">All Meat Application Renewal Report</a></li>
                            <li class="{{ Request::is('hod_vehicle_report_list') ? 'active' : '' }}"><a href="{{ url('/hod_vehicle_report_list', ) }}">All Vehicle Application Report</a></li>
                            <li class="{{ Request::is('hod_vehicle_renewal_report_list') ? 'active' : '' }}"><a href="{{ url('/hod_vehicle_renewal_report_list',  ) }}">All Vehicle Application Renewal Report</a></li>
                        </ul>
                    </li>
                    @endif
                    <!--<li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-folder"></i><span>File Manager</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="file-dashboard.html">All File</a></li>-->
                    <!--        <li><a href="file-documents.html">Documents</a></li>-->
                    <!--        <li><a href="file-images.html">Images</a></li>-->
                    <!--        <li><a href="file-media.html">Media</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--<li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Blog</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="blog-dashboard.html">Dashboard</a></li>-->
                    <!--        <li><a href="blog-post.html">Blog Post</a></li>-->
                    <!--        <li><a href="blog-list.html">List View</a></li>-->
                    <!--        <li><a href="blog-grid.html">Grid View</a></li>-->
                    <!--        <li><a href="blog-details.html">Blog Details</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Ecommerce</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="ec-dashboard.html">Dashboard</a></li>-->
                    <!--        <li><a href="ec-product.html">Product</a></li>-->
                    <!--        <li><a href="ec-product-List.html">Product List</a></li>-->
                    <!--        <li><a href="ec-product-detail.html">Product detail</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-swap-alt"></i><span>Components</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="ui_kit.html">Aero UI KIT</a></li>                    -->
                    <!--        <li><a href="alerts.html">Alerts</a></li>                    -->
                    <!--        <li><a href="collapse.html">Collapse</a></li>-->
                    <!--        <li><a href="colors.html">Colors</a></li>-->
                    <!--        <li><a href="dialogs.html">Dialogs</a></li>                    -->
                    <!--        <li><a href="list-group.html">List Group</a></li>-->
                    <!--        <li><a href="media-object.html">Media Object</a></li>-->
                    <!--        <li><a href="modals.html">Modals</a></li>-->
                    <!--        <li><a href="notifications.html">Notifications</a></li>                    -->
                    <!--        <li><a href="progressbars.html">Progress Bars</a></li>-->
                    <!--        <li><a href="range-sliders.html">Range Sliders</a></li>-->
                    <!--        <li><a href="sortable-nestable.html">Sortable & Nestable</a></li>-->
                    <!--        <li><a href="tabs.html">Tabs</a></li>-->
                    <!--        <li><a href="waves.html">Waves</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-flower"></i><span>Font Icons</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="icons.html">Material Icons</a></li>-->
                    <!--        <li><a href="icons-themify.html">Themify Icons</a></li>-->
                    <!--        <li><a href="icons-weather.html">Weather Icons</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Forms</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="basic-form-elements.html">Basic Form</a></li>-->
                    <!--        <li><a href="advanced-form-elements.html">Advanced Form</a></li>-->
                    <!--        <li><a href="form-examples.html">Form Examples</a></li>-->
                    <!--        <li><a href="form-validation.html">Form Validation</a></li>-->
                    <!--        <li><a href="form-wizard.html">Form Wizard</a></li>-->
                    <!--        <li><a href="form-editors.html">Editors</a></li>-->
                    <!--        <li><a href="form-upload.html">File Upload</a></li>-->
                    <!--        <li><a href="form-summernote.html">Summernote</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-grid"></i><span>Tables</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="normal-tables.html">Normal Tables</a></li>-->
                    <!--        <li><a href="jquery-datatable.html">Jquery Datatables</a></li>-->
                    <!--        <li><a href="editable-table.html">Editable Tables</a></li>-->
                    <!--        <li><a href="footable.html">Foo Tables</a></li>-->
                    <!--        <li><a href="table-color.html">Tables Color</a></li>-->
                    <!--    </ul>-->
                    <!--</li>            -->
                    <!--<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span>Charts</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="echarts.html">E Chart</a></li>-->
                    <!--        <li><a href="c3.html">C3 Chart</a></li>-->
                    <!--        <li><a href="morris.html">Morris</a></li>-->
                    <!--        <li><a href="flot.html">Flot</a></li>-->
                    <!--        <li><a href="chartjs.html">ChartJS</a></li>-->
                    <!--        <li><a href="sparkline.html">Sparkline</a></li>-->
                    <!--        <li><a href="jquery-knob.html">Jquery Knob</a></li>-->
                    <!--    </ul>-->
                    <!--</li>            -->
                    <!--<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span>Widgets</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="widgets-app.html">Apps Widgets</a></li>-->
                    <!--        <li><a href="widgets-data.html">Data Widgets</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-lock"></i><span>Authentication</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="sign-in.html">Sign In</a></li>-->
                    <!--        <li><a href="sign-up.html">Sign Up</a></li>-->
                    <!--        <li><a href="forgot-password.html">Forgot Password</a></li>-->
                    <!--        <li><a href="404.html">Page 404</a></li>-->
                    <!--        <li><a href="500.html">Page 500</a></li>-->
                    <!--        <li><a href="page-offline.html">Page Offline</a></li>-->
                    <!--        <li><a href="locked.html">Locked Screen</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--<li class="open_top"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Sample Pages</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="blank.html">Blank Page</a></li>-->
                    <!--        <li><a href="image-gallery.html">Image Gallery</a></li>-->
                    <!--        <li><a href="profile.html">Profile</a></li>-->
                    <!--        <li><a href="timeline.html">Timeline</a></li>-->
                    <!--        <li><a href="pricing.html">Pricing</a></li>-->
                    <!--        <li><a href="invoices.html">Invoices</a></li>-->
                    <!--        <li><a href="invoices-list.html">Invoices List</a></li>-->
                    <!--        <li><a href="search-results.html">Search Results</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--<li class="open_top"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-map"></i><span>Maps</span></a>-->
                    <!--    <ul class="ml-menu">-->
                    <!--        <li><a href="google.html">Google Map</a></li>-->
                    <!--        <li><a href="yandex.html">YandexMap</a></li>-->
                    <!--        <li><a href="jvectormap.html">jVectorMap</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--    <div class="progress-container progress-primary m-t-10">-->
                    <!--        <span class="progress-badge">Traffic this Month</span>-->
                    <!--        <div class="progress">-->
                    <!--            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;">-->
                    <!--                <span class="progress-value">67%</span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="progress-container progress-info">-->
                    <!--        <span class="progress-badge">Server Load</span>-->
                    <!--        <div class="progress">-->
                    <!--            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">-->
                    <!--                <span class="progress-value">86%</span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</li>-->
                </ul>
            </div>
        </aside>
        
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs sm">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i class="zmdi zmdi-comments"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="setting">
                    <div class="slim_scroll">
                        <div class="card">
                            <h6>Theme Option</h6>
                            <div class="light_dark">
                                <div class="radio">
                                    <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                                    <label for="lighttheme">Light Mode</label>
                                </div>
                                <div class="radio mb-0">
                                    <input type="radio" name="radio1" id="darktheme" value="dark">
                                    <label for="darktheme">Dark Mode</label>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <h6>Color Skins</h6>
                            <ul class="choose-skin list-unstyled">
                                <li data-theme="purple"><div class="purple"></div></li>
                                <li data-theme="blue"><div class="blue"></div></li>
                                <li data-theme="cyan"><div class="cyan"></div></li>
                                <li data-theme="green"><div class="green"></div></li>
                                <li data-theme="orange"><div class="orange"></div></li>
                                <li data-theme="blush" class="active"><div class="blush"></div></li>
                            </ul>                                        
                        </div>
                        <div class="card">
                            <h6>General Settings</h6>
                            <ul class="setting-list list-unstyled">
                                <li>
                                    <div class="checkbox rtl_support">
                                        <input id="checkbox1" type="checkbox" value="rtl_view">
                                        <label for="checkbox1">RTL Version</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox ms_bar">
                                        <input id="checkbox2" type="checkbox" value="mini_active">
                                        <label for="checkbox2">Mini Sidebar</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input id="checkbox3" type="checkbox" checked="">
                                        <label for="checkbox3">Notifications</label>
                                    </div>                        
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input id="checkbox4" type="checkbox">
                                        <label for="checkbox4">Auto Updates</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input id="checkbox5" type="checkbox" checked="">
                                        <label for="checkbox5">Offline</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input id="checkbox6" type="checkbox" checked="">
                                        <label for="checkbox6">Location Permission</label>
                                    </div>
                                </li>
                            </ul>
                        </div>                
                    </div>                
                </div>       
                <div class="tab-pane right_chat" id="chat">
                    <div class="slim_scroll">
                        <div class="card">
                            <ul class="list-unstyled">
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="{{ url('/') }}/assets/images/xs/avatar4.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Sophia <small class="float-right">11:00AM</small></span>
                                                <span class="message">There are many variations of passages of Lorem Ipsum available</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="{{ url('/') }}/assets/images/xs/avatar5.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Grayson <small class="float-right">11:30AM</small></span>
                                                <span class="message">All the Lorem Ipsum generators on the</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="offline">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="{{ url('/') }}/assets/images/xs/avatar2.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Isabella <small class="float-right">11:31AM</small></span>
                                                <span class="message">Contrary to popular belief, Lorem Ipsum</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="me">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="{{ url('/') }}/assets/images/xs/avatar1.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">John <small class="float-right">05:00PM</small></span>
                                                <span class="message">It is a long established fact that a reader</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="{{ url('/') }}/assets/images/xs/avatar3.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Alexander <small class="float-right">06:08PM</small></span>
                                                <span class="message">Richard McClintock, a Latin professor</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>                        
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </aside>