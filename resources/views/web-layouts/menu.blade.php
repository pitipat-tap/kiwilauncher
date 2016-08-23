<a id="menu-toggle" data-fn="open">
    <span id="menu-toggle-icon">
        <?php include("image/icon/menu-open-html.svg"); ?>
    </span>
</a>

<div id="menu-back-cover" style="display: none;" data-fn="close"></div>

<div id="menu" style="display: none;">
    <ul>
        <li class="circuit-v-row {!! isMenuItemActive($link, 'home') !!}">
            <div class="circuit-v menu-circuit first">
                <span class="circuit-v-line menu-circuit-line"></span>
                <span class="circuit-v-dot menu-circuit-dot"></span>
            </div>
            <div class="menu-text" data-row="1">
                <h6>
                    {!! HTML::link("/", "Home", array("class" => "menu-item-link")) !!}
                </h6>
            </div>
        </li>
        <li class="circuit-v-row {!! isMenuItemActive($link, 'skills') !!}">
            <div class="circuit-v menu-circuit">
                <span class="circuit-v-line menu-circuit-line"></span>
                <span class="circuit-v-dot menu-circuit-dot"></span>
            </div>
            <div class="menu-text" data-row="2">
                <h6>
                    {!! HTML::linkRoute("skills", "Skills &amp; Process", [], array("class" => "menu-item-link")) !!}
                </h6>
            </div>
        </li>
        <li class="circuit-v-row {!! isMenuItemActive($link, 'works') !!}">
            <div class="circuit-v menu-circuit">
                <span class="circuit-v-line menu-circuit-line"></span>
                <span class="circuit-v-dot menu-circuit-dot"></span>
            </div>
            <div class="menu-text" data-row="2">
                <h6>
                    {!! HTML::linkRoute("works", "Works", [], array("class" => "menu-item-link")) !!}
                </h6>
            </div>
        </li>
        <li class="circuit-v-row {!! isMenuItemActive($link, 'blog') !!}">
            <div class="circuit-v menu-circuit">
                <span class="circuit-v-line menu-circuit-line"></span>
                <span class="circuit-v-dot menu-circuit-dot"></span>
            </div>
            <div class="menu-text" data-row="2">
                <h6>
                    {!! HTML::linkRoute("blog", "Blog", [], array("class" => "menu-item-link")) !!}
                </h6>
            </div>
        </li>
        <li class="circuit-v-row {!! isMenuItemActive($link, 'contact') !!}">
            <div class="circuit-v menu-circuit last">
                <span class="circuit-v-line menu-circuit-line"></span>
                <span class="circuit-v-dot menu-circuit-dot"></span>
            </div>
            <div class="menu-text" data-row="2">
                <h6>
                    {!! HTML::linkRoute("contact", "Contact Us", [], array("class" => "menu-item-link")) !!}
                </h6>
            </div>
        </li>
        <li id="menu-social-row">
            <a href="https://www.facebook.com/kiwilauncher" target="_blank" class="menu-social"><span class="icon icon-facebook"></span></a>
            <!--<a class="menu-social"><span class="icon icon-pinterest"></span></a>-->
        </li>
    </ul>
</div>


