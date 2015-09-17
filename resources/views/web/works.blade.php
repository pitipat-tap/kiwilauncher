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

@include("web-layouts.works-header-detail")
@include("web-layouts.menu", array("link" => "works"))

<div id="works">
    <section id="works-content" class="section-frame">
        <ul id="works-list" class="small-block-grid-1 medium-block-grid-2 multi-col-wrapper">          
            @foreach($works as $work)
                <li class="has-mg-b">
                <a class="figure-link work-figure" href="{!! URL::route('work-post', array($work->url)) !!}">
                    {!! HTML::image("$work->feature_image_url", "Some web", array(
                        "class" => "figure-img work-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="work-text has-pd-lr">
                    <h4><a href="{!! URL::route('work-post', array($work->url)) !!}">{!! $work->title !!}</a></h4>
                    @foreach($work->categories as $category)
                        <span> {!! $category->name !!} </span>
                    @endforeach
                </div>
            </li>
            @endforeach

        </ul>
    </section>
    
    @include("web-layouts.footer")
</div>

@stop
