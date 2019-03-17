<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/all.min.css">
    <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">--> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div class="box-login">
        
        <h1>Dev Tools Brasil</h1>
        <h2>Painel Admistrativo</h2>
       EFETUE LOGIN :
       <?php
            if (isset($_POST['acao']))
            {
                $user=$_POST['user'];
                $password=$_POST['password'];
                $sql=Mysql::conectar()->prepare("SELECT * FROM tb_admin_usuarios WHERE user = ? AND senha= ?");
                $sql->execute(array($user,$password));
                if ($sql->rowCount() == 1)
                {
                    $info=$sql->fetch();
                    //logamos com sucesso
                    $_SESSION['id']=$info['id_usuario'];
                    $_SESSION['login']=true;
                    $_SESSION['user']=$user;
                    $_SESSION['email']=$info['email'];
                    $_SESSION['password']=$password;
                    $_SESSION['cargo']=$info['cargo'];
                    $_SESSION['nome']=$info['nome'];
                    header('Location:'.INCLUDE_PATH_PAINEL);
                    die();
                } else
                {
                    if (isset($_GET['error_user']))
                    {
                        header('Location:?error_msg');
                        die();
                    }
                    if (!isset($_GET['error_msg']))
                    {
                        echo'<div class="error-msg animated fadeIn">usuario ou senha não existe</div>';
                    }
                   
                }
            } 
            if (isset($_GET['error_user']))
            {
            echo'<div class="error-msg animated fadeIn">você precisa esta logado !</div>';
            }
            if (isset($_GET['error_msg']))
            {
            echo'<div class="error-msg animated fadeIn">usuario ou senha não existe</div>';
            }
       
      

        ?>
        <div class="login-form">
            <form  method="POST">
                <input type="text" name="user"required  placeholder="login">
                <input type="password" name="password" required placeholder="senha">
                <input type="submit" name="acao" value="Logar!"><label for=""><span><a href="http://">esqueci a senha</a></span></label>          
            </form>
        </div>            
    </div>
</body>
</html>