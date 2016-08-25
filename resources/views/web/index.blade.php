@extends('../web-layouts.main')


@section("specific-meta")
<meta name="description" content="{!! defaultDescription() !!}" />
<meta property="og:title" content="{!! defaultTitle() !!}" />
<meta property="og:description" content="{!! defaultDescription() !!}" />
<meta property="og:image" content="http://kiwilauncher.com/image/logo/landing-for-fb.jpg" />

@stop


@section("specific-js-head")
{!! HTML::script("js/web-index.js") !!}
@stop


@section("body")

@include("web-layouts.menu", array("link" => "home"))

<div id="index">
    <section id="index-landing" class="section-frame">
        <div id="landing-graphic">
        </div>
        <div id="index-title" class="row">
            <div class="small-12 medium-5 columns"></div>
            <div  class="small-12 medium-7 columns">
                <div id="landing-title"></div>
                <div id="title-text">
                    <p>Digital Creative Launcher</p>
                    <p class="title-desc">Web - Mobile - Graphic - Branding</p>
                    <a id="title-btn" class="button" href="#selected-work">Selected Work</a> 
                    <a class="button secondary" href="#our-blog">From our Blog</a>
                </div>
            </div>
        </div>
       
            

        
    </section>
    
    <div class="border-section border-white-white"></div>

    <section id="index-about" class="section-frame">
        <div id="about-intro">
            <div class="section-title-graphic">
                <h2 class="section-title">About</h2>
            </div>

            <p id="about-description" class="single-col-wrapper has-pd-lr">
                We, Kiwi Launcher, are not mere group of developers. We offer you not only just a Web Site, 
                we also provide you all around aspects for your business e.g., Brand and Logo design, SEO, Digital Marketing, 
                and Strategy consultant. We are your complete business partner that will step with you to your successful business.
            </p>
        </div>
        
        <div id="about-details">
            <div class="row multi-col-wrapper has-mg-b">
                <div class="small-12 medium-6 column">
                    {!! HTML::image("image/index/about-instinct-medium-up.png","",array("class"=>"about-detail-graphic")) !!}
                </div>
                <div class="small-12 medium-6 column has-pd-lr">
                    <div class="about-detail-text">
                        <h4 class="about-detail-title">Creative Instinct</h4>
                        <p>
                            We, as young creative developers, live with creativity as our core value. 
                            We love to initiate fresh ideas and try new things. You can be assured that your business is in the right hand 
                            and we will make your business unique. 
                            <br><br>
                            Creativity is in our DNA. 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row multi-col-wrapper has-mg-b">
                <div class="small-12 medium-6 large-push-6 column">
                    {!! HTML::image("image/index/about-vision-medium-up.png","",array("class"=>"about-detail-graphic")) !!}
                </div>
                <div class="small-12 medium-6 large-pull-6 column has-pd-lr">
                    <div class="about-detail-text">
                        <h4 class="about-detail-title">Vision</h4>
                        <p>
                            Our visions are sharp and clear. We always look into the future.
                            We foresee the upcoming trend and share our vision with your business. 
                            You can be assured that your business is going to the right path as the world goes. 
                            <br><br>
                            We will always look after you. 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row multi-col-wrapper has-mg-b">
                <div class="small-12 medium-6 column">
                    {!! HTML::image("image/index/about-fly-medium-up.png","",array("class"=>"about-detail-graphic")) !!}
                </div>
                <div class="small-12 medium-6 column has-pd-lr">
                    <div class="about-detail-text">
                        <h4 class="about-detail-title">Flying without Wings</h4>
                        <p>
                            We are here to help you succeed with our knowledge. You are not alone in the world of business. 
                            Join with us and become a family to fly forward together. Nothing can stop us to fly toward the bright future.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="border-section border-white-white"></div>

    <section id="index-sltd-works" class="section-frame">
        <div id="selected-work" class="section-title-graphic">
            <h2 class="section-title">Selected Works</h2>
        </div>
        
        <ul id="sltd-works-list" class="single-col-wrapper">
        
            @foreach($works as $work)
                <li class="has-mg-b">
                    <a class="figure-link sltd-work-figure" href="{!! URL::route('work-post', array($work->url)) !!}">
                        <!--<img class="figure-img sltd-work-cvimg" src="http://placehold.it/800x450" />-->
                        {!! HTML::image($work->logo_url, "Some app", array(
                            "class" => "figure-img sltd-work-cvimg")
                        ) !!}
                        <div class="figure-layer"></div>
                    </a>
                </li>
            @endforeach
        
        <!--<div class="align-center">
            <a class="button" href="{!! URL::route('works') !!}">Discover all works</a>
        </div>-->
    </section>
    
    <div class="border-section border-white-white"></div>

    <section id="index-blog" class="section-frame">
        <div id="our-blog" class="section-title-graphic">
            <h2 class="section-title">From Our Blog</h2>
        </div>
        
        <ul id="blog-posts-list" class="single-col-wrapper">
            @foreach($blogs as $blog)
            <li class="has-mg-b">
                <a class="figure-link blog-post-figure" href="{!! URL::route('blog-post', array($blog->url)) !!}">
                    <!-- <img class="figure-img blog-post-cvimg" src="http://placehold.it/800x450" /> -->
                    {!! HTML::image($blog->feature_image_url, "Some app", array(
                        "class" => "figure-img blog-post-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="blog-post-text has-pd-lr">
                    <h6 class="blog-post-title">
                        <a href="{!! URL::route('blog-post', array($blog->url)) !!}">{!! $blog->title !!}</a>
                    </h6>
                    <p class="text-date">{!! $blog->updated_at !!}</p>
                    <p class="blog-post-description">
                        {!! $blog->description !!}
                    </p>
                    <p><a href="{!! URL::route('blog-post', array($blog->url)) !!}">Read more...</a></p>
                </div>
            </li>
            @endforeach
        </ul>
        
        <div class="align-center">
            <a class="button" href="{!! URL::route('blog') !!}">More posts</a>
        </div>
    </section>
    
    @include("web-layouts.footer")
</div>

@stop
