<?php

class ClienteController extends Zend_Controller_Action
{

    public function formularioAction()
   {
        $dados = $this->_getAllParams();
		
		$modelCliente = new Application_Model_Cliente();
		
		if(!empty($dados['id_clientes'])){
			$row = $modelCliente->fetchRow('id_clientes = ' . $dados['id_clientes']);
		} else {
			$row = $modelCliente->createRow();
		}
		
		$this->view->row = $row;
	}

    public function listarAction()
    {
        $modelCliente = new Application_Model_Cliente();
		
		$rowSet = $modelCliente->fetchAll();
		$this->view->rowSet = $rowSet; 
    }
    
    public function gravarAction()
    {
       $dados = $this->_getAllParams(); 
        
       $modelCliente = new Application_Model_Cliente();
        
        $modelCliente->gravar($dados);
        
        $this->redirect('cliente/listar');
        
    }

    public function excluirAction()
	{
        $dados = $this->_getAllParams();
		$modelCliente = new Application_Model_Cliente();
		
		$modelCliente->excluir($dados);
		
		$this->redirect('cliente/listar');
		
	}
}

