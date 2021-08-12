<?php
class EmpresaBean{
    private $emp_id;
    //function tagemit($std)
    private $emp_nome;
    private $emp_nomeFantasia;
    private $emp_ie;
    private $emp_iest;
    private $emp_im;
    private $emp_cnae;
    private $emp_crt;
    private $emp_cnpj;
    //function tagenderEmit($std)
    private $emp_logradouro;
    private $emp_numeroEnd;
    private $emp_complemento;
    private $emp_bairro;
    private $cid_codigo;
    private $cid_nome;
    private $emp_uf;
    private $emp_cep;
    private $emp_cPais;
    private $emp_xPais;
    private $emp_fone;
    private $emp_site;
    private $emp_email;

    public function getEmp_id() {
        return $this->emp_id;
    }

    public function getEmp_nome() {
        return $this->emp_nome;
    }

    public function getEmp_nomeFantasia() {
        return $this->emp_nomeFantasia;
    }

    public function getEmp_ie() {
        return $this->emp_ie;
    }

    public function getEmp_iest() {
        return $this->emp_iest;
    }

    public function getEmp_im() {
        return $this->emp_im;
    }

    public function getEmp_cnae() {
        return $this->emp_cnae;
    }

    public function getEmp_crt() {
        return $this->emp_crt;
    }

    public function getEmp_cnpj() {
        return $this->emp_cnpj;
    }

    public function getEmp_logradouro() {
        return $this->emp_logradouro;
    }

    public function getEmp_numeroEnd() {
        return $this->emp_numeroEnd;
    }

    public function getEmp_complemento() {
        return $this->emp_complemento;
    }

    public function getEmp_bairro() {
        return $this->emp_bairro;
    }

    public function getCid_codigo() {
        return $this->cid_codigo;
    }

    public function getCid_nome() {
        return $this->cid_nome;
    }

    public function getEmp_uf() {
        return $this->emp_uf;
    }

    public function getEmp_cep() {
        return $this->emp_cep;
    }

    public function getEmp_cPais() {
        return $this->emp_cPais;
    }

    public function getEmp_xPais() {
        return $this->emp_xPais;
    }

    public function getEmp_fone() {
        return $this->emp_fone;
    }

    public function getEmp_site() {
        return $this->emp_site;
    }

    public function getEmp_email() {
        return $this->emp_email;
    }

    public function setEmp_id($emp_id): void {
        $this->emp_id = $emp_id;
    }

    public function setEmp_nome($emp_nome): void {
        $this->emp_nome = $emp_nome;
    }

    public function setEmp_nomeFantasia($emp_nomeFantasia): void {
        $this->emp_nomeFantasia = $emp_nomeFantasia;
    }

    public function setEmp_ie($emp_ie): void {
        $this->emp_ie = $emp_ie;
    }

    public function setEmp_iest($emp_iest): void {
        $this->emp_iest = $emp_iest;
    }

    public function setEmp_im($emp_im): void {
        $this->emp_im = $emp_im;
    }

    public function setEmp_cnae($emp_cnae): void {
        $this->emp_cnae = $emp_cnae;
    }

    public function setEmp_crt($emp_crt): void {
        $this->emp_crt = $emp_crt;
    }

    public function setEmp_cnpj($emp_cnpj): void {
        $this->emp_cnpj = $emp_cnpj;
    }

    public function setEmp_logradouro($emp_logradouro): void {
        $this->emp_logradouro = $emp_logradouro;
    }

    public function setEmp_numeroEnd($emp_numeroEnd): void {
        $this->emp_numeroEnd = $emp_numeroEnd;
    }

    public function setEmp_complemento($emp_complemento): void {
        $this->emp_complemento = $emp_complemento;
    }

    public function setEmp_bairro($emp_bairro): void {
        $this->emp_bairro = $emp_bairro;
    }

    public function setCid_codigo($cid_codigo): void {
        $this->cid_codigo = $cid_codigo;
    }

    public function setCid_nome($cid_nome): void {
        $this->cid_nome = $cid_nome;
    }

    public function setEmp_uf($emp_uf): void {
        $this->emp_uf = $emp_uf;
    }

    public function setEmp_cep($emp_cep): void {
        $this->emp_cep = $emp_cep;
    }

    public function setEmp_cPais($emp_cPais): void {
        $this->emp_cPais = $emp_cPais;
    }

    public function setEmp_xPais($emp_xPais): void {
        $this->emp_xPais = $emp_xPais;
    }

    public function setEmp_fone($emp_fone): void {
        $this->emp_fone = $emp_fone;
    }

    public function setEmp_site($emp_site): void {
        $this->emp_site = $emp_site;
    }

    public function setEmp_email($emp_email): void {
        $this->emp_email = $emp_email;
    }

}
?>