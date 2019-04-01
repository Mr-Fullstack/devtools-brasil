<?php 
/*
@autor: Marcos Cerqueira;
@data: 26/02/2019;

licenciada para uso por Devtools Brasil.
*/ 
class Categorias extends Crud{
    private static $IdCategoria;
    private static $nome;
    private static $acao;

    public static function categoria ( $acao,$nome ) {
      if ( $acao == 'create' )
      {
          parent::createCategoria( $nome );
          return true;
      }
      else if ( $acao == 'read' )
      {
        //caso não tenha um nome que no caso do read será um condição envia um paramêtro vazio ex:$user->categoria('read',''); caso tenha $user->categoria('read','WHERE....');
          parent::readCategoria( $nome );
          return true;
      }
      else if ( $acao == 'select' )
      {
      //caso não tenha um nome que no caso do read será um condição envia um paramêtro vazio ex:$user->categoria('read',''); caso tenha $user->categoria('read','WHERE....');
          return parent::selectCat();
      #echo 'categorias lido com sucesso!';
      }
      else if ( $acao == 'update' )
      {
          if ( self::$IdCategoria === null )
          {
              echo' por favor insira o id da categoria que deseja atulizar';
              return false;      
          }
          else
          {
              parent::updateCategoria( self::$IdCategoria,$nome );
              echo 'categoria atualizada com sucesso!';
          }
          return true;
      }
      else if ( $acao == 'delete' )
      {
          if ( self::$IdCategoria === null )
          {
              echo' por favor insira o id da categoria que deseja deletar';
              return false;      
          }
          else
          {
              parent::deleteCategoria( self::$IdCategoria );
        #echo 'categoria deletada com sucesso!';
              return true;
          }
        
      }
      else if ( $acao == 'listCategoria' )
      {
      //caso não tenha um nome que no caso do read será um condição envia um paramêtro vazio ex:$user->categoria('read',''); caso tenha $user->categoria('read','WHERE....');
          return parent::listCategoria( $nome );
      //echo 'categorias lido com sucesso!';
      }
      else if ( $acao == 'values' )
      {
    //caso não tenha uma data que no caso do read será um condição envia um paramêtro vazio ex:$user->posts('read',''); caso tenha $user->posts('read','WHERE....');
        if ( self::$IdCategoria === null )
        {
        //echo' por favor insira o id  do post que deseja atulizar';
            return false;      
        }
        else
        {
            return parent::valueCategoria( self::$IdCategoria );
          // echo 'post atualizado com sucesso!';  
        }
      }
    else
    {
        echo 'não foi possivel executar ação pois a mesma é invalida';
        return false;
    }

  }
    public static function setId( $IdCategoria ){
        self::$IdCategoria=$IdCategoria;

    }

}



?>