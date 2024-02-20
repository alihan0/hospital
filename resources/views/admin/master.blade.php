
<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>@yield('title') - {{ env('APP_NAME') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">
    
        <link href="/assets/libs/chartist/chartist.min.css" rel="stylesheet">
    
        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css"  rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css">
    
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            @include('admin.inc.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.inc.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                
                @include('admin.inc.footer')

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        

                <!-- JAVASCRIPT -->
                <script src="/assets/libs/jquery/jquery.min.js"></script>
                <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
                <script src="/assets/libs/simplebar/simplebar.min.js"></script>
                <script src="/assets/libs/node-waves/waves.min.js"></script>


        <!-- Peity chart-->
        <script src="/assets/libs/peity/jquery.peity.min.js"></script>

        <!-- Plugin Js-->
        <script src="/assets/libs/chartist/chartist.min.js"></script>
        <script src="/assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>

        <script src="/assets/js/pages/dashboard.init.js"></script>

        <script src="/assets/js/app.js"></script>

    </body>

</html>