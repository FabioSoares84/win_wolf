<?php

class ClienteBean {

    private $cli_id;
     //function tagemit($std)
    private $cli_cpfcnpj;
    private $cli_nome;
    private $cli_nomeFantasia;
    private $cli_ie;
    private $cli_iest;
    private $cli_im;
    private $cli_cnae;
    private $cli_crt;
    
    public function getCli_id() {
        return $this->cli_id;
    }


    public function getCli_nome() {
        return $this->cli_nome;
    }

    public function getCli_nomeFantasia() {
        return $this->cli_nomeFantasia;
    }

    public function getCli_ie() {
        return $this->cli_ie;
    }

    public function getCli_iest() {
        return $this->cli_iest;
    }

    public function getCli_im() {
        return $this->cli_im;
    }

    public function getCli_cnae() {
        return $this->cli_cnae;
    }

    public function getCli_crt() {
        return $this->cli_crt;
    }

    public function setCli_id($cli_id): void {
        $this->cli_id = $cli_id;
    }

    public function setCli_nome($cli_nome): void {
        $this->cli_nome = $cli_nome;
    }

    public function setCli_nomeFantasia($cli_nomeFantasia): void {
        $this->cli_nomeFantasia = $cli_nomeFantasia;
    }

    public function setCli_ie($cli_ie): void {
        $this->cli_ie = $cli_ie;
    }

    public function setCli_iest($cli_iest): void {
        $this->cli_iest = $cli_iest;
    }

    public function setCli_im($cli_im): void {
        $this->cli_im = $cli_im;
    }

    public function setCli_cnae($cli_cnae): void {
        $this->cli_cnae = $cli_cnae;
    }

    public function setCli_crt($cli_crt): void {
        $this->cli_crt = $cli_crt;
    }
    public function getCli_cpfcnpj() {
        return $this->cli_cpfcnpj;
    }

    public function setCli_cpfcnpj($cli_cpfcnpj): void {
        $this->cli_cpfcnpj = $cli_cpfcnpj;
    }




}

?>
