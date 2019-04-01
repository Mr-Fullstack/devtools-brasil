<?php 
include('../../config.php');
$nome  = $_POST [ 'nome_usuario' ];
$login = $_POST [ 'username' ];
$email = $_POST [ 'email_usuario' ];
$senha = $_POST [ 'senha_usuario' ];
$dados = [ $nome, $login, $email, $senha ];
$acao  = isset ( $_POST [ 'acao' ] ) ? $_POST [ 'acao' ] : null;

if ( $acao == 'atualizar-user' ) 
{
    $user  = new Admin;
    $user->setId( $_SESSION [ 'id' ] );
    $user->admins( 'update', $dados);
    $sql=Mysql::conectar()->prepare( "SELECT * FROM tb_admin_usuarios WHERE user = ? AND senha= ?" );
    $sql->execute( array ( $login, $senha ) );
    if ( $sql->rowCount() == 1 )
    {
        $info = $sql->fetch();
        //logamos com sucesso
        $_SESSION [ 'id' ] = $info [ 'id_usuario' ];
        $_SESSION [ 'login' ] = true;
        $_SESSION [ 'user' ] = $login;
        $_SESSION [ 'email' ] = $email;
        $_SESSION [ 'password' ] = $senha;
        $_SESSION [ 'nome' ] = $info [ 'nome' ];
    }  
    header( 'Location:'.INCLUDE_PATH_PAINEL.'edit-usuario?key=session&retorno=edit_user_sucess' ); 
    die();
}
?>