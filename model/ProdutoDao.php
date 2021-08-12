<?php
class ProdutoDao {
    public static $instance;
    public function __construct() {
    }
    static public function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ProdutoDao();
        return self::$instance;
    }

    public function m_gravarProduto(ProdutoBean $produto) {
        try {
            $sql = "insert into produto (prd_EAN13,"
                                     . " prd_nome, prd_precoVenda) values (:prd_EAN13, :prd_nome, :prd_precoVenda)";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindValue(":prd_EAN13",      $produto->getPrd_EAN13());
            $statement_sql->bindValue(":prd_nome",       $produto->getPrd_nome());
            $statement_sql->bindValue(":prd_precoVenda", $produto->getPrd_precoVenda());
     
            return $statement_sql->execute();
        } catch (PDOException $e) {
            print "Erro em m_gravarProduto :: " . $e->getMessage();
        }
    }
    public function m_alterar_produto(ProdutoBean $produto) {
        try {
            $sql = "update produto set prd_EAN13=:prd_EAN13, prd_nome=:prd_nome, prd_precoVenda=:prd_precoVenda where prd_id= :prd_id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindValue(":prd_EAN13",      $produto->getPrd_EAN13());
            $statement_sql->bindValue(":prd_nome",       $produto->getPrd_nome());
            $statement_sql->bindValue(":prd_precoVenda", $produto->getPrd_precoVenda());
            $statement_sql->bindValue(":prd_id",         $produto->getPrd_id());
            return $statement_sql->execute();
        } catch (PDOException $e) {
            print "Erro em m_alterar_produto:" . $e->getMessage();
        }
    }
    

    public function m_excluir_produto($id){
        try {
            $sql = "delete from produto where prd_id =:id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindValue(":id", $id);
            return $statement_sql->execute();
        } catch (PDOException $e) {
            print "Erro em m_excluir_empresa:".$e->getMessage();
        }
    }
    public function m_paginacao_produto($inicio, $registros) {
        try {
            $sql = "select * from produto LIMIT $inicio, $registros";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->execute();
            return $this->fecht_array($statement_sql);
        } catch (PDOException $e) {
            print " Erro em m_paginacao_empresa " . $e->getMessage();
        }
    }
    
    public function m_buscar_todos_produtos(){
        try {
            $sql = "SELECT * FROM PRODUTO";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->execute();
            return $this->fecht_array($statement_sql);
        } catch (PDOException $e) {
            print "Erro em M_buscarTodosProdutos :: " . $e->getMessage();
        }
    }

    

    public function m_buscar_produto_por_codigo($codigo){
        try {
            $sql = "select * from produto where prd_id =:prd_id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(":prd_id", $codigo);
            $statement_sql->execute();
            return $this->m_popula_objeto_produto($statement_sql->fetch(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            print " Erro em m_buscar_produto_por_codigo" . $e->getMessage();
        }
    }
    
    public function pegavaloresproduto($prod) {
        $produto = new ProdutoBean();
        $produto->setPrd_codigo($prod["prd_codigo"]);
        $produto->setPrd_descricao($prod["prd_descricao"]);
        $produto->setPrd_ativo($prod["prd_ativo"]);
        $produto->setPrd_EAN13($prod["prd_EAN13"]);
        $produto->setPrd_custo($prod["prd_custo"]);
        $produto->setPrd_preco($prod["prd_preco"]);
        $produto->setPrd_unmedida($prod["prd_unmedida"]);
        $produto->setPrd_quantidade($prod["prd_quantidade"]);
        $produto->setCat_codigo($prod["cat_codigo"]);
        $produto->setCat_descricao($prod["cat_descricao"]);
        return $produto;
    }

    public function m_excluirProduto(ProdutoBean $produto) {
        try {
            $sql = "delete from produtos where prd_id = :prd_id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindValue(":prd_id", $produto->getPrd_id());
            return $statement_sql->execute();
        } catch (PDOException $e) {
            print "Erro em M_excluirProduto :: " . $e->getMessage();
        }
    }

    
     private function m_popula_objeto_produto($linha) {
       $produto = new ProdutoBean();
       $produto->setPrd_id($linha["prd_id"]);
       $produto->setPrd_EAN13($linha["prd_EAN13"]);
       $produto->setPrd_nome($linha["prd_nome"]);
       $produto->setPrd_precoVenda($linha["prd_precoVenda"]);
       return $produto;
    }
    
    private function fecht_array($statement_sql) {
        $results = array();
        if ($statement_sql) {
            while ($linha = $statement_sql->fetch(PDO::FETCH_OBJ)) {
                $produto = new ProdutoBean();
                $produto->setPrd_id($linha->prd_id);
                $produto->setPrd_EAN13($linha->prd_EAN13);
                $produto->setPrd_nome($linha->prd_nome);
                $produto->setPrd_precoVenda($linha->prd_precoVenda);
                $results[] = $produto;
            }
        }

        return $results;
    }
}
