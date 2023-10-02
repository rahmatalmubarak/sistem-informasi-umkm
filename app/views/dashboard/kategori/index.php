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
    <div class="row">
      <div class="col-sm-12">
        <?php
        Flasher::Message();
        ?>
      </div>
    </div>
    <!-- Default box -->

    <div class="card">
      <?php if($_SESSION['role'] == 'Admin') :?>
      <div class="card-header">
        <h3 class="card-title"><?= $data['title'] ?></h3> <a href="<?= base_url; ?>/kategori/tambah" class="btn float-right btn-primary">Tambah Kategori</a>
        </div>
        <?php endif;?>
      <div class="card-body">
        <form action="<?= base_url; ?>/kategori/cari" method="post">
          <div class="row mb-3">
            <div class="col-lg-6">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="" name="key">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
                  <a class="btn btn-outline-danger" href="<?= base_url; ?>/kategori">Reset</a>
                </div>
              </div>
            </div>
          </div>
        </form>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Kategori</th>
              <?php if($_SESSION['role'] == 'Admin') :?>
              <th style="width: 150px">Action</th>
              <?php endif;?>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['kategori'] as $row) : ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama_kategori']; ?></td>
                <?php if($_SESSION['role'] == 'Admin') :?>
                <td>
                  <a href="<?= base_url; ?>/kategori/edit/<?= $row['id'] ?>" class="btn btn-info">Edit</a> <a href="<?= base_url; ?>/kategori/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                </td>
                <?php endif;?>
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
              <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
              <?php for ($i = 0; $i < $data['paginate']; $i++) {
                # code...
              ?>
                <form action="" method="post">
                  <li class="paginate_button page-item"><a href="<?php echo base_url; ?>/kategori/page/<?php echo $i + 1 ?>" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i + 1 ?></a></li>
                </form>
              <?php } ?>
              <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
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
<!-- /.content-wrapper -->