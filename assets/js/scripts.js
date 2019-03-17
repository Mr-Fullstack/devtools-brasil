$(function(){
    var body_background=$('body');
    body_background.css({'background-color':'#f2f2f2'});
    var link_navigator=$('.link-navigator');
    var link=$('a');
    link_navigator.text('dashboard / home');  
     carregarDinamico();
     function carregarDinamico(){
        $('[realtime]').click(function(){ 
            var pagina = $(this).attr('realtime');
           $('.page-main').hide();
           $('.page-main').load(include_path+'pages/'+pagina+'.php');
           $('.page-main').fadeIn(); 
           return false;
         })
         
     }
    
    $('a').click(function(){ 
        link_navigator.text('dashboard / '+(this.text));
        link.removeClass("selected");
        $(this).addClass("selected");  
    });
     
    $('.msg-box i').click(function(){ 
        $('.msg-box').fadeOut(); 
    });

    setTimeout(() => {
        $('.msg-box').fadeOut(); 
    }, 3500);

}) //fim do scripts.js