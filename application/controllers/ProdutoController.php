<?php

class ProdutoController extends Zend_Controller_Action
{

    public function upLoadAction()
    {
     
    }
    
    public function pesquisarAction()
    {
     
    }

           public function formularioAction()
   {
        $dados = $this->_getAllParams();
		
		$modelProduto = new Application_Model_Produto();
		
		if(!empty($dados['id_produto'])){
			$row = $modelProduto->fetchRow('id_produto = ' . $dados['id_produto']);
		} else {
			$row = $modelProduto->createRow();
    }
    
    public function listarAction(){
        
       $modelProduto = new Application_Model_Produto();
		
		$rowSet = $modelProduto->fetchAll();
		$this->view->rowSet = $rowSet; 
    }
    
    public function excluirAction()
	{
        $dados = $this->_getAllParams();
		$modelProduto = new Application_Model_Produto();
        
		
		$modelProduto->excluir($dados);
		
		$this->redirect('produto/pesquisar');
		
	}
    
    public function gravarAction()
    {
        $dados = $this->_getAllParams(); 
        $modelProduto = new Application_Model_Produto();
        $modelFoto = new Application_Model_Foto();

        $modelProduto->gravar($dados);
                    
        $modelFoto->gravar($dados);
        
        $this->redirect('produto/pesquisar');  
    }

}
_______________________________________
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
 