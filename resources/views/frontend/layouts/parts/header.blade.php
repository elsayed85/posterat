@if(config('app.locale')=='en')
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="description" content="">
<meta name="author" content="AmrMoro">
<title>{{get_setting('site_title')}} | {{get_setting('site_slogan')}}</title>
<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
<link rel="icon" href="{{asset(trans('theme.path').'/images/favicon.ico')}}" type="image/x-icon" />
<!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="{{asset(trans('theme.path').'/css/bootstrap.css')}}">
<!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="{{asset(trans('theme.path').'/css/style.css')}}">
<!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
<link rel="stylesheet" href="{{asset(trans('theme.path').'/css/font-awesome.css')}}" type="text/css">
<!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
<link href="{{asset(trans('theme.path').'/css/flaticon.css')}}" rel="stylesheet">
<!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
<link rel="stylesheet" href="{{asset(trans('theme.path').'/css/et-line-fonts.css')}}" type="text/css">
<!-- =-=-=-=-=-=-= Menu Drop Down =-=-=-=-=-=-= -->
<link rel="stylesheet" href="{{asset(trans('theme.path').'/css/forest-menu.css')}}" type="text/css">
<!-- =-=-=-=-=-=-= Animation =-=-=-=-=-=-= -->
<link rel="stylesheet" href="{{asset(trans('theme.path').'/css/animate.min.css')}}" type="text/css">
<!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
<link href="{{asset(trans('theme.path').'/css/select2.min.css')}}" rel="stylesheet" />
<!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->
<link href="{{asset(trans('theme.path').'/css/nouislider.min.css')}}" rel="stylesheet">
<!-- =-=-=-=-=-=-= Listing Slider =-=-=-=-=-=-= -->
<link href="{{asset(trans('theme.path').'/css/slider.css')}}" rel="stylesheet">
<!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
<link rel="stylesheet" type="text/css" href="{{asset(trans('theme.path').'/css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset(trans('theme.path').'/css/owl.theme.css')}}">
<!-- =-=-=-=-=-=-= Check boxes =-=-=-=-=-=-= -->
<link href="{{asset(trans('theme.path').'/skins/minimal/minimal.css')}}" rel="stylesheet">
<!-- =-=-=-=-=-=-= Responsive Media =-=-=-=-=-=-= -->
<link href="{{asset(trans('theme.path').'/css/responsive-media.css')}}" rel="stylesheet">
<!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->
<link rel="stylesheet" id="color" href="{{asset(trans('theme.path').'/css/colors/default.css')}}">
<!-- =-=-=-=-=-=-= For Style Switcher =-=-=-=-=-=-= -->
<link rel="stylesheet" id="theme-color" type="text/css" href="#" />
<!-- JavaScripts -->
<script src="{{asset(trans('theme.path').'/js/modernizr.js')}}"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@endif
@if(config('app.locale')=='ar')
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="description" content="">
    <meta name="author" content="AmrMoro">
    <title>{{get_setting('site_title')}} | {{get_setting('site_slogan')}}</title>
    <!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
    <link rel="icon" href="{{asset(trans('theme.path').'-rtl/images/favicon.ico')}}" type="image/x-icon" />
    <!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{{asset(trans('theme.path').'-rtl/css/bootstrap.css')}}">
    <!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{{asset(trans('theme.path').'-rtl/css/style.css')}}">
    <!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{{asset(trans('theme.path').'-rtl/css/font-awesome.css')}}" type="text/css">
    <!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
    <link href="{{asset(trans('theme.path').'-rtl/css/flaticon.css')}}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{{asset(trans('theme.path').'-rtl/css/et-line-fonts.css')}}" type="text/css">
    <!-- =-=-=-=-=-=-= Menu Drop Down =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{{asset(trans('theme.path').'-rtl/css/forest-menu.css')}}" type="text/css">
    <!-- =-=-=-=-=-=-= Animation =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{{asset(trans('theme.path').'-rtl/css/animate.min.css')}}" type="text/css">
    <!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
    <link href="{{asset(trans('theme.path').'-rtl/css/select2.min.css')}}" rel="stylesheet" />
    <!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->
    <link href="{{asset(trans('theme.path').'-rtl/css/nouislider.min.css')}}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Bootstrap Rtl Style =-=-=-=-=-=-= -->
    <link href="{{asset(trans('theme.path').'-rtl/css/bootstrap-rtl.css')}}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Listing Slider =-=-=-=-=-=-= -->
    <link href="{{asset(trans('theme.path').'-rtl/css/slider.css')}}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
    <link rel="stylesheet" type="text/css" href="{{asset(trans('theme.path').'-rtl/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset(trans('theme.path').'-rtl/css/owl.theme.css')}}">
    <!-- =-=-=-=-=-=-= Check boxes =-=-=-=-=-=-= -->
    <link href="{{asset(trans('theme.path').'-rtl/skins/minimal/minimal.css')}}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Responsive Media =-=-=-=-=-=-= -->
    <link href="{{asset(trans('theme.path').'-rtl/css/responsive-media.css')}}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->
    <link rel="stylesheet" id="color" href="{{asset(trans('theme.path').'-rtl/css/colors/default.css')}}">
    <!-- =-=-=-=-=-=-= For Style Switcher =-=-=-=-=-=-= -->
    <link rel="stylesheet" id="theme-color" type="text/css" href="#" />
    <!-- JavaScripts -->
    <script src="{{asset(trans('theme.path').'-rtl/js/modernizr.js')}}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
@endif