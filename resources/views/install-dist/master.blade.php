
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Install | {{ env('APP_NAME') }}</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

    <body>

        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>

        <section class="my-5">
            <div class="container-alt container">
                <div class="row justify-content-center">
                    <div class="col-10 text-center">
                        <div class="home-wrapper mt-5">
                            <div class="mb-4">
                                <a href="index.html" class="logo-dark">
                                    <span class="logo-lg">
                                        <img src="/assets/images/logo-dark.png" alt="" height="22">
                                    </span>
                                </a>

                                <a href="index.html" class="logo-light">
                                    <span class="logo-lg">
                                        <img src="/assets/images/logo-light.png" alt="" height="22">
                                    </span>
                                </a>
                            </div>

                            
                            <h3 class="mt-4">{{ __('install.title') }}</h3>
                            
                            @yield('content')
                            
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>


        <script src="/assets/js/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        @yield('script')

    </body>
</html>
