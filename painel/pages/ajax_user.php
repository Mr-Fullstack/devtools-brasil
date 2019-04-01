<?php 
include('../../config.php');
$nome  = $_POST [ 'nome_usuario' ];
$login = $_POST [ 'username' ];
$email = $_POST [ 'email_usuario' ];
$senha = $_POST [ 'senha_usuario' ];
$tipo  = $_POST [ 'tipo' ];

$dados = [ $nome, $login, $email, $senha, $tipo ];

$acao=isset ( $_POST [ 'acao' ] ) ? $_POST [ 'acao' ] : null;
$user= new Admin;

    if ( $acao == 'cadastrar' )
    {
        $user->admins( 'create', $dados );
        header('Location:'.INCLUDE_PATH_PAINEL.'add-usuario?retorno=sucess'); 
        die();
    }
    


?>