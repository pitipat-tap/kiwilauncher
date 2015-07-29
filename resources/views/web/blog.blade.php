@extends('../web-layouts.main')


@section("specific-meta")
<meta name="description" content="{!! defaultDescription() !!}" />
<meta property="og:title" content="{!! defaultTitle() !!}" />
<meta property="og:description" content="{!! defaultDescription() !!}" />

@stop


@section("specific-js-head")
{!! HTML::script("js/web-blog.js") !!}
@stop


@section("body")

@include("web-layouts.menu", array("link" => "blog"))
<div id="blog">
    <section id="blog-content" class="section-frame">
        <div id="blog-posts-ftd-crs">
            <ul id="blog-posts-ftd-data">
                <li data-link="#" data-cvimg="{!! asset('image/sample/tmac-hero.jpg') !!}" data-title="Test 0001"></li>
                <li data-link="#" data-cvimg="{!! asset('image/sample/72715_icons.png') !!}" data-title="Test 4444 0022"></li>
                <li data-link="#" data-cvimg="{!! asset('image/sample/classy_hero.jpg') !!}" data-title="Test test test 0333"></li>
            </ul>
            
            <div id="blog-post-ftd-img">
                <img src="{!! asset('image/sample/tmac-hero.jpg') !!}" />
                <div class="overlay"></div>
            </div>
            
            <div id="blog-post-ftd-text" class="single-col-wrapper has-pd-lr">
                <h4 class="blog-post-title"><a>Test blog post</a></h4>
                <p class="blog-post-rm"><a class="button">Read more</a></p>
            </div>
            
            <ul class="bullets">
                <li class="active"><a></a></li>
                <li><a></a></li>
                <li><a></a></li>
            </ul>
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
    </section>
    
    @include("web-layouts.footer")
</div>

@stop