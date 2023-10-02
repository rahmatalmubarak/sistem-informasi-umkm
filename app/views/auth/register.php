<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $data['title']; ?></title>
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


</head>

<body>

	<style>
		.super_container {
			height: 100%;
		}

		.row {
			align-items: center;
			justify-content: center;
		}

		.contact_container {
			/* margin-top: 20px; */
			padding-bottom: 0px;
			border-bottom: none;
		}

		.get_in_touch_contents {
			text-align: center;
		}

		.input_ph {
			margin-top: 20px;
		}

		.form_input {
			height: 40px;
		}

		#review_submit {
			width: 110px;
		}
	</style>

	<div class="super_container">
		<div class="container contact_container">
			<!-- Contact Us -->
			<div class="row mt-4">
				<div class="col-sm-12">
					<?php
					Flasher::Message();
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 get_in_touch_col">
					<div class="get_in_touch_contents">
						<h2>Register</h2>
						<form action="<?= base_url; ?>/auth/simpanpelanggan" method="post" enctype="multipart/form-data">
							<div>
								<input id="input_photo" class="form_input input_name input_ph" type="file" name="photo" placeholder="Photo" required="required" data-error="photo is required.">
								<input id="input_name" class="form_input input_name input_ph" type="text" name="nama" placeholder="Name" required="required" data-error="Valid name is required.">
								<input id="input_email" class="form_input input_name input_ph" type="text" name="email" placeholder="Email" required="required" data-error="Email is required.">
								<select id="input_jenis_kelamin" class="form_input input_name input_ph" type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" required="required" data-error="Jenis kelamin is required.">
									<option value="laki-laki">Laki - laki</option>
									<option value="perempuan">Perempuan</option>
								</select>
								<input id="input_kontak" class="form_input input_name input_ph" type="text" name="kontak" placeholder="Kontak" required="required" data-error="Kontak is required.">
								<input id="input_role" class="form_input input_name input_ph" type="text" name="role_id" value="3" hidden>
								<input id="input_alamat" class="form_input input_name input_ph" type="text" name="alamat" placeholder="Alamat" required="required" data-error="Alamat is required.">
								<input id="input_password" class="form_input input_name input_ph" type="password" name="password" placeholder="Password" required="required" data-error="Password is required.">
								<input id="input_re_password" class="form_input input_name input_ph" type="password" name="ulangi_password" placeholder="Re Password" required="required" data-error="re_password is required.">
							</div>
							<div style="display: flex; justify-content: left;">
								<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">Register</button>
							</div>
						</form>
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