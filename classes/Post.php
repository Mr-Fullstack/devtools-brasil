<?php 
/*
@autor: Marcos Cerqueira;
@data: 26/02/2019;
licenciada pela Devtools Brasil.

classe responsável pela criação leitura atualização e exclusão de postagem do blog.
*/
class Post extends Crud{
    private  $id;
    private  $data;
    private  $acao;
    
    public function posts ( $acao,$dados ) {
            if ( $acao =='create' )
            {
                parent::createPost( $dados );
                return true;
            }
            else if( $acao =='read' )
            {
                //caso não tenha uma data que no caso do read será um condição envia um paramêtro vazio ex:$user->posts('read',''); caso tenha $user->posts('read','WHERE....');
                return parent::readPost( $dados );
                //echo 'post lido com sucesso!';
            }
            else if( $acao =='values' )
            {
                //caso não tenha uma data que no caso do read será um condição envia um paramêtro vazio ex:$user->posts('read',''); caso tenha $user->posts('read','WHERE....');
                if ( $this->id === null )
                {
                    //echo' por favor insira o id  do post que deseja atulizar';
                    return false;      
                }
                else
                {
                    return parent::valuePost( $this->id );
                   // echo 'post atualizado com sucesso!';
                 }
            }
            else if ( $acao =='update' )
            {
                if ( $this->id === null )
                {
                    //echo' por favor insira o id  do post que deseja atulizar';
                    return false;      
                }
                else
                {
                    parent::updatePost($this->id,$dados);
                   // echo 'post atualizado com sucesso!';
                    return true;
                 }  
            }
            else if ( $acao =='delete' )
            {
                if ( $this->id === null )
                {
                    //echo' por favor insira o id do post que deseja deletar';
                    return false;      
                }
                else
                {
                    parent::deletePost( $this->id );
                //echo 'post deletado com sucesso!';
                    return true;
                }           
            }
            else if ( $acao =='listPost' )
            {
                //caso não tenha uma data que no caso do read será um condição envia um paramêtro vazio ex:$user->posts('read',''); caso tenha $user->posts('read','WHERE....');
                return parent::listPost( $dados );

            }
            else{
                //echo 'não foi possivel executar ação pois a mesma é invalida';
                return false;
            }
    }

    public function setId ( $id ) {
        $this->id=$id;
    }

    public function getLastId ( $coluna,$tabela ) {
        return parent::getId ( $coluna,$tabela );
    }

    public function agendar ( $title_post, $date_post, $idPost ) {

        return parent::createEvent( $title_post, $date_post, $idPost );
    }
}
?>