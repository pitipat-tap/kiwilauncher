@extends('../web-layouts.main')


@section("specific-meta")
<meta name="description" content="{!! defaultDescription() !!}" />
<meta property="og:title" content="{!! defaultTitle() !!}" />
<meta property="og:description" content="{!! defaultDescription() !!}" />
<meta property="og:image" content="http://kiwilauncher.com/image/logo/landing-for-fb.jpg" />

@stop


@section("specific-js-head")
{!! HTML::script("js/web-index.js") !!}
@stop


@section("body")

@include("web-layouts.menu", array("link" => "home"))

<div id="index">
    <section id="index-landing" class="section-frame">
        <div id="landing-graphic">
        </div>
        <div id="index-title" class="row">
            <div class="small-12 medium-5 columns"></div>
            <div  class="small-12 medium-7 columns">
                <div id="landing-title"></div>
                <div id="title-text">
                    <p>Digital Creative Launcher</p>
                    <p class="title-desc">Web - Mobile - Graphic - Branding</p>
                    <a id="title-btn" class="button" href="#selected-work">Selected Work</a>
                    <a class="button secondary" href="#our-blog">From our Blog</a>
                </div>
            </div>
        </div>




    </section>

    <div class="border-section border-white-white"></div>

    <section id="index-about" class="section-frame">
        <div id="about-intro">
            <div class="section-title-graphic">
                <h2 class="section-title">About</h2>
            </div>

            <p id="about-description" class="single-col-wrapper has-pd-lr">
                <span lang="thai">
