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
      <div class="row">
        <div class="col-sm-12">
          <?php
          Flasher::Message();
          ?>
        </div>
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title font-weight-bold"><?= $data['title']; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url; ?>/user/simpanuser" method="POST" enctype="multipart/form-data">
          <div class="card-body">
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
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="masukkan nama..." name="nama">
            </div>
            <div class="form-group">
              <label>Nama Toko (Khusus untuk Pelaku UMKM)</label>
              <input type="text" class="form-control" placeholder="masukkan nama toko..." name="nama_toko">
            </div>
            <div class="form-group">
              <label>Alamat Toko (Khusus untuk Pelaku UMKM)</label>
              <input type="text" class="form-control" placeholder="masukkan alamat..." name="alamat_toko">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="masukkan email..." name="email">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <Select class="form-control" name="jenis_kelamin">
                <Option value="laki-laki">Laki-laki</Option>
                <Option value="perempuan">Perempuan</Option>
              </Select>
            </div>
            <div class="form-group">
              <label>Kontak</label>
              <input type="text" class="form-control" placeholder="masukkan kontak..." name="kontak">
            </div>
            <div class="form-group">
              <label>Nomor Rekening (Khusus untuk Pelaku UMKM)</label>
              <input type="text" class="form-control" placeholder="masukkan kontak..." name="rekening">
            </div>
            <div class="form-group">
              <label for="" class="form-label">Role</label>
              <select class="form-control" name="role_id" id="role_id">
                <option selected>Pilih</option>
                <?php foreach ($data['role'] as $key => $role) :
                  if ($role['nama_role'] != 'Pelanggan') :
                ?>
                    <option value="<?= $role['id']; ?>"><?= $role['nama_role']; ?></option>
                <?php endif;
                endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="masukkan password..." name="password">
            </div>
            <div class="form-group">
              <label>Ulangi Password</label>
              <input type="password" class="form-control" placeholder="ulangi password..." name="ulangi_password">
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