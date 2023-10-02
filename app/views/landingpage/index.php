<!-- Home -->
<div class="main_slider" style="background-image:url(<?= base_url; ?>/dist/img/slider_1.jpg)" id="home">
	<div class="container fill_height">
		<div class="row align-items-center fill_height">
			<div class="col">
				<div class="main_slider_content">
					<h6>Selamat datang di</h6>
					<h1>Sistem Informasi UMKM</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Produk -->

<div class="new_arrivals" id="produk">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Produk</h2>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col text-center">
				<div class="new_arrivals_sorting">
					<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
						<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
						<?php foreach ($data['kategori'] as $key => $kategori) : ?>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter="<?= '.' . $kategori['nama_kategori'] ?>"><?= $kategori['nama_kategori'] ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

					<!-- Product 1 -->
					<?php foreach ($data['produk'] as $key => $produk) : ?>
						<?php
						$toko = $this->model('TokoModel')->getTokoById($produk['toko_id']);
						$pemilik_toko = $this->model('UserModel')->getPemilikToko($produk['toko_id']);
						?>
						<div class="product-item <?= $produk['nama_kategori'] ?>">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="<?= base_url . '/assets/img/produk/' . $produk['gambar'] ?>">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><?= $produk['nama_produk']; ?></h6>
									<div class="product_price">Rp. <?= number_format($produk['harga'], 2) ?></div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="<?= base_url . '/landingpage/detail_product/' . $produk['id']; ?>">Cek Detail Produk</a></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Costumer service -->

<div class="blogs" id="cs">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title">
					<h2>Costumer Services</h2>
				</div>
			</div>
		</div>
		<div class="row blogs_container">
			<div class="col-lg-4 blog_item_col">
				<div class="blog_item">
					<div class="blog_background" style="background-image:url(<?= base_url; ?>/dist/img/blog_1.jpg)"></div>
					<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
						<h4 class="blog_title">Nama Lengkap</h4>
						<span class="blog_meta">Falkultas dan jurusan</span>
						<span>NIM</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4 blog_item_col">
				<div class="blog_item">
					<div class="blog_background" style="background-image:url(<?= base_url; ?>/dist/img/blog_2.jpg)"></div>
					<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
						<h4 class="blog_title">Nama Lengkap</h4>
						<span class="blog_meta">Falkultas dan jurusan</span>
						<span>NIM</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4 blog_item_col">
				<div class="blog_item">
					<div class="blog_background" style="background-image:url(<?= base_url; ?>/dist/img/blog_3.jpg)"></div>
					<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
						<h4 class="blog_title">Nama Lengkap</h4>
						<span class="blog_meta">Falkultas dan jurusan</span>
						<span>NIM</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Kontak -->
<div class="container contact_container" id="tentang">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 contact_col">
				<div class="contact_contents">
					<h1>Kontak</h1>
					<p>There are many ways to contact us. You may drop us a line, give us a call or send an email, choose what suits you the most.</p>
					<div>
						<p>(800) 686-6688</p>
						<p>info.deercreative@gmail.com</p>
					</div>
					<div>
						<p>mm</p>
					</div>
					<div>
						<p>Open hours: 8.00-18.00 Mon-Fri</p>
						<p>Sunday: Closed</p>
					</div>
				</div>

				<!-- Follow Us -->

				<div class="follow_us_contents">
					<h1>Follow Us</h1>
					<ul class="social d-flex flex-row">
						<li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>

			</div>

			<div class="col-lg-6 get_in_touch_col" id="kontak">
				<div class="get_in_touch_contents">
					<h1>Get In Touch With Us!</h1>
					<p>Fill out the form below to recieve a free and confidential.</p>
					<form action="post">
						<div>
							<input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="Name" required="required" data-error="Name is required.">
							<input id="input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="Email" required="required" data-error="Valid email is required.">
							<input id="input_website" class="form_input input_website input_ph" type="url" name="name" placeholder="Website" required="required" data-error="Name is required.">
							<textarea id="input_message" class="input_ph input_message" name="message" placeholder="Message" rows="3" required data-error="Please, write us a message."></textarea>
						</div>
						<div>
							<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">send message</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>