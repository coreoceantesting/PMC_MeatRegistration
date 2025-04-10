@include('common.header')
<!--JSPDF CDN-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>-->

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Meat Application</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Meat Application</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    
                    <div class="card"  id="divToPrint">
                        <div class="body" style="padding:60px;">
                            
                            <h5>Generate pdf here</h5>
                            
                        </div>    
                    </div>
                    <div class="submit-section text-right " >
					    <!--<a href='{{ url("/meat_registration_list}") }}' class="btn btn-danger btn-lg text-light" >Cancel</a>-->
						<button  class="btn btn-danger" type="button" onClick="printDiv('divToPrint')" >
						    <i class="fa fa-print text-light"></i> 
						    &nbsp;&nbsp;Print
						</button>
					</div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function printDiv(divName) {
        $("#print").css("display", "none");
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        $("#print").css("display", "block");
        // location.reload();
    
    }
</script>
@include('common.footer')  