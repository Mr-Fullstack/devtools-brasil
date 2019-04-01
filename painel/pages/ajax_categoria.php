<?php 
include('../../config.php');
$user = new Categorias;
$nome = $_POST [ 'nome_categoria' ];
$acao = isset ( $_POST [ 'acao' ] ) ? $_POST [ 'acao' ] : null;
$id   = isset ( $_GET [ 'id' ] ) ? $_GET [ 'id' ] : null;

if
( $acao == 'cad-categoria' )
{
    $user->categoria( 'create', $nome );
    header( 'Location:'.INCLUDE_PATH_PAINEL.'cad-categoria?retorno=sucess' ); 
    die();
}
else if ( $acao == 'edit-cat' )
{
    $user->setid( $id );
    $user->categoria( 'update', $nome );
    header( 'Location:'.INCLUDE_PATH_PAINEL.'cad-categoria?retorno=edit_cat-sucess' ); 
    die();
}

?>