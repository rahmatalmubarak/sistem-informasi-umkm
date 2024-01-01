<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/x-icon" href="<?= base_url; ?>/assets/img/logo.png">
  <title><?= $data['title']; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url; ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<style>
  .card-header {
    background-color: #FCBF49 !important;
    color: #232324 !important;
  }

  .sidebar-light-yellow {
    background-color: #FCBF49;
  }

  .user-panel {
    border-bottom: 1px solid #232324 !important;
  }

  .brand-link {
    border-bottom: 1px solid #232324 !important;
    color: rgba(0, 0, 0, .8);
  }
</style>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <?php if ($_SESSION['role'] == 'Pelaku UMKM') : ?>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <?php
              $notif =  $this->model('TransaksiModel')->get_notif($_SESSION['id']);
              ?>
              <i class="far fa-bell"></i>
              <span class="badge badge-danger navbar-badge"><?= count($notif); ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header"><?= count($notif); ?> Notifications</span>
              <div class="dropdown-divider"></div>
              <?php foreach ($notif as $key => $pesan) : ?>
                <a href="<?= base_url . '/transaksi/read_notif/' . $pesan['id_transaksi'] ?>" class="dropdown-item">
                  <i class="fas fa-envelope mr-2"></i> <?= substr($pesan['nama_produk'], 20) . '...'; ?>
                </a>
              <?php endforeach; ?>
            </div>
          </li>
        <?php endif; ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url; ?>/logout" class="nav-link">Logout</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->