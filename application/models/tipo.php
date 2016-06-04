<?php 

class Application_Model_Tipo extends Zend_Db_Table
{
    protected $_name = 'tipo';
    
    public function gravar($dados)
    {
        
        //Se tiver o id vai alterar, senão tiver, insere
        if(!empty($dados['id_tipo'])) {
            
            // Resgatando refistro no banco pelo ID
            $row = $this->fetchRow('id_tipo=' .$dados['id_tipo']);
        
        }else {

             $row = $this->createRow(); //criando linha vazia
        }
       
        $row->setFromArray($dados); //seta valores na linha
        $row->save(); //salvando no banco de dados (salva a operação feita acima)
    }
    
    public function excluir($dados)
    {
    
        $row = $this->fetchRow('id_tipo=' .$dados['id_tipo']);
        $row->delete();
        
    }
}


