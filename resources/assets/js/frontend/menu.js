var tl = new TimelineLite();

$(document).ready(function(event) {
    var menuValues;
    var menuExtraHeight = 60;
    
    $(window).on("load", setHeightMenu);
    
    $(window).on("resize", setHeightMenu);
    
    function setHeightMenu () {
        menuValues = [];
        $(".menu-text").each(function(index) {
            var values = {};
            values["lastHeight"] = $(this).outerHeight();
            menuValues.push(values);

            $(this).siblings(".menu-circuit").height(values["lastHeight"] + menuExtraHeight);
        });
    }
    
    $("#menu-toggle").click(function(event) {
        tl.pause();
        tl.clear();
        tl.play();
        if ($(this).attr("data-fn") == "open") {
            $(this).attr("data-fn", "close");
            
            tl.to("#menu, #menu-back-cover", 0.01, {
                display: "block",
                onComplete: function() {
                    setHeightMenu();
                }
            });
            tl.to("#menu", 0.3, {
                className: "+=opened"
            }, "in");
            tl.to("#menu-back-cover", 0.5, {
                className: "+=opened"
            }, "in+=0.0");
        }
        else if ($(this).attr("data-fn") == "close") {
            $(this).attr("data-fn", "open");
            tl.to("#menu", 0.3, {
                className: "-=opened"
            }, "out");
            tl.to("#menu-back-cover", 0.5, {
                className: "-=opened"
            }, "out+=0.0");
            tl.to("#menu, #menu-back-cover", 0.01, {
                display: "none",
            });
        }
    });
});