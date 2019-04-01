<?php @include("../../config.php");
$admin = new Admin;
$cat = new Categorias; 

?>
<div class="page"> 
    <div class="cad-form">
    <div class="title-page">
    <i class="fa fa-pen"></i><h1>Adicionar Post</h1>
    </div>
        <form  class="form" method="POST" action="<?php echo INCLUDE_PATH_PAINEL;?>pages/ajax_post.php">
            <label>Título do Post:</label> 
            <input class="w100"type="text" name="title_post" required>
            <label>Código do video Youtube:</label> 
            <input class="w100" type="text" name="cod_video" placeholder="ex: watch?v=(Código)" required>
            <label>Texto do post:</label> 
            <textarea class="w100" name="corpo_post" id="" cols="30" rows="10" required></textarea>
            <label>Autor:</label> 
            <input class="w100" type="text"  name="autor_post"  value="<?php echo $_SESSION [ 'nome' ];?>" required readonly >
            <section class="box">
                <label>Instrutor:</label> 
                <select name="instrutor_post" required>
                <option selected  disabled value="0">Instrutor</option>
        <?php 
        
          $list = $admin->admins( 'select', '' );
           foreach ( $list as $user )
           {
               if( $user->nome != $value->autor_post )
               {
        ?> 
          <option value="<?php echo $user->nome; ?>"><?php echo $user->nome; ?></option>
            <? }
           }?>
                </select>
            <div class="combo_box">
                <section class="box">
                    <label>Categoria Principal:</label>
                    <select name="cat_post" required>
                        <option disabled selected value="0">Categorias</option>
            <?php 
                        $list_cat = $cat->categoria( 'select', '');
                        foreach ( $list_cat as $cat_value )
                        {
            ?>
                        <option value='<?php echo $cat_value->id_categoria; ?>'><?php echo $cat_value->nome_categoria; ?></option> 
                      <?}?>
                    </select>
                </section>
                <section class="box" >
                    <label>Categoria Secundaria:</label>
                    
                    <select name="cat_sec_post" required>
                        <option selected value="0">nenhuma</option>
            <?php 
                        $list_cat = $cat->categoria( 'select', '' );
                        foreach ( $list_cat as $cat_value )
                        {
            ?>
                        <option value='<?php echo $cat_value->id_categoria;?>'><?php echo $cat_value->nome_categoria;?></option> 
                      <?}?>
                    </select>
                </section>    
            </div> <!--combo_box-->
            <div class="combo_box">
                <section class="box">
                    <label>Agendar data:</label> 
                    <input type="date" min="<?php echo getDataNext( DIA, MES, ANO);?>" name="date_post"placeholder="se vazio"> 
                    <span class="obs"> 
                    apenas escolha data se for agendar data a partir de amanhã.
                    </span> 
                </section>
                <section class="box"> 
                    <label>Duração:</label> 
                    <input type="number"  name="minutos_video"placeholder="em minutos" required> 
                </section>
            </div><!--combo_box-->
            <div class="combo_box">
                <section class="box_btn">
                    <input id="submit" type="submit" name="acao" value="Cadastrar!">
                    <input id="submit" type="submit" name="botao" value="Salvar rascunho!">
                </section><!--box-->
            </div><!--combo_box-->
        </form>
    </div> 
</div> <!--home-page--> 