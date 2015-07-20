var tl = new TimelineLite();

$(document).ready(function(event) {
    var menuIconSvg = new Snap($(this).find("#menu-toggle-svg")[0]);
    var menuValues;
    var cctExtraHeightSmall = 32, cctExtraHeightMedium = 60;
    
    $(window).on("load", setHeightMenu);
    
    $(window).on("resize", setHeightMenu);
    
    function setHeightMenu () {
        menuValues = [];
        $(".menu-text").each(function(index) {
            var values = {};
            values["lastHeight"] = $(this).outerHeight();
            menuValues.push(values);

            if (verge.viewportW() <= 480) {
                $(this).siblings(".menu-circuit").height(values["lastHeight"] + cctExtraHeightSmall);
            }
            else {
                $(this).siblings(".menu-circuit").height(values["lastHeight"] + cctExtraHeightMedium);
            }
        });
    }
    
    $("#menu-toggle").click(function(event) {
        tl.pause();
        tl.clear();
        tl.play();
        
        if ($(this).attr("data-fn") == "open") {
            $("body").addClass("no-scroll-for-menu-small");
            $(this).attr("data-fn", "close");
            
            // Menu animation
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
            
            // Menu icon animation
            var paths = menuIconSvg.selectAll("path");
            paths.forEach(function(el, i) {
                el.animate({"path": el.attr("data-path-hover")}, 300, mina.easeout);
            });
        }
        else if ($(this).attr("data-fn") == "close") {
            $("body").removeClass("no-scroll-for-menu-small");
            $(this).attr("data-fn", "open");
            
            // Menu animation
            tl.to("#menu", 0.3, {
                className: "-=opened"
            }, "out");
            tl.to("#menu-back-cover", 0.5, {
                className: "-=opened"
            }, "out+=0.0");
            tl.to("#menu, #menu-back-cover", 0.01, {
                display: "none",
            });
            
            // Menu icon animation
            var paths = menuIconSvg.selectAll("path");
            paths.forEach(function(el, i) {
                el.animate({"path": el.attr("data-path")}, 300, mina.easeout);
            });
        }
    });
    
    $("#menu-toggle").mouseover(function(event) {
        var paths = menuIconSvg.selectAll("path");
        paths.forEach(function(el, i) {
            el.animate({"stroke": menuIconSvg.attr("data-color-hover")}, 300, mina.easeout);
        });
    });
    
    $("#menu-toggle").mouseout(function(event) {
        var paths = menuIconSvg.selectAll("path");
        paths.forEach(function(el, i) {
            el.animate({"stroke": menuIconSvg.attr("data-color")}, 300, mina.easeout);
        });
    });
    
    $("#menu-back-cover").click(function(event) {
        tl.pause();
        tl.clear();
        tl.play();
        
        if ($(this).attr("data-fn") == "close") {
            $("body").removeClass("no-scroll-for-menu-small");
            $("#menu-toggle").attr("data-fn", "open");
            tl.to("#menu", 0.3, {
                className: "-=opened"
            }, "out");
            tl.to("#menu-back-cover", 0.5, {
                className: "-=opened"
            }, "out+=0.0");
            tl.to("#menu, #menu-back-cover", 0.01, {
                display: "none",
            });
            
            // Menu icon animation
            var paths = menuIconSvg.selectAll("path");
            paths.forEach(function(el, i) {
                el.animate({"path": el.attr("data-path")}, 300, mina.easeout);
            });
        }
    });
});






//# sourceMappingURL=web-contact.js.map