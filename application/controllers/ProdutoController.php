<?php

class ProdutoController extends Zend_Controller_Action
{

    public function pesquisarAction()
    {
     
    }

    public function formularioAction()
    {
        
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
        

        $modelProduto->gravar($dados);
        
        $this->redirect('produto/pesquisar');  
    }

}

