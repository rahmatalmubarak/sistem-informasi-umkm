<?php

class Home extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/landingpage/index');
			exit;
		}
		if($_SESSION['role'] == 'Admin') {
			header('location: '. base_url . '/user');
		}
		if($_SESSION['role'] == 'Pelanggan') {
			header('location: '. base_url . '/transaksi');
		}
	} 
	public function index()
	{
		$data['title'] = 'Halaman Home';
		$data['jumlah'] = $this->model('HomeModel')->jumlah_data();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/home/index', $data);
		$this->view('dashboard/templates/footer');
	}
}