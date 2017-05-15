var isFirstOpen = 1;

$(document).ready(function(){
  if(localStorage.getItem('language') == null){
    localStorage.setItem('language',"thai");
    document.body.className = localStorage.getItem('language');
  }else{
    document.body.className = localStorage.getItem('language');
  }

  $('.change-language').click(function(){
    var selectedLanguage = $(this).attr('data-lan');
    document.body.className = selectedLanguage;
    console.log("lang" + selectedLanguage);
    localStorage.setItem('language', selectedLanguage);
    setTimeout(function(){
      $('body').addClass('loaded');
    },500);
  });
});
