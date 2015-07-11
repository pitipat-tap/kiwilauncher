<a id="menu-toggle" data-fn="open">
    <span id="menu-toggle-icon"></span>
</a>

<div id="menu-back-cover" style="display: none;"></div>

<div id="menu" style="display: none;">
    <ul>
        <li class="circuit-v-row active">
            <div class="circuit-v menu-circuit first">
                <span class="circuit-v-line menu-circuit-line"></span>
                <span class="circuit-v-dot menu-circuit-dot primary"></span>
            </div>
            <div class="menu-text" data-row="1">
                <h6>
                    {!! HTML::link("/", "Home", array("class" => "menu-item-link")) !!}
                </h6>
            </div>
        </li>
        <li class="circuit-v-row">
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
        <li class="circuit-v-row">
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
        <li class="circuit-v-row">
            <div class="circuit-v menu-circuit">
                <span class="circuit-v-line menu-circuit-line"></span>
                <span class="circuit-v-dot menu-circuit-dot"></span>
            </div>
            <div class="menu-text" data-row="2">
                <h6>
                    {!! HTML::linkRoute("skills", "Blog", [], array("class" => "menu-item-link")) !!}
                </h6>
            </div>
        </li>
        <li class="circuit-v-row">
            <div class="circuit-v menu-circuit last">
                <span class="circuit-v-line menu-circuit-line"></span>
                <span class="circuit-v-dot menu-circuit-dot"></span>
            </div>
            <div class="menu-text" data-row="2">
                <h6>
                    {!! HTML::linkRoute("skills", "Contact Us", [], array("class" => "menu-item-link")) !!}
                </h6>
            </div>
        </li>
        <li id="menu-social-row">
            <a class="menu-social"><span class="icon icon-facebook"></span></a>
        </li>
    </ul>
</div>


