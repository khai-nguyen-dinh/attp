<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public') }}/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public') }}/style.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public') }}/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public') }}/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public') }}/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public') }}/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/css/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public') }}/css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="{{ asset('public') }}/js/jquery.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/plugins.js"></script>
    
    <!-- Document Title
    ============================================= -->
    <title>@yield('title')</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

       @include("layouts.header")

        <!-- Content
        ============================================= -->
        @yield("content")

        @include("layouts.footer")

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts
    ============================================= -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    

    <script type="text/javascript" src="{{ asset('public') }}/js/functions.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    @yield('script')  
    @yield('script-sub')  
    <script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",45938]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>

</body>
</html>