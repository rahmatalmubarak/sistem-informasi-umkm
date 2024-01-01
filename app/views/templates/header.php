<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $data['title']; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?= base_url; ?>/dist/css/bootstrap4/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="<?= base_url; ?>/assets/img/logo.png">
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
        .navbar {
            height: 75px;
        }

        .main_slider {
            margin-top: 75px;
        }

        .red_button {
            padding-left: 8px;
            padding-right: 8px;
        }

        .bg-yellow {
            color: #FCBF49;
        }

        .add_to_cart_button {
            width: 100%;
            margin-left: 0px;
            font-size: 12px !important;
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 1000px;
                margin: 30px auto;
            }
        }

        .product_section_container {
            margin-top: 100px;
        }
    </style>
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header trans_300">

            <!-- Main Navigation -->

            <div class="main_nav_container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="logo_container">
                                <a href="<?= base_url . '/landingpage' ?>">SI<span>UMKM</span></a>
                            </div>
                            <nav class="navbar">
                                <ul class="navbar_menu">
                                    <li><a href="<?= base_url . '/landingpage/index/'; ?>#home">home</a></li>
                                    <!-- <li><a href="#kategori">kategori</a></li> -->
                                    <li><a href="<?= base_url . '/landingpage/list_produk'; ?>">produk</a></li>
                                    <li><a href="<?= base_url . '/landingpage/index/'; ?>#tentang">tentang</a></li>
                                    <li><a href="<?= base_url . '/landingpage/index/'; ?>#cs">costumer service</a></li>
                                    <li><a href="<?= base_url . '/landingpage/index/'; ?>#kontak">kontak</a></li>
                                </ul>
                                <ul class="navbar_user">
                                    <li>
                                        <a class="btn btn-outline-primary" style="padding-left: 20px; padding-right: 20px; width: 100px;" href="<?= isset($_SESSION['session_login']) != 'sudah_login' ? base_url . '/auth/login' : base_url . '/home' ?>"><?= isset($_SESSION['session_login']) != 'sudah_login' ?  'Login' : 'Dasboard'; ?></a>
                                    </li>

                                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Pelanggan') : ?>
                                        <li class="checkout">
                                            <a href="<?= base_url . '/transaksi'; ?>">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                <?php
                                                $jumlah_keranjang = $this->model('TransaksiModel')->get_semua_keranjang($_SESSION['id']);
                                                if ($jumlah_keranjang > 0) :
                                                ?>
                                                    <span id="checkout_items" class="checkout_items"><?= $jumlah_keranjang; ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                                <div class="hamburger_container">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <div class="fs_menu_overlay"></div>
        <div class="hamburger_menu">
            <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
            <div class="hamburger_menu_content text-right">
                <ul class="menu_top_nav">
                    <li class="menu_item"><a href="#home">home</a></li>
                    <!-- <li class="menu_item"><a href="#">kategori</a></li> -->
                    <li class="menu_item"><a href="#produk">produk</a></li>
                    <li class="menu_item"><a href="#tentang">tentang</a></li>
                    <li class="menu_item"><a href="#cs">costumer service</a></li>
                    <li class="menu_item"><a href="#kontak">kontak</a></li>
                </ul>
            </div>
        </div>

        <!-- Slider -->