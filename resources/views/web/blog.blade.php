@extends('../web-layouts.main')


@section("specific-meta")
<meta name="description" content="{!! defaultDescription() !!}" />
<meta property="og:title" content="{!! defaultTitle() !!}" />
<meta property="og:description" content="{!! defaultDescription() !!}" />

@stop


@section("specific-js-head")
{!! HTML::script("js/web-works.js") !!}
@stop


@section("body")

@include("web-layouts.menu", array("link" => "blog"))

<div id="blog">
    <section id="blog-content" class="section-frame">
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
                        <p class="text-date">July 18, 2015</p>
                        <p class="blog-post-description">
                            Aliquam id tortor fermentum, luctus magna 
                            at, molestie dui. Mauris eu risus aliquet, 
                            blandit augue ut, mattis risus.
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
                            <a>Pellentesque viverra congue justo</a>
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
    </section>
    
    @include("web-layouts.footer")
</div>

@stop