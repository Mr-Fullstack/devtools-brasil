<?php 
@include_once('../../config.php');
$blog= new Admin;
?>   
    <div class="page">
        <div class="title-page">
            <i class="fa fa-pen"></i><h1>Lista de Usuarios</h1>
        </div>
     
        <div class='table'>
            <table class='table-data'>
                <thead class='thead'> 
                    <tr>
                    <td>id</td>
                    <td>nome</td>
                    <td>email</td>
                    <td>função</td>
                    <td class='txcenter'>ação</td>
                    </tr>
                </thead>
                <tbody>     
                <?php
                
                $linhas=$blog->admins('listUsers','');
                if ( $linhas != 0 )
                {
                    foreach ( $linhas as $values )
                    {
                        $cargo=$values->cargo;  
                        if ( $_SESSION [ 'cargo' ] < $cargo ) 
                        {         
                ?>
                    <tr> 
                        <td> <?php echo $values->id_usuario; ?> </td>
                        <td> <?php echo$values->nome; ?> </td>
                        <td> <?php echo$values->email; ?> </td>
                        <td> <?php echo pegaCargo($cargo); ?> </td>
                        <td class='txcenter'> nenhuma ação</td>
                    </tr>

                  <?php }
                        else if ( $_SESSION [ 'cargo' ] > $cargo || ( ( $_SESSION[ 'cargo' ] == 2) || ( $_SESSION [ 'cargo' ] == 1) )  && ( $values->id_usuario != $_SESSION ['id'] ) )
                        {?>
                    <tr> 
                        <td> <?php echo $values->id_usuario; ?> </td>
                        <td> <?php echo $values->nome; ?> </td>
                        <td> <?php echo $values->email; ?> </td>
                        <td> <?php echo pegaCargo($cargo); ?> </td>
                        <td class='txcenter'><a href='list-users?acao=excluir_user&id=<?=$values->id_usuario?>'>excluir</a></td>
                    </tr>
                  <?php }
                        else if ( $values->id_usuario == $_SESSION [ 'id' ] )
                        {?>
                    <tr> 
                        <td class='self'> <?php echo $values->id_usuario; ?> - você </td>
                        <td class='self'> <?php echo $values->nome; ?> </td>
                        <td class='self'> <?php echo $values->email; ?> </td>
                        <td class='self'> <?php echo pegaCargo($cargo); ?> </td>
                        <td class='self txcenter'> nenhuma ação</td>
                    </tr>
                  <?php }
                        else if( ( $_SESSION [ 'cargo' ] == $cargo) && ( $values->id_usuario != $_SESSION [ 'id']  ) )
                        {?> 
                    <tr> 
                        <td> <?php echo $values->id_usuario; ?></td>
                        <td> <?php echo $values->nome; ?></td>
                        <td> <?php echo $values->email; ?></td>
                        <td> <?php echo pegaCargo($cargo); ?></td>
                        <td class='txcenter'> nenhuma ação</td>
                    </tr>  
                  <?php } 
                    }
                }
                else
                {?>
                    <tr>
                        <td colspan='5' class='txcenter'>
                        <i class='fas fa-times'></i>
                        <h5>nenhumma usuario foi encontrado</h5> 
                        </td>
                    </tr>
            <?php }?>     
                </tbody>
                </table>
            </div>
    </div>