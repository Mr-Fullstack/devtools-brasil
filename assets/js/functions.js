$(document).ready(function(){
    /*scripta para abrir o mais sobre */
    $('.close').click(function(){
    $('.flag-open-control').css({display:"flex"});
    $('.principal__flag-post').removeClass("slideIntLeft").addClass("slideOutLeft").delay(100).css({display:"none"});
    $('.flag-close-control').css({display:"none"}).removeClass(" slideIntLeft").addClass(" slideOutLeft").delay(100).css({display:"none"});
    });
    $('.flag-open-control').click(function(){
        $('.open.flag-post-control').css({display:"none"});
        $('.principal__flag-post').css({display:"flex"}).removeClass("slideOutLeft").addClass("slideInLeft");
        $('.flag-close-control').css({display:"flex"}).removeClass("slideOutLeft").addClass("slideInLeft");
        });

    var abreMenu=  $('.jw-open-mobile');
    var fechaMenu=   $('.jw-close-mobile');
    var menu=$('.menu-links');
    menu.hide();

    abreMenu.click(function(){
    abreMenu.fadeOut("fast");
    fechaMenu.fadeIn("fast");  
    menu.slideToggle();
   })

  fechaMenu.click(function(){
    abreMenu.fadeIn("fast");
    fechaMenu.fadeOut("fast"); 
    menu.slideToggle();
   })


})