พวกเรา <span class="color-green">Kiwilauncher</span> คือทีมที่รวมรวมผู้เชี่ยวชาญด้าน IT ทั้งหมดเอาไว้ ไม่ใช่แค่เพียงการทำเว็บไซต์และซอฟต์แวร์โซลูชั่น แต่รวมถึงการให้บริการสนับสนุนธุรกิจในทุกๆด้าน ทั้ง ออกแบบ Logo & Branding, SEO & SEM, Digital Marketing, IT & Strategy consultant ซึ่งเราสามารถเป็นพาร์ทเนอร์ที่ช่วยให้คุณประสบความสําเร็จในยุคดิจิตอลไปด้วยกัน
                </span>
                <span lang="en">
                    We, Kiwi Launcher, are not mere group of developers. We offer you not only just a Web Site,
                    we also provide you all around aspects for your business e.g., Brand and Logo design, SEO, Digital Marketing,
                    and Strategy consultant. We are your complete business partner that will step with you to your successful business.
                </span>
            </p>
        </div>

        <div id="about-details">
            <div class="row multi-col-wrapper has-mg-b">
                <div class="small-12 medium-6 column">
                    {!! HTML::image("image/index/about-vision-medium-up.png","",array("class"=>"about-detail-graphic")) !!}
                </div>
                <div class="small-12 medium-6 column has-pd-lr">
                    <div class="about-detail-text">
                        <h4 class="about-detail-title color-green">Business / Company Website</h4>
                        <h6 class="about-detail-title">Be Professional, Be Digital </h6>
                        <p lang="en">
                            Every business needs website.
                            To represent your business, to provide the services / products information, to give your business more professional look, etc..
                            <br><br>
                            No matter what your purpose is. You can be assured that your website is in the right hand, and we will make your website unique.
                        </p>
                        <p lang="thai">
                            ทำไมทุกๆธุรกิจควรจะมีเว็บไซต์เป็นของตัวเอง เว็บไซต์เป็นพื้นที่ให้ข้อมูลในเรื่องของการบริการ สินค้า และผลงานของคุณ ทั้งยังทำให้ธุรกิจของคุณมีความเป็นมืออาชีพ มีจุดเด่น ง่ายต่อการเข้าถึง และเป็นการแสดงตัวตนของธุรกิจของคุณในโลกออนไลน์ <br><br> ให้เราได้ช่วยพัฒนาเว็บไซต์ที่ออกแบบมาเฉพาะคุณและธุรกิจของคุณ
                        </p>
                    </div>
                </div>
            </div>
            <div class="row multi-col-wrapper has-mg-b">
                <div class="small-12 medium-6 large-push-6 column">
                    {!! HTML::image("image/index/about-fly-medium-up.png","",array("class"=>"about-detail-graphic")) !!}
                </div>
                <div class="small-12 medium-6 large-pull-6 column has-pd-lr">
                    <div class="about-detail-text">
                        <h4 class="about-detail-title color-green">E-Commerce</h4>
                        <h6 class="about-detail-title">Limitless Potential</h6>
                        <p lang="en">
                            Would it be better if your business can run 24/7 ?
                            Nowadays, you gain advantage if your business can run without disruption.
                            You can continue to sell your products / services even on weekend or holiday.
                            <br><br>
                            We implement the most advanced and secured E-commerce to your website to keep your revenue grow.
                        </p>
                        <p lang="thai">
                            มันจะดีกว่าไหม ถ้าธุรกิจของคุณสามารถทำงานได้ทุกที่ทุกเวลา  ในปัจจุบันมูลค่าการซื้อขายออนไลน์เพิ่มขึ้นทุกปีๆ คุณสามารถช่วงชิงความได้เปรียบในทางธุรกิจได้ เพราะ E-Commerce ไม่จำเป็นที่จะต้องหยุดการดำเนินงาน ไม่ว่าจะเป็นวันหยุดสุดสัปดาห์ หรือวันหยุดนักขัตฤกษ์ ทั้งยังไม่ยึดติดกับสถานที่ตั้ง ไม่ว่าลูกค้าของคุณจะอยู่ที่ไหนก็ตาม
                            <br><br>ให้พวกเราช่วยคุณสร้างระบบที่ช่วยให้คุณสามารถสร้างรายได้ได้ตลอดเวลา
                        </p>

                    </div>
                </div>
            </div>
            <div class="row multi-col-wrapper has-mg-b">
                <div class="small-12 medium-6 column">
                    {!! HTML::image("image/index/about-instinct-medium-up.png","",array("class"=>"about-detail-graphic")) !!}
                </div>
                <div class="small-12 medium-6 column has-pd-lr">
                    <div class="about-detail-text">
                        <h4 class="about-detail-title color-green">Software Solutions</h4>
                        <h6 class="about-detail-title">Bring Your Business To 4.0</h6>
                        <p lang="en">
                            Most of problem that the business facing can be solved using Software Solutions. As it is the efficient way to do so. Instead of using people to solve the problem. Let the software do that for you, so you can focus on other aspects of your business.
                        </p>
                        <p lang="thai">
                            ทราบไหมว่าในหลายๆครั้ง ปัญหาในทางธุรกิจของคุณสามารถแก้ไขได้ด้วยซอร์ฟแวร์ ซึ่งคนน้อยที่สุดแต่ได้งานมากที่สุด ตัวอย่างเช่น งานที่ต้องการความละเอียดของข้อมูลจำนวนมาก งานที่ทำซ้ำๆกันอย่างต่อเนื่อง และงานเอกสารที่ต้องใช้คนจำนวนมากมาคอยจัดการ คุณสามารถเลือกให้ซอร์ฟแวร์ หรือโปรแกรม ช่วยทำงานให้คุณได้อย่างมีประสิทธิภาพมากขึ้น ทั้งด้านความถูกต้องและรวดเร็ว ทำให้คุณมีเวลาโฟกัสไปยังส่วนสำคัญในธุรกิจของคุณ<br><br>
                            ให้เราได้ใช้ประสบการณ์ของเรา เป็นที่ปรึกษา และช่วยแก้ปัญหาให้ธุรกิจของคุณทำงานได้อย่างมีประสิทธิภาพ
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="border-section border-white-white"></div>

    <section id="index-sltd-works" class="section-frame">
        <div id="selected-work" class="section-title-graphic">
            <h2 class="section-title">Selected Works</h2>
        </div>

        <ul id="sltd-works-list" class="single-col-wrapper">

            @foreach($works as $work)
                <li class="has-mg-b">
                    <a class="figure-link sltd-work-figure" href="{!! URL::route('work-post', array($work->url)) !!}">
                        <!--<img class="figure-img sltd-work-cvimg" src="http://placehold.it/800x450" />-->
                        {!! HTML::image($work->logo_url, "Some app", array(
                            "class" => "figure-img sltd-work-cvimg")
                        ) !!}
                        <div class="figure-layer"></div>
                    </a>
                </li>
            @endforeach

        <!--<div class="align-center">
            <a class="button" href="{!! URL::route('works') !!}">Discover all works</a>
        </div>-->
    </section>

    <div class="border-section border-white-white"></div>

    <section id="index-blog" class="section-frame">
        <div id="our-blog" class="section-title-graphic">
            <h2 class="section-title">From Our Blog</h2>
        </div>

        <ul id="blog-posts-list" class="single-col-wrapper">
            @foreach($blogs as $blog)
            <li class="has-mg-b">
                <a class="figure-link blog-post-figure" href="{!! URL::route('blog-post', array($blog->url)) !!}">
                    <!-- <img class="figure-img blog-post-cvimg" src="http://placehold.it/800x450" /> -->
                    {!! HTML::image($blog->feature_image_url, "Some app", array(
                        "class" => "figure-img blog-post-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="blog-post-text has-pd-lr">
                    <h6 class="blog-post-title">
                        <a href="{!! URL::route('blog-post', array($blog->url)) !!}">{!! $blog->title !!}</a>
                    </h6>
                    <p class="text-date">{!! $blog->updated_at !!}</p>
                    <p class="blog-post-description">
                        {!! $blog->description !!}
                    </p>
                    <p><a href="{!! URL::route('blog-post', array($blog->url)) !!}">Read more...</a></p>
                </div>
            </li>
            @endforeach
        </ul>

        <div class="align-center">
            <a class="button" href="{!! URL::route('blog') !!}">More posts</a>
        </div>
    </section>

    @include("web-layouts.footer")
</div>

@stop
