<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Noto+Sans+Thai+Looped&display=swap" rel="stylesheet">
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Backend</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?php echo link_tag('asset/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>
  <!-- Font Awesome -->
   <?php echo link_tag('asset/bower_components/font-awesome/css/font-awesome.min.css'); ?>
  <!-- Ionicons -->
   <?php echo link_tag('asset/bower_components/Ionicons/css/ionicons.min.css'); ?>
  <!-- DataTables -->
   <?php echo link_tag('asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>
  <!-- Theme style -->
   <?php echo link_tag('asset/dist/css/AdminLTE.min.css'); ?>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <?php echo link_tag('asset/dist/css/skins/_all-skins.min.css'); ?>
<!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>asset/dist/js/app.min.js" type="text/javascript">
    </script>
 
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
        <!-- ckeditor-->
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style type="text/css">
    .fr{color: red;}
    </style>
 
    
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper" style="font-family:'Mitr', sans-serif">
 
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php //echo $mylink;?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="font-family:'Mitr', sans-serif"><b>ระบบบริหารจัดการงาน</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="font-family:'Mitr', sans-serif"><b>ระบบบริหารจัดการงาน</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
 
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span>
              <span class="hidden-xs"><?php  echo $_SESSION['a_name'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <span class="glyphicon glyphicon-user"></span>
                <p>
                  <?php echo $_SESSION['a_name'];?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php // echo site_url('');?>" class="btn btn-primary btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('login/logout');?>" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่??');" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
         <br><br>
        </div>
        <div class="col-sm-12 " style="color:#FFFFFF;text-align:center">
 
          <p><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['a_name'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> ผู้จัดการ</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
           <li><a href="<?= site_url('jobs');?>"><i class="fa fa-home"></i> <span>งานที่แจ้งเข้ามา</span></a></li>
           <li><a href="<?= site_url('allitem');?>"><i class="fa fa-plug"></i> <span>รายการอุปกรณ์</span></a></li>
           <li><a href="<?= site_url('allroom');?>"><i class="fa fa-university"></i> <span>รายการห้อง</span></a></li>
           <li><a href="<?= site_url('town');?>"><i class="fa fa-building-o"></i> <span>ข้อมูลตึก</span></a></li>
           <li><a href="<?= site_url('conclude');?>"><i class="fa fa-bar-chart"></i> <span>สรุปรายการแจ้งซ่อม</span></a></li>
          <li><a href="<?= site_url('login/logout');?>" onclick="return confirm('do you want to logout ?');"><i class="fa fa-edit"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>