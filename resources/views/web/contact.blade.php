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
            <h6 class="has-pd-lr">
                Thank you for visiting us !
            </h6>
            <br />
            <p class="has-pd-lr">We're very pleased and looking forward to work with you. In case you want to ask is a question, inquire, or consult.</p>
            <p class="has-pd-lr"> Feel free to contact us via these following channels</p>
            <br>
            <div id="contact-info" class="has-pd-lr has-mg-b row">
                <div class="small-12 medium-6 columns">
                    <span class="icon icon-phone"></span>
                    <div id="contact-phone">
                        <h6>087-822-3530, 08x-xxx-xxxx</h6>
                    </div>
                </div>
                <div class="small-12 medium-6 columns">
                    <span class="icon icon-mail"></span>
                    <div id="contact-mail">
                        <h6>info@kiwilauncher.com</h6>
                    </div>
                </div>
            </div>
            
            <h6 class="has-pd-lr">Follow us to get news and updates first</h6>
            <div class="has-pd-lr">
                <p>
                    <a class="contact-social"><span class="icon icon-facebook"></span></a>
                    <a class="contact-social"><span class="icon icon-pinterest"></span></a>
                </p>
            </div>
        </div>
    </section>
    
    <section id="footer-ending" class="section-frame">
        <div id="ending-index">
            <span id="ending-logo">
            </span>
            <div id="ending-copyright">
                <p>KiwiLauncher Co.,Ltd.</p>
                <p>Copyright &copy; 2015. All right reserved</p>
            </div>
        </div>
    </section>
</div>

@stop