  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Kategori</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <form action="<?= base_url; ?>/produk/simpanProduk" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title font-weight-bold">Produk</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="gambar">Gambar Produk</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="gambar" name="gambar">
                      <label class="custom-file-label" for="gambar">Pilih foto</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" class="form-control" placeholder="masukkan nama produk ..." id="nama_produk" name="nama_produk">
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" rows="3" placeholder="masukkan deskripsi produk ..." id="nama_produk" name="deskripsi"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title font-weight-bold">Detail Produk</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Tanggal Update:</label>
                  <div class="input-group date" id="tanggal_update" data-target-input="nearest">
                    <input type="date" class="form-control datetimepicker-input" data-target="#tanggal_update" id="tanggal_update" name="tanggal_update">
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama Toko</label>
                  <input type="text" value="<?= $data['user']['toko_id']; ?>" name="toko_id" hidden>
                  <input type="text" class="form-control" value="<?= $data['user']['nama_toko']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="" class="form-label">Kategori</label>
                  <select class="form-control" name="kategori_id" id="kategori_id">
                    <option selected>Pilih</option>
                    <?php foreach ($data['kategori'] as $key => $kategori) : ?>
                      <option value="<?= $kategori['id']; ?>"><?= $kategori['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" class="form-control" placeholder="Enter ..." id="harga" name="harga">
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->