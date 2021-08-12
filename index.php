<?php
    header('Content-Type: text/html; charset=UTF-8');
    error_reporting(E_ALL ^ E_NOTICE);
    if($_POST){
        require_once './include/auto_load_path_1.php';
        $usuario = new UsuarioInstance();
        $usuarioBean = new UsuarioBean();
        $usuarioBean = $usuario->c_buscar_registro_por_usuario_senha();
        if (!is_null($usuarioBean->getUsu_email()) && !is_null($usuarioBean->getUsu_senha())) {
            session_start();
            //150 = 2.3
            //300 =  5 minutos
            //600 = 10 minutos
            //1200 =  20 minutos
            //2400 =  40 minutos        
            // vai armazenar a hora exata do login 15:10:30
            date_default_timezone_set('America/Sao_Paulo');
            $_SESSION['hora_ultimo_acesso'] = date("Y-n-j H:i:s");
            $_SESSION['TEMPO_DA_SESSAO'] = 2400; // equivale a 40 minutos        
            $_SESSION["usu_id"]    = $usuarioBean->getUsu_id();
            $_SESSION["usu_nome"]  = $usuarioBean->getUsu_nome();
            $_SESSION["usu_cpf"]   = $usuarioBean->getUsu_cpf();
            $_SESSION["usu_email"] = $usuarioBean->getUsu_email();
            $_SESSION["usu_nivel"] = $usuarioBean->getUsu_nivel();
            header("Location:view/administracao.php");
         }else {
                header("Location:index.php?erro=1");
            }
    }
?>
<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Fábio Soares">
        <link  rel="icon"  href="img/icon-01.jpg">
        <title>WS WOLF</title>
        <?php
        include_once './view/config.php';
        include_once './view/obter_css.php';
        ?>
         <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
         <![endif]-->
    </head>
    <body>
         <div class="login-form">
            <form action="index.php" method="post">
                <div class="logo">
                    <img src="view/img/erp4.png" alt="Win_Constructor">
                </div>
                <h2 class="text-center">Entre no Sistema</h2>
                <div class="form-group">
                    <input class="form-control" type="text" name="usu_email" placeholder="Insira seu Email!" required  autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="usu_senha" placeholder="Insira sua senha!" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btn-login">LOGIN</button>	
                </div>
                <div class="clearfix">
                    <label class="float-left checkbox-inline">
                        <input type="checkbox">
                            Lembrar-me
                    </label>
                    <a data-toggle="modal" data-target="#modal-senha" class="float-right">Recuperar Senha</a>
                </div>
            </form>
            <?php 
                switch ($_GET["erro"]){
                    case 1:
                        //echo'<div class="alert alert-danger" role="alert">Erro de login e senha!</div>';
                        echo '<a href="#" class="btn btn-danger btn-block"  value="">Usuario ou senha não localizado!</a>';
                        break;
                    case 2:
                        echo '<a href="#" class="btn btn-danger btn-block"  value="">Impossível acessar a página sem login </a>';
                        break;
                }
            ?>
        </div>
    </body>
    </body>
</html>
