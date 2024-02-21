
<!doctype html>
<html lang="{{ App::getLocale() }}">

    <head>
    
        <meta charset="utf-8">
        <title>{{ __('common.title.login') .' - '.  env('APP_NAME') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <body class="account-pages">
        <!-- Begin page -->
        <div class="accountbg" style="background: url('/assets/images/bg.jpg');background-size: cover;background-position: center;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card shadow-none">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box shadow-none p-4">
                            <div class="p-2">
                                <div class="text-center mt-4">
                                    <a href="javascript:;" class="logo logo-dark">
                                        <span class="logo-lg">
                                            <img src="{{ asset('storage/'.$system->site_logo_header_dark) }}" alt="" height="17">
                                        </span>
                                    </a>
                    
                                    <a href="javascript:;" class="logo logo-light">
                                        <span class="logo-lg">
                                            <img src="{{ asset('storage/'.$system->site_logo_header_white) }}" alt="" height="18">
                                        </span>
                                    </a>
                                </div>

                                <h4 class="font-size-18 mt-5 text-center">{{ __('common.title.welcome') }}</h4>
                                <p class="text-muted text-center">{{ __('common.title.welcome_text') }}</p>

                              <form class="mt-4" action="javascript:;" onsubmit="login()">

                                <div class="mb-3">
                                    <label class="form-label" for="email">{{ __('common.form.email') }}</label>
                                    <input type="text" class="form-control" id="email" placeholder="{{ __('common.form.enter_email') }}">
                                </div>
    

                                <div class="mb-3">
                                    <label class="form-label" for="password">{{ __('common.form.password') }}</label>
                                    <input type="password" class="form-control" id="password" placeholder="{{ __('common.form.enter_password') }}">
                                </div>
    
                                <div class="mb-3 row">
                                    
                                    <div class="col-sm-12 text-end">
                                        <button  class="btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('common.button.login') }}</button>
                                    </div>
                                </div>

                                <div class="mb-3 mt-2 mb-0 row">
                                    <div class="col-12 mt-3">
                                        <a href="/auth/reset-password"><i class="mdi mdi-lock"></i> {{ __('common.title.forgot_password') }}</a>
                                    </div>
                                </div>

                            </form>

                            <div class="mt-5 pt-4 text-center">
                                
                                <p>Copyright © <script>document.write(new Date().getFullYear())</script> <a href="https://metatige.com" target="_blank">Metatige</a> | {{ __('common.title.all_rights_reserved') }} </p>
                            </div>

                        </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    

                <!-- JAVASCRIPT -->
                <script src="/assets/libs/jquery/jquery.min.js"></script>
                <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
                <script src="/assets/libs/simplebar/simplebar.min.js"></script>
                <script src="/assets/libs/node-waves/waves.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
                <script src="/assets/libs/fastpost/fastpost.js"></script>


        <script src="/assets/js/app.js"></script>

        <script>
            function login(){
                var email = $('#email').val();
                var password = $("#password").val();

                fastPost('/auth/login', {email:email,password:password}, '/admin/');
            }
        </script>

    </body>
</html>
