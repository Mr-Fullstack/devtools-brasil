<?php 
include('../../config.php');

$nome=$_POST['nome_categoria'];
$acao=isset($_POST['acao'])?$_POST['acao']:null;
$user= new Categorias;
$id=isset($_GET['id'])?$_GET['id']:null;


if( $acao == 'cad-categoria'){
    $user->categoria('create',$nome);
    header('Location:'.INCLUDE_PATH_PAINEL.'cad-categoria?retorno=sucess'); 
    die();
}if($acao == 'edit-cat'){
    $user->setid($id);
    $user->categoria('update',$nome);
    header('Location:'.INCLUDE_PATH_PAINEL.'cad-categoria?retorno=edit_cat-sucess'); 
    die();
}

?>