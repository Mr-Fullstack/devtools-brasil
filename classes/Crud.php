<?php 
/*
@autor: Marcos Cerqueira;
@data: 26/02/2019;
licenciada pela Devtools Brasil.
*/ 
class Crud{
  // crud posts
    protected static function createPost ( $dados ) {
      $sql=Mysql::conectar()->prepare("INSERT INTO posts(title_post,cod_video,corpo_post,autor_post,instrutor_post,categoria_post,categoria_sec_post,date_post,minutos_video,status_post,id_usuario,event_post) values(?,?,?,?,?,?,?,?,?,?,?,?)");
      if ( $sql->execute( $dados ) )
      {
          return true;
      }
      else
      {
          return false;
      }
    }

    protected static function readPost ( $cond ) {
      $sql=Mysql::conectar()->prepare("SELECT * FROM posts $cond ORDER BY id_post DESC ");
      if( $sql->execute() )
      {
          if ( ($sql->rowCount() ) == 0 )
          {
              $linhas = 0;
              return $linhas;
          }
          else
          {
              $linhas = $sql->fetchAll(PDO::FETCH_OBJ);
              return $linhas; 
          }
      }
      else
      {
          return false;
      }
    }
    
    protected static function valuePost ( $id ) {
      $sql=Mysql::conectar()->prepare("SELECT * FROM posts WHERE id_post=$id");
      if ( $sql->execute() )
      { 
          $linhas = $sql->fetchAll(PDO::FETCH_OBJ);
          return $linhas;       
      }
      else
      {
          return false;
      }
    }


    protected static function listPost ( $dados ) {
      $sql=Mysql::conectar()->prepare("SELECT * FROM posts $dados");
      if ( $sql->execute() ) 
      { 
          if ( ( $sql->rowCount() ) == 0 )
          {
              $linhas = 0;
              return $linhas;
          }
          else
          {
              $linhas = $sql->fetchAll(PDO::FETCH_OBJ);
              return $linhas; 
          }
      }
      else
      {
          return false;
      }
    }

    protected static function updatePost ( $id,$dados ) {
        $sql=Mysql::conectar()->prepare(" UPDATE posts SET title_post=?,cod_video=?,corpo_post=?,autor_post=?,instrutor_post=?,categoria_post=?,categoria_sec_post=?,date_post=?,minutos_video=?,status_post=?, id_usuario=?,event_post=?  WHERE id_post=$id");
      if ( $sql->execute ( $dados ) )
      {
          return true;
      }
      else
      {
          return false;
      }
    }


    protected static function getId ( $coluna,$tabela ) {
      $sql=Mysql::conectar()->prepare("SELECT max($coluna) as max FROM $tabela ");
      if ( $sql->execute ( ) ){
          $linhas=$sql->fetch(PDO::FETCH_OBJ);
          return $linhas->max;
      }
      else
      {
        return false;
      }
    }

    protected static function createEvent ( $nome,$data,$id) {
      $sql=Mysql::conectar()->prepare("CREATE EVENT IF NOT EXISTS $nome ON SCHEDULE AT TIMESTAMP '$data 01:00:00' DO UPDATE posts SET status_post='concluido' WHERE id_post=$id ");
      if ( $sql->execute ( ) )
      {
          return true;
      }
      else
      {
        return false;
      }

    }


    protected static function deletePost ( $id ) {
        $sql=Mysql::conectar()->prepare("DELETE FROM posts WHERE id_post=?");
      if ( $sql->execute ( array ( $id ) ) ) 
      {
          return true;
      }
      else
      {
          return false;
      }
    }

    protected static function agendarPost($id){
      $sql=Mysql::conectar()->prepare("CREATE EVENT WHERE id_post=?");
    if($sql->execute(array($id))){
      return true;
    }else{
      return false;
    }
  }

    // crud categorias
    protected static function createCategoria($nome){
      $sql=Mysql::conectar()->prepare("INSERT INTO categorias(nome_categoria) values(?)");
      if($sql->execute(array($nome))){
        return true;
      }else{
        return false;
      }
    }

    protected static function updateCategoria($id,$nome){
      $sql=Mysql::conectar()->prepare("UPDATE categorias SET nome_categoria=? WHERE id_categoria=$id");
    if($sql->execute(array($nome))){
      var_dump($sql);
      return true;
    }else{
      return false;
    }
  }

    protected static function deleteCategoria($id){
      $sql=Mysql::conectar()->prepare("DELETE FROM categorias WHERE id_categoria=?");
    if($sql->execute(array($id))){
      return true;
    }else{
      return false;
    }
  }


  protected static function listCategoria($dados){
    $sql=Mysql::conectar()->prepare("SELECT * FROM categorias $dados");
    if($sql->execute()){
      if(($sql->rowCount()) == 0){
        $linhas = 0;
        return $linhas;
       }else{
        $linhas = $sql->fetchAll(PDO::FETCH_OBJ);
        return $linhas; 
      } 
    }else{
      return false;
    }
  }

  protected static function valueCategoria($id){
    $sql=Mysql::conectar()->prepare("SELECT * FROM categorias WHERE id_categoria=$id");
    if($sql->execute()){ 
      $linha=$sql->fetch(PDO::FETCH_OBJ);
      return $linha;      
    }else{
      return false;
    }
  }

  protected static function selectCat(){
    $sql=Mysql::conectar()->prepare("SELECT * FROM categorias");
    if($sql->execute()){ 
      $linhas = $sql->fetchAll(PDO::FETCH_OBJ);
      return $linhas;
    }else{
      return false;
    }
  }

  //Crud user administradores do painel
  protected static function createAdmin($dados){
    $sql=Mysql::conectar()->prepare("INSERT INTO tb_admin_usuarios(nome,user,email,senha,cargo) values(?,?,?,?,?)");
    if($sql->execute($dados)){
      return true;
    }else{
      return false;
    }
  }

    protected static function updateAdmin($id,$dados){
      $sql=Mysql::conectar()->prepare(" UPDATE tb_admin_usuarios SET nome=?,user=?,email=?,senha=?  WHERE id_usuario=$id");
    if($sql->execute($dados)){
      return true;
    }else{
      return false;
    }
  }

  protected static function listAdmin($dados){
    $sql=Mysql::conectar()->prepare("SELECT * FROM tb_admin_usuarios $dados");
    if($sql->execute()){
      if(($sql->rowCount()) == 0){
        $linhas = 0;
        return $linhas;
       }else{
        $linhas = $sql->fetchAll(PDO::FETCH_OBJ);
        return $linhas; 
      } 
    }else{
      return false;
    }
  }

  protected static function deleteAdmin($id){
    $sql=Mysql::conectar()->prepare("DELETE FROM tb_admin_usuarios WHERE id_usuario=?");
  if($sql->execute(array($id))){
    return true;
  }else{
    return false;
  }
}

protected static function selectAdmin(){
  $sql=Mysql::conectar()->prepare("SELECT * FROM tb_admin_usuarios");
  if($sql->execute()){ 
   $linhas = $sql->fetchAll(PDO::FETCH_OBJ);         
   return $linhas ;
  }else{
    return false;
  }
}

}
?>