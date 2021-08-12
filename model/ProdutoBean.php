<?php

class ProdutoBean {

    private $prd_id;
    private $prd_EAN13;
    private $prd_nome;
    private $prd_precoVenda;

    public function getPrd_id() {
        return $this->prd_id;
    }

    public function getPrd_EAN13() {
        return $this->prd_EAN13;
    }

    public function getPrd_nome() {
        return $this->prd_nome;
    }

    public function getPrd_precoVenda() {
        return $this->prd_precoVenda;
    }

    public function setPrd_id($prd_id): void {
        $this->prd_id = $prd_id;
    }

    public function setPrd_EAN13($prd_EAN13): void {
        $this->prd_EAN13 = $prd_EAN13;
    }

    public function setPrd_nome($prd_nome): void {
        $this->prd_nome = $prd_nome;
    }

    public function setPrd_precoVenda($prd_precoVenda): void {
        $this->prd_precoVenda = $prd_precoVenda;
    }




}
