<?php
/* 
   arquivo de de configuração de toda a  aplicação.
   criado em 26/02/2019 às 05:02
   última atualização 26/02/2019 ás 05:18
*/
    //contante global do diretorio principal deve ser trocado quando subir para hospedagem.
    define('INCLUDE_PATH','http://localhost/devtoolsbrasil/');

    //autoload simples
    $autoload=function($class){
        include_once "./models/{$class}.php";
    };
    spl_autoload_register($autoload);

    //configuração database
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','devtoolsbrasil');  
?>