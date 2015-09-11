@extends('../web-layouts.main')


@section("specific-meta")
<meta name="description" content="{!! defaultDescription() !!}" />
<meta property="og:title" content="{!! defaultTitle() !!}" />
<meta property="og:description" content="{!! defaultDescription() !!}" />

@stop


@section("specific-js-head")
{!! HTML::script("js/web-work-detail.js") !!}
@stop


@section("body")

@include("web-layouts.works-header")
@include("web-layouts.menu", array("link" => "works"))

<div id="works">
    <section id="works-content" class="section-frame first">
        <div class="medium-12 small-12 column">
            <div class="">
                <!--<img class="figure-img work-cvimg" src="http://placehold.it/800x450" />-->
                {!! HTML::image($post->feature_image_url, "Some app", array(
                    "class" => "figure-img work-cvimg")
                ) !!}
            </div>
        </div >
        <div class="has-mg-b  single-col-wrapper">
            <h4 style="margin-bottom: 0px">{!! $post->title !!}</h4>
                @foreach($categories as $category)
                    <span>{!! $category->name !!} </span>
                @endforeach
            <br>
            <br>
            <p id="about-description" class="has-pd-lr">
                {!! $post->description !!}
            </p>
            <br>
            <h6><a href='{!! $post->link_url !!}' target="_blank">visit website</a></h6>
        </div>

        @foreach($screenshots as $screenshot)
            <div class="single-col-wrapper has-mg-b">
                {!! HTML::image("$screenshot->image_url", "Some app", array( "class" => "drseoul-img")) !!}
            </div>
        @endforeach
        
    </section>
    
    @include("web-layouts.footer")
</div>

@stop
