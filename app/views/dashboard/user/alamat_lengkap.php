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
        <form role="form" action="<?= base_url; ?>/user/updateAlamat" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="user_id" value="<?= $data['user']['id']; ?>">
          <div class="card-body">
            <div class="col-12 d-flex px-0">
              <div class="form-group col-6 pl-0">
                <label>Provinsi</label>
                <Select class="form-control selectpicker" name="provinsi" id="propinsi" title="-- Pilih --" data-live-search="true"></Select>
              </div>
              <div class="form-group col-6 pr-0">
                <label>Kabupaten / Kota</label>
                <Select class="form-control selectpicker" name="kabupaten_kota" id="kabupaten" title="-- Pilih --" data-live-search="true"></Select>
              </div>
            </div>
            <div class="form-group">
              <label>Kode Pos</label>
              <input class="form-control" name="kode_pos" id="kode_pos">
            </div>
            <div class="form-group">
              <label>Alamat Lengkap</label>
              <textarea class="form-control" name="alamat_lengkap" id="alamat_lengkap" rows="5"></textarea>
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