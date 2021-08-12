<?php
class UsuarioInstance{
    function __construct() {
    }
    //CRUD----------------------------------------------------------------------
    public function c_gravar_usuario() {
        $usuario = new UsuarioBean();
        $usuario->setUsu_nome($_POST["usu_nome"]); 
        $usuario->setUsu_email($_POST["usu_email"]);
        $usuario->setUsu_celular($_POST["usu_celular"]);
        $usuario->setUsu_cpf($_POST["usu_cpf"]);
        $usuario->setUsu_senha($_POST["usu_senha"]);
        $usuario->setUsu_nivel($_POST["usu_nivel"]);
        return UsuarioDao::getInstance()->m_gravar_usuario($usuario);
    }
    
    public function c_alterar_usuario() {
        $usuario = new UsuarioBean();
        $usuario->setUsu_id($_POST["usu_id"]);
        $usuario->setUsu_nome($_POST["usu_nome"]);
        $usuario->setUsu_email($_POST["usu_email"]);
        $usuario->setUsu_celular($_POST["usu_celular"]);
        $usuario->setUsu_cpf($_POST["usu_cpf"]); 
        $usuario->setUsu_senha($_POST["usu_senha"]);
        $usuario->setUsu_nivel($_POST["usu_nivel"]);
        return UsuarioDao::getInstance()->m_alterar_usuario($usuario);
    }
    
    public function c_excluir_usuario() {
        return UsuarioDao::getInstance()->m_excluir_usuario($_GET["id"]);
    }
    //BUSCAR--------------------------------------------------------------------
    public function c_buscar_todos_usuario() {
        return UsuarioDao::getInstance()->m_burcar_todos_usuario();
    }
    
    public function c_buscar_email_duplicado($email){
        return UsuarioDao::getInstance()->m_buscar_email_duplicado($email);
    }

    public function c_buscar_usuario(){
        $usuario = new UsuarioBean();
        $usuario->setUsuario($_POST["usuario"]);
        $usuario->setSenha($_POST["senha"]);
        return UsuarioDao::getInstance()->m_acesso_pagina_web($usuario);
        
    }
    
    public function c_buscar_registro_por_usuario_senha() {
        $usuario = new UsuarioBean();
        $usuario->setUsu_email($_POST["usu_email"]);
        $usuario->setUsu_senha($_POST["usu_senha"]);
        return UsuarioDao::getInstance()->m_buscar_registro_por_usuario_senha($usuario);
    }
   
    public function c_buscar_usuario_por_codigo($codigo) {
        return UsuarioDao::getInstance()->m_buscar_usuario_por_codigo($codigo);
    }
    
    public function c_paginacao_usuario($inicio, $registros) {
        return UsuarioDao::getInstance()->m_paginacao_usuario($inicio, $registros);
    }
}
?>