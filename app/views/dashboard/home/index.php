  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <?php foreach ($data['jumlah'] as $key => $kategori) : 
            if($kategori[0]['id'] != null) :?>
            <div class="col-lg-3 col-6">
              <div class="small-box <?= $kategori[0]['warna']?>">
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
          <?php endif;endforeach; ?>
        </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->