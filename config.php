<?php
/* 
   arquivo de de configuração de toda a  aplicação.
   criado em 26/02/2019 às 05:02
   última atualização 26/02/2019 ás 05:18
*/
     date_default_timezone_set('America/Sao_Paulo');
    session_start();
    //contante global do diretorio principal deve ser trocado quando subir para hospedagem.
    define('INCLUDE_PATH','http://localhost/devtoolsbrasil/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

    //autoload simples
    $autoload=function($class){
        include_once('classes/'.$class.'.php'); 
    };
    spl_autoload_register($autoload);

    //configuração database
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','devtoolsbrasil');  

 $retorno=isset($_GET['retorno'])?$_GET['retorno']:null;
// funcçoes

function pegaRetorno($retorno){
//função de flags de todo o sitemas pode ser inserido aqui via varivel $_GET['retorno']
    if($retorno == 'sucess'){
        echo '<span class="msg-box sucess">
        <p>cadastrado com sucesso! </p><i class="fas fa-times"></i>  
         </span>';
    }elseif($retorno == 'erro'){
        echo '<span class="msg-box danger">
        <p>erro ao cadastrar </p><i class="fas fa-times"></i>  
         </span>';
    }elseif($retorno == 'erro-cat'){
        echo '<span class="msg-box danger">
        <p>erro ao cadastrar, é obrigatório registrar categoria principal e os minutos do video </p><i class="fas fa-times"></i>  
         </span>';
    }elseif($retorno == 'delete_cad'){
        echo '<span class="msg-box sucess">
        <p> categoria deletada  com sucesso ! </p><i class="fas fa-times"></i>  
         </span>';
    }elseif($retorno == 'edit_cat-sucess'){
        echo '<span class="msg-box sucess">
        <p> categoria atualizada com sucesso ! </p><i class="fas fa-times"></i>  
         </span>';
    }elseif($retorno == 'erro_title_post'){
        echo '<span class="msg-box danger">
        <p>erro ao cadastrar, é obrigatório inserir o título do post </p><i class="fas fa-times"></i>  
         </span>';
    }elseif($retorno == 'erro_cod_video'){
        echo '<span class="msg-box danger">
        <p>erro ao cadastrar, é obrigatório inserir código do video </p><i class="fas fa-times"></i>  
         </span>';
    }elseif($retorno == 'erro_corpo'){
        echo '<span class="msg-box danger">
        <p>erro ao cadastrar, é obrigatório inserir texto do post  </p><i class="fas fa-times"></i>  
         </span>';
    }elseif($retorno == 'erro_autor'){
        echo '<span class="msg-box danger">
        <p>erro ao cadastrar, é obrigatório inserir nome do autor </p><i class="fas fa-times"></i>  
         </span>';
    }elseif($retorno == 'erro_inst'){
        echo '<span class="msg-box danger">
        <p>erro ao cadastrar, é obrigatório inserir nome do instrutor </p><i class="fas fa-times"></i>  
         </span>';
    }elseif($retorno == 'delete_post'){
        echo '<span class="msg-box sucess">
        <p>post deletado com sucesso ! </p><i class="fas fa-times"></i>  
         </span>';
    }elseif($retorno == 'delete_user'){
        echo '<span class="msg-box sucess">
        <p>deletado com sucesso ! </p><i class="fas fa-times"></i>  
         </span>';
    }
    elseif($retorno == 'edit_sucess'){
        echo '<span class="msg-box sucess">
        <p>post atualizado com sucesso ! </p><i class="fas fa-times"></i>  
         </span>';
    }elseif($retorno == 'edit_user_sucess'){
        echo '<span class="msg-box sucess">
        <p>atualizado com sucesso ! </p><i class="fas fa-times"></i>  
         </span>';
    }

}
pegaRetorno($retorno);

function pegaCargo($cargo){

    $arr=[
    '0'=> 'normal',
    '1'=> 'Sub Administrador',
    '2'=> 'Administrador'
    ];
    return $arr[$cargo];
}



?>