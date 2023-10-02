<?php

class Produk extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/auth/login');
			exit;
		}

		$this->model('RoleModel')->middleware($_SESSION['role'], "Pelaku UMKM");
	} 
	public function index()
	{
		$data['title'] = 'Data Produk';
		$data['produk'] = $this->model('ProdukModel')->getAllProduk();
		$data['paginate'] = $this->model('ProdukModel')->get_pagination_number();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/produk/index', $data);
		$this->view('dashboard/templates/footer');
	}
	public function detail($id)
	{
		$data['title'] = 'Data Produk';
		$data['produk'] = $this->model('ProdukModel')->getProdukById($id);
		$data['paginate'] = $this->model('ProdukModel')->get_pagination_number();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/produk/detail', $data);
		$this->view('dashboard/templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Produk';
		$data['produk'] = $this->model('ProdukModel')->cariProduk();
		$data['paginate'] = $this->model('ProdukModel')->get_pagination_number();
		$data['key'] = $_POST['key'];
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/produk/index', $data);
		$this->view('dashboard/templates/footer');
	}

	public function page()
	{
		$data['title'] = 'Data Produk';
		$data['produk'] = $this->model('ProdukModel')->pagination();
		$data['paginate'] = $this->model('ProdukModel')->get_pagination_number();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/produk/index', $data);
		$this->view('dashboard/templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Produk';
		$data['produk'] = $this->model('ProdukModel')->getProdukById($id);
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/produk/edit', $data);
		$this->view('dashboard/templates/footer');
	}

	public function tambah() 
	{
		$data['title'] = 'Tambah Produk';
		$data['user'] = $this->model('UserModel')->detailUser($_SESSION['id']);
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/produk/create', $data);
		$this->view('dashboard/templates/footer');
	}

	public function simpanProduk()
	{		
		if( $this->model('ProdukModel')->tambahProduk($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/produk');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/produk');
			exit;	
		}
	}

	public function updateProduk(){	
		if( $this->model('ProdukModel')->updateDataProduk($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/produk');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/produk');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('ProdukModel')->deleteProduk($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/produk');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus karena sedang ada transaksi','danger');
			header('location: '. base_url . '/produk');
			exit;	
		}
	}
}