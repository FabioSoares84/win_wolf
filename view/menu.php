<?php
error_reporting(E_ALL ^ E_NOTICE);
 if($_POST){
    require_once './include/auto_load_path_1.php';
    $usuario = new UsuarioInstance();
    $usuarioBean = new UsuarioBean();
 }
?>
<!-- Navigation -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><img src="img/avatar-8.jpg" alt="person" class="img-fluid rounded-circle">
                <h2 class="h5">WSolucão</h2><span>WS ERP</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="administracao.php" class="brand-small text-center"> <strong>W</strong><strong class="text-primary">S</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">Manu</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">                  
                <li><a href="#cadastro" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Cadastros </a>
                    <ul id="cadastro" class="collapse list-unstyled ">
                        
                        <?php if($_SESSION['usu_nivel']== "ADMIN"): ?>
                        <li><a target="Frame1"  href="empresa/ConsultarEmpresa.php">Empresa</a></li>                     
                        <li><a target="Frame1" href="usuario/ConsultarUsuario.php">Usuario</a></li>
                        <?php endif;?>
                        <li><a target="Frame1" href="fornecedor/ConsultarFornecedor.php">Fornecedor</a></li>
                        <li><a target="Frame1" href="cliente/ConsultarCliente.php">Cliente</a></li>
                    </ul>
                </li>
                <li><a href="#estoque" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Estoque </a>
                    <ul id="estoque" class="collapse list-unstyled ">
                        <li><a target="Frame1"  href="produto/ConsultarProduto.php">Produto</a></li>
                        <li><a target="Frame1" href="contasPagar/ContasPagar.php">Entrada</a></li>
                        <li><a target="Frame1" href="usuario/ConsultarUsuario.php">Ficha-Produto</a></li>
                        
                    </ul>
                </li>
                <li><a href="#financeiro" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Financeiro </a>
                    <ul id="financeiro" class="collapse list-unstyled ">
                        <li><a target="Frame1" href="cliente/ConsultarCliente.php">Caixas</a></li>
                        <li><a target="Frame1" href="contasPagar/ConsultarContasPagar.php">Contas á Pagar</a></li>
                        <li><a target="Frame1" href="usuario/ConsultarUsuario.php">Contas á Receber</a></li>
                        
                    </ul>
                </li>
                <li><a href="#movimento" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Movimento </a>
                    <ul id="movimento" class="collapse list-unstyled ">
                        <li><a target="Frame1"  href="venda/ConsultarVenda.php">Venda</a></li>
                        <li><a target="Frame1" href="contasPagar/ContasPagar.php">Contas á Pagar</a></li>
                        <li><a target="Frame1" href="usuario/ConsultarUsuario.php">Contas á Receber</a></li>
                        
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<div class="page">
    <!-- navbar-->
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header"><a id="toggle-btn" href="administracao.php" class="menu-btn"><i class="icon-bars"> </i></a><a href="administracao.php" class="navbar-brand">
                    
                    <div class="brand-text d-none d-md-inline-block"> <strong class="text-primary">WS</strong><span>ERP</span></div></a></div>
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <!-- Log out-->
                        <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION["usu_nivel"] ?> - <?php echo $_SESSION["usu_nome"] ?>
		        </a>
                        <li class="nav-item"><a href="logoff.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Sair</span><i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Home -->
    <section class="mt-30px mb-30px">
        <div class="container-fluid">
            <div class="row">
                <iframe name="Frame1"  style="border:none" onscroll="auto" src="home.php" width="100%" height="1000px"></iframe> 
            </div>
        </div>
    </section>
    
    <!-- Barra de baixo da pagina -->
    <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2021</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="http://wsolucoes.com/" class="external">wsoluções</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
    </footer>
</div>