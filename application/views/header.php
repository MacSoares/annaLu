<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->helper('url');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>AnnaLu</title>
  <link rel="icon" href="<?=base_url()?>/annaluLogo.ico" type="image/ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href=<?=base_url("css/bootstrap/css/bootstrap.min.css")?>>
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->

  <link rel="stylesheet" href=<?=base_url("css/font-awesome/css/font-awesome.min.css")?>>
  <!-- Ionicons -->

  <!-- jvectormap -->
  <link rel="stylesheet" href=<?=base_url("css/plugins/jvectormap/jquery-jvectormap-1.2.2.css")?>>
  <!-- Theme style -->
  <link rel="stylesheet" href=<?=base_url("css/dist/css/AdminLTE.min.css")?>>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href=<?=base_url("css/dist/css/skins/_all-skins.min.css")?>>


  <!-- JS files -->
  <!-- jQuery 2.2.0 -->
  <script src=<?=base_url("css/plugins/jQuery/jQuery-2.2.0.min.js")?>></script>
  <!-- Bootstrap 3.3.6 -->
  <script src=<?=base_url("css/bootstrap/js/bootstrap.min.js")?>></script>
  <!-- FastClick -->
  <script src=<?=base_url("css/plugins/fastclick/fastclick.js")?>></script>
  <!-- AdminLTE App -->
  <script src=<?=base_url("css/dist/js/app.min.js")?>></script>
  <!-- Sparkline -->
  <script src=<?=base_url("css/plugins/sparkline/jquery.sparkline.min.js")?>></script>
  <!-- jvectormap -->
  <script src=<?=base_url("css/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")?>></script>
  <script src=<?=base_url("css/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")?>></script>
  <!-- SlimScroll 1.3.0 -->
  <script src=<?=base_url("css/plugins/slimScroll/jquery.slimscroll.min.js")?>></script>
  <!-- ChartJS 1.0.1 -->
  <script src=<?=base_url("css/plugins/chartjs/Chart.min.js")?>></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src=<?=base_url("css/dist/js/pages/dashboard2.js")?>></script>
  <!-- AdminLTE for demo purposes -->
  <script src=<?=base_url("css/dist/js/demo.js")?>></script>


</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src=<?=base_url("annaluLogoSmall.png");?> ></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>A</b>nna<b>L</b>u</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->


    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Seja Bem Vinda!</li>
        <li class="treeview">
            <?=anchor("home", "<span>   Página Inicial</span>", "class='fa fa-home'");?>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a>
                <span><?=anchor("listar_cliente"," Listar Clientes","class='fa fa-list'");?>
                </span>
              </a>
            </li>
            <li>
              <a>
                <span><?=anchor("cadastrar_cliente"," Cadastrar Clientes","class='fa fa-pencil'");?>
                </span>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i> <span>Fornecedores</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>

              <a>
                <span><?= anchor("listar_fornecedores", " Listar Fornecedores", "class='fa fa-list'");?>
                </span>
              </a>
            </li>
            <li>
             <a>
                <span><?= anchor("cadastrar_fornecedores", " Cadastrar Fornecedores", "class='fa fa-pencil'");?>
                </span>
             </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dropbox"></i> <span>Estoque</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a>
                <span><?= anchor("listar_pecas", " Listar Peça", "class='fa fa-list'");?>
                </span>
              </a>
            </li>
            <li>
              <a>
                <span><?= anchor("cadastrar_peca", " Salvar Nova Peça", "class='fa fa-pencil'");?>
                </span>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-check"></i> <span>Reservas</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a>
                <span><?= anchor("mostrar_reservas", " Mostrar Reservas", "class='fa fa-list'");?>
                </span>
              </a>
            </li>
            <li>
              <a>
                <span><?= anchor("registrar_reserva", " Registrar Reserva", "class='fa fa-pencil'");?>
                </span>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Vendas</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a>
                <span><?= anchor("listar", " Mostrar Vendas", "class='fa fa-list'");?>
                </span>
              </a>
            </li>
            <li>
              <a>
                <span><?= anchor("cadastrar_vendas", " Registrar Venda", "class='fa fa-pencil'");?>
                </span>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <?= anchor("fluxo_caixa", "<span>    Fluxo de Caixa</span>", "class='fa fa-line-chart'");?>
        </li>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="logo">
    <section class="content">

