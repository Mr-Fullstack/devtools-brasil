<?php 

class Painel{


    public static function logado(){

        return isset($_SESSION['login']) ? true : false;
    }

    public static function logout(){
        session_destroy();
        header('Location:'.INCLUDE_PATH_PAINEL);
    }
}

?>