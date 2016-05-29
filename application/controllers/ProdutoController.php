<?php

class ProdutoController extends Zend_Controller_Action
{

    public function uploadAction()
    {
      $dados = $this->_getAllParams();
      $this->view->id_produto = $dados['id_produto']; 
    }
    
    public function pesquisarAction()
    {
        $modelProduto = new Application_Model_Produto();
		
		$rowSet = $modelProduto->fetchAll();
		$this->view->rowSet = $rowSet; 
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
        $this->view->row = $row;
        $modelTipo = new Application_Model_Tipo();
		$this->view->rowSetTipo = $modelTipo->fetchAll(null, 'nome');
	} 
        
    public function excluirAction()
	{
        $dados = $this->_getAllParams();
		$modelProduto = new Application_Model_Produto();
        
		
		$modelProduto->excluir($dados);
		
		$this->redirect('produto/pesquisar');
		
	}
    
    public function salvarFotoAction()
	{
        $dados = $this->_getAllParams(); 
        $modelFoto = new Application_Model_Foto();

        $modelFoto->gravar($dados);
        
        $this->redirect('produto/pesquisar'); 
		
	}
    
    public function gravarAction()
    {
        $dados = $this->_getAllParams(); 
        $modelProduto = new Application_Model_Produto();

        $id_produto = $modelProduto->gravar($dados);
        
   
        //$row = $modelProduto->fetchRow('id_produto = ' . $dados['id_produto']);

        //$this->view->row = $row;
       

        $this->redirect('produto/upload/id_produto/' . $id_produto);  
    }
   
 }