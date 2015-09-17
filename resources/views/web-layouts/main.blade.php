<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"></meta>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="รับทำเว็ปไซต์  ออกแบบเว็ปไซต์ รับทำกราฟฟิค ทำแบรนด์ดิ้ง ให้คำปรึกษาการตลาด"/>
        <meta name="keywords" content="KiwiLauncher Web Development, ทำเว็ปไซต์, สร้างเว็ปไซต์  Graphic, กราฟฟิค, Branding, SEO, Digital Marketing" />
        <link rel="canonical" href="{!! URL::full() !!}" />
        <meta property="fb:admins" content="100000527591794"/>
        <meta property="fb:app_id" content="166253223711966"/>
        <meta property="fb:page_id" content="127205820963789"/>
		<meta property="og:url" content="{!! URL::full() !!}" />
		<meta property="og:site_name" content="KiwiLauncher.com" />
		<meta property="og:image" content="http://kiwilauncher.com/image/logo/landing-for-fb.jpg" />
		<meta property="og:description" content="Web Design, Graphic Design, Digital Marketing" />
		<meta property="og:title" content="Kiwi Launcher" />
        <title>@yield("title"){!! defaultTitle() !!}</title>

        <link href='http://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		{!! HTML::style("/css/web-style.css") !!}
        @yield("specific-css")
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.3.0/snap.svg-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/3.1.1/jquery.waypoints.min.js"></script>
        {!! HTML::script("js/lib/verge.min.js") !!}
        @yield("specific-js-head")
    </head>
    <body>
        @yield("body")
        
        <script>
            $(document).foundation();
        </script>
        @yield("specific-js-body")
    </body>
</html>
