<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8"></meta>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KiwiLauncher</title>
        
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Varela+Round" />

        {!! HTML::style("css/main.css") !!}
        {!! HTML::style("css/app.css") !!}
        {!! HTML::style("static_css/animate.css") !!}
        {!! HTML::style("static_css/foundation-icons.css") !!}
        
        @yield("specific_css")
        
        {!! HTML::script("js/jquery/dist/jquery.min.js") !!}
        {!! HTML::script("js/modernizr/modernizr.js") !!}
        {!! HTML::script("js/fastclick/lib/fastclick.js") !!}
        {!! HTML::script("js/foundation/js/foundation.min.js") !!}
        {!! HTML::script("js/angular.min.js") !!}
        {!! HTML::script("js/controller/headerController.js") !!}
        {!! HTML::script("js/jquery.slides.min.js") !!}
        {!! HTML::script("js/jquery.lettering.js") !!}
        {!! HTML::script("js/jquery.fittext.js") !!}
        {!! HTML::script("js/jquery.textillate.js") !!}
        {!! HTML::script("js/noframework.waypoints.js") !!}
        {!! HTML::script("js/isMobile.min.js") !!}
	
        {!! HTML::script("js/main.js") !!}


        @yield("specific_js_head")
    </head>
    <body>
        @yield("body")
        
        <script>
            $(document).foundation();
        </script>
        @yield("specific_js_body")
    </body>
</HTML>

