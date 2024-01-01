  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-yellow elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url . '/landingpage' ?>" class="brand-link" style="text-align: center;">
      <img style="height: 60px;"  src="<?= base_url; ?>/assets/img/logo.png" alt="">
      <span class="brand-text font-weight-bold text-md">Sistem Informasi UMKM</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url; ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['nama']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if ($_SESSION['role'] == 'Pelaku UMKM') : ?>
            <li class="nav-item">
              <a href="<?= base_url; ?>/home" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="<?= base_url; ?>/landingpage" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Kembali Ke Halaman Awal
              </p>
            </a>
          </li>
          <li class="nav-header">Data</li>
          <?php if ($_SESSION['role'] == 'Pelaku UMKM') : ?>
            <li class="nav-item">
              <a href="<?= base_url; ?>/produk" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Produk
                </p>
              </a>
            </li>
          <?php endif; ?>
          <?php if ($_SESSION['role'] != 'Pelanggan') : ?>
            <li class="nav-item">
              <a href="<?= base_url; ?>/kategori" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Kategori
                </p>
              </a>
            </li>
          <?php endif; ?>
          <?php if ($_SESSION['role'] != 'Admin') : ?>
            <li class="nav-item">
              <a href="<?= base_url; ?>/transaksi" class="nav-link">
                <i class="nav-icon fas fa-store"></i>
                <p>
                  Transaksi <?= $_SESSION['role'] == 'Pelaku UMKM' ? 'Pelanggan' :  'Anda'; ?>
                </p>
              </a>
            </li>
          <?php endif; ?>
          <?php if ($_SESSION['role'] == 'Admin') : ?>
            <li class="nav-item">
              <a href="<?= base_url; ?>/role" class="nav-link">
                <i class="nav-icon fas fa-key"></i>
                <p>
                  Role
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url; ?>/user/daftarPelakuUMKM" class="nav-link">
                <i class="nav-icon fas fa-warehouse"></i>
                <p>
                  Daftar Pelaku UMKM
                </p>
              </a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="<?= $_SESSION['role'] == 'Admin' ?  base_url . '/user' :  base_url . '/user/edit/' . $_SESSION['id']; ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                <?= $_SESSION['role'] == 'Admin' ? 'User' : $_SESSION['role'] ?>
              </p>
            </a>
          </li>
          <?php if ($_SESSION['role'] != 'Admin') : ?>
          <li class="nav-item">
            <a href="<?= base_url . '/user/alamatLengkap/' . $_SESSION['id']; ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Alamat lengkap
              </p>
            </a>
          </li>
          <?php endif;?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>