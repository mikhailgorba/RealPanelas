<?php 

class Application_Model_Linha extends Zend_Db_Table
{
    protected $_name = 'linha';
    
    public function gravar($dados)
    {
        
        //Se tiver o id vai alterar, senão tiver, insere
        if(!empty($dados['id_linha'])) {
            
            // Resgatando refistro no banco pelo ID
            $row = $this->fetchRow('id_linha=' .$dados['id_linha']);
        
        }else {

             $row = $this->createRow(); //criando linha vazia
        }
       
        $row->setFromArray($dados); //seta valores na linha
        $row->save(); //salvando no banco de dados (salva a operação feita acima)
    }
    
    public function excluir($dados)
    {
    
        $row = $this->fetchRow('id_linha=' .$dados['id_linha']);
        $row->delete();
        
    }
}