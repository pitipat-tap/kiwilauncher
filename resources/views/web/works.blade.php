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

@include("web-layouts.menu", array("link" => "works"))

<div id="works">
    <section id="works-content" class="section-frame">
        <h2 class="section-title">Works</h2>
        
        <div class="align-center">
            <a class="button hl">All categories <span class="fa fa-angle-down"></span></a>
        </div>
        
        <ul id="works-list" class="small-block-grid-1 medium-block-grid-2 multi-col-wrapper">
            <li class="has-mg-b">
                <a class="figure-link work-figure">
                    <!--<img class="figure-img work-cvimg" src="http://placehold.it/800x450" />-->
                    {!! HTML::image("image/sample/soon-thumb.jpg", "Some app", array(
                        "class" => "figure-img work-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="work-text has-pd-lr">
                    <h4><a>Some Application</a></h4>
                    <p>iOS Application</p>
                </div>
            </li>
            <li class="has-mg-b">
                <a class="figure-link work-figure">
                    {!! HTML::image("image/sample/sandawe-1.jpg", "Some web", array(
                        "class" => "figure-img work-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="work-text has-pd-lr">
                    <h4><a>Some Website</a></h4>
                    <p>Website</p>
                </div>
            </li>
            <li class="has-mg-b">
                <a class="figure-link work-figure">
                    {!! HTML::image("image/sample/fiat-thumb.jpg", "Some app", array(
                        "class" => "figure-img work-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="work-text has-pd-lr">
                    <h4><a>Another</a></h4>
                    <p>Website / Branding</p>
                </div>
            </li>
            <li class="has-mg-b">
                <a class="figure-link work-figure">
                    {!! HTML::image("image/sample/pairi-daiza-thumb.jpg", "Some web", array(
                        "class" => "figure-img work-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="work-text has-pd-lr">
                    <h4><a>1234567</a></h4>
                    <p>Website / Graphic Design</p>
                </div>
            </li>
        </ul>
        
        <div class="align-center"><a class="button">Next Page</a></div>
    </section>
    
    @include("web-layouts.footer")
</div>

@stop