$(function(){
    
   
    /*function abre menu */

    var menu=true;
    var windowSize=$(window)[0].innerWidth;

    if(windowSize <=768 ){
     menu=false;
    }

//verificação da tela para abre o menu automaticamente
    if(windowSize >=768 ){
        $('div.content').css({width:"calc(100% - 250px)"});
        $('.jw_menu').css({display:'block'});
        $('.jw_menu').animate({
            left:'0px',
            widht: "250px"
        }, 100, function() {
            menu=true;
            console.log('menu aberto');
    });
        menu=true;
}


  /* se menu estiver aberto*/    
    $('.jw_btn-menu').click(function(){
        if(menu == true){
             if(windowSize <=768 ){ 
                 $('.logout').fadeIn("fast");
                 $('.content-pages').css({filter:"none"}); 
             }
            $('div.content').animate({display:'block',width:"100%"});
            $('.jw_menu').animate({
                    left:'-=50',
                    widht: "toggle"
                }, 100, function() {
                    menu=false;
                    console.log('menu fechado');
                });
    }

   /* se menu estiver fechado */     
        if(menu == false){
            if(windowSize <=768 ){
    //tela de smartphone ficará com blur na página onde o  usuario estiver para da destaque ao menu 
                 $('.logout').hide();
                 $('.content-pages').css({filter:"blur(45px)"}); 
             }  
            $('div.content').css({width:"calc(100% - 250px)"});  
            $('.jw_menu').css({display:'block'});
            $('.jw_menu').animate({
                    left:'0px',
                    widht: "250px"
                }, 100, function() {
                    menu=true;
                    console.log('menu aberto');
            });
        }
     });//fim da função click do botão menu
  
     /* navegação do menu aside */

     $('.menu-aside-single h3 i').click(function(){
         //fechar o menu
        $(this).hide();
        $(this).parent().parent().find('a').slideToggle();
        $(this).parent().find('i.fa-arrow-down').fadeIn();
     }); 

     $('i.fa-arrow-down').click(function(){
          //abre o menu
        $(this).hide();
        $(this).parent().find('i.fa-arrow-up').fadeIn();
     }); 



  }) //fim do main.js