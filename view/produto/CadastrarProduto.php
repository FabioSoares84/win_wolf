<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once '../../include/auto_load_path_2.php';

$produto = new ProdutoInstance();
$produtoBean = new ProdutoBean();

$acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0 );
$codigo = (isset($_POST["id"])) ? $_POST["id"] : ((isset($_GET["id"])) ? $_GET["id"] : 0 );

if ($codigo > 0) {
    $produtoBean = $produto->c_busca_produto_por_codigo($codigo);
}

if ($acao != "") {

    if ($acao == "incluir") {
        $produto->c_gravarProduto();
        header('Location:ConsultarProduto.php');
    }

    if ($acao == "alterar") {
        $produto->c_alterar_produto();
        //header('Location:ConsultarProduto.php');
    }

    if ($acao == "excluir") {
        $produto->c_excluir_produto();
        header('Location:ConsultarProduto.php');
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
                        <h6 class=" text-center "><b>Cadastro de Produto</b></h6>
                    </div>
                    <div class="panel-body">
                        <div class="row">                              
                            <form action="CadastrarProduto.php" method="post">
                                <input type="hidden" name="acao" id="acao" value="<?php echo($codigo > 0) ? "alterar" : "incluir" ?>"/>
                                <input type="hidden" name="prd_id"   id="prd_id" value="<?php echo $produtoBean->getPrd_id()?>"/>
                                
                                <div class="form-group col-md-1">
                                    <label for="disabledSelect">Código:</label>
                                    <input class="form-control" disabled type="text" name="prd_id" id="prd_id" value="<?php echo $produtoBean->getPrd_id()?>"/>
                                </div> 
                                <div class="form-group col-md-2">
                                    <label>Codigo Barras:</label> 
                                    <input class="form-control"  type="text" name="prd_EAN13"  onblur=""  value="<?php echo $produtoBean->getPrd_EAN13() ?>"  autocomplete="off" />
                                </div>
                                <div class="form-group col-md-5">
                                    <label>Nome:</label>
                                    <input class="form-control"  type="text" name="prd_nome" id="prd_nome"  value="<?php echo $produtoBean->getPrd_nome() ?>"  autocomplete="off" >                                        
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Preço:</label>
                                    <input class="form-control"  type="text" name="prd_precoVenda" id="prd_precoVenda"  value="<?php echo $produtoBean->getPrd_precoVenda() ?>"  autocomplete="off" autofocus="on">                                        
                                </div>
                                <!-- Inicio DA NAV -->
                                <div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab01" aria-controls="tab01" role="tab" data-toggle="tab">TAB 01</a></li>
                                        <li role="presentation"><a href="#tab02" aria-controls="tab02" role="tab" data-toggle="tab">TAB 02</a></li>
                                        <li role="presentation"><a href="#tab03" aria-controls="tab03" role="tab" data-toggle="tab">TAB 03</a></li>                        
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Tab 01 -->
                                        <div role="tabpanel" class="tab-pane active" id="tab01">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                </div>
                                                <div class="panel-body">
                                                    
                                                    TAB 01
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tab 02 -->    
                                        <div role="tabpanel" class="tab-pane" id="tab02">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                </div>
                                                <div class="panel-body">
                                                    TAB 02
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Tab 03 -->     
                                        <div role="tabpanel" class="tab-pane" id="tab03">
                                             <div class="panel panel-default">
                                                <div class="panel-heading">
                                                </div>
                                                <div class="panel-body">
                                                  TAB 03
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
                                    <a target="Frame1" href="ConsultarProduto.php" class="btn btn-danger"><i class="glyphicon glyphicon-refresh" aria-hidden="true"></i>&nbsp;Cancelar</a>
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