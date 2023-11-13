<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Transaksi</h1>
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
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title font-weight-bold"><?= $data['title'] ?></h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url; ?>/transaksi/cari" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" name="key">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
                                    <a class="btn btn-outline-danger" href="<?= base_url; ?>/transaksi">Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>

                            <?php if ($_SESSION['role'] != 'Pelanggan') : ?>
                                <th>Pelanggan</th>
                            <?php endif; ?>
                            <th>Nama Produk</th>
                            <th>Harga </th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Rekening Toko</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Confirm</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data['transaksi'] as $row) :
                            $toko = $this->model('TokoModel')->getTokoById($row['toko_id']);
                            $pemilik_toko = $this->model('UserModel')->getPemilikToko($row['toko_id']);
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <?php if ($_SESSION['role'] != 'Pelanggan') : ?>
                                    <td><?= $row['nama_pelanggan']; ?></td>
                                <?php endif; ?>
                                <td><?= $row['nama_produk']; ?></td>
                                <td>Rp. <?= number_format($row['harga']); ?></td>
                                <td><?= $row['jumlah']; ?></td>
                                <td>Rp. <?= number_format($row['total']); ?></td>
                                <td><?= $pemilik_toko['rekening']; ?></td>
                                <td><?= $row['tanggal_transaksi']; ?></td>
                                <td><?= $row['status']; ?></td>
                                <td>
                                    <?php if ($_SESSION['role'] == 'Pelanggan' && $row['status'] == 'belum bayar') : ?>
                                        <a target="_blank" href="https://wa.me/+62<?= $pemilik_toko['kontak']; ?>" class="btn btn-xs btn-success">Konfirmasi Pembayaran</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['role'] != 'Pelanggan') : ?>
                                        <a href="<?= base_url; ?>/transaksi/updateTransaksi/<?= $row['id_transaksi'] ?>" class="btn btn-xs btn-info">Ganti status</a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($_SESSION['role'] == 'Pelaku UMKM' || $row['status'] != 'sudah bayar') : ?>
                                        <a href="<?= base_url; ?>/transaksi/hapus/<?= $row['id_transaksi'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row" style="padding: 1.25rem;">
                <div class="col-sm-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous <?= isset($_GET['page']) && $_GET['page'] <= 1 ? 'disabled' : '' ?>" id="example1_previous"><a href="<?= base_url; ?>/transaksi/pages?page=<?= isset($_GET['page']) && $_GET['page'] >= 1 ? $_GET['page'] - 1 : 1 ?>" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                            <?php for ($i = 0; $i < $data['paginate']; $i++) : ?>
                                <form action="" method="post">
                                    <li class="paginate_button page-item"><a href="<?= base_url; ?>/transaksi/pages?page=<?= $i + 1 ?>" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link"><?= $i + 1 ?></a></li>
                                </form>
                            <?php endfor; ?>
                            <li class="paginate_button page-item next <?= isset($_GET['page']) && $_GET['page'] >= $data['paginate'] ? 'disabled' : '' ?>" id="example1_next"><a href="<?= base_url; ?>/transaksi/pages?page=<?= isset($_GET['page']) && $_GET['page'] < $data['paginate'] ? $_GET['page'] + 1 : 1 ?>" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>