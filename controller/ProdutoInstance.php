<?php
class ProdutoInstance {
    function __construct() {
    }

    public function c_gravarProduto() {
        $produto = new ProdutoBean();
        $produto->setPrd_EAN13($_POST["prd_EAN13"]);
        $produto->setPrd_nome($_POST["prd_nome"]);
        $produto->setPrd_precoVenda($_POST["prd_precoVenda"]);
        ProdutoDao::getInstance()->m_gravarProduto($produto);
    }
    public function c_alterar_produto() {
        $produto = new ProdutoBean();
        $produto->setPrd_id($_POS["prd_id"]);
        $produto->setPrd_EAN13($_POST["prd_EAN13"]);
        $produto->setPrd_nome($_POST["prd_nome"]);
        $produto->setPrd_precoVenda($_POST["prd_precoVenda"]);
        
        return ProdutoDao::getInstance()->m_alterar_produto($produto);
    }

    public function c_excluir_produto() {
        return ProdutoDao::getInstance()->m_excluir_produto($_GET["id"]);
    }
    
    public function c_excluirProduto() {
        $produto = new ProdutoBean();
        $produto->setPrd_codigo($_GET["prd_codigo"]);
        return ProdutoDao::getInstance()->m_excluirProduto($produto);
    }
    
    public function c_buscar_todos_produtos() {
        return ProdutoDao::getInstance()->m_buscar_todos_produtos();
    }

    public function c_buscaProdutoPorCodigo() {
        $produto = new ProdutoBean();
        $produto->setPrd_codigo($_GET["prd_codigo"]);
        return ProdutoDao::getInstance()->m_buscaProdutoPorCodigo($produto);
    }
    
     public function c_busca_produto_por_codigo($codigo) {
        return ProdutoDao::getInstance()->m_buscar_produto_por_codigo($codigo);
    }

    

    public function c_paginacao_produto($inicio, $registros) {
        return ProdutoDao::getInstance()->m_paginacao_produto($inicio, $registros);
    }
}
