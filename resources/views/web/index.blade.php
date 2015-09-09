@extends('../web-layouts.main')


@section("specific-meta")
<meta name="description" content="{!! defaultDescription() !!}" />
<meta property="og:title" content="{!! defaultTitle() !!}" />
<meta property="og:description" content="{!! defaultDescription() !!}" />

@stop


@section("specific-js-head")
{!! HTML::script("js/web-index.js") !!}
@stop


@section("body")

@include("web-layouts.menu", array("link" => "home"))

<div id="index">
    <section id="index-landing" class="section-frame">
        <div id="landing-graphic">
            <div id="landing-title" class="medium-7 medium-push-5 columns show-for-medium-up"></div>
        </div>
        <div id="landing-title-small" class="small-12 small-centered columns show-for-small-only"></div>
    </section>
    
    <div class="border-section border-white-white"></div>

    <section id="index-about" class="section-frame">
        <div id="about-intro" class="show-for-medium-up">
            <div class="section-title-graphic">
                <h2 class="section-title">About</h2>
            </div>

            <p id="about-description" class="single-col-wrapper has-pd-lr">
                We, Kiwi Launcher, are not mere group of developers. We offer you not only just a Web Site, 
                we also provide you all around aspects for your business e.g., Brand and Logo design, SEO, Digital Marketing, 
                and Strategy consultant. We are your complete business partner that will step with you to your successful business.
            </p>
        </div>
        
        <div id="about-details show-for-medium-up">
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
                <div class="small-12 medium-6 medium-push-6 column">
                    {!! HTML::image("image/index/about-vision-medium-up.png","",array("class"=>"about-detail-graphic")) !!}
                </div>
                <div class="small-12 medium-6 medium-pull-6 column has-pd-lr">
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
        <div class="section-title-graphic">
            <h2 class="section-title">Selected Works</h2>
        </div>
        
        <ul id="sltd-works-list" class="single-col-wrapper show-for-medium-up">
            <li class="has-mg-b">
                <a class="figure-link sltd-work-figure">
                    <!--<img class="figure-img sltd-work-cvimg" src="http://placehold.it/800x450" />-->
                    {!! HTML::image("image/sample/soon-thumb.jpg", "Some app", array(
                        "class" => "figure-img sltd-work-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="sltd-work-text has-pd-lr">
                    <h4><a>Some Application</a></h4>
                    <p>iOS Application</p>
                </div>
            </li>
            <li class="has-mg-b">
                <a class="figure-link sltd-work-figure">
                    {!! HTML::image("image/sample/sandawe-1.jpg", "Some web", array(
                        "class" => "figure-img sltd-work-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="sltd-work-text has-pd-lr">
                    <h4><a>Some Website</a></h4>
                    <p>Website</p>
                </div>
            </li>
            <li class="has-mg-b">
                <a class="figure-link sltd-work-figure">
                    {!! HTML::image("image/sample/pairi-daiza-thumb.jpg", "Some web", array(
                        "class" => "figure-img sltd-work-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="sltd-work-text has-pd-lr">
                    <h4><a>Some Website</a></h4>
                    <p>Website</p>
                </div>
            </li>
        </ul>
        
        <div class="align-center"><a class="button hl">Discover all works</a></div>
    </section>
    
    <div class="border-section border-white-white"></div>

    <section id="index-blog" class="section-frame">
        <div class="section-title-graphic">
            <h2 class="section-title">From Our Blog</h2>
        </div>
        
        <ul id="blog-posts-list" class="single-col-wrapper">
            <li class="has-mg-b">
                <a class="figure-link blog-post-figure">
                    <img class="figure-img blog-post-cvimg" src="http://placehold.it/800x450" />
                    <div class="figure-layer"></div>
                </a>
                <div class="blog-post-text has-pd-lr">
                    <h6 class="blog-post-title">
                        <a>Pellentesque viverra congue justo, eget ornare nulla tempus ut.</a>
                    </h6>
                    <p class="blog-post-description">
                        Aliquam id tortor fermentum, luctus magna 
                        at, molestie dui. Mauris eu risus aliquet, 
                        blandit augue ut, mattis risus. Pellentesque 
                        tempus elementum purus, vel tincidunt 
                        nunc tempor at.
                    </p>
                    <p><a>Read more...</a></p>
                </div>
            </li>
            <li class="has-mg-b">
                <a class="figure-link blog-post-figure">
                    <img class="figure-img blog-post-cvimg" src="http://placehold.it/800x450" />
                    <div class="figure-layer"></div>
                </a>
                <div class="blog-post-text has-pd-lr">
                    <h6 class="blog-post-title">
                        <a>Pellentesque viverra congue justo, eget ornare nulla tempus ut.</a>
                    </h6>
                    <p class="blog-post-description">
                        Aliquam id tortor fermentum, luctus magna 
                        at, molestie dui. Mauris eu risus aliquet, 
                        blandit augue ut, mattis risus. Pellentesque 
                        tempus elementum purus, vel tincidunt 
                        nunc tempor at.
                    </p>
                    <p><a>Read more...</a></p>
                </div>
            </li>
        </ul>
        
        <div class="align-center"><a class="button hl">View more blogposts</a></div>
    </section>
    
    @include("web-layouts.footer")
</div>

@stop