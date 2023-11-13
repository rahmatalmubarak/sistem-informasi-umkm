<?php

class Transaksi extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/auth/login');
			exit;
		}
	} 
	public function index()
	{
		$data['title'] = 'Data Transaksi';
		$data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi();
		$data['paginate'] = $this->model('TransaksiModel')->get_pagination_number();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/transaksi/index', $data);
		$this->view('dashboard/templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Transaksi';
		$data['transaksi'] = $this->model('TransaksiModel')->cariTransaksi();
		$data['paginate'] = $this->model('TransaksiModel')->get_pagination_number();
		$data['key'] = $_POST['key'];
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/transaksi/index', $data);
		$this->view('dashboard/templates/footer');
	}

	public function pages()
	{
		$page = $_GET['page'];
		$data['title'] = 'Data Transaksi';
		$data['transaksi'] = $this->model('TransaksiModel')->pagination($page);
		$data['paginate'] = $this->model('TransaksiModel')->get_pagination_number();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/transaksi/index', $data);
		$this->view('dashboard/templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Transaksi';
		$data['transaksi'] = $this->model('TransaksiModel')->getTransaksiById($id);
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/transaksi/edit', $data);
		$this->view('dashboard/templates/footer');
	}

	public function tambah() 
	{
		$this->model('RoleModel')->middleware($_SESSION['role'], "Admin");
		$data['title'] = 'Tambah Transaksi';		
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/transaksi/create', $data);
		$this->view('dashboard/templates/footer');
	}

	public function simpanTransaksi()
	{		
		if( $this->model('TransaksiModel')->tambahTransaksi($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/transaksi');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/transaksi');
			exit;	
		}
	}

	public function updateTransaksi($id){	
		if( $this->model('TransaksiModel')->updateDataTransaksi($id) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/transaksi');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/transaksi');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('TransaksiModel')->deleteTransaksi($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/transaksi');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/transaksi');
			exit;	
		}
	}

	public function read_notif($id){
		if ($this->model('TransaksiModel')->readNotif($id) > 0) {
			header('location: ' . base_url . '/transaksi');
		}
	}
}