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
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title']; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url; ?>/user/updateUser" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $data['user']['id']; ?>">
          <div class="card-body">
            <blockquote class="quote-warning">Abaikan jika tidak ingin mengganti foto.</blockquote>
            <div class="form-group">
              <label for="photo">Photo</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="photo" name="photo">
                  <label class="custom-file-label" for="photo">Pilih foto</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>
            <img src="<?= base_url . '/assets/img/user/' . $data['user']['photo'] ?>" alt="" height="100">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="masukkan nama..." name="nama" value="<?= $data['user']['nama']; ?>" autofocus>
            </div>
            <div class="form-group">
              <label>Nama Toko</label>
              <input type="text" class="form-control" placeholder="masukkan nama toko..." name="nama_toko" value="<?= $data['user']['nama_toko'] ?>">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="masukkan email..." name="email" value="<?= $data['user']['email']; ?>">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <Select class="form-control" name="jenis_kelamin">
                <Option value="laki-laki" <?php if ($data['user']['jenis_kelamin'] == 'laki-laki') echo 'selected'; ?>>Laki-laki</Option>
                <Option value="perempuan" <?php if ($data['user']['jenis_kelamin'] == 'perempuan') echo 'selected'; ?>>Perempuan</Option>
              </Select>
            </div>
            <div class="form-group">
              <label>Kontak</label>
              <input type="text" class="form-control" placeholder="masukkan kontak..." name="kontak" value="<?= $data['user']['kontak'] ?>">
            </div>
            <div class="form-group">
              <label>Nomor Rekening (Khusus Pelaku UMKM)</label>
              <input type="text" class="form-control" placeholder="masukkan kontak..." name="rekening" value="<?= $data['user']['rekening'] ?>">
            </div>
            <div class="form-group">
              <label for="" class="form-label">Role</label>
              <select class="form-control" name="role_id" id="role_id">
                <option selected>Pilih</option>
                <?php foreach ($data['role'] as $key => $role) : ?>
                  <option value="<?= $role['id']; ?>" <?php if ($data['user']['role_id'] == $role['id']) {
                                                        echo "selected";
                                                      } ?>><?= $role['nama_role']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <blockquote class="quote-warning">Abaikan jika tidak ingin mengganti password.</blockquote>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="masukkan password..." name="password">
            </div>
            <div class="form-group">
              <label>Ulangi Password</label>
              <input type="password" class="form-control" name="ulangi_password">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->