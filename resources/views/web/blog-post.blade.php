@extends('../web-layouts.main')


@section("specific-meta")
<meta name="description" content="{!! defaultDescription() !!}" />
<meta property="og:title" content="{!! defaultTitle() !!}" />
<meta property="og:description" content="{!! defaultDescription() !!}" />

@stop


@section("specific-js-head")
{!! HTML::script("js/webBlog.js") !!}
@stop


@section("body")
@include("web-layouts.blog-header")
@include("web-layouts.menu", array("link" => "blog"))
<div id="blog">
    <section id="blog-content" class="section-frame">
        <div id="blog-posts-ftd-crs">
            
            <div id="blog-post-ftd-img">
                    {!! HTML::image("$post->feature_image_url","",array("class"=>"active","style"=>"opacity: 1; z-index: 2;")) !!}
                <div class="overlay"></div>
            </div>
            
            
        </div>
        
        <h6 class="section-title-sp">{!! $post->title !!}</h6>
        
        <ul id="blog-posts-list" class="single-col-wrapper none-style">
            <li class="has-mg-b">
                <div class="blog-post-text has-pd-lr">
                    <p class="blog-post-description">
                        {!! $post->content !!}
                    </p>
                </div>
            </li>
        </ul>
    </section>
    
    @include("web-layouts.footer")
</div>

@stop