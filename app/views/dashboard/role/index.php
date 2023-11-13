<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="d-flex row mb-2">
        <div class="col-sm-10">
          <h1>Halaman Role</h1>
        </div>
        <div class="col-sm-2">
          <a href="<?= base_url; ?>/role/tambah" class="btn float-right btn-primary">Tambah Role</a>
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
        <form action="<?= base_url; ?>/role/cari" method="post">
          <div class="row mb-3">
            <div class="col-lg-6">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="" name="key">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
                  <a class="btn btn-outline-danger" href="<?= base_url; ?>/role">Reset</a>
                </div>
              </div>
            </div>
          </div>
        </form>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Role</th>
              <th style="width: 160px">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['role'] as $row) : ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama_role']; ?></td>
                <td>
                  <a href="<?= base_url; ?>/role/edit/<?= $row['id'] ?>" class="btn btn-info">Edit</a> <a href="<?= base_url; ?>/role/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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
              <li class="paginate_button page-item previous <?= isset($_GET['page']) && $_GET['page'] <= 1 ? 'disabled' : '' ?>" id="example1_previous"><a href="<?= base_url; ?>/role/pages?page=<?= isset($_GET['page']) && $_GET['page'] >= 1 ? $_GET['page'] - 1 : 1 ?>" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
              <?php for ($i = 0; $i < $data['paginate']; $i++) : ?>
                <form action="" method="post">
                  <li class="paginate_button page-item"><a href="<?= base_url; ?>/role/pages?page=<?= $i + 1 ?>" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link"><?= $i + 1 ?></a></li>
                </form>
              <?php endfor; ?>
              <li class="paginate_button page-item next <?= isset($_GET['page']) && $_GET['page'] >= $data['paginate'] ? 'disabled' : '' ?>" id="example1_next"><a href="<?= base_url; ?>/role/pages?page=<?= isset($_GET['page']) && $_GET['page'] < $data['paginate'] ? $_GET['page'] + 1 : 1 ?>" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
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