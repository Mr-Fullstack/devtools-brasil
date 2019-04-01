<?php @include("../../config.php");?>
<div class="page"> 
    <div class="cad-form">
    <div class="title-page">
    <i class="fa fa-pen"></i><h1>Adicionar Usuario</h1>
    </div>
        <form  class="form" method="POST" action="<?php echo INCLUDE_PATH_PAINEL?>pages/ajax_user.php">
            <label for="">Nome:</label>
            <input class="w100"type="text" name="nome_usuario" required>
            <label for="">Login:</label>
            <input class="w100"type="text" name="username" required>
            <label for="">Email:</label>
            <input class="w100"type="email" name="email_usuario" required>
            <label for="">Senha:</label>
            <input class="w100"type="password" name="senha_usuario" required>
            <label for="">Tipo:</label>
            <select class="w100" name="tipo">
                <?php
                $tipo = 
                [
                    '0'=> 'normal',
                    '1'=> 'Sub Administrador',
                    '2'=> 'Administrador'
                ];                  
                foreach ( $tipo as $key => $value )
                {
                ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
         <?php  }?>
                
            </select>
            <input type="hidden" name="acao"value="cadastrar">
            <input type="submit"  value="Cadastrar!">
        </form>
    </div>     
</div>