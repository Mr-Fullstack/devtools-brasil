<?php 
/*
@autor: Marcos Cerqueira;
@data: 26/02/2019;

licenciada pela Devtools Brasil.
*/ 

class Comentarios{

    private static $data;

    public static function comentar ( $data ) {
        $sql=Mysql::conectar()->prepare( " INSERT INTO comentarios(id_post,nome,email,comentario) values (?,?,?,?) " );
        if ( $sql->execute( $data ) )
        {
            echo 'comentário feito com sucesso';
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function pegarComentario ( $id ) {
      $sql=Mysql::conectar()->prepare( " SELECT * FROM comentarios WHERE id_post = $id " );
      if ( $sql->execute() ) 
      {
          $linhas = $sql->fetchAll( PDO::FETCH_OBJ );
          return $linhas;
      }
      else
      {
          return false;
      }
  }

}



?>