<link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/css/categories_styles.css">
<link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/css/categories_responsive.css">

<div class="container product_section_container">
	<div class="row">
		<div class="col product_section clearfix">

			<!-- Breadcrumbs -->

			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="<?= base_url . '/landingpage'; ?>">Home</a></li>
					<li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>List Produk</a></li>
				</ul>
			</div>

			<!-- Sidebar -->
			<div class="sidebar">
				<div class="sidebar_section">
					<div class="sidebar_title">
						<h5>Product Category</h5>
					</div>
					<ul class="sidebar_categories">
						<li><a href="<?= base_url . '/landingpage/list_produk' ?>">All</a></li>
						<?php foreach ($data['kategori'] as $key => $kategori) : ?>
							<li><a href="<?= base_url . '/landingpage/kategori/' . $kategori['nama_kategori'] ?>"><?= $kategori['nama_kategori']; ?></a></li>
						<?php endforeach; ?>
						<!-- <li class="active"><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Women</a></li> -->
					</ul>
				</div>

			</div>

			<!-- Main Content -->

			<div class="main_content">

				<!-- Products -->

				<div class="products_iso">
					<div class="row">
						<div class="col">

							<!-- Product Grid -->

							<div class="product-grid">

								<!-- Product 1 -->
								<?php foreach ($data['produk'] as $key => $produk) : ?>
									<div class="product-item men">
										<div class="product discount product_filter">
											<div class="product_image">
												<img src="<?= base_url . '/assets/img/produk/' . $produk['gambar'] ?>">
											</div>
											<div class="product_info">
												<h6 class="product_name"><?= $produk['nama_produk'] ?></h6>
												<div class="product_price">Rp. <?= number_format($produk['harga'], 0); ?></div>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="<?= base_url . '/landingpage/detail_product/' . $produk['id']; ?>">Cek Detail Produk</a></div>
									</div>
								<?php endforeach; ?>
							</div>

							<!-- Product Sorting -->
							<?php if ($data['paginate']) : ?>
								<div class="product_sorting_container product_sorting_container_bottom clearfix">
									<div class="pages d-flex flex-row align-items-center">
										<div class="page_current">
											<span>1</span>
											<ul class="page_selection">
												<?php for ($i = 0; $i < $data['paginate']; $i++) : ?>
													<li><a href="<?= base_url; ?>/landingpage/page/<?= $i + 1 ?>"><?= $i + 1; ?></a></li>
												<?php endfor; ?>
											</ul>
										</div>
										<div class="page_total"><span>of</span> 3</div>
										<div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>
								</div>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Benefit -->

<div class="benefit">
	<div class="container">
		<div class="row benefit_row">
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>free shipping</h6>
						<p>Suffered Alteration in Some Form</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>cach on delivery</h6>
						<p>The Internet Tend To Repeat</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>45 days return</h6>
						<p>Making it Look Like Readable</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>opening all week</h6>
						<p>8AM - 09PM</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>