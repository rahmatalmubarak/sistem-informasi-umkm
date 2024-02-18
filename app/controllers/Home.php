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
		$id = $_SESSION['id'];
		$bln = isset($_GET['bln']) ? $_GET['bln'] : 0;
		$thn = isset($_GET['thn']) ? $_GET['thn'] : 0;
		$data['title'] = 'Halaman Home';
		$data['jumlah'] = $this->model('HomeModel')->jumlah_data();
		$data['transaksi'] = $this->model('TransaksiModel')->getTransaksiSudahBayarById($id, $bln, $thn);
		$data['paginate'] = $this->model('TransaksiModel')->get_pagination_number();
		$data['total_semua'] = $this->model('TransaksiModel')->getTotalSemuaTransaksiById($id, $bln, $thn);
		$data['graf'] = $this->model('TransaksiModel')->getTotalPerDayById($id,$bln, $thn);

		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/home/index', $data);
		$this->view('dashboard/templates/footer', $data);
	}

	public function cari()
	{
		$id = $_SESSION['id'];
		$bln = isset($_GET['bln']) ? $_GET['bln'] : 0;
		$thn = isset($_GET['thn']) ? $_GET['thn'] : 0;
		$data['title'] = 'Halaman Home';
		$data['jumlah'] = $this->model('HomeModel')->jumlah_data();
		$data['transaksi'] = $this->model('TransaksiModel')->getTransaksiSudahBayarById($id, $bln,$thn);
		$data['paginate'] = $this->model('TransaksiModel')->get_pagination_number();
		$data['total_semua'] = $this->model('TransaksiModel')->getTotalSemuaTransaksiById($id, $bln,$thn);
		$data['graf'] = $this->model('TransaksiModel')->getTotalPerDayById($id,$bln,$thn);

		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/home/index', $data);
		$this->view('dashboard/templates/footer', $data);
	}

	public function pages()
	{
		$id = $_SESSION['id'];
		$page = $_GET['page'];
		$bln = isset($_GET['bln']) ? $_GET['bln'] : 0;
		$thn = isset($_GET['thn']) ? $_GET['thn'] : 0;
		$data['title'] = 'Data Transaksi';
		$data['jumlah'] = $this->model('HomeModel')->jumlah_data();
		$data['transaksi'] = $this->model('HomeModel')->pagination($page);
		$data['paginate'] = $this->model('TransaksiModel')->get_pagination_number();
		$data['total_semua'] = $this->model('TransaksiModel')->getTotalSemuaTransaksiById($id,$bln, $thn);
		$data['graf'] = $this->model('TransaksiModel')->getTotalPerDayById($id, $bln, $thn);

		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/home/index', $data);
		$this->view('dashboard/templates/footer', $data);
	}
}