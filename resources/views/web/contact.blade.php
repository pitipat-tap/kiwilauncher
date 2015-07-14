@extends('../web-layouts.main')


@section("specific-meta")
<meta name="description" content="{!! defaultDescription() !!}" />
<meta property="og:title" content="{!! defaultTitle() !!}" />
<meta property="og:description" content="{!! defaultDescription() !!}" />

@stop


@section("body")

@include("web-layouts.menu")

<div id="contact">
    <section id="contact-content" class="section-frame">
        <h2 class="section-title">Contact Us</h2>

        <div class="single-col-wrapper">
            
        </div>
    </section>
    
    @include("web-layouts.footer")
</div>

@stop