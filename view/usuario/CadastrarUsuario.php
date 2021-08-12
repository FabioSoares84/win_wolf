<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../../include/auto_load_path_2.php';

$usuario = new UsuarioInstance();
$usuarioBean = new UsuarioBean();

$acao =(isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0);
$codigo =(isset($_POST['id'])) ? $_POST["id"] : ((isset($_GET["id"])) ? $_GET["id"] : 0); 

if($codigo > 0){
     $usuarioBean = $usuario->c_buscar_usuario_por_codigo($codigo);  
}

if($acao != ""){
    if($acao == "incluir"){
        $usuario->c_gravar_usuario();
        header("Location:ConsultarUsuario.php");
    }
     if ($acao == "alterar") {
        $usuario->c_alterar_usuario();
        header("Location:ConsultarUsuario.php");
    }
    if ($acao == "excluir") {
        $usuario->c_excluir_usuario();
        header("Location:ConsultarUsuario.php");
    }
}
?>
<html lang="pt_Br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Fábio Soares">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <!--<script src="../vendor/jquery/jquery-3.2.1.min.js"     type="text/javascript"></script> -->
    <script src="../vendor/jquery/jquery.mask.min.js"      type="text/javascript"></script>
</head>
<body>
    <div id="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cadastro de Usuario
                    </div>
                    <div class="panel-body">
                        <div class="row">                              
                            <form action="CadastrarUsuario.php" method="post">
                                <input type="hidden" name="acao" id="acao" value="<?php echo($codigo > 0) ? "alterar" : "incluir" ?>"/>
                                <input type="hidden" name="usu_id"   id="usu_id" value="<?php echo $usuarioBean->getUsu_id()?>"/>

                                <div class="form-group col-md-1">
                                    <label for="disabledSelect">Código:</label>
                                    <input disabled type="text" name="usu_id" class="form-control" value="<?php echo $usuarioBean->getUsu_id()?>"/>
                                </div>     

                                <div class="form-group col-md-6">
                                    <label>Nome:</label>
                                    <input required type="text" name="usu_nome" id="usu_nome" class="form-control" value="<?php echo $usuarioBean->getUsu_nome()?>"  autocomplete="off" autofocus/>                                        
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label>CPF: </label> <span id="resultadoCpf"></span>
                                    <input required type="text" name="usu_cpf" id="usu_cpf" class="form-control" data-mask="000.000.000-00" value="<?php echo $usuarioBean->getUsu_cpf()?>" placeholder="000.000.000-00"/>
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label>Celular:</label>
                                    <input required type="text" name="usu_celular" class="form-control" id="celular" data-mask="(00)0 0000-0000" value="<?php echo $usuarioBean->getUsu_celular() ?>"  placeholder="(00)0 0000-0000"  autocomplete="off">                                   
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label>Email: </label> <span id="resultadoEmail"></span>
                                    <input required type="text" name="usu_email" id="usu_email" class="form-control" value="<?php echo $usuarioBean->getUsu_email()?>"/>                                        
                                    
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>Senha:</label>
                                    <input required type="password" name="usu_senha" class="form-control" value="<?php echo $usuarioBean->getUsu_senha() ?>" id="inputError1">                                
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>Nivel:</label>
                                    <select class="form-control"   name="usu_nivel" >              
                                        <option <?php echo ($usuarioBean->getUsu_nivel() == "ADMIN") ? "selected" : "" ?> value="ADMIN" > ADMINISTRADOR</option>
                                        <option <?php echo ($usuarioBean->getUsu_nivel() == "CONSULTOR") ? "selected" : "" ?> value="CONSULTOR" > CONSULTOR</option>
                                    </select>                                           
                                </div>  
                                
                                
<!--                                 <div class="row">
                                <div id="list" class="row">
                                    <div class="table-responsive col-md-12">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>ID:</th>
                                                    <th>EMPRESA:</th>
                                                    <th>PERMISSAO:</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $usuarioBean = $usuario->c_paginacao_usuario($inicio, $registros_por_pagina);
                                                    $count = count($usuarioBean);
                                                    foreach ($usuarioBean as $usu) {
                                                ?>
                                                    <tr class="odd gradeA">
                                                        <td style="width: 60px"><?php echo $usu->getUsu_id() ?></td>
                                                        <td><?php echo $usu->getUsu_nome() ?></td>
                                                        <td><?php echo $usu->getUsu_email()?></td>
                                                        <td><?php echo $usu->getUsu_celular() ?></td> 
                                                        <td><?php echo $usu->getUsu_cpf() ?></td>  
                                                        <td><?php echo $usu->getUsu_nivel() ?></td> 
                                                         
                                                        <td style="width: 100px">
                                                            <a class="btn btn-info" title="Editar" href="CadastrarUsuario.php?id=<?php echo $usu->getUsu_id()?>"><i  class="fa fa-pencil"></i></a>
                                                            <a class="btn btn-danger" title="Excluir" href="javascript:if(confirm('Deseja mesmo excluir o Usuario? <?php echo $usu->getUsu_nome() ?>')) {location='CadastrarUsuario.php?acao=excluir&id=<?php echo $usu->getUsu_id()?>';}"><i  class="fa fa-trash"></i></a>                                                                                                                                  
                                                        </td> 
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>                                                           
                                   </div>
                                </div>                                        
                            </div>-->
                                
                                <br>
                                <br>
                                <div class="col-md-12">   
                                    <button type="submit" class="<?php echo ($codigo > 0) ? "btn btn-warning" : "btn btn-success" ?>">
                                                       <i class="<?php echo ($codigo > 0) ? "fa fa-pencil" : "fa fa-floppy-o" ?>"></i> 
                                                                 <?php echo ($codigo > 0) ? " Alterar" : " Salvar" ?></button>   

                                    <a target="Frame1"  href="./home.php"></a>
                                    <a target="Frame1" href="ConsultarUsuario.php" class="btn btn-danger"><i class="glyphicon glyphicon-refresh" aria-hidden="true"></i>&nbsp;Cancelar</a>
                                </div>
                            </form>                                                                                                                                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="/view/usuario/ajaxValidaCpf.php"></script>
    <script src="/view/usuario/ajaxValidaEmail.php"></script>
    <script src="../vendor/js/jquery.mask.min.js"      type="text/javascript"></script>
    <script src="../js/bootstrap.min.js"></script>
    
    
  
</body>
</html>