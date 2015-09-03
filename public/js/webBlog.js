var tlMenu = new TimelineLite();

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
});





var tlBlog = new TimelineLite();

$(document).ready(function() {
    var bulletItems = $("#blog-posts-ftd-crs .bullets li");
    var ftdPostIndex = 0;

    var timeoutHandler = setTimeout(nextFtdPost, 6000);
    
    bulletItems.find("a").click(function(event) {
        if ($(this).parent("li").hasClass("active")) {
            return false;
        }
        
        // Clear all timing
        clearTimeout(timeoutHandler);
        tlBlog.pause();
        tlBlog.clear();
        tlBlog.play();
        
        // Set new carousel data
        var li = $(this).parent("li");
        ftdPostIndex = li.index();
        
        var liData = $("#blog-posts-ftd-data li").eq(ftdPostIndex);
        var imageCur = $("#blog-post-ftd-img img.active");
        var imageNext = $("#blog-post-ftd-img img").eq(ftdPostIndex);
        imageCur.css({"z-index": 1});
        imageNext.css({"z-index": 2});
        var text = $("#blog-post-ftd-text");
        text.find(".blog-post-title a").attr("href", liData.attr("data-link")).text(liData.attr("data-title"));
        text.find(".blog-post-rm a").attr("href", liData.attr("data-link"));
        
        // Fade animation
        tlBlog.to(imageCur, 0.6, {
            opacity: 0,
        }, "fade");
        tlBlog.to(imageNext, 0.6, {
            opacity: 1
        }, "fade+=0");
        
        // Set active
        li.siblings(".active").removeClass("active");
        li.addClass("active");
        imageCur.removeClass("active");
        imageNext.addClass("active");
        
        // Reset next post function
        timeoutHandler = setTimeout(nextFtdPost, 6000);
    });
    
    function nextFtdPost() {
        ftdPostIndex++;
        var elements = document.getElementsByClassName("count");
        if (ftdPostIndex >= elements.length) {
            ftdPostIndex = 0;
        }
        
        bulletItems.eq(ftdPostIndex).find("a").trigger("click");
    }
});
//# sourceMappingURL=webBlog.js.map