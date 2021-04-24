<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/AdminLTE/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('vendor/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('vendor/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/AdminLTE/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark-primary navbar-dark">
      <!-- Left navbar links -->
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <!-- Profile -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <span><?php echo ucfirst($_SESSION['username']); ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <a href="<?php echo base_url('auth/logout'); ?>" class="dropdown-item d-flex flex-row-reverse">Logout</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-yellow elevation-4">
      <!-- Brand Logo -->
      <br>
      <a href="../admin/dashboard" class="brand-link">
        <div class="text-center">
          <img src="<?php echo base_url('assets/img/logo_bee.png'); ?>" alt="Bee Movie Logo" class="img-fluid" width="50%">
        </div>
        <h4 style="text-align:center;">Bee Movie</h4><br>
        <!-- <span class="brand-text font-weight-light">Bee Movie</span> -->
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link <?= $title == 'Dashboard' ? 'active' : ''; ?>">
                <i class="nav-icon fa fa-home"></i>
                <p> | Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/barang'); ?>" class="nav-link <?= $title == 'Data Barang' ? 'active' : ''; ?>">
                <i class="nav-icon fa fa-briefcase"></i>
                <p> | Data Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/transaksi'); ?>" class="nav-link <?= $title == 'Data Transaksi' ? 'active' : ''; ?>">
                <i class="nav-icon fa fa-cart-plus"></i>
                <p> | Data Transaksi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/penyewa'); ?>" class="nav-link <?= $title == 'Data Penyewa' ? 'active' : ''; ?>">
                <i class="nav-icon fa fa-address-card"></i>
                <p> | Data Penyewa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/laporan'); ?>" class="nav-link <?= $title == 'Laporan' ? 'active' : ''; ?>">
                <i class="nav-icon fa fa-file"></i>
                <p> | Laporan</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>