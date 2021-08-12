<?php 
$path = $_SERVER['SERVER_NAME'];
if ($path == "localhost"){
    $caminho = "http://".$path.'/win_wolf/';
}else{
    $caminho = "http://".$path.'/win_wolf/';
}
define('BASE_URL', $caminho);
define('FACA_LOGIN',BASE_URL . 'view/faca-login.php');
?>