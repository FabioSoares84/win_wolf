<?php
class UsuarioDao{
    private static $instance;
    function __construct() {
    }
    static public function getInstance(){
        if(!isset(self::$instance))
            self::$instance = new UsuarioDao();
        return self::$instance;
    }
    //CRUD ---------------------------------------------------------------------
    public function m_gravar_usuario(UsuarioBean $usuario) {
        try {
            $sql = "insert into usuario (usu_nome,usu_cpf,usu_celular,usu_email,usu_senha,usu_nivel) values (?,?,?,?,?,?)";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(1, $usuario->getUsu_nome());
            $statement_sql->bindvalue(2, $usuario->getUsu_cpf());
            $statement_sql->bindvalue(3, $usuario->getUsu_celular());
            $statement_sql->bindvalue(4, $usuario->getUsu_email());
            $statement_sql->bindvalue(5, $usuario->getUsu_senha());
            $statement_sql->bindvalue(6, $usuario->getUsu_nivel());
            $statement_sql->execute();
            return ConexaoPDO::getInstance()->lastInsertId();
        } catch (PDOException $e) {
            print " Erro em m_gravar_usuario " . $e->getMessage();
        }
    }
    public function m_alterar_usuario(UsuarioBean $usuario) {
        try {
            $sql = "update usuario set usu_nome=:usu_nome, usu_email=:usu_email, usu_celular=:usu_celular, usu_cpf=:usu_cpf, usu_senha=:usu_senha, usu_nivel=:usu_nivel where usu_id=:usu_id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(":usu_nome",    $usuario->getUsu_nome());
            $statement_sql->bindvalue(":usu_email",   $usuario->getUsu_email()); 
            $statement_sql->bindvalue(":usu_celular", $usuario->getUsu_celular());
            $statement_sql->bindvalue(":usu_cpf",     $usuario->getUsu_cpf());
            $statement_sql->bindvalue(":usu_senha",   $usuario->getUsu_senha());
            $statement_sql->bindvalue(":usu_nivel",   $usuario->getUsu_nivel());
            $statement_sql->bindvalue(":usu_id",      $usuario->getUsu_id());
            return $statement_sql->execute();
            $statement_sql->debugDumpParams();
        } catch (PDOException $e) {
            print " Erro em m_alterar_usuario" . $e->getMessage();
        }
    }
    public function m_excluir_usuario($id){
        try {
            $sql = "delete from usuario where usu_id =:id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindValue(":id", $id);
            return $statement_sql->execute();
        } catch (PDOException $e) {
            print "Erro em m_excluir_usuario:".$e->getMessage();
        }
    }
    //BUSCAR -------------------------------------------------------------------
    public function m_acesso_pagina_web(UsuarioBean $usuario){
        try {
              $sql = "select * from usuario where email = :email and senha = :senha ";
              
              $statement_sql = ConexaoPDO::getInstance()->prepare($sql);        
              $statement_sql->bindvalue(":email", $usuario->getEmail());
              $statement_sql->bindvalue(":senha", $usuario->getSenha());         
              $statement_sql->execute();

            return $this->m_popula_objeto_usuario($statement_sql->fetch(PDO::FETCH_ASSOC));
                      
        } catch (PDOException $e) {
           print "Erro em m_acesso_pagina_web" .$e->getMessage();
        }
            
    }
    
    public function m_burcar_todos_usuario() {
        try {
            $sql = "select usu_id, usu_nome, usu_email, usu_celular, usu_cpf, usu_senha, usu_nivel from usuario";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->execute();
            return $this->fecht_array($statement_sql);
        } catch (PDOException $e) {
            print " Erro em m_burcar_todos_os_usuario " . $e->getMessage();
        }
    }
    
    public function m_buscar_email_duplicado($email){
        try {
            $sql = "select id, nome, email, celular, cpf, senha, nivel from usuario where email = :email";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(":email", $email);
            $statement_sql->execute();
            return $this->m_popula_objeto_usuario($statement_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print " Erro em m_buscar_email_duplicado " . $e->getMessage();
        }
    }

    public function m_buscar_usuario_por_codigo($codigo){
        try {
            $sql = "select usu_id, usu_nome, usu_email,usu_celular, usu_cpf, usu_senha, usu_nivel from usuario where usu_id = :usu_id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(":usu_id", $codigo);
            $statement_sql->execute();
            return $this->m_popula_objeto_usuario($statement_sql->fetch(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            print " Erro em m_buscar_usuario_por_codigo " . $e->getMessage();
        }
    }
    
    public function m_buscar_usuario_consultor() {
         try {
            $sql = "select id, nome, email, celular, cpf, senha, nivel from usuario where nivel='CONSULTOR'";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->execute();
            return $this->fecht_array($statement_sql);
        } catch (PDOException $e) {
            print " Erro em m_burcar_usuario_consultor " . $e->getMessage();
        }
    }
    
    public function m_buscar_registro_por_usuario_senha(UsuarioBean $usuario) {
        try {
            $sql = "select * from usuario where usu_email =:usu_email and usu_senha =:usu_senha";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(":usu_email", $usuario->getUsu_email());
            $statement_sql->bindvalue(":usu_senha", $usuario->getUsu_senha());
            $statement_sql->execute();
            return $this->m_popula_objeto_usuario($statement_sql->fetch(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            print " Erro em m_buscar_registro_por_usuario_senha" . $e->getMessage();
        }
    }
    
    public function m_paginacao_usuario($inicio, $registros) {
        try {
            $sql = "select usu_id, usu_nome, usu_email, usu_celular, usu_cpf, usu_senha, usu_nivel from usuario LIMIT $inicio, $registros";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->execute();
            return $this->fecht_array($statement_sql);
        } catch (PDOException $e) {
            print " Erro em m_paginacao_usuario " . $e->getMessage();
        }
    }
    
    private function m_popula_objeto_usuario($linha) {
       $usuario = new UsuarioBean();
       $usuario->setUsu_id($linha["usu_id"]);
       $usuario->setUsu_nome($linha["usu_nome"]);
       $usuario->setUsu_email($linha["usu_email"]);
       $usuario->setUsu_celular($linha["usu_celular"]);
       $usuario->setUsu_cpf($linha["usu_cpf"]);
       $usuario->setUsu_senha($linha["usu_senha"]);
       $usuario->setUsu_nivel($linha["usu_nivel"]);
       return $usuario;
    }
    
    private function fecht_array($statement_sql) {
        $resultado = array();
        if ($statement_sql) {
            while ($linha = $statement_sql->fetch(PDO::FETCH_OBJ)) {
                $usuario = new UsuarioBean();
                $usuario->setUsu_id($linha->usu_id);
                $usuario->setUsu_nome($linha->usu_nome);
                $usuario->setUsu_email($linha->usu_email);  
                $usuario->setUsu_celular($linha->usu_celular); 
                $usuario->setUsu_cpf($linha->usu_cpf);
                $usuario->setUsu_senha($linha->usu_senha);
                $usuario->setUsu_nivel($linha->usu_nivel);
                $resultado[] = $usuario;
            }
        }
        return $resultado;
    }
}
?>