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
            
            <p class="has-pd-lr">
                We're very pleased and looking forward to work with you. In case you want to ask a question, 
                inquire, or consult. Feel free to contact us via these following channels:
            </p>
            <br />
            
            <div id="contact-info-group" class="has-pd-lr has-mg-b row">
                <div class="small-12 medium-6 columns has-pd-r">
                    <span class="contact-info icon icon-phone"></span>
                    <div id="contact-phone">
                        <h6>
                            <a href="tel:+66878223530">
                                087-822-3530,
                            </a>
                            <a href="tel:+66853600822">
                                &nbsp085-360-0822
                            </a>
                        </h6>
                    </div>
                </div>
                <div class="small-12 medium-6 columns has-pd-l">
                    <span class="contact-info icon icon-mail"></span>
                    <div id="contact-mail">
                        <h6><a href="mailto:info@kiwilauncher.com">info@kiwilauncher.com</a></h6>
                    </div>
                </div>
            </div>
            
            <h6 class="has-pd-lr">Follow us to get news and updates first.</h6>
            <br />
            
            <div class="has-pd-lr">
                <p>
                    <a class="contact-social" href="https://www.facebook.com/kiwilauncher" target="_blank" ><span class="icon icon-facebook"></span></a>
                    <a class="contact-social"><span class="icon icon-pinterest"></span></a>
                </p>
            </div>
        </div>
    </section>
    
    <section id="footer-ending-contact" class="section-frame">
        <div id="ending-index">
            <span id="ending-logo">
            </span>
            <div id="ending-copyright">
                <p>KiwiLauncher Co.,Ltd.</p>
                <p>Copyright &copy; 2015. All Rights Reserved</p>
            </div>
        </div>
    </section>
</div>

@stop
