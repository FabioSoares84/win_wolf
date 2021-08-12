<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once ('../../util/config.php');
if(isset($_POST['usu_email'])){
    $conexao = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die("Impossivel conectar a base de dados.");
    $conexao->set_charset("utf8");
    $usu_email = $_POST['usu_email'];

    $resultado = mysqli_query($conexao,"select usu_email from usuario where usu_email='$usu_email'");
    $email_contagem = mysqli_num_rows($resultado);
    
    if($email_contagem){
        die('<font color="red"> Já Cadastrado </font>');
    }else{
        die('<font color="green"> Disponivel </font>');
    }
}
?>