<?php 

$admin = new Admin; 
$cat = new Categorias; 
$blog->setId( $id );
$linhas=$blog->posts( 'values',$id );
foreach ( $linhas as $value )
{

?>
    <div class="title-page">
        <i class="fa fa-pen"></i><h1>Editar Post</h1>
    </div>
    <form  class="edit-form" method="POST" action="<?php echo INCLUDE_PATH_PAINEL?>pages/ajax_post.php?id=<?php echo $id ?>&event=<?php echo $value->event_post?>&user_post=<?php echo $value->id_usuario?>">
        <?php 
       
        ?>
        <label>Título do Post:</label> 
        <input type='text' name='title_post' required value='<?php echo $value->title_post; ?>'>
        <label>Código do video Youtube:</label> 
        <input type='text' name='cod_video' value='<?php echo $value->cod_video; ?>' placeholder='ex: watch?v=(Código)' required>
        <label>Texto do post:</label> 
        <textarea name='corpo_post' cols='30' rows='10' required><?php echo $value->corpo_post; ?> </textarea>
        <label>Autor:</label> 
        <input readonly type='text' name='autor_post' value='<?php echo $value->autor_post; ?>' required>
        <label>Instrutor:</label> 
        <select name='instrutor_post' required>";
        <option selected value="<?php echo $value->instrutor_post?>"><?php echo $value->instrutor_post; ?></option>
<?php 
}  
        $list = $admin->admins( 'select', '' );
        foreach ( $list as $user ){
            if( $user->nome != $value->autor_post):
        ?> 
        <option value="<?php echo $user->nome; ?>"><?php echo $user->nome; ?></option>

        <? endif; }?>

        </select>
            </section>
            <section class='box'> 
        <div class='combo_box'>
            <section class='box'>
                <label>Categoria Principal:</label>
                <select name='cat_post' required>
                    <option selected value='<?php echo $value->categoria_post; ?>'><?php echo $value->categoria_post; ?></option>   
        <?php 

            $list_cat= $cat->categoria( 'select', '');
            foreach ( $list_cat as $cat_value )
            {
            ?>
                    <option value='<?php echo $cat_value->nome_categoria;?>'><?php echo $cat_value->nome_categoria; ?></option> 
            <?}?>
                </select>
            </section>
            <section class='box'>
                <label>Categoria Secundaria:</label>
                <select name='cat_sec_post' required>
                    <option selected value='<?php echo $value->categoria_sec_post; ?>'><?php echo $value->categoria_sec_post; ?></option>
            <?php      
            foreach ($list_cat as $cat_value){
            ?>
                    <option value='<?php echo $cat_value->nome_categoria; ?>'><?php echo $cat_value->nome_categoria; ?></option> 
            <?}?>
                </select>
            </section>    
        </div> <!--combo_box-->
        <div class='combo_box'>
            <section class='box'>
                <label>Agendar data:</label>
    <?php  if ( $value->status_post != 'aguardando' ): ?> 

                <input type='date' min='<?php echo getDataNext( DIA, MES, ANO);?>' name='date_post' value='<?php echo $value->date_post; ?>' >
                <span class="obs"> 
                selecione apenas se for agendar uma data.
                </span>

     <?php else: ?>  
                <input type="hidden" name="date_post" value='<?php echo $value->date_post; ?>'> 
                <span class="obs">
                post agendado para <?=$value->date_post?><br> 
                a data agendada só podera ser alterada depois que o post estiver concluido.
                </span>

     <?php endif; ?> 

            </section>
            <section class='box'> 
                <label>Duração:</label> 
                <input type='number'  name='minutos_video' value='<?php echo $value->minutos_video;?>' placeholder='em minutos' required> 
            </section>
        </div><!--combo_box-->
            <input type="hidden" name="acao" value="edit-post" >
            <div class="combo-box">
            <input id="submit"type="submit" name="botao" value="Atualizar!">
<?php  if ( $value->status_post != 'aguardando' ) 
       {?> 
            <input id="submit" type="submit" name="botao" value="Salvar rascunho!">
<?php  } ?> 
            <span><a href="<?php echo INCLUDE_PATH_PAINEL?>list-posts">cancelar</a></span>
        </div>             
    </form> 
