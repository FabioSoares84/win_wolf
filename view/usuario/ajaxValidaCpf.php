<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once ('../../util/config.php');
if(isset($_POST['usu_cpf'])){
    $conexao = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die("Impossivel conectar a base de dados.");
    $conexao->set_charset("utf8");
    $usu_cpf = $_POST['usu_cpf'];

    $resultado = mysqli_query($conexao,"select usu_cpf from usuario where usu_cpf='$usu_cpf'");
    $cpf_contagem = mysqli_num_rows($resultado);
    
    if($cpf_contagem){
        die('<font color="red"> Já Cadastrado </font>');
    }else{
        die('<font color="green"> Disponivel </font>');
    }
}
?>