<?php

class ClienteController extends Zend_Controller_Action
{

    public function formularioAction()
    {                                  
      
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
        
        $this->redirect('cliente/formulario');
        
    }

}

