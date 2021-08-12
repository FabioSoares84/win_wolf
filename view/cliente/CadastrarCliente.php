<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once '../../include/auto_load_path_2.php';
$cliente = new ClienteInstance();
$clienteBean = new ClienteBean();

$acao =(isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0);
$codigo =(isset($_POST['id'])) ? $_POST["id"] : ((isset($_GET["id"])) ? $_GET["id"] : 0); 

if($codigo > 0){
    $clienteBean = $cliente->c_buscar_cliente_por_codigo($codigo);  
}

if($acao != ""){
    if($acao == "incluir"){
        $cliente->c_gravar_cliente();
        //header("Location:ConsultarCliente.php");
    }
     if ($acao == "alterar") {
        $cliente->c_alterar_cliente();
        header("Location:ConsultarCliente.php");
    }
    if ($acao == "excluir") {
        $cliente->c_excluir_cliente();
        header("Location:ConsultarCliente.php");
    }
}
?>
<html lang="pt_Br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Fábio Soares">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div id="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class=" text-center "><b>Cadastro de Cliente</b></h6>
                    </div>
                    <div class="panel-body">
                        <div class="row">                              
                            <form action="CadastrarCliente.php" method="post">
                                <input type="hidden" name="acao" id="acao" value="<?php echo($codigo > 0) ? "alterar" : "incluir" ?>"/>
                                <input type="hidden" name="cli_id"   id="cli_id" value="<?php echo $clienteBean->getCli_id()?>"/>
                                
                                <div class="form-group col-md-1">
                                    <label for="disabledSelect">Código:</label>
                                    <input class="form-control" disabled type="text" name="cli_id" id="cli_id" value="<?php echo $clienteBean->getCli_id()?>"/>
                                </div> 
                                <div class="form-group col-md-2">
                                    <label>Cnpj:</label> 
                                    <input class="form-control"  type="text" name="cli_cpfcnpj"  onblur="checkCnpj(this.value)" data-mask="00.000.000/0000-00" value="<?php echo $clienteBean->getCli_cpfcnpj() ?>" placeholder="00.000.000/0000-00" autocomplete="off" />
                                </div>
                                <div class="form-group col-md-5">
                                    <label>Nome:</label>
                                    <input class="form-control"  type="text" name="cli_nome" id="emp_nome"  value="<?php echo $clienteBean->getCli_nome()?>"  autocomplete="off" >                                        
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nome Fantasia:</label>
                                    <input class="form-control"  type="text" name="cli_nomeFantasia" id="cli_nomeFantasia"  value="<?php echo $clienteBean->getCli_nomeFantasia() ?>"  autocomplete="off" autofocus="on">                                        
                                </div>
                                <!-- Inicio DA NAV -->
                                <div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#endereco" aria-controls="endereco" role="tab" data-toggle="tab">Endereço</a></li>
                                        <li role="presentation"><a href="#paid" aria-controls="paid" role="tab" data-toggle="tab">Tributos</a></li>
                                        <li role="presentation"><a href="#contador" aria-controls="contador" role="tab" data-toggle="tab">Contador</a></li>                        
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Tab Endereço -->
                                        <div role="tabpanel" class="tab-pane active" id="endereco">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                </div>
                                                <!-- /.panel-heading -->
                                                    <div class="panel-body">
                                                       <div class="form-group col-md-2">
                                                        <label>Cep:</label>
                                                        <input  type="text" class="form-control" name="cli_cep" id="cli_cep" data-mask="00000-000" value=""  placeholder="00000-000"  autocomplete="off">                                   
                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <label>Logradouro:</label>
                                                        <input  type="text" class="form-control" name="cli_logradouro" id="cli_logradouro" value="">                                   
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Numero:</label>
                                                        <input  type="text" class="form-control" name="cli_numeroEnd"  id="cli_numeroEnd" value="" autocomplete="off">                                   
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Bairro:</label>
                                                        <input  type="text" class="form-control"  name="cli_bairro"  id="cli_bairro" value="" autocomplete="off">                                   
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Cidade:</label>
                                                        <input  type="text" class="form-control"  name="cli_municipio"  id="cli_municipio" value="" autocomplete="off">                                   
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>UF:</label>
                                                        <input  type="text" class="form-control" name="cli_uf" id="cli_uf" value="" autocomplete="off">                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tab Tributos -->    
                                        <div role="tabpanel" class="tab-pane" id="paid">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group col-md-2">
                                                        <label>Inscrição Estadual:</label>
                                                        <input class="form-control"  type="text" name="emp_ie" id="emp_ie" data-mask="00.000.000-00" value=""  placeholder="00.000.000-00"  autocomplete="off">                                   
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Inscrição Municipal:</label>
                                                        <input class="form-control"  type="text" name="emp_im" id="emp_im" data-mask="00.000.000-00" value=" "  placeholder="00.000.000-00"  autocomplete="off">                                   
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Inscrição IEST:</label>
                                                        <input class="form-control"  type="text" name="emp_im" id="emp_im" data-mask="00.000.000-00" value=" "  placeholder="00.000.000-00"  autocomplete="off">                                   
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>CNAE Fiscal: C7</label>
                                                        <input class="form-control"  type="text" name="emp_im" id="emp_im" data-mask="00.000.000-00" value=" "  placeholder="00.000.000-00"  autocomplete="off">                                   
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <label>Código de Regime Tributário: N1</label>
                                                    <select class="form-control"   name="emp_regime" >              
                                                        <option  value="1" > Simples Nacional</option>
                                                        <option  value="2" > Simples Nacional, excesso sublimite de receita bruta</option>
                                                        <option  value="2" > Regime Normal</option>
                                                    </select>                                           
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Tab Contador -->     
                                        <div role="tabpanel" class="tab-pane" id="contador">
                                             <div class="panel panel-default">
                                                <div class="panel-heading">
                                                </div>
                                                <div class="panel-body">
                                                  Contador
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">   
                                    <button type="submit" class="<?php echo ($codigo > 0) ? "btn btn-warning" : "btn btn-success" ?>">
                                                       <i class="<?php echo ($codigo > 0) ? "fa fa-pencil" : "fa fa-floppy-o" ?>"></i> 
                                                                 <?php echo ($codigo > 0) ? " Alterar" : " Salvar" ?>
                                    </button>   
                                    <a target="Frame1"  href="./home.php"></a>
                                    <a target="Frame1" href="ConsultarCliente.php" class="btn btn-danger"><i class="glyphicon glyphicon-refresh" aria-hidden="true"></i>&nbsp;Cancelar</a>
                                </div>
                            </form>                                                                                                                                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<script src="../vendor/jquery/jquery-3.2.1.min.js"     type="text/javascript"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- DataTable -->
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
            // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            // var target = $(e.target).attr("href") // activated tab
            //});
        });
    </script>
</body>
</html>