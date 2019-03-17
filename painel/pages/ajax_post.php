<?php 
include('../../config.php');
$date=Array();
$title_post=isset($_POST['title_post'])?$_POST['title_post']:null;
$cod_video=isset($_POST['cod_video'])?$_POST['cod_video']:null;
$corpo_post=isset($_POST['corpo_post'])?$_POST['corpo_post']:null;
$autor_post=isset($_POST['autor_post'])?$_POST['autor_post']:null;
$instrutor_post=isset($_POST['instrutor_post'])?$_POST['instrutor_post']:null;
$categoria_post=isset($_POST['categoria_post'])?$_POST['categoria_post']:null;
$categoria_sec_post=isset($_POST['categoria_sec_post'])?$_POST['categoria_sec_post']:null;
$date_post=isset($_POST['date_post'])?$_POST['date_post']:null;
$minutos_video=isset($_POST['minutos_video'])?$_POST['minutos_video']:null;
$id=isset($_GET['id'])?$_GET['id']:null;
$acao=isset($_POST['acao'])?$_POST['acao']:null;
$botao=isset($_POST['botao'])?$_POST['botao']:null;
$event=isset($_GET['event'])?$_GET['event']:null;
/*take current date */
$date_today= date('Y-m-d');

if ($date_post == null)
{
    /* if date is null, date of post ($date_post) equals current date ($date_today) = */ 
    $date_post= $date_today;     
    $status='concluido';
} 
else if ( $date_post != $date_today )
{
    /* else if date is diferent of date $status*/ 
    $status='aguardando';
}
else 
{
    $status='concluido'; 
}

if ($botao == 'Salvar rascunho!')
{
    $status='pendente';

}
if ($event == null )
{
    $event = str_replace(' ','',$title_post);   
} 


$user= new Post;

$dados=[$title_post,$cod_video,$corpo_post,$autor_post,$instrutor_post,$categoria_post,$categoria_sec_post,$date_post,$minutos_video,$status,$_SESSION['id'],$event];

if ( ( $acao =='Cadastrar!') && ($categoria_post=='0'|| $minutos_video <=0) )
{
    header('Location:'.INCLUDE_PATH_PAINEL.'cad-post?retorno=erro-cat'); 
    die();  
    if ( $title_post == '' )
    {
        header('Location:'.INCLUDE_PATH_PAINEL.'cad-post?retorno=erro_title_post'); 
        die();  
    }
    elseif ( $cod_video == '' )
    {
        header('Location:'.INCLUDE_PATH_PAINEL.'cad-post?retorno=erro_cod_video'); 
    }
    elseif ( $corpo_post == '' )
    {
        header('Location:'.INCLUDE_PATH_PAINEL.'cad-post?retorno=erro_corpo');
        die();     
    }
    elseif ( $autor_post == '' ){
        header('Location:'.INCLUDE_PATH_PAINEL.'cad-post?retorno=erro_autor'); 
        die();  
    }
    elseif ( $instrutor_post == '' )
    {
        header('Location:'.INCLUDE_PATH_PAINEL.'cad-post?retorno=erro_inst'); 
        die();  
    } 
}
else
{
    if ( $acao == 'Cadastrar!'  || ($botao == 'Salvar rascunho!' && $acao != 'edit-post' ) )
    {   
        $user->posts('create',$dados);
        if( $status == 'aguardando')
        {   $title_post = str_replace(' ','',$title_post);
            $idPost=$user->getLastId('id_post','posts');
            $user->agendar( $event,$date_post,$idPost );
        }  
        header('Location:'.INCLUDE_PATH_PAINEL.'cad-post?retorno=sucess');
                die();
    }
    elseif ( $acao == 'edit-post' )
    {
        $user->setId($id);
        if( $date_post != $date_today )
        {   
            $user->agendar($event,$date_post,$id);
        }   
        if ($user->posts ( 'update',$dados ) )
        {
          
            header('Location:'.INCLUDE_PATH_PAINEL.'list-posts?retorno=edit_sucess');
            die();   
        }
        else
        {
            header('Location:'.INCLUDE_PATH_PAINEL.'list-posts?retorno=edit_erro');
            die();       
        }     
    }
    else
    {
        header('Location:'.INCLUDE_PATH_PAINEL.'cad-post?retorno=erro');
        die();        
    }  
}  


?>
