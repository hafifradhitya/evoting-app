<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo css_url('admin/bootstrap.min');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo css_url('font-awesome.min');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo css_url('ionicons.min');?>">
  <link rel="stylesheet" href="<?php echo css_url('dataTables.bootstrap.min');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo css_url('animate.min');?>">
  <link rel="stylesheet" href="<?php echo css_url('sweetalert2.min');?>">
  <link rel="stylesheet" href="<?php echo css_url('AdminLTE.min');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo css_url('all-skins.min');?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?php echo js_url('admin/jquery.min');?>"></script>
<script src="<?php echo js_url('admin/bootstrap.min');?>"></script>
<script src="<?php echo js_url('jquery.dataTables.min');?>"></script>
<script src="<?php echo js_url('dataTables.bootstrap.min');?>"></script>
<script src="<?php echo js_url('jquery.slimscroll.min');?>"></script>
<script src="<?php echo js_url('sweetalert2.min');?>"></script>
<script src="<?php echo js_url('adminlte.min');?>"></script>
<script src="<?php echo js_url('javascript');?>"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('admin/dashbaord');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo img_url('avatar5.png');?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Radhitya Hafif</span>
            </a>
			<!-- css animation-->
            <ul class="animate__animated animate__flipInY dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo img_url('avatar5.png');?>" class="img-circle" alt="User Image">

                <p>
                  Radhitya Hafif - FullStack Developer
                  <small>Member since Nov. 2022</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('admin/dashboard/logout');?>" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo img_url('avatar5.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Radhitya Hafif</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="<?php echo site_url('admin/dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="active">
          <a href="<?php echo site_url('admin/classes');?>">
            <i class="fa fa-graduation-cap"></i> <span>Kelas</span>
          </a>
        </li>
        <li class="active">
          <a href="<?php echo site_url('admin/candidate');?>">
            <i class="fa fa-users"></i> <span>Kandidat</span>
          </a>
        </li>
        <li class="active">
          <a href="<?php echo site_url('admin/user');?>">
            <i class="fa fa-user"></i> <span>Pengguna</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="content">
        