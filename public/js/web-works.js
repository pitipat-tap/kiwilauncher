var tlMenu = new TimelineLite();

$(document).ready(function(event) {
    var menuIconSvg = new Snap($(this).find("#menu-toggle-svg")[0]);
    var menuValues;
    var cctExtraHeightSmall = 32, cctExtraHeightMedium = 60;
    
    var url = window.location.pathname;
    var filename = url.substring(url.lastIndexOf('/')+1);

    switch(filename) {
        case "" :
        break;
        default:
                    document.title = filename + " | Kiwi Launcher ";
    }

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
        tlMenu.pause();
        tlMenu.clear();
        tlMenu.play();
        
        if ($(this).attr("data-fn") == "open") {
            $(this).attr("data-fn", "close");
            
            // Menu animation
            tlMenu.to("#menu, #menu-back-cover", 0.01, {
                display: "block",
                onComplete: function() {
                    setHeightMenu();
                }
            });
            tlMenu.to("#menu", 0.3, {
                className: "+=opened"
            }, "in");
            tlMenu.to("#menu-back-cover", 0.5, {
                className: "+=opened"
            }, "in+=0.0");
            
            // Menu icon animation
            var paths = menuIconSvg.selectAll("path");
            paths.forEach(function(el, i) {
                el.animate({"path": el.attr("data-path-close")}, 300, mina.easeout);
            });
        }
        else if ($(this).attr("data-fn") == "close") {
            $(this).attr("data-fn", "open");
            
            // Menu animation
            tlMenu.to("#menu", 0.3, {
                className: "-=opened"
            }, "out");
            tlMenu.to("#menu-back-cover", 0.5, {
                className: "-=opened"
            }, "out+=0.0");
            tlMenu.to("#menu, #menu-back-cover", 0.01, {
                display: "none",
            });
            
            // Menu icon animation
            var paths = menuIconSvg.selectAll("path");
            paths.forEach(function(el, i) {
                el.animate({"path": el.attr("data-path-menu")}, 300, mina.easeout);
            });
        }
    });
    
    /*$("#menu-toggle").mouseover(function(event) {
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
    });*/
    
    $("#menu-back-cover").click(function(event) {
        tlMenu.pause();
        tlMenu.clear();
        tlMenu.play();
        
        if ($(this).attr("data-fn") == "close") {
            $("#menu-toggle").attr("data-fn", "open");
            $("#brand-header").attr("data-fn", "open");
            tlMenu.to("#menu", 0.3, {
                className: "-=opened"
            }, "out");
            tlMenu.to("#menu-back-cover", 0.5, {
                className: "-=opened"
            }, "out+=0.0");
            tlMenu.to("#menu, #menu-back-cover", 0.01, {
                display: "none",
            });
            
            // Menu icon animation
            var paths = menuIconSvg.selectAll("path");
            paths.forEach(function(el, i) {
                el.animate({"path": el.attr("data-path-menu")}, 300, mina.easeout);
            });
        }
    });

    $("#header-brand").click(function(){
        if ($(this).attr("data-fn") == "open") {
            $(this).attr("data-fn", "close");
            console.log($('.work-menu-container'));
            $('.work-menu-container').removeClass("work-menu-show");
        }
        else if ($(this).attr("data-fn") == "close") {
            $(this).attr("data-fn", "open");
            $('.work-menu-container').addClass("work-menu-show");
        }
    });
});





 $(document).ready(function() {
     $(".work-figure").mouseover(function(event) {
         $(this).closest("li").siblings("li").find(".work-figure .figure-layer").addClass("reveal");
     });
     
     $(".work-figure").mouseout(function(event) {
         $(this).closest("li").siblings("li").find(".work-figure .figure-layer").removeClass("reveal");
     });
 });


//# sourceMappingURL=web-works.js.map
