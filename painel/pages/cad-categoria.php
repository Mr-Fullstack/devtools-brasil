<?php 
@include_once('../../config.php');
?> 
<div class="page"> 
    <div class="cad-form">
    <div class="title-page">
    <i class="fa fa-pen"></i><h1>Cadastrar Categoria</h1>
    </div>
        <form  class="form" method="POST" action="<?php echo INCLUDE_PATH_PAINEL?>pages/ajax_categoria.php">
            <label>nome:</label> 
            <input type="text" name="nome_categoria" required>   
            <input type="hidden" name="acao" value="cad-categoria" >
            <input id="submit"type="submit" name="cadastrar" value="Cadastrar!">
        </form>
    </div>
       
    <div class='table'>
            <table class='table-data'>
                <thead class='thead'> 
                    <tr>
                    <td>nome</td>
                    <td colspan='2'class='txcenter'>ação</td>
                    </tr>
                </thead>
                <tbody>     
                    <?php
                    $blog= new Categorias;
                    $linhas=$blog->categoria('listCategoria','');
                    if ( $linhas != 0 ) 
                    {
                        foreach ( $linhas as $row )
                        {
                    ?>        
                    <tr> 
                        <td><?=$row->nome_categoria?></td>
                        <td class='txcenter'>
                        <a href='cad-categoria?page=edit-cat&acao=editar-cat&id=<?php echo $row->id_categoria; ?>'>editar</a></td>
                        <td class='txcenter'>
                        <a href='cad-categoria?acao=excluir-cat&id=<?php echo $row->id_categoria; ?>'>excluir</a>
                        </td>
                    </tr>
                    <?}
                    }
                    else
                    {?>
                        <tr>
                        <td colspan='4' class='txcenter'>
                        <i class='fas fa-times'></i>
                        <h5>nenhumma categoria foi encontrada</h5> 
                        </td>
                        </tr>
                  <?}?>
                </tbody>
                </table>
            </div>
</div> <!--home-page--> 