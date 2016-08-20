<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"></meta>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="{!! URL::full() !!}" />
<!-- meta seo -->
        <meta name="description" content="รับทำเว็ปไซต์  ออกแบบเว็ปไซต์ รับทำกราฟฟิค ทำแบรนด์ดิ้ง ให้คำปรึกษาการตลาด"/>
        <meta name="keywords" content="KiwiLauncher Web Development, ทำเว็ปไซต์, สร้างเว็ปไซต์  Graphic, กราฟฟิค, Branding, SEO, Digital Marketing" />
<!-- meta fb page -->
        <meta property="fb:admins" content="100000527591794"/>
        <meta property="fb:app_id" content="166253223711966"/>
        <meta property="fb:page_id" content="127205820963789"/>
<!-- meta fb share -->
		<meta property="og:url" content="{!! URL::full() !!}" />
		<meta property="og:site_name" content="KiwiLauncher.com" />
        
        @yield("specific-meta")


        <title>@yield("title"){!! defaultTitle() !!}</title>

        <link href='http://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
		{!! HTML::style("/css/web-style.css") !!}
		{!! HTML::style("/css/font-awesome.min.css") !!}
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
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-67555637-1', 'auto');
          ga('send', 'pageview');

        </script>
    </head>
    <body>
        @yield("body")
        
        <script>
            $(document).foundation();
        </script>
        @yield("specific-js-body")
    </body>
</html>
