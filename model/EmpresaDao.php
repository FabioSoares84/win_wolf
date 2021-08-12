<?php
class EmpresaDao{
    private static $instance;
    function __construct() {
    }
    static public function getInstance(){
        if(!isset(self::$instance))
            self::$instance = new EmpresaDao();
        return self::$instance;
    }

     //CRUD ---------------------------------------------------------------------
    public function m_gravar_empresa(EmpresaBean $empresa) {
        try {
            $sql = "insert into empresa (emp_cnpj,emp_nome,emp_nomeFantasia) values (?,?,?)";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(1, $empresa->getEmp_cnpj());
            $statement_sql->bindvalue(2, $empresa->getEmp_nome());
            $statement_sql->bindvalue(3, $empresa->getEmp_nomeFantasia());
//            $statement_sql->bindvalue(3, $empresa->getEmp_ie());
//            $statement_sql->bindvalue(4, $empresa->getEmp_iest());
//            $statement_sql->bindvalue(5, $empresa->getEmp_im());
//            $statement_sql->bindvalue(6, $empresa->getEmp_cnae());
//            $statement_sql->bindvalue(7, $empresa->getEmp_crt());
            $statement_sql->execute();
            return ConexaoPDO::getInstance()->lastInsertId();
        } catch (PDOException $e) {
            print " Erro em m_gravar_empresa" . $e->getMessage();
        }
    }
    public function m_alterar_empresa(EmpresaBean $empresa) {
        try {
            $sql = "update empresa set emp_cnpj=:emp_cnpj, emp_nome=:emp_nome, emp_nomeFantasia=:emp_nomeFantasia where emp_id=:emp_id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(":emp_cnpj",        $empresa->getEmp_cnpj());
            $statement_sql->bindvalue(":emp_nome",        $empresa->getEmp_nome());
            $statement_sql->bindvalue(":emp_nomeFantasia",$empresa->getEmp_nomeFantasia()); 
//            $statement_sql->bindvalue(":emp_ie",          $empresa->getEmp_ie());
//            $statement_sql->bindvalue(":emp_iest",        $empresa->getEmp_iest());
//            $statement_sql->bindvalue(":emp_im",          $empresa->getEmp_im());
//            $statement_sql->bindvalue(":emp_cnae",        $empresa->getEmp_cnae());
//            $statement_sql->bindvalue(":emp_crt",         $empresa->getEmp_crt());
            $statement_sql->bindvalue(":emp_id",          $empresa->getEmp_id());
            return $statement_sql->execute();
        } catch (PDOException $e) {
            print " Erro em m_alterar_empresa" . $e->getMessage();
        }
    }
    public function m_excluir_empresa($id){
        try {
            $sql = "delete from empresa where emp_id =:id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindValue(":id", $id);
            return $statement_sql->execute();
        } catch (PDOException $e) {
            print "Erro em m_excluir_empresa:".$e->getMessage();
        }
    }
    
    //BUSCA --------------------------------------------------------------------
    public function m_buscar_empresa_por_codigo($codigo){
        try {
            $sql = "select * from empresa where emp_id =:emp_id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(":emp_id", $codigo);
            $statement_sql->execute();
            return $this->m_popula_objeto_empresa($statement_sql->fetch(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            print " Erro em m_buscar_empresa_por_codigo " . $e->getMessage();
        }
    }
    public function m_burcar_todas_empresa() {
        try {
            $sql = "select * from empresa";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->execute();
            return $this->fecht_array($statement_sql);
        } catch (PDOException $e) {
            print " Erro em m_burcar_todas_empresas " . $e->getMessage();
        }
    }
    //--------------------------------------------------------------------------
    public function m_paginacao_empresa($inicio, $registros) {
        try {
            $sql = "select * from empresa LIMIT $inicio, $registros";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->execute();
            return $this->fecht_array($statement_sql);
        } catch (PDOException $e) {
            print " Erro em m_paginacao_empresa " . $e->getMessage();
        }
    }
     
    private function m_popula_objeto_empresa($linha) {
       $empresa = new EmpresaBean();
       $empresa->setEmp_id($linha["emp_id"]);
       $empresa->setEmp_cnpj($linha["emp_cnpj"]);
       $empresa->setEmp_nome($linha["emp_nome"]);
       $empresa->setEmp_nomeFantasia($linha["emp_nomeFantasia"]);
//       $empresa->setEmp_ie($linha["emp_ie"]);
//       $empresa->setEmp_iest($linha["emp_iest"]);
//       $empresa->setEmp_im($linha["emp_im"]);
//       $empresa->setEmp_cnae($linha["emp_cnae"]);
//       $empresa->setEmp_crt($linha["emp_crt"]);
      
       return $empresa;
    }
     
    private function fecht_array($statement_sql) {
        $resultado = array();
        if ($statement_sql) {
            while ($linha = $statement_sql->fetch(PDO::FETCH_OBJ)) {
                $empresa = new EmpresaBean();
                $empresa->setEmp_id($linha->emp_id);
                $empresa->setEmp_cnpj($linha->emp_cnpj);
                $empresa->setEmp_nome($linha->emp_nome);
                $empresa->setEmp_nomeFantasia($linha->emp_nomeFantasia);  
//                $empresa->setEmp_ie($linha->emp_ie);
//                $empresa->setEmp_iest($linha->emp_iest);
//                $empresa->setEmp_im($linha->emp_im);
//                $empresa->setEmp_cnae($linha->emp_cnae);
//                $empresa->setEmp_crt($linha->emp_crt); 
                
                $resultado[] = $empresa;
            }
        }
        return $resultado;
    }
}

?>