<!-- Footer -->

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_nav_container">
                    <div class="cr">©2023 All Rights Reserverd. Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">yuka19</a> &amp; distributed by <a href="https://themewagon.com">yuka19</a></div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>
<script src="<?= base_url; ?>/dist/js/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pesan_produk').click(function() {
            var jumlah = $('#quantity_value').text();
            var jumlah_di_modal = $('#jumlah_di_modal').text(jumlah);
            var harga = $('#harga').text()
            var total = parseInt(jumlah) * parseInt(harga);
            $('#total').text(total)
        })
    });

    $(document).ready(function() {
        $('#tambah_ke_keranjang').click(function() {
            var base_url = <?php echo json_encode(base_url); ?>;
            let data = {
                'jumlah': $('#quantity_value').text(),
                'produk_id': $('#produk_id').text(),
                'pelanggan_id': $('#id_pelanggan').text(),
                'pelaku_umkm_id': $('#pelaku_UMKM').text(),
                'total': $('#total').text()
            }
            console.log(data);
            $.ajax({
                type: "POST",
                url: base_url + '/landingpage/tambah_keranjang/tambahKeranjang',
                data: data,
                success: function(response) {
                    location.reload();
                }
            })
        });
    });
</script>

<script src="<?= base_url; ?>/dist/css/bootstrap4/popper.js"></script>
<script src="<?= base_url; ?>/dist/css/bootstrap4/bootstrap.min.js"></script>
<script src="<?= base_url; ?>/dist/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="<?= base_url; ?>/dist/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?= base_url; ?>/dist/plugins/easing/easing.js"></script>
<script src="<?= base_url; ?>/dist/js/custom.js"></script>
<script src="<?= base_url; ?>/dist/js/single_custom.js"></script>
<script src="<?= base_url; ?>/dist/js/categories_custom.js"></script>
</body>

</html>