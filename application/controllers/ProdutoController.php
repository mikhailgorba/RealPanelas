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
        
        $modelLinha = new Application_Model_Linha();
		$this->view->rowSetLinha = $modelLinha->fetchAll(null, 'nome');
        
        $modelTipo = new Application_Model_Tipo();
		$this->view->rowSetTipo = $modelTipo->fetchAll("linha_id_linha = '{$row->linha_id_linha}'", 'nome');
        
	} 
    
    public function carregarTipoAction(){
        
        $this->_helper->layout->disableLayout();
        $dados = $this->_getAllParams();
        $modelTipo = new Application_Model_Tipo();
		$this->view->rowSetTipo = $modelTipo->fetchAll("linha_id_linha ='{$dados['id_linha']}'", 'nome');

    }
        
    public function excluirAction()
	{
        $dados = $this->_getAllParams();
		$modelProduto = new Application_Model_Produto();
        
		
		$modelProduto->excluir($dados);
		
		$this->redirect('produto/pesquisar');
		
	}
    
    public function salvarAction() //salvar foto
	{
        $dados = $this->_getAllParams(); 
        $modelFoto = new Application_Model_Foto();
        $produto_id_produto = $dados['produto_id_produto'];

        $modelFoto->gravar($dados);
        
        $foto = $this->uploadFoto($produto_id_produto);
        
        $dadosUpdate['nome'] = $foto;
        $modelFoto->update($dadosUpdate, "produto_id_produto = $produto_id_produto");

        $this->redirect('produto/pesquisar'); 
		
	}
    
    public function gravarAction()
    {
        $dados = $this->_getAllParams(); 
        $modelProduto = new Application_Model_Produto();

        $id_produto = $modelProduto->gravar($dados);
        
        $this->redirect('produto/upload/id_produto/' . $id_produto);  
    }
    
    public function uploadFoto($produto_id_produto)
	{
        if(isset($_FILES['foto'])&& $_FILES['foto']['error'] == 0){
        
            $origem = $_FILES['foto']['tmp_name'];
            $extensao = substr($_FILES['foto']['name'], strrpos($_FILES['foto']['name'], '.'));
            $nome = $_FILES['foto']['name'];
            $destino = 'img/fotos/foto_' .$nome. '_id_'.$produto_id_produto . '_id_' . $extensao;
            
            move_uploaded_file($origem, $destino);
            return $id_produto . $extensao;
        }
	}
   
 }