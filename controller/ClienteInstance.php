<?php
class ClienteInstance{
    function __construct() {
    }
    //CRUD----------------------------------------------------------------------
      
    public function c_gravar_cliente() {
        $cliente = new ClienteBean();
        $cliente->setCli_cpfcnpj($_POST["cli_cpfcnpj"]);
        $cliente->setCli_nome($_POST["cli_nome"]); 
        $cliente->setCli_nomeFantasia($_POST["cli_nomeFantasia"]);
        //$empresa->setEmp_ie($_POST["emp_ie"]);
//        $empresa->setEmp_iest($_POST["emp_iest"]);
//        $empresa->setEmp_im($_POST["emp_im"]);
//        $empresa->setEmp_cnae($_POST["emp_cnae"]);
//        $empresa->setEmp_crt($_POST["emp_crt"]);
        return ClienteDao::getInstance()->m_gravar_cliente($cliente);
    }
    
    public function c_alterar_empresa() {
        $empresa = new EmpresaBean();
        $empresa->setEmp_id($_POST["emp_id"]);
        $empresa->setEmp_cnpj($_POST["emp_cnpj"]);
        $empresa->setEmp_nome($_POST["emp_nome"]); 
        $empresa->setEmp_nomeFantasia($_POST["emp_nomeFantasia"]);
//        $empresa->setEmp_ie($_POST["emp_ie"]);
//        $empresa->setEmp_iest($_POST["emp_iest"]);
//        $empresa->setEmp_im($_POST["emp_im"]);
//        $empresa->setEmp_cnae($_POST["emp_cnae"]);
//        $empresa->setEmp_crt($_POST["emp_crt"]);
        return EmpresaDao::getInstance()->m_alterar_empresa($empresa);
    }
    
    public function c_excluir_empresa() {
        return EmpresaDao::getInstance()->m_excluir_empresa($_GET["id"]);
    }
    
    //BUSCA---------------------------------------------------------------------
    public function c_buscar_todos_cliente() {
        return ClienteDao::getInstance()->m_burcar_todos_os_clientes();
    }
    public function c_buscar_empresa_por_codigo($codigo) {
        return ClienteDao::getInstance()->m_buscar_cliente_por_codigo($codigo);
    }
    public function c_paginacao_cliente($inicio, $registros) {
        return ClienteDao::getInstance()->m_paginacao_cliente($inicio, $registros);
    }

}

?>