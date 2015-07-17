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
    <section id="landing" class="section-frame">
        <div id="landing-graphic"></div>
    </section>
    
    <div class="border-section border-white-white"></div>

    <section id="about" class="section-frame">
        <div class="section-title-graphic">
            <h2 class="section-title">About</h2>
        </div>
        
        <p id="about-description" class="single-col-wrapper has-pd-lr">
            Duis pulvinar enim neque, eu fringilla nibh ornare non. Fusce vulputate ac est vel viverra. 
            Sed convallis nisl eget quam pulvinar sollicitudin. 
            Quisque nibh massa, feugiat quis leo venenatis, iaculis dictum diam.
            Proin iaculis ullamcorper erat ut elementum. Mauris eget justo congue, dignissim quam id, dapibus orci. 
            Quisque nibh massa, feugiat quis leo venenatis, iaculis dictum diam.
            Proin iaculis ullamcorper erat ut elementum. Mauris eget justo congue, dignissim quam id, dapibus orci. 
        </p>
        
        <div id="about-details">
            <div class="row multi-col-wrapper has-mg-b">
                <div class="small-12 medium-6 column">
                    <img class="about-detail-graphic" src="http://placehold.it/800x450" />
                </div>
                <div class="small-12 medium-6 column has-pd-lr">
                    <div class="about-detail-text">
                        <h4 class="about-detail-title">Creative Instinct</h4>
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
                    <img class="about-detail-graphic" src="http://placehold.it/800x450" />
                </div>
                <div class="small-12 medium-6 medium-pull-6 column has-pd-lr">
                    <div class="about-detail-text">
                        <h4 class="about-detail-title">Vision</h4>
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
                    <img class="about-detail-graphic" src="http://placehold.it/800x450" />
                </div>
                <div class="small-12 medium-6 column has-pd-lr">
                    <div class="about-detail-text">
                        <h4 class="about-detail-title">Flying without Wings</h4>
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

    <section id="sltd-works" class="section-frame">
        <h2 class="section-title">Selected Works</h2>
        
        <ul id="sltd-works-list" class="single-col-wrapper">
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

    <section id="blog" class="section-frame">
        <h2 class="section-title">Blog</h2>
        
        <div id="blog-posts-list">
            <div class="row multi-col-wrapper has-mg-b">
                <div class="small-12 medium-6 column">
                    <a><img class="blog-post-cvimg" src="http://placehold.it/800x450" /></a>
                </div>
                <div class="small-12 medium-6 column has-pd-lr">
                    <div class="blog-post-text">
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
                </div>
            </div>
            <div class="row multi-col-wrapper has-mg-b">
                <div class="small-12 medium-6 medium-push-6 column">
                    <a><img class="blog-post-cvimg" src="http://placehold.it/800x450" /></a>
                </div>
                <div class="small-12 medium-6 medium-pull-6 column has-pd-lr">
                    <div class="blog-post-text">
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
                </div>
            </div>
        </div>
        
        <div class="align-center"><a class="button hl">View more blogposts</a></div>
    </section>
    
    @include("web-layouts.footer")
</div>

@stop