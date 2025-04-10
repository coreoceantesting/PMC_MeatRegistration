        <!-- Jquery Core Js --> 
        <script src="{{ url('/') }}/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
        <script src="{{ url('/') }}/assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
        
        <script src="{{ url('/') }}/assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
        <script src="{{ url('/') }}/assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
        <script src="{{ url('/') }}/assets/plugins/select2/select2.min.js"></script> <!-- Select2 Js -->
        <script src="{{ url('/') }}/assets/plugins/multi-select/js/jquery.multi-select.js"></script> <!-- Multi Select Plugin Js --> 
        <script src="{{ url('/') }}/assets/bundles/c3.bundle.js"></script>
        
        <!-- Jquery DataTable Plugin Js --> 
        <script src="{{ url('/') }}/assets/bundles/datatablescripts.bundle.js"></script>
        <script src="{{ url('/') }}/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
        
        <script src="{{ url('/') }}/assets/bundles/mainscripts.bundle.js"></script>
        <script src="{{ url('/') }}/assets/js/pages/index.js"></script>
        
        <script src="{{ url('/') }}/assets/js/pages/tables/jquery-datatable.js"></script>
        
        <script>
            @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.success("{{ session('message') }}");
            @endif
    
            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.error("{{ session('error') }}");
            @endif
    
            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.info("{{ session('info') }}");
            @endif
    
            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.warning("{{ session('warning') }}");
            @endif
        </script>
    </body>

</html>