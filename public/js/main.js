var isFirstOpen = 1;

function getOuterHeight(eleament,margin){
    return $(eleament).outerHeight()+margin;
}
function hideAndShowTabs(direction) { 
    if(direction == "up"){
        $('#tabs-row').removeClass("hide-tabs-row").addClass("show-tabs-row");
    }else{ 
        $('#tabs-row').addClass("hide-tabs-row").removeClass("show-tabs-row");
    }
      console.log(direction);
} 
// ------------------------ slider.js------------------------
$(window).resize(function(event) {
    $('.slidesjs-pagination').css('top',getOuterHeight('#banner-img-1',-25));
});
$(document).ready(function() {

  $('#banner-img-1').load(function(){
     $('.slidesjs-pagination').css({
        position:'absolute',
        top:getOuterHeight('#banner-img-1',-3),
        left:'50%',
        'z-index':'999'
     });
 //   console.log($('.slidesjs-container').children());
     $('#slides').children('a').remove();
  });
//--------------------------- waypoint ----------------------------

if(!isMobile.phone){
    console.log("NotMobile");
  var waypoint = new Waypoint({
    element: document.getElementById('waypoint-tabs-trigger'),
    handler: function(direction) {
      hideAndShowTabs(direction);
    },
    offset: '5%'
  })
}

//--------------------------- waypoint ----------------------------
// -------------------------- firstAnimation ------------------
      isFirstOpen = sessionStorage.getItem("flag");
      console.log(isFirstOpen);
      setTimeout(function(){$('.split-obj').addClass('moveOut');}, 300);
      setTimeout(function(){
      $(function(){
          $('.brand-tag').textillate({
              in:{
                  effect:'fadeIn',
                  delayScale:2.5
              }
          });
      });
      $(function(){
          $('.sub-brand-tag').textillate({
              in:{
                  effect:'fadeIn',
                  delayScale:2.5
              }
          });
      });
      },1500);
     var startTimer = 5200;
  if(isFirstOpen == 1 || isFirstOpen == null){ 
//  if(true){ 
     for(var i = 1; i < 13 ;i++){
        $('.split-obj[data-obj='+ i + ']').fadeIn(300);
     }

     setTimeout(function(){$('.brand-slider').addClass('brand-slider-fadein');}, startTimer+1200);
     setTimeout(function(){$('.brand-slider').removeClass('brand-slider');}, startTimer+1320);
     setTimeout(function(){$('.brand-animation').addClass("brand-animation-fade-out");},startTimer);
     setTimeout(function(){$('.brand-animation').addClass("brand-slider");},startTimer+1350);
     setTimeout(function(){$('.brand-animation').remove();},startTimer+2300);
  }else{
     $('.brand-animation').remove();
     setTimeout(function(){$('.brand-slider').addClass('brand-slider-fadein');}, 500);
     setTimeout(function(){$('.brand-slider').removeClass('brand-slider');},800);
  }
// -------------------------- firstAnimation ------------------
});
$(function() {
  $('#slides').slidesjs({
    width: 940,
    height: 528,
    play: {
      active: true,
      auto: true,
      interval: 8000,
      swap: true,
      pauseOnHover: true,
      restartDelay:3000
    },
    effect: {
      slide: {
              speed: 3000
             },
      fade: {
             speed: 4300,
             crossfade: true
            }
     }
  });
});

// ------------------------ slider.js------------------------
//

//------------------------- spliter --------------------------
$(document).ready(function() {

});
//------------------------- spliter --------------------------
//

//---------------------- sub-tab ----------------------------


function activeSubTabs(panel) { 
       $(panel).siblings().removeClass("active");
       $(panel).addClass("active");
} 

$(document).ready(function(){
    $('#newsTab').click(function() {
        activeSubTabs('#panel1');
        $('#newsTab').addClass("selected");
        $('#aboutTab').removeClass("selected");
        $('#techTab').removeClass("selected");
        $('#productsTab').removeClass("selected");
        $('#shopTab').removeClass("selected");
    });
    $('#aboutTab').click(function() {
        activeSubTabs('#panel2');
        $('#newsTab').removeClass("selected");
        $('#aboutTab').addClass("selected");
        $('#techTab').removeClass("selected");
        $('#productsTab').removeClass("selected");
        $('#shopTab').removeClass("selected");
    });
    $('#techTab').click(function() {
        activeSubTabs('#panel3');
        $('#newsTab').removeClass("selected");
        $('#aboutTab').removeClass("selected");
        $('#techTab').addClass("selected");
        $('#productsTab').removeClass("selected");
        $('#shopTab').removeClass("selected");
    });
    $('#productsTab').click(function() {
        activeSubTabs('#panel4');
        $('#newsTab').removeClass("selected");
        $('#aboutTab').removeClass("selected");
        $('#techTab').removeClass("selected");
        $('#productsTab').addClass("selected");
        $('#shopTab').removeClass("selected");
    });
    $('#shopTab').click(function() {
        activeSubTabs('#panel5');
        $('#newsTab').removeClass("selected");
        $('#aboutTab').removeClass("selected");
        $('#techTab').removeClass("selected");
        $('#productsTab').removeClass("selected");
        $('#shopTab').addClass("selected");
    });
    $('#skrollr-body').click(function() {
      $('#header-small').addClass("hidden");
      console.log("hide");
    });
});

//---------------------------------------------------------------
