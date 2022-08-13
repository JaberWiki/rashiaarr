<!DOCTYPE html>
<html lang="en">

<head>
     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <meta name="robots" content="all">

     <title>Mangement Tool</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/favicon.png') }}">

 
    

    <!-- Pignose Calender -->
    <link href="{{ asset('backend/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">

    <!-- Toaster  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"/>

    <!-- Custom Stylesheet -->
    <link href="{{ asset('backend/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    @include('admin.body.preloader')
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">


        <!--**********************************
            Header start
        ***********************************-->
        @include('admin.body.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.body.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('admin_content')
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.body.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <script src="{{ asset('backend/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/settings.js') }}"></script>
    <script src="{{ asset('backend/js/gleek.js') }}"></script>
    <script src="{{ asset('backend/js/styleSwitcher.js') }}"></script>

    

    <!-- Chartjs -->
    <script src="{{ asset('backend/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('backend/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    <script src="{{ asset('backend/plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('backend/plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('backend/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset('backend/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>

    <script src="{{ asset('backend/plugins/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/validation/jquery.validate-init.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script src="{{ asset('backend/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

    <script src="{{ asset('backend/js/dashboard/dashboard-1.js') }}"></script>
    @if(Session::has('message'))
<script>
      
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    </script>
        @endif
  
<script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Sure you Want to Delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
</body>

</html>