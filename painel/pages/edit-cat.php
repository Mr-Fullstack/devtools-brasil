<?php 

$blog= new Categorias ;
$blog->setId($id);
?>
<div class="title-page">
    <i class="fa fa-pen"></i><h1>Editar categoria</h1>
 </div>
        <form  class="edit-form" method="POST" action="<?php echo INCLUDE_PATH_PAINEL;?>pages/ajax_categoria.php?id=<?php echo $id ?>">
        <?php 
        $cats=$blog->categoria('values',$id);
        ?>
            <label>nome da categoria:</label> 
            <input class='w100'type='text' name='nome_categoria' required value='<?php echo $cats->nome_categoria; ?>'>
            <div class="combo-box">
            <input type="hidden" name="acao" value="edit-cat" >
            <input id="submit"type="submit" name="editar" value="Atualizar!">
            <span><a href="<?php echo INCLUDE_PATH_PAINEL?>cad-categoria">cancelar</a></span>
            </div>
        </form> 
