<?php
/*
@autor: Marcos Cerqueira;
@data: 26/02/2019;

licenciada pela Devtools Brasil.
*/ 


class Mysql{

   private static $pdo;

    public static function conectar(){
        if(self::$pdo == null){    
            try{
                self::$pdo= new PDO ('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(Exception $e){
                echo'<div class="error-msg"> erro ao conectar com base de dados! </div>';
            }       
        }    
            return self::$pdo;
    }

}



?>