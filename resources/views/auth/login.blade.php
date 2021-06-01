<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon.png') }}">
    <title>{{__('auth.title')}}</title>
    <!-- Custom CSS -->


    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" />

    <style>
        .feather-icon{
            height: 25px;
            width: 25px;
            position: absolute;
            top: 38px;
            left: 27px;
            background: transparent;
            color: #9e9e9e;
            border-right: 1px solid #e9ecef;
            padding-right: 7px;
        }

        .form-control{
            padding-left: 40px;
        }

        .btn-dark{
            background: #337f67;
            /*color: #000;*/
            margin-bottom: 15px;
            padding: 10px;
        }

        .lang_switcher{
            position: fixed;
            top: 15px;
            right: 20px;
            font-size: 12px;
        }
        .lang_switcher a{
            color: #fff;
            font-weight: 500;
            padding: 4px 7px;
            border: 1px solid #fff;
        }
        .lang_switcher a.active{
            background: #5f76e8;
            color: #fff;
            border: 1px solid #fff;
        }
        .lang_switcher a:first-child{
            
        }
        .lang_switcher a:last-child{
            margin-left: -4px;
        }

        body{
            background:url('/assets/images/auth-bg2.jpg') no-repeat center center; background-size: 100%;
        }

        .auth-wrapper{
            /*background:url(assets/images/auth-bg2.jpg) no-repeat center center; background-size: 100%;*/
        }

        .modal-bg-img{
            background-color: #f1f5f8;
            text-align: center;
        }
        .modal-bg-img h2{
            text-transform: uppercase; font-size: 20px; margin-top: 30px !important; font-weight: 600;
        }

        .modal-bg-img img{
            height: 230px;
            margin-top: 15px;
        }


        @media (max-width:767.98px) {

            .lang_switcher {
                /*position: fixed;
                right: auto;
                left: 37%;*/
                top: 19px;
                font-size: 16px;
            }

            body {
                background-size: 200% 100vh;
            }

            .auth-wrapper{
                background: #0000007a;
            }

            .auth-wrapper .auth-box{
                margin: 15px;
            }
            .auth-wrapper .auth-box .modal-bg-img{
                z-index: 99999;
                min-height: auto;
                padding: 10px;
            }
            .modal-bg-img img {
                height: 130px;
                margin-top: 15px;
                margin-bottom: 15px;
            }
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative">
            <div class="auth-box row">
                <div class="col-lg-5 col-md-5 modal-bg-img">
                        <h2 class="mt-3 text-center">{{__('auth.login')}}</h2>
                        <img src="{{ asset('/assets/images/favicon.png') }}">

                </div>
                <div class="col-lg-7 col-md-7 bg-white">
                    <div class="p-4">
                        
                        {{-- <h2 class="mt-3 text-center" style="text-transform: uppercase;">{{__('auth.login')}}</h2> --}}
                        <form class="mt-4" method="post" action="{{ route('login') }}">
                            @csrf()
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="email"><i data-feather="mail" class="feather-icon"></i> {{-- {{__('auth.form.email')}} --}}</label>
                                        <input class="form-control" id="email" type="email" name="email" placeholder="{{__('auth.form.email_placeholder')}}">

                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="password"><i data-feather="lock" class="feather-icon"></i> {{-- {{__('auth.form.password')}} --}}</label>
                                        <input class="form-control" id="password" type="password" name="password" placeholder="{{__('auth.form.password_placeholder')}}">

                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="remember_input" id="remember" type="checkbox" name="remember" checked>

                                        <label class="text-dark" for="remember">{{__('auth.form.remember')}}</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">{{__('auth.form.login_button')}}</button>
                                </div>



                                <div class="col-lg-12">
                                    <div class="lang_switcher">
                                        <a class="{{ Session::get('locale') === "bn" ? "active" : "" }}" href="{{ route('setlocale','bn') }}">বাংলা</a>
                                        <a class="{{ Session::get('locale') === "en" ? "active" : "" }}" href="{{ route('setlocale', 'en') }}">English</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{ $message }}</span>
        </div>
    @elseif($message = Session::get('warning'))
        <div class="alert alert-warning">
            <span>{{ $message }}</span>
        </div>
    @elseif($message = Session::get('danger'))
        <div class="alert alert-danger">
            <span>{{ $message }}</span>
        </div>
    @elseif($message = Session::get('info'))
        <div class="alert alert-info">
            <span>{{ $message }}</span>
        </div>
    @endif



        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>