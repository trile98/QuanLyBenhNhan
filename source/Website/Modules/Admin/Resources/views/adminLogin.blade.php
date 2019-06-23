<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Register | Notika - Notika Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/Admin/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/owl.carousel.css">
    <link rel="stylesheet" href="/css/Admin/owl.theme.css">
    <link rel="stylesheet" href="/css/Admin/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/wave/waves.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="/js/Admin/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Login Register area Start-->
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login" >
            <form class="nk-form" method="post" action="/admin">
        	{{csrf_field()}}
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="email" name="username">
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                </div>
                <!-- <div class="fm-checkbox">
                    <label><input type="checkbox" class="i-checks"> <i></i> Keep me signed in</label>
                </div> -->
                <button type="submit" class="btn btn-login btn-success btn-float"  name="LoginBtn"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
            </form>

            <div class="nk-navigation nk-lg-ic">
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
            </div>
        </div>

        <!-- Register -->
        <div class="nk-block" id="l-register">
            <div class="nk-form">
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="Email Address">
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                </div>

                <a href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a>
            </div>

            <div class="nk-navigation rg-ic-stl">
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
                <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
            </div>
        </div>

        <!-- Forgot Password -->
        <div class="nk-block" id="l-forget-password">
            <div class="nk-form">
                <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>

                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="Email Address">
                    </div>
                </div>

                <a href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a>
            </div>

            <div class="nk-navigation nk-lg-ic rg-ic-stl">
                <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
                <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
            </div>
        </div>
    </div>
    <!-- Login Register area End-->

    

    <!-- jquery
		============================================ -->
    <script src="/js/Admin/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="/js/Admin/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="/js/Admin/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="/js/Admin/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="/js/Admin/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="/js/Admin/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="/js/Admin/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="/js/Admin/counterup/jquery.counterup.min.js"></script>
    <script src="/js/Admin/counterup/waypoints.min.js"></script>
    <script src="/js/Admin/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="/js/Admin/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="/js/Admin/sparkline/jquery.sparkline.min.js"></script>
    <script src="/js/Admin/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="/js/Admin/flot/jquery.flot.js"></script>
    <script src="/js/Admin/flot/jquery.flot.resize.js"></script>
    <script src="/js/Admin/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="/js/Admin/knob/jquery.knob.js"></script>
    <script src="/js/Admin/knob/jquery.appear.js"></script>
    <script src="/js/Admin/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="/js/Admin/chat/jquery.chat.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="/js/Admin/wave/waves.min.js"></script>
    <script src="/js/Admin/wave/wave-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="/js/Admin/icheck/icheck.min.js"></script>
    <script src="/js/Admin/icheck/icheck-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="/js/Admin/todo/jquery.todo.js"></script>
    <!-- Login JS
		============================================ -->
    <script src="/js/Admin/login/login-action.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="/js/Admin/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="/js/Admin/main.js"></script>

    <!-- script thong bao tra ve tu controller -->
    <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>

</body>

</html>