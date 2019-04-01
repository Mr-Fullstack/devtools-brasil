<?php 
@include_once "../../config.php";

  $key = isset ( $_GET [ 'key' ] ) ? $_GET [ 'key' ] : null;
  if ( $key=='session' )
  {
    $usuario = $_SESSION [ 'user' ];
    $pass    = $_SESSION [ 'email' ];
    $sql = Mysql::conectar()->prepare( "SELECT * FROM tb_admin_usuarios WHERE user = ? AND senha= ?" );
    $sql->execute( array ( $usuario,$pass ) );
    if ( $sql->rowCount() == 1 )
    {
        $info = $sql->fetch();
        //logamos com sucesso
        $_SESSION [ 'id' ]       = $info [ 'id_usuario' ];
        $_SESSION [ 'login' ]    = true;
        $_SESSION [ 'nome' ]     = $info [ 'nome' ];
        $_SESSION [ 'user' ]     = $usuario;
        $_SESSION [ 'email' ]    = $info [ 'email' ];
        $_SESSION [ 'password' ] = $pass;
        $_SESSION [ 'cargo' ]    = $info [ 'cargo' ];
      }
  }
?>
<div class="page"> 
    <div class="cad-form">
    <div class="title-page">
    <i class="fa fa-pen"></i><h1>Editar Usuario</h1>
    </div>
        <form  class="form" method="POST" action="<?php echo INCLUDE_PATH_PAINEL?>pages/ajax_edit_user.php">
            <label for="">Nome:</label>
            <input class="w100"type="text" name="nome_usuario" required value="<?php echo $_SESSION ['nome'];?>">
            <label for="">Login:</label>
            <input class="w100"type="text" name="username" required value="<?php echo $_SESSION ['user'];?>"> 
            <label for="">Email:</label>
            <input class="w100"type="email" name="email_usuario" required value="<?php echo $_SESSION ['email'];?>">
            <label for="">Senha:</label>
            <input class="w100"type="text" name="senha_usuario" required value="<?php echo $_SESSION ['password'];?>"> 
            <input type="hidden" name="acao" value="atualizar-user" >
            <input id="submit"type="submit" value="Atualizar!">
        </form>
    </div>     
</div>