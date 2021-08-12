<?php
define('HOST', 'localhost');
define('DBNAME', 'win_crm');
define('USER', 'root');
define('PASSWORD', '');

$mysql = new mysqli(HOST, USER, PASSWORD, DBNAME);
if(mysqli_connect_errno()){
    printf("falha ao se conectar com a vase de dados: %s\n",  mysqli_connect_error());
    exit();
    
}

?>