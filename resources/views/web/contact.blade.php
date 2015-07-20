@extends('../web-layouts.main')


@section("specific-meta")
<meta name="description" content="{!! defaultDescription() !!}" />
<meta property="og:title" content="{!! defaultTitle() !!}" />
<meta property="og:description" content="{!! defaultDescription() !!}" />

@stop


@section("specific-js-head")
{!! HTML::script("js/web-contact.js") !!}
@stop


@section("body")

@include("web-layouts.menu", array("link" => "contact"))

<div id="contact">
    <section id="contact-content" class="section-frame">
        <h2 class="section-title">Contact Us</h2>

        <div class="single-col-wrapper">
            <p class="has-pd-lr">
                Nam vitae urna congue, iaculis felis at, tristique erat. 
                Cum sociis natoque penatibus et magnis dis parturient montes, 
                nascetur ridiculus mus. Etiam sit amet tristique ex. 
                Phasellus ut turpis ante. Donec porttitor, neque venenatis porta rhoncus, 
                arcu turpis auctor erat, ut laoreet mi mauris eget arcu.
            </p>
            <br />
            
            <p class="has-pd-lr"><span class="icon icon-email"></span> info@kiwilauncher.com</p>
        </div>
    </section>
    
    @include("web-layouts.footer")
</div>

@stop