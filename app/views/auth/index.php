<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $data['title']?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/css/bootstrap4/bootstrap.min.css">
	<link href="<?= base_url; ?>/dist/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/css/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/css/contact_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/css/contact_responsive.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/css/single_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/css/single_responsive.css">

	<style>
		.super_container {
			height: 100%;
		}

		.row {
			align-items: center;
		}

		.contact_container {
			padding-bottom: 0px;
			border-bottom: none;
		}

		.submit-button {
			display: flex;
			align-items: center;
		}

		.submit-button>p {
			margin-left: 20px;
			font-size: 13px;
		}

		.submit-button>button {
			width: 110px;
		}

		.submit-button>p>a {
			color: red;
		}
	</style>
</head>

<body>

	<div class="super_container">
		<div class="container contact_container">
			<!-- Contact Us -->

			<div class="row">

				<div class="col-lg-6 contact_col">
					<div class="contact_contents">
						<h1>Sistem Informasi UMKM</h1>
						<p>Selamat datang di Sistem Informasi UMKM yang inovatif dan dapat diandalkan! Kami hadir untuk memberdayakan UMKM dengan teknologi canggih, menyederhanakan operasi bisnis Anda, dan membantu Anda mencapai kesuksesan yang lebih besar. Bergabunglah dengan kami hari ini untuk merasakan perubahan positif dalam bisnis Anda.</p>
					</div>
				</div>

				<div class="col-lg-6 get_in_touch_col">
					<div class="get_in_touch_contents">
						<h1>Login</h1>
						<form method="POST" action="<?= base_url; ?>/auth/prosesLogin">
							<div>
								<input id=" input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="Email" required="required" data-error="Valid email is required.">
								<input id="input_password" class="form_input input_name input_ph" type="password" name="password" placeholder="password" required="required" data-error="Password is required.">
							</div>
							<div class="submit-button">
								<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300">Login</button>
								<p>Belum punya akun? Klik <a href="<?= base_url . '/auth/register' ?>">daftar</a> untuk bergabung</p>
							</div>
						</form>
					</div>
					<div class="row mt-4">
						<div class="col-sm-12">
							<?php
							Flasher::Message();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url; ?>/dist/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url; ?>/dist/css/bootstrap4/popper.js"></script>
	<script src="<?= base_url; ?>/dist/css/bootstrap4/bootstrap.min.js"></script>
	<script src="<?= base_url; ?>/dist/plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="<?= base_url; ?>/dist/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="<?= base_url; ?>/dist/plugins/easing/easing.js"></script>
	<script src="<?= base_url; ?>/dist/js/custom.js"></script>
	<script src="<?= base_url; ?>/dist/js/single_custom.js"></script>
</body>

</html>