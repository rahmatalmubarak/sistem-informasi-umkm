  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <?php foreach ($data['jumlah'] as $key => $kategori) :
            if ($kategori[0]['id'] != null) : ?>
              <div class="col-lg-3 col-6">
                <div class="small-box <?= $kategori[0]['warna'] ?>">
                  <div class="inner">
                    <h3><?= $kategori[0][$key]; ?><sup style="font-size: 20px"></sup></h3>
                    <p><?= $key; ?></p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer" style="height: 20px;"></a>
                </div>
              </div>
          <?php endif;
          endforeach; ?>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title font-weight-bold">Grafik Transaksi</h3>
        </div>
        <div class="card-body">
          <form action="<?= base_url; ?>/home/cari" method="get">
            <div class="row mb-3">
              <div class="col-lg-6">
                <div class="input-group" >
                  <select class="form-control" name="bln" id="bln">
                    <option value="1" <?php if (isset($_GET['bln']) && $_GET['bln'] == 1) echo 'selected'; ?>>Januari</option>
                    <option value="2" <?php if (isset($_GET['bln']) && $_GET['bln'] == 2) echo 'selected'; ?>>Febuari</option>
                    <option value="3" <?php if (isset($_GET['bln']) && $_GET['bln'] == 3) echo 'selected'; ?>>Maret</option>
                    <option value="4" <?php if (isset($_GET['bln']) && $_GET['bln'] == 4) echo 'selected'; ?>>April</option>
                    <option value="5" <?php if (isset($_GET['bln']) && $_GET['bln'] == 5) echo 'selected'; ?>>Mei</option>
                    <option value="6" <?php if (isset($_GET['bln']) && $_GET['bln'] == 6) echo 'selected'; ?>>Juni</option>
                    <option value="7" <?php if (isset($_GET['bln']) && $_GET['bln'] == 7) echo 'selected'; ?>>Juli</option>
                    <option value="8" <?php if (isset($_GET['bln']) && $_GET['bln'] == 8) echo 'selected'; ?>>Agustus</option>
                    <option value="9" <?php if (isset($_GET['bln']) && $_GET['bln'] == 9) echo 'selected'; ?>>September</option>
                    <option value="10" <?php if (isset($_GET['bln']) && $_GET['bln'] == 10) echo 'selected'; ?>>Oktober</option>
                    <option value="11" <?php if (isset($_GET['bln']) && $_GET['bln'] == 11) echo 'selected'; ?>>November</option>
                    <option value="12" <?php if (isset($_GET['bln']) && $_GET['bln'] == 12) echo 'selected'; ?>>Desember</option>
                  </select>
                  <input class="form-control" name="thn" type="number" min="1900" max="2099" step="1" value="<?= isset($_GET['thn']) ? $_GET['thn'] : 2016;?>" />
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <canvas id="myChart"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>

    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title font-weight-bold">Tabel Transaksi</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Nama Pelanggan</th>
                <th>Nama Produk</th>
                <th>Tanggal</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($data['transaksi'] as $row) :
                $pelanggan = $this->model('UserModel')->getUserById($row['pelanggan_id']);
                $produk = $this->model('ProdukModel')->getProdukById($row['produk_id']);
              ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $pelanggan['nama']; ?></td>
                  <td><?= $produk['nama_produk']; ?></td>
                  <td><?= $row['tanggal_transaksi']; ?></td>
                  <td>Rp. <?= number_format($row['total']); ?></td>
                </tr>
              <?php $no++;
              endforeach; ?>
              <tr>
                <td colspan="4">Total Transaksi Perbulan</td>
                <td>Rp. <?= number_format($data['total_semua']['total_semua']); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row" style="padding: 1.25rem;">
          <div class="col-sm-12">
            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
              <ul class="pagination">
                <li class="paginate_button page-item previous <?= isset($_GET['page']) && $_GET['page'] <= 1 ? 'disabled' : '' ?>" id="example1_previous"><a href="<?= base_url; ?>/home/pages?page=<?= isset($_GET['page']) && $_GET['page'] >= 1 ? $_GET['page'] - 1 : 1 ?><?= isset($_GET['bln']) ? '&bln=' . $_GET['bln'].'&thn='. $_GET['thn']  : ''; ?>" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                <?php for ($i = 0; $i < $data['paginate']; $i++) : ?>
                  <form action="" method="post">
                    <li class="paginate_button page-item"><a href="<?= base_url; ?>/home/pages?page=<?= $i + 1 ?><?= isset($_GET['bln']) ? '&bln=' . $_GET['bln'].'&thn='. $_GET['thn']  : ''; ?>" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link"><?= $i + 1 ?></a></li>
                  </form>
                <?php endfor; ?>
                <li class="paginate_button page-item next <?= isset($_GET['page']) && $_GET['page'] >= $data['paginate'] ? 'disabled' : '' ?>" id="example1_next"><a href="<?= base_url; ?>/home/pages?page=<?= isset($_GET['page']) && $_GET['page'] < $data['paginate'] ? $_GET['page'] + 1 : 1 ?><?= isset($_GET['bln']) ? '&bln=' . $_GET['bln'].'&thn='. $_GET['thn'] : ''; ?>" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
  </div>
  <!-- /.content-wrapper -->