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
$(document).ready(function(event) {
    var mobile_maxwidth = 752;
    var full_frame_ofs_h = 5;
	
	// initialize block height
	var landing_graphic = $("#landing-graphic");
	if (verge.viewportW() <= mobile_maxwidth) {
		landing_graphic.css("height", "auto");
	}
	else {
		updated_h = verge.viewportH();
		min_h = parseInt(landing_graphic.css("min-height"));
    	if (min_h > updated_h) {
    		landing_graphic.css("height", min_h + full_frame_ofs_h);
    	}
    	else {
    		landing_graphic.css("height", verge.viewportH() + full_frame_ofs_h);
    	}
	}
    
    // content resize
    $(window).resize(function(event) {
    	if (verge.viewportW() <= mobile_maxwidth) {
			landing_graphic.css("height", "auto");
		}
		else {
			updated_h = verge.viewportH();
	    	min_h = parseInt(landing_graphic.css("min-height"));
	    	if (min_h > updated_h) {
	    		landing_graphic.css("height", min_h + full_frame_ofs_h);
	    	}
	    	else {
	    		landing_graphic.css("height", verge.viewportH() + full_frame_ofs_h);
	    	}
		}
    });
    
    
    // Figure hover effects
    /*$(".sltd-work-figure").mouseenter(function(event) {
        $(this).closest("li").siblings("li").find(".sltd-work-figure .figure-layer").addClass("reveal");
    });
    
    $(".sltd-work-figure").mouseleave(function(event) {
        $(".sltd-work-figure .figure-layer").removeClass("reveal");
    });*/
});
//# sourceMappingURL=web-index.js.map