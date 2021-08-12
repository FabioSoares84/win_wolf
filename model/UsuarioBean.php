<?php
class UsuarioBean{
    private $usu_id;
    private $usu_nome;
    private $usu_email;
    private $usu_celular;
    private $usu_cpf;
    private $usu_senha;
    private $usu_nivel;
    
    function getUsu_id() {
        return $this->usu_id;
    }

    function getUsu_nome() {
        return $this->usu_nome;
    }

    function getUsu_email() {
        return $this->usu_email;
    }

    function getUsu_celular() {
        return $this->usu_celular;
    }

    function getUsu_cpf() {
        return $this->usu_cpf;
    }

    function getUsu_senha() {
        return $this->usu_senha;
    }

    function getUsu_nivel() {
        return $this->usu_nivel;
    }

    function setUsu_id($usu_id) {
        $this->usu_id = $usu_id;
    }

    function setUsu_nome($usu_nome) {
        $this->usu_nome = $usu_nome;
    }

    function setUsu_email($usu_email) {
        $this->usu_email = $usu_email;
    }

    function setUsu_celular($usu_celular) {
        $this->usu_celular = $usu_celular;
    }

    function setUsu_cpf($usu_cpf) {
        $this->usu_cpf = $usu_cpf;
    }

    function setUsu_senha($usu_senha) {
        $this->usu_senha = $usu_senha;
    }

    function setUsu_nivel($usu_nivel) {
        $this->usu_nivel = $usu_nivel;
    }


}
?>