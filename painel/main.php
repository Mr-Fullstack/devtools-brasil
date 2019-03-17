<?php 
require_once "../config.php";
if(isset($_GET['logout'])){
    Painel::logout();
}if(empty($_SESSION['user'])){
    header('Location:./?error_user');
    die();
}
$blog= new Post;     
$url=isset($_GET['url'])?$_GET['url']:'home';
$acao=isset($_GET['acao'])?$_GET['acao']:null;
$id=isset($_GET['id'])?$_GET['id']:null;
$confirm=isset($_GET['confirm'])?$_GET['confirm']:null;
$page=isset($_GET['page'])?$_GET['page']:null;   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>assets/css/all.min.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>assets/css/animate.css">
    <link rel="stylesheet" href="css/style.css">
   <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
<?php 
//verificando açoes do listpost  para inseri box modal
   if ($acao =='excluir'){
    echo "<div class='box-modal'>
            <div class='box-mensage'> 
                <h4> deseja excluir  realmente excluir esse post?</h4>
                <span class='confirm'>
                <a href='?id={$id}&confirm=yes&retorno=delete_post'>sim</a> ou <a href='list-posts'>não</a> </span>
            </div>
          </div>";    
}
if ($acao =='excluir_user'){
    echo "<div class='box-modal'>
            <div class='box-mensage'> 
                <h4> deseja excluir  realmente excluir esse usuario?</h4>
                <span class='confirm'>
                <a href='?id={$id}&confirm=yes_user&retorno=delete_user'>sim</a> ou <a href='list-users'>não</a> </span>
            </div>
          </div>";    
}if ($acao =='excluir-cat'){
    echo "<div class='box-modal'>
            <div class='box-mensage'> 
                <h4> deseja excluir  realmente excluir essa categoria?</h4>
                <span class='confirm'>
                <a href='?id={$id}&confirm=yes_cat&retorno=delete_cad'>sim</a> ou <a href='cad-categoria'>não</a> </span>
            </div>
          </div>";    
}  

if ($confirm == 'yes'){
   $blog->setId($id);
   $blog->posts('delete','');
} 
else if ($confirm == 'yes_user')
{
    $user= new Admin;   
    $user->setId($id);
    $user->admins('delete','');
}
if ($acao =='editar')
{
    echo "<div class='box-modal'>".
         "<div class='edit'>";
    if (file_exists('pages/edit-post.php'))
    {
        include("pages/edit-post.php");
    }
    else
    {
        include('404.php');   
    }
    echo "</div>".
         "</div>";    
} 
if ($acao =='editar-cat')
{
    echo "<div class='box-modal'>".
         "<div class='page cat'>";
    if (file_exists('pages/edit-cat.php'))
    {
        include("pages/edit-cat.php");
    } 
    else
    {
        include('404.php');
    }
    echo "</div>".
         "</div>";    
}
  if ($confirm =='yes_cat')
  {
        $user= new Categorias;   
        $user->setId($id);
        $user->categoria('delete','');  
  }

?>  
<base base="<?php echo INCLUDE_PATH_PAINEL;?>"/>
    <div class="box-main">
        <aside class="jw_menu">
             <div class="info-user">
                 <div class="avatar-user">
                    <i class="fas fa-user"></i>
                 </div> 
                  <span class="user">
                      <h5><?php echo $_SESSION['nome'];?></h5>
                      <h6><?php echo pegaCargo( $_SESSION['cargo']);?> </h6>
                  </span>
              </div>
          <div class="menu-aside">
                <div class="menu-aside-single"> 
                   <a realtime="home"href="<?php echo INCLUDE_PATH_PAINEL;?>"><h3>home</h3></a>
                </div>
                <div class="menu-aside-single"> 
                    <h3>cadastro <i class="fas fa-arrow-up"></i><i class="fas fa-arrow-down"></i></h3>
                    <a realtime="cad-categoria" href="<?php echo INCLUDE_PATH_PAINEL;?>cad-parceria">cadastrar categoria</a>
                    <a realtime="cad-post" href="<?php echo INCLUDE_PATH_PAINEL;?>cad-post">cadastrar post</a>
                    <a realtime="cad-curso" href="<?php echo INCLUDE_PATH_PAINEL;?>cad-curso">cadastrar curso</a>
                </div>
                <div class="menu-aside-single"> 
                    <h3>gestão <i class="fas fa-arrow-up"> </i><i class="fas fa-arrow-down"></i></h3>
                        <a realtime="list-cursos" href="">listar cursos</a>
                        <a realtime="list-servicos" href="">listar serviços</a>
                        <a realtime="list-posts" href="">listar posts</a>
                        <a realtime="list-users" href="">listar usuarios</a>
                </div>
                <div class="menu-aside-single"> 
                    <h3>administração do painel <i class="fas fa-arrow-up"></i><i class="fas fa-arrow-down"></i> </h3>
                    <a realtime="edit-usuario"href="">editar usuario</a>
                    <?php  if ( $_SESSION['cargo'] > 0){?>
                    <a realtime="add-usuario"href="">adicionar usuarios</a>
                    <?php }?>
                </div>
                <div class="menu-aside-single"> 
                    <h3>configuração geral <i class="fas fa-arrow-up"></i><i class="fas fa-arrow-down"></i></h3>
                    <a realtime="editar"href="">editar</a>
                </div>
         </div><!--menu-aside-->     
        </aside> <!--aside jw-menu--> 
        <div class="content">      
            <header class="header-main">
                <span class="menu-btn">
                <i class="fas fa-bars jw_btn-menu"></i>
                </span>
                <span class="logout">
                <a href="<?php echo INCLUDE_PATH_PAINEL;?>?logout">
                <i class="fas fa-times"></i>Sair
                </a>
                </span>
            </header> 
            <div class="content-pages">
                <span class="content-navigator">
                  <h6><i class="fas fa-home"></i> <span class="link-navigator">dashboard / home</span> 
                 </h6>  
                </span>
            <div class="page-main">
                 <?php 
                    if(file_exists('pages/'.$url.'.php')){
                       include("pages/{$url}.php");
                    }else{
                        include('404.php');
                    }
                 ?>
               </div><!--page-main-->   
           </div><!--pages-->      
        </div><!--content-->
    </div><!--box-main-->
    <script src="<?php echo INCLUDE_PATH;?>assets/js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH;?>assets/js/constants.js"></script>
    <script src="<?php echo INCLUDE_PATH;?>assets/js/scripts.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/main.js"></script>
</body>
</html>