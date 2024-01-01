<style>
	.tabs_section_container {
		margin-bottom: 20px;
	}

	.d-flex {
		justify-content: space-between
	}

	.btn-order {
		margin-top: 20px;
	}

	.quantity_selector {
		width: 170px;
		padding-left: 5px;
	}

	.single_product_container {
		margin-top: 75px;
	}
</style>
<div class="container single_product_container">
	<div class="row">
		<div class="col">
			<!-- Breadcrumbs -->
			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="<?= base_url . '/landingpage/index'; ?>">Home</a></li>
					<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i><?= $data['produk']['nama_kategori'] ?></a></li>
					<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i><?= $data['produk']['nama_produk'] ?></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-7">
			<div class="single_product_pics">
				<div class="row">
					<div class="col-lg-12 image_col order-lg-2 order-1">
						<div class="single_product_image">
							<div class="single_product_image_background" style="background-image:url(<?= base_url . '/assets/img/produk/' . $data['produk']['gambar'] ?>)"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="product_details">
				<div class="product_details_title">
					<h2><?= $data['produk']['nama_produk']; ?></h2>
					<p>Toko : <?= $data['produk']['nama_toko'] ?></p>
					<p>Tanggal update : <?= $data['produk']['tanggal_update'] ?></p>
				</div>
				<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
					<span class="ti-truck"></span><span>Price</span>
				</div>
				<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
					<div class="product_price">Rp. <?= number_format($data['produk']['harga'], 0); ?></div>
					<div class="quantity_selector">
						<span>Quantity </span>
						<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
						<span id="quantity_value">1</span>
						<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="pesan">
					<a class="btn btn-order btn-danger" <?= isset($_SESSION['session_login']) && $_SESSION['session_login'] == 'sudah_login' ?  'data-toggle="modal" data-target="#modal-default"' : 'href="' . base_url . '/auth/login"' ?> id="pesan_produk" style="cursor: pointer; color: white;">Pesan Produk</a>
					<a class="btn btn-order btn-success" href="https://wa.me/+62<?= $data['produk']['kontak']; ?>">Pesan via WA</a>
					<a class="btn btn-order btn-info" href="#deskripsi">Deskripsi Produk</a>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Tabs -->

<div class="tabs_section_container">

	<div class="container">
		<div class="row">
			<div class="col">
				<div class="tabs_container">
					<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
						<li class="tab active" data-active-tab="tab_1" id="deskripsi"><span>Description</span></li>
						<li class="tab" data-active-tab="tab_2"><span>Alamat</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">

				<!-- Tab Description -->

				<div id="tab_1" class="tab_container active">
					<div class="row">
						<div class="col-lg-12 desc_col">
							<div class="tab_text_block">
								<h2><?= $data['produk']['nama_produk']; ?></h2>
								<p><?= $data['produk']['deskripsi']; ?></p>
							</div>
						</div>
					</div>
				</div>

				<!-- Tab Additional Info -->

				<div id="tab_2" class="tab_container">
					<div class="row">
						<div class="col additional_info_col">
							<p><?= $data['produk']['alamat']; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Invoice SI UMKM </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Table row -->
				<div class="row">
					<div class="col-12">
						<h4>
							<small class="float-right">Date: <?= date('D, d M Y'); ?></small>
						</h4>
					</div>
					<!-- /.col -->
				</div>
				<!-- info row -->
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
						From
						<address>
							<span id="id_pelanggan" hidden><?= $data['pelanggan']['id'] ?></span>
							<strong><?= $data['pelanggan']['nama'] ?></strong><br>
							<?= $data['pelanggan']['alamat']['alamat_lengkap'] ?><br>
							Phone: <?= $data['pelanggan']['kontak'] ?><br>
							Email: <?= $data['pelanggan']['email'] ?>
						</address>
					</div>
					<div class="col-sm-4 invoice-col">
						To
						<address>
							<span id="pelaku_UMKM" hidden><?= $data['pelaku_UMKM']['id'] ?></span>
							<span id="produk_id" hidden><?= $data['produk']['id'] ?></span>
							<strong><?= $data['produk']['nama_toko'] ?></strong><br>
							<?= $data['pelaku_UMKM']['nama'] ?><br>
							<?= $data['pelaku_UMKM']['alamat']['alamat_lengkap'] ?><br>
							Phone: <?= $data['pelaku_UMKM']['kontak'] ?><br>
							Email: <?= $data['pelaku_UMKM']['email'] ?><br>
							No Rekening: <?= $data['pelaku_UMKM']['rekening'] ?>
						</address>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
				<div class="row">
					<div class="col-12 table-responsive">
						<table class="table table-striped" id="table_invoice">
							<thead>
								<tr>
									<th>Jumlah</th>
									<th style="width: 30%;">Nama Produk</th>
									<th style="width: 30%;">Deskripsi</th>
									<th>harga</th>
								</tr>
							</thead>
							<tbody id="list_belanja">
								<tr>
									<td id='jumlah_di_modal'></td>
									<td><?= $data['produk']['nama_produk']; ?></td>
									<td><?= $data['produk']['deskripsi']; ?></td>
									<td>Rp. <span id='harga'><?= $data['produk']['harga']; ?></span></td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<div class="row">
					<div class="col-6">
					</div>
					<!-- /.col -->
					<div class="col-6">
						<p class="lead">Amount Due <?= date('D, d M Y'); ?></p>

						<div class="table-responsive">
							<table class="table">
								<tr>
									<th>Total:</th>
									<td>Rp. <span id="total"></span></td>
								</tr>
							</table>
						</div>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<!-- this row will not appear when printing -->
				<div class="row no-print">
					<div class="col-12">
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<div>
					<a href="https://wa.me/+62<?= $data['produk']['kontak']; ?>" class="btn btn-success float-right ml-2">Kirim Bukti Pembayaran</a>
					<button class="btn btn-danger float-right" id="tambah_ke_keranjang">Tambahkan ke keranjang</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->