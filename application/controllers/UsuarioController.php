<?php

class UsuarioController extends Zend_Controller_Action
{
	public function indexAction()
	{
		
	}
	
	public function formularioAction()
	{
		
	}
	
	public function gravarAction()
	{
		$dados = $this->_getAllParams();
        $modelUsuario = new Application_Model_Usuario();
        
        $modelUsuario->gravar($dados);
        
        $this->redirect('usuario/listagem');
	}
    
    public function uploadFoto($id_usuario)
	{
       
	}
	
	public function excluirAction()
	{
		
	}
    
    public function carregarMunicipioAction(){
        
       

    }
    
    public function loginAction(){
        
       

    }
    
     public function autenticarAction(){
        
         
    }
    
    public function listagemAction(){
        
       $modelUsuario = new Application_Model_Usuario();
		
		$rowSet = $modelUsuario->fetchAll();
		$this->view->rowSet = $rowSet; 
    }
}

