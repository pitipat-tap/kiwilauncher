@extends('../web-layouts.main')

@section("keyword")
    {!! $post->keyword !!}
@stop

@section("specific-meta")
<meta property="og:title" content="{!! $post->title !!}" />
<meta property="og:image" content="{!!$post->feature_image_url!!}" />
<meta property="og:description" content="{!! $post->description !!}" />
@stop


@section("specific-js-head")
{!! HTML::script("js/web-blog.js") !!}
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
                <div class="blog-post-text">
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
