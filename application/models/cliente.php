<?php
class Application_Model_Cliente extends Zend_Db_Table
{
    protected $_name   = 'cliente';
    
    public function gravar($dados)
    {
    	// Se tiver o id vai alterar, se não tiver, insere
    	if(!empty($dados['id_clientes'])){
	    	// Resgatando registro no banco pelo ID
    		$row = $this->fetchRow('id_clientes = ' . $dados['id_clientes']);
    	} else {
	    	// Criando linha vazia
	    	$row = $this->createRow();
    	}
    	
    	// Setando valores na linha
    	$row->setFromArray($dados);
    	
    	// Salvando no banco de dados
    	return $row->save();
    }
    
    public function excluir($dados)
    {
    	$this->delete('id_clientes = ' . $dados['id_clientes']);
    }
}
