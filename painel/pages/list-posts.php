<?php 
@include_once('../../config.php');
$blog= new Post;
?>   
    <div class="page">
        <div class="title-page">
            <i class="fa fa-pen"></i><h1>lista de Post</h1>
        </div>
        <div class='table'>
            <table class='table-data'>
                <thead class='thead'> 
                    <tr>
                    <td>titulo do post</td>
                    <td>autor do post</td>
                    <td>data do post</td>
                    <td class="txcenter">status</td>
                    <td colspan='2' class='txcenter'>ação</td>
                    </tr>
                </thead>
                <tbody>     
                        <?php

                        $linhas=$blog->posts( 'listPost', '');
                        if ( $linhas != 0 )
                        { 
                            foreach ( $linhas as $value )
                            {
                                $status=$value->status_post;
                                if ( $_SESSION ['id' ] ==  $value->id_usuario )
                                {    
                        ?>                     
                  <tr> 
                        <td class='txtlist'> <?php echo $value->title_post; ?> </td>
                        <td class='txtlist'> <?php echo $value->autor_post; ?> </td>
                        <td class='txtlist'> <?php echo convertDate($value->date_post); ?> </td>
                        <td class='txcenter txtlist status <?php echo $status ?>'> <?php echo $value->status_post; ?> </td>
                        <td class='txcenter'><a href='list-posts?page=edit-post&acao=editar&id=<?php echo $value->id_post; ?> '>editar</a></td>
                        <td class='txcenter'><a href='list-posts?acao=excluir&id=<?=$value->id_post?>&event=<?php echo $value->event_post; ?>'>excluir</a></td>
                 </tr>
                             <? } 
                                else if ( $_SESSION [ 'cargo' ] == 2 || $_SESSION [ 'cargo' ] == 1 )
                                {
                             ?>
                        <tr> 
                        <td class='txtlist'> <?php echo $value->title_post; ?> </td>
                        <td class='txtlist'> <?php echo $value->autor_post; ?> </td>
                        <td class='txtlist'> <?php echo convertDate($value->date_post);?> </td>
                        <td class='txcenter status txtlist <?= $status ?>'> <?php echo $value->status_post; ?> </td>
                        <td class='txcenter'>
                            <a href='list-posts?page=edit-post&acao=editar&id=<?= $value->id_post ?>'>editar</a>
                        </td>
                          <?php     if ( $_SESSION [ 'cargo' ] == 2)
                                    { ?>
                        <td class='txcenter'><a href='list-posts?acao=excluir&id=<?php echo $value->id_post; ?>&event=<?php echo $value->event_post; ?>'>excluir</a></td>
                              <?php }?>
                     </tr>
                              <?}
                          }
                          if ( ( $_SESSION [ 'id' ] != $value->id_usuario  && $_SESSION [ 'cargo' ] < 1 ) )
                          {?>
                        <td colspan='5' class='txcenter'>você não fez nenhum post ainda.</td>
                        <?}?>
                     <?}
                       else
                       {?>
                        <td colspan='5' class='txcenter'>nenhum post foi encontrado</td>
                     <?}?>
                            
                </tbody>
                </table>
            </div>
    </div>