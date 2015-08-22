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
        <div class="row multi-col-wrapper has-mg-b">
            <div class="medium-6 small-12 column has-mg-b">
                <div class="">
                    <!--<img class="figure-img work-cvimg" src="http://placehold.it/800x450" />-->
                    {!! HTML::image("image/works/drseoul-brand-logo.png", "Some app", array(
                        "class" => "figure-img work-cvimg")
                    ) !!}
                </div>
            </div >
            <div class="medium-6 small-12 column has-mg-b">
                <div class="">
                    <div class="work-text has-pd-lr">
                        <h4>Dr.Seoul</h4>
                        <p>Web Application</p>
                        <p>Branding, e-commerce</p>
                        <h6><a href="http://www.doctorseoul.com" target="_blank">visit website</a></h6>
                    </div>
                </div>
            </div >

        </div>
        <div class="has-mg-b">
            <p id="about-description" class="single-col-wrapper has-pd-lr has-mg-b">
                            Duis pulvinar enim neque, eu fringilla nibh ornare non. Fusce vulputate ac est vel viverra. 
                            Sed convallis nisl eget quam pulvinar sollicitudin. 
                            Quisque nibh massa, feugiat quis leo venenatis, iaculis dictum diam.
                            Proin iaculis ullamcorper erat ut elementum. Mauris eget justo congue, dignissim quam id, dapibus orci. 
                            Quisque nibh massa, feugiat quis leo venenatis, iaculis dictum diam.
                            Proin iaculis ullamcorper erat ut elementum. Mauris eget justo congue, dignissim quam id, dapibus orci. 
            </p>
        </div>
        <div class="single-col-wrapper has-mg-b">
                    {!! HTML::image("image/works/drseoul-img-1.png", "Some app", array( "class" => "drseoul-img")) !!}
        </div>

        <div class="single-col-wrapper has-mg-b">
                    {!! HTML::image("image/works/drseoul-img-2.png", "Some app", array( "class" => "drseoul-img")) !!}
        </div>
        
    </section>
    
    @include("web-layouts.footer")
</div>

@stop
