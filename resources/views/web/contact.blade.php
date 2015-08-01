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
    <section id="contact-content" class="section-frame first">
        <div class="section-title-graphic">
            <h2 class="section-title">Contact</h2>
        </div>

        <div class="single-col-wrapper">
            <p class="has-pd-lr">
                Nam vitae urna congue, iaculis felis at, tristique erat. 
                Cum sociis natoque penatibus et magnis dis parturient montes, 
                nascetur ridiculus mus. Etiam sit amet tristique ex. 
                Phasellus ut turpis ante. Donec porttitor, neque venenatis porta rhoncus, 
                arcu turpis auctor erat, ut laoreet mi mauris eget arcu.
            </p>
            <br />
            
            <div id="contact-info" class="has-pd-lr">
                <p><a>info@kiwilauncher.com</a></p>
                <p>087-822-3530</p>
                <p>08x-xxx-xxxx</p>
            </div>
            <br />
            
            <h4 class="section-title-sp">Follow us on</h4>
            <div id="socials">
                <p><a class="footer-social">Facebook</a></p>
            </div>
        </div>
    </section>
    
    <footer>
        <p id="copyright">Copyright &copy; 2015 KiwiLauncher Co.Ltd.</p>
    </footer>
</div>

@stop