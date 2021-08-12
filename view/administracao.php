<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../util/Util.php';

if(!Util::session_existe()){
    header("Location:" .faca_login);
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt_Br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Fábio Soares">
        <link  rel="icon"  href="../img/icon-01.jpg">
        <title>WS ERP</title>
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css"> 
        <link rel="stylesheet" href="vendor/css/fontastic.css">-->
        <link rel="stylesheet" href="vendor/css/style.default.css" id="theme-stylesheet">
        <link rel="shortcut icon" href="../img/cmdvic.png">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]--> 
    </head>
    <body>
        <div id="wrapper">
            <?php
            include_once './menu.php';
            ?>
        </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="vendor/js/front.js"></script>
    </body>
</html>
