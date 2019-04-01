<?php 
include_once('./config.php');
$blog= new Post;
$comentarios= new Comentarios;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>     
    <?php
            $posts=$blog->posts('read',"WHERE status_post='concluido'");
            
            if ( $posts != 0 )
            {
                foreach ( $posts as $post )
                {
                    $ano = substr( $post->date_post,0,4 );
                    $mes = substr( $post->date_post,5,-3 );
                    $dia = substr( $post->date_post,8,2 );
                    $dateNow = date( 'd/m/Y' );
                    $diaNow = date( 'd' );
                    $data = "$dia/$mes/$ano";
    ?>
        <h1><?php echo $post->title_post?></h1><br>
        <h4>Data: <?php if ( $data === $dateNow ) echo 'postado hoje'; else echo $data; ?></h4>
        <h3>Instrutor: <?php echo $post->instrutor_post?></h3>
        <video src='www.youtube.com/watch?v=<?php echo $post->code_video?>'></video>
        <h3>Autor: <?php echo $post->autor_post?></h3>
        <h3>duração:<?php echo $post->minutos_video?>min</h3>
        <h3><?php echo $post->corpo_post?></h3> 
        <h2>Comentarios:</h2> 
        <?php
                    $linhas = $comentarios->pegarComentario( $post->id_post );
                    foreach ( $linhas as $comentario ) 
                    {
        ?>
        <h3><?php echo $comentario->nome?></h3>       
        <h4><?php echo $comentario->comentario?></h4>                
                 <? }?> 
             <?}?> 
        <?}
          else
          {?>
        <h4> Desculpe, nenhum post para ser exibido.</h4>
       <? } ?>
</body>
</html>