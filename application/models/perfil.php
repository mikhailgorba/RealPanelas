<?php 

class Application_Model_Perfil extends Zend_Db_Table
{
    protected $_name = 'perfil';
    
    public function gravar($dados)
    {
        
        //Se tiver o id vai alterar, senão tiver, insere
        if(!empty($dados['id_perfil'])) {
            
            // Resgatando refistro no banco pelo ID
            $row = $this->fetchRow('id_perfil=' .$dados['id_perfil']);
        
        }else {

             $row = $this->createRow(); //criando linha vazia
        }
       
        $row->setFromArray($dados); //seta valores na linha
        $row->save(); //salvando no banco de dados (salva a operação feita acima)
    }
    
    public function excluir($dados)
    {
    
        $row = $this->fetchRow('id_perfil=' .$dados['id_perfil']);
        $row->delete();
        
    }
}