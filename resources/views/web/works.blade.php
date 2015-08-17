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

@include("web-layouts.works-header")
@include("web-layouts.menu", array("link" => "works"))

<div id="works">
    <section id="works-content" class="section-frame">
        <ul id="works-list" class="small-block-grid-1 medium-block-grid-2 multi-col-wrapper">
            <li class="has-mg-b">
                <a class="figure-link work-figure" href="{!! URL::route('worksDrseoul') !!}">
                    <!--<img class="figure-img work-cvimg" src="http://placehold.it/800x450" />-->
                    {!! HTML::image("image/works/drseoul-brand-logo.png", "Some app", array(
                        "class" => "figure-img work-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="work-text has-pd-lr">
                    <h4><a href="{!! URL::route('worksDrseoul') !!}">Dr.seoul</a></h4>
                    <p>Web Application</p>
                    <p>Branding, e-commerce</p>
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
