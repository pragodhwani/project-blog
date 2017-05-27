$(document).ready(function(){
  $('.testimoni-slider').bxSlider({
    auto: true,
    controls: false
  });
  newsSlider = $('.news-slider').bxSlider({
    auto: true,
    controls: false
  });
  $('.route-slider').bxSlider({
    auto: true,
    controls: false
  });
  $('#show-menu').click(function(){
    $('.page-wrapper').toggleClass('menu-open');
  });
  $('.taxi a#toggleDesc').click(function(){
    let taxiDesc = $(this).parent().children('.taxi-description');
    let iconDiv =  $(this).children('.fa');
    if(!taxiDesc.hasClass('open'))
    {
      iconDiv.removeClass('fa-chevron-circle-down').addClass('fa-chevron-circle-up');
      taxiDesc.addClass('open');
    }
    else
    {
      iconDiv.removeClass('fa-chevron-circle-up').addClass('fa-chevron-circle-down');
      taxiDesc.removeClass('open');
    }
  });
  $('h2 a').click(function(){
    let collapsibleDiv = $(this).parent().next('div');
    let iconDiv =  $(this).children('.fa');
    if(collapsibleDiv.hasClass('open'))
    {
      newsSlider.destroySlider();
      iconDiv.removeClass('fa-minus').addClass('fa-plus');
      collapsibleDiv.removeClass('open');
    }
    else
    {
      newsSlider.reloadSlider();
      iconDiv.removeClass('fa-plus').addClass('fa-minus');
      collapsibleDiv.addClass('open');
    }
  });
  $(".swipe-area").swipe({
    swipeStatus:function(event, phase, direction, distance, duration, fingers)
      {
        if (phase=="move" && direction =="right") {
           $(".page-wrapper").addClass("menu-open");
           return false;
        }
        if (phase=="move" && direction =="left") {
           $(".page-wrapper").removeClass("menu-open");
           return false;
        }
      }
  }); 
});
var newsSlider;