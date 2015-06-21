@extends('../web_layouts.main')


@section("specific_meta")
<meta name="description" content="{!! defaultDescription() !!}" />
<meta property="og:title" content="{!! defaultTitle() !!}" />
<meta property="og:description" content="{!! defaultDescription() !!}" />

@stop


@section("specific_js_head")

@stop


@section("body")

@include("web_layouts.menu")

<div id="index">
    <section id="landing" class="section-frame"></section>
    
    <div class="border-section border-white-white"></div>

    <section id="about" class="section-frame">
        <h2 class="section-title">About Us</h2>
        
        <p id="about-description" class="single-col-wrapper has-pd-lr">
            Duis pulvinar enim neque, eu fringilla nibh ornare non. Fusce vulputate ac est vel viverra. 
            Sed convallis nisl eget quam pulvinar sollicitudin. 
            Quisque nibh massa, feugiat quis leo venenatis, iaculis dictum diam.
            Proin iaculis ullamcorper erat ut elementum. Mauris eget justo congue, dignissim quam id, dapibus orci. 
        </p>
        
        <div id="about-details">
            <div class="row multi-col-wrapper has-mg-b">
                <div class="small-12 medium-6 column">
                    <div class="detail-graphic"></div>
                </div>
                <div class="small-12 medium-6 column has-pd-lr">
                    <div class="detail-text">
                        <h4 class="detail-title">Creative Instinct</h4>
                        <p>
                            Aliquam egestas, sapien sed maximus molestie, metus diam dignissim libero, 
                            in sodales est elit id dolor. Aliquam libero nisi, pulvinar ut porttitor quis, 
                            semper consequat nisi. Duis interdum metus ut metus ultrices, at gravida dolor ultricies.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row multi-col-wrapper has-mg-b">
                <div class="small-12 medium-6 medium-push-6 column">
                    <div class="detail-graphic"></div>
                </div>
                <div class="small-12 medium-6 medium-pull-6 column has-pd-lr">
                    <div class="detail-text">
                        <h4>Vision</h4>
                        <p>
                            Aliquam egestas, sapien sed maximus molestie, metus diam dignissim libero, 
                            in sodales est elit id dolor. Aliquam libero nisi, pulvinar ut porttitor quis, 
                            semper consequat nisi. Duis interdum metus ut metus ultrices, at gravida dolor ultricies.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row multi-col-wrapper has-mg-b">
                <div class="small-12 medium-6 column">
                    <div class="detail-graphic"></div>
                </div>
                <div class="small-12 medium-6 column has-pd-lr">
                    <div class="detail-text">
                        <h4>Flying without Wings</h4>
                        <p>
                            Aliquam egestas, sapien sed maximus molestie, metus diam dignissim libero, 
                            in sodales est elit id dolor. Aliquam libero nisi, pulvinar ut porttitor quis, 
                            semper consequat nisi. Duis interdum metus ut metus ultrices, at gravida dolor ultricies.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="border-section border-white-white"></div>

    <section id="selected-works" class="section-frame">
        <h2 class="section-title">Selected Works</h2>
        
        <ul id="works" class="single-col-wrapper">
            <li class="has-mg-b">
                <p><img class="work-cvimg" src="http://placehold.it/800x320" /></p>
                <p>iOS Application</p>
                <h6><a>Some Application</a></h6>
            </li>
            <li class="has-mg-b">
                <p><img src="http://placehold.it/800x320" /></p>
                <p>Website</p>
                <h6><a>Some Website</a></h6>
            </li>
        </ul>
        
        <div class="align-center"><a class="button">Discover all works</a></div>
    </section>

    <section id="blog"></section>
    
    @include("web_layouts.footer")
</div>

@stop