<?php

class Kategori extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/auth/login');
			exit;
		}
		if ($_SESSION['role'] == 'Pelanggan') {
			header('location: ' . base_url . '/transaksi');
		}
	} 
	public function index()
	{
		$data['title'] = 'Data Kategori';
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$data['paginate'] = $this->model('KategoriModel')->get_pagination_number();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/kategori/index', $data);
		$this->view('dashboard/templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Kategori';
		$data['kategori'] = $this->model('KategoriModel')->cariKategori();
		$data['paginate'] = $this->model('KategoriModel')->get_pagination_number();
		$data['key'] = $_POST['key'];
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/kategori/index', $data);
		$this->view('dashboard/templates/footer');
	}

	public function page($page)
	{
		$data['title'] = 'Data Kategori';
		$data['kategori'] = $this->model('KategoriModel')->pagination($page);
		$data['paginate'] = $this->model('KategoriModel')->get_pagination_number();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/kategori/index', $data);
		$this->view('dashboard/templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Kategori';
		$data['kategori'] = $this->model('KategoriModel')->getKategoriById($id);
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/kategori/edit', $data);
		$this->view('dashboard/templates/footer');
	}

	public function tambah() 
	{
		$this->model('RoleModel')->middleware($_SESSION['role'], "Admin");
		$data['title'] = 'Tambah Kategori';		
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/kategori/create', $data);
		$this->view('dashboard/templates/footer');
	}

	public function simpanKategori()
	{		
		if( $this->model('KategoriModel')->tambahKategori($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/kategori');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/kategori');
			exit;	
		}
	}

	public function updateKategori(){	
		if( $this->model('KategoriModel')->updateDataKategori($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/kategori');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/kategori');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('KategoriModel')->deleteKategori($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/kategori');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus karena kategori digunakan','danger');
			header('location: '. base_url . '/kategori');
			exit;	
		}
	}
}