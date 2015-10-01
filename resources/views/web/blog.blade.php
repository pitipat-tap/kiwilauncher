@extends('../web-layouts.main')


@section("specific-meta")
<meta name="description" content="{!! defaultDescription() !!}" />
<meta property="og:title" content="{!! defaultTitle() !!}" />
<meta property="og:description" content="{!! defaultDescription() !!}" />
<meta property="og:image" content="{!!$post->feature_image_url!!}" />

@stop


@section("specific-js-head")
{!! HTML::script("js/web-blog.js") !!}
@stop


@section("body")
@include("web-layouts.blog-header")
@include("web-layouts.menu", array("link" => "blog"))
<div id="blog">
    <section id="blog-content" class="section-frame">
        @if (sizeof($posts) == 0)
        <br /><br /><br /><br /><br /><br />
        <h4 class="section-title">No Blog Post</h4>
        <br /><br /><br /><br />
        @else
            <div id="blog-posts-ftd-crs">
                <ul id="blog-posts-ftd-data">
                    @foreach($posts as $post)
                        <li class="count" data-link="{!! URL::route('blog-post', array($post->url)) !!}" 
                            data-title="{!! $post->title !!}">
                        </li>
                    @endforeach
                </ul>

                <div id="blog-post-ftd-img">
                    <?php $i = 0; ?>
                    @foreach($posts as $post)
                        @if ($i == 0)
                            {!! HTML::image("$post->feature_image_url","",array("class"=>"active","style"=>"opacity: 1; z-index: 2;")) !!}
                        @else
                            {!! HTML::image("$post->feature_image_url","",array("style"=>"opacity: 0; z-index: 1;")) !!}
                        @endif
                        <?php $i++; ?>
                    @endforeach
                    <div class="overlay"></div>
                </div>

                <div id="blog-post-ftd-text" class="single-col-wrapper has-pd-lr">
                    <h4 class="blog-post-title">
                        <a>
                           {!! $posts[0]->title !!}
                        </a>
                    </h4>
                    <p class="blog-post-rm"><a class="button" href="{!! URL::route('blog-post', array($posts[0]->url)) !!}">Read more</a></p>


                </div>

                <ul class="bullets">
                    <?php $i = 0; ?>
                    @foreach($posts as $post)
                        @if ($i == 0)
                            <li class="active"><a></a></li>
                        @else
                            <li><a></a></li>
                        @endif
                        <?php $i++; ?>
                    @endforeach
                </ul>
            </div>

            <h6 class="section-title-sp">And more recent posts</h6>

            <ul id="blog-posts-list" class="single-col-wrapper">
                @foreach($posts as $post)
                <li class="has-mg-b">
                    <div class="figure-link blog-post-figure">
                        {!! HTML::image("$post->feature_image_url","",array("class"=>"figure-img blog-post-cvimg","style"=>"opacity: 1; z-index: 2;")) !!}
                        <div class="figure-layer"></div>
                    </div>
                    <div class="blog-post-text has-pd-lr">
                        <h6 class="blog-post-title">
                            {!! HTML::linkRoute("blog-post", $post->title, array($post->url)) !!}
                        </h6>
                        <p class="blog-post-description">
                            {!! $post->description !!}
                        </p>
                        <p><a href="{!! URL::route('blog-post', array($post->url)) !!}">Read more...</a></p>
                    </div>
                </li>
                @endforeach
            </ul>
        @endif
    </section>
    
    @include("web-layouts.footer")
</div>

@stop
