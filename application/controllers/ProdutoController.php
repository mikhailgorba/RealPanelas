<?php

class ProdutoController extends Zend_Controller_Action
{

    public function pesquisarAction()
    {
     
    }

    public function formularioAction()
    {
        
    }
    
    public function excluirAction()
	{
        $dados = $this->_getAllParams();
		$modelProduto = new Application_Model_Produto();
		
		$modelProduto->excluir($dados);
		
		$this->redirect('produto/listar');
		
	}
    
    public function gravarAction()
    {
      $dados = $this->_getAllParams();
        $modelProduto = new Application_Model_Produto();
        

        $modelProduto->gravar($dados);
        
        $this->redirect('produto/listar');  
    }

}

