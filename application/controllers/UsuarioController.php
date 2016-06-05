<?php

class UsuarioController extends Zend_Controller_Action
{
	public function indexAction()
	{
		
	}
	
    
     public function listarAction()
    {
        $modelUsuario = new Application_Model_Usuario();
		
		$rowSet = $modelUsuario->fetchAll();
		$this->view->rowSet = $rowSet; 
    }
    
	public function formularioAction()
	{
        $dados = $this->_getAllParams();
		
		$modelUsuario = new Application_Model_Usuario();
		
		if(!empty($dados['id_usuario'])){
			$row = $modelUsuario->fetchRow('id_usuario = ' . $dados['id_usuario']);
		} else {
			$row = $modelUsuario->createRow();
		}
		
		$this->view->row = $row;
	}
	
	public function gravarAction()
	{
		$dados = $this->_getAllParams();
        $modelUsuario = new Application_Model_Usuario();
        

        $modelUsuario->gravar($dados);
        
        $this->redirect('usuario/listar');
        
	}
    
     public function autenticarAction()
	{
         //session_start();
		 $dados = $this->_getAllParams();
       
         $email = $dados ["email"];
         $senha = $dados ["senha"];
     //    $senha = md5($dados ["senha"]);
       
         $modelUsuario = new Application_Model_Usuario();
         $rowUsuario = $modelUsuario->fetchRow("email = '$email' and senha = '$senha'"); 
         
         if($rowUsuario){
             $_SESSION['id_usuario'] = $rowUsuario ['id_usuario'];
             $_SESSION['nome'] = $rowUsuario ['nome'];
          //   $_SESSION['id_perfil'] = $rowUsuario ['id_perfil'];
             
             $_SESSION['mensagem'] = 'Usuario logado com sucesso!';
             $this->redirect('usuario/listar');
          }else{
             $_SESSION['mensagem'] = 'E-mail ou Senha Invalidos!';
             $this->redirect('usuario/login');
             
         }
    
     }
    
    public function uploadFoto($id_usuario)
	{
       
	}
	
	public function excluirAction()
	{
        $dados = $this->_getAllParams();
		$modelUsuario = new Application_Model_Usuario();
		
		$modelUsuario->excluir($dados);
		
		$this->redirect('usuario/listar');
		
	}
    
    public function carregarMunicipioAction(){
        
       

    }
    
    public function loginAction(){
        
       

    }
    
    
    
    public function pesquisarAction(){
        
       $modelUsuario = new Application_Model_Usuario();
		
		$rowSet = $modelUsuario->fetchAll();
		$this->view->rowSet = $rowSet; 
    }
}

