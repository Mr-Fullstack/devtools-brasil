<?php 

class Admin extends Crud {

    private  $id;
    private  $data;
    private  $acao;
    
    public function admins($acao,$dados){

        switch ($acao){
            case 'create':
            parent::createAdmin($dados);
            return true;
            break;
            case 'read':
            parent::readAdmin($dados);
            return true;
            break;

            case 'update':
            parent::updateAdmin($this->id,$dados);
            return true;
            break;

            case 'listUsers':
            return parent::listAdmin($dados);
            break;

            case 'delete':
            parent::deleteAdmin($this->id);
            return true;
            break;

            case 'select':
            return parent::selectAdmin($this->id);
            break;
        }
    }

    public function setId($id){
        $this->id=$id;
    }
}

?>