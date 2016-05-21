<?php

class ClienteController extends Zend_Controller_Action
{

    public function formularioAction()
    {                                  
      
    }

    public function listarAction()
    {
       
    }
    
    public function gravarAction()
    {
       $dados = $this->_getAllParams(); 
        
       $modelCliente = new Application_Model_Cliente();
        
        $modelCliente->gravar($dados);
        
    }

}

