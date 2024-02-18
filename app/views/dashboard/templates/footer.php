<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright &copy;2023 yuka19 All rights
    reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url; ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url; ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url; ?>/dist/js/demo.js"></script> -->
<script type="text/javascript">
  $(document).ready(function() {
    function getData(type, provinsi) {
      var data = '',
        url = '<?= base_url; ?>' + "/alamat/provinsi",
        i;
      switch (type) {
        case 'propinsi':
          url = '<?= base_url; ?>' + "/alamat/provinsi",
            $.ajax({
              method: 'GET',
              url: url,
              dataType: "json",
              success: function(result) {
                provinsi_list = result.rajaongkir.results;
                data += '<option value="">--Pilih--</option>';
                for (i = 0; i < provinsi_list.length; i++) {
                  data += '<option value="' + provinsi_list[i]['province_id'] + '">' + provinsi_list[i]['province'] + '</option>';
                };
                $('#' + type).html(data);
              }
            });
          break;
        case 'kabupaten':
          url = `http://localhost/umkm/public/alamat/kota?provinsi=${provinsi}`;
          $.ajax({
            method: 'GET',
            url: url,
            dataType: "json",
            success: function(result) {
              kota_list = result.rajaongkir.results;
              data += '<option value="">--Pilih--</option>';
              for (i = 0; i < kota_list.length; i++) {
                data += '<option value="' + kota_list[i]['city_id'] + '">' + kota_list[i]['city_name'] + '</option>';
              };
              $('#' + type).html(data);
            }
          });
          break;

        default:
          break;
      }

    };

    //get propinsi when document ready
    getData('propinsi');

    //get kabupaten when provinsi selected
    $('#propinsi').on('change', function() {
      getData('kabupaten', $(this).val());
    });

    function select_kabupaten(provinsi, value) {
      var data = '',
        url = `http://localhost/umkm/public/alamat/kota?provinsi=${provinsi}`;
      $.ajax({
        method: 'GET',
        url: url,
        dataType: "json",
        success: function(result) {
          kota_list = result.rajaongkir.results;
          data += '<option value="">--Pilih--</option>';
          for (i = 0; i < kota_list.length; i++) {
            data += '<option value="' + kota_list[i]['city_id'] + '">' + kota_list[i]['city_name'] + '</option>';
          };
          $('#kabupaten').html(data);
          $(`#kabupaten option[value=${value}]`).attr('selected', 'selected');
        }
      });
    }

    let url_ = '<?= base_url; ?>' + "/user/alamatUser?user_id=" + '<?= $_SESSION['id'] ?>';
    $.ajax({
      method: 'GET',
      url: url_,
      dataType: "json",
      success: function(result) {
        let alamat = result.alamat_lengkap;
        $(`#propinsi option[value=${alamat.provinsi}]`).attr('selected', 'selected');
        select_kabupaten($('#propinsi').val(), alamat.kabupaten_kota);
        $('#alamat_lengkap').val(alamat.alamat_lengkap);
        $('#kode_pos').val(alamat.kode_pos);
      }
    });
  });

  var ctx = document.getElementById("myChart");
  var labels = '<?php
                $labels = '';
                foreach ($data['graf'] as $transaksi) {
                  $labels .= ','.(int) date_format(date_create($transaksi['tanggal_transaksi']), "j") ;
                }
                echo $labels;
                ?>';
  var total = '<?php
                $total = '';
                foreach ($data['graf'] as $transaksi) {
                  $total .=  ','.$transaksi['total_transaksi'] ;
                }
                echo $total;
                ?>';
  console.log(labels);
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels.split(','),
      datasets: [{
        label: 'Pemasukan',
        data: total.split(','),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1,
        borderWidth: 2
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>
</body>

</html>