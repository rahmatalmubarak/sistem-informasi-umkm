  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman User</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row justify-content-center">
        <div class="col-md-10 d-flex align-items-stretch flex-column">
          <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
              <?= $data['user']['nama_toko'] ?? "Bukan Pelaku UMKM"; ?>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b><?= $data['user']['nama']; ?></b></h2>
                  <p class="text-muted text-sm"><b>Level : </b> <?= $data['user']['nama_role']; ?> </p>
                  <ul class="ml-4 mb-3  fa-ul text-muted">
                    <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-venus-mars"></i></span><?= $data['user']['jenis_kelamin']; ?></li>
                    <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><?= $data['user']['alamat']; ?></li>
                    <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><?= $data['user']['kontak']; ?></li>
                    <?php if(isset($data['user']['rekening'])) :?>
                    <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-credit-card"></i></span><?= $data['user']['rekening']; ?></li>
                    <?php endif;?>
                  </ul>
                </div>
                <div class="col-5 text-center">
                  <img src="<?= base_url . '/assets/img/user/' . $data['user']['photo']; ?>" alt="user-avatar" class="img-circle img-fluid">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <a href="<?= base_url . '/user/edit/' . $data['user']['id']; ?>" class="btn btn-sm btn-primary">
                  <i class="fas fa-user"></i> Edit Profile
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->