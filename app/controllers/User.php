<?php

class User extends Controller {
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
		$data['title'] = 'Data User';
		$data['user'] = $this->model('UserModel')->getAllUser();
		$data['paginate'] = $this->model('UserModel')->get_pagination_number();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/user/index', $data);
		$this->view('dashboard/templates/footer');
	}
	public function detail($id)
	{
		$data['title'] = 'Data User';
		$data['user'] = $this->model('UserModel')->getUserById($id);
		$data['paginate'] = $this->model('UserModel')->get_pagination_number();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/user/detail', $data);
		$this->view('dashboard/templates/footer');
	}
	public function page($page)
	{
		$data['title'] = 'Data User';
		$data['user'] = $this->model('UserModel')->pagination($page);
		$data['paginate'] = $this->model('UserModel')->get_pagination_number();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/user/index', $data);
		$this->view('dashboard/templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data User';
		$data['user'] = $this->model('UserModel')->cariUser();
		$data['paginate'] = $this->model('UserModel')->get_pagination_number();
		$data['key'] = $_POST['key'];
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/user/index', $data);
		$this->view('dashboard/templates/footer');
	}

	public function cariPelakuUMKM()
	{
		$data['title'] = 'Data User';
		$data['user'] = $this->model('UserModel')->cariPelakuUMKM();
		$data['paginate'] = $this->model('UserModel')->get_pagination_number();
		$data['key'] = $_POST['key'];
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/user/pelaku_umkm', $data);
		$this->view('dashboard/templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Edit User';
		$data['user'] = $this->model('UserModel')->getUserById($id);
		$data['role'] = $this->model('RoleModel')->getAllRole();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/user/edit', $data);
		$this->view('dashboard/templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah User';		
		$data['role'] = $this->model('RoleModel')->getAllRole();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/user/create', $data);
		$this->view('dashboard/templates/footer');
	}

	public function simpanUser(){		
		if($_POST['password'] == $_POST['ulangi_password']) {	
			$row = $this->model('UserModel')->cekUsername();
			if($row && $row['email'] == $_POST['email']){
				Flasher::setMessage('Gagal','Email yang anda masukan sudah pernah digunakan!','danger');
				header('location: '. base_url . '/user/tambah');
				exit;	
			} else {
				if( $this->model('UserModel')->tambahUser($_POST) > 0 ) {
					Flasher::setMessage('Berhasil','ditambahkan','success');
					$_POST['role_id'] == 2 ? header('location: '. base_url . '/user/daftarPelakuUMKM') : header('location: ' . base_url . '/user');
					exit;			
				} else {
					Flasher::setMessage('Gagal','ditambahkan','danger');
					$_POST['role_id'] == 2 ? header('location: '. base_url . '/user/daftarPelakuUMKM') : header('location: ' . base_url . '/user');
					exit;	
				}
			}
		} else {
			Flasher::setMessage('Gagal','password tidak sama.','danger');
			$_POST['role_id'] == 2 ? header('location: ' . base_url . '/user/daftarPelakuUMKM') : header('location: ' . base_url . '/user');
			exit;	
		}
		
	}

	public function updateUser(){	
		if(empty($_POST['password'])) {
			if( $this->model('UserModel')->updateDataUser($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			if($_SESSION['role'] == 'Admin'){
					header('location: ' . base_url . '/user/daftarPelakuUMKM');
			}else{
				$_POST['role_id'] == 1 ? header('location: '. base_url . '/user/daftarPelakuUMKM') : header('location: ' . base_url . '/user/edit/'.$_SESSION['id']);
				exit;			
			}
			}else{
				if ($_SESSION['role'] == 'Admin') {
					header('location: ' . base_url . '/user/daftarPelakuUMKM');
				} else {
				Flasher::setMessage('Gagal','diupdate','danger');
				$_POST['role_id'] == 1 ? header('location: '. base_url . '/user/daftarPelakuUMKM') : header('location: ' . base_url . '/user/edit/'.$_SESSION['id']);
				exit;	
				}
			}
		} else {
			if($_POST['password'] == $_POST['ulangi_password']) {
				if( $this->model('UserModel')->updateDataUser($_POST) > 0 ) {
				Flasher::setMessage('Berhasil','diupdate','success');
					if ($_SESSION['role'] == 'Admin') {
						header('location: ' . base_url . '/user/daftarPelakuUMKM');
					} else {
						$_POST['role_id'] == 1 ? header('location: '. base_url . '/user/daftarPelakuUMKM') : header('location: ' . base_url . '/user/edit/'.$_SESSION['id']);
						exit;			
					}
				}else{
					Flasher::setMessage('Gagal','diupdate','danger');
					if ($_SESSION['role'] == 'Admin') {
						header('location: ' . base_url . '/user/daftarPelakuUMKM');
					} else {
						$_POST['role_id'] == 1 ? header('location: '. base_url . '/user/daftarPelakuUMKM') : header('location: ' . base_url . '/user/edit/'.$_SESSION['id']);
						exit;	
					}
				}
			} else {
				Flasher::setMessage('Gagal','password tidak sama.','danger');
				header('location: '. base_url . '/user/tambah');
				exit;	
			}
		}
	}

	public function hapus($id){
		$user = $this->model('UserModel')->getUserById($id);
		if( $this->model('UserModel')->deleteUser($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			if($user['role_id'] == '2'){
				header('location: '. base_url . '/user/daftarPelakuUMKM');
			}else{
				header('location: '. base_url . '/user');
			}
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			if ($user['role_id'] == '2') {
				header('location: ' . base_url . '/user/daftarPelakuUMKM');
			} else {
				header('location: ' . base_url . '/user');
			}
			exit;	
		}
	}

	// Pelaku UMKM Controller
	public function daftarPelakuUMKM()
	{
		$data['title'] = 'Data Pelaku UMKM';
		$data['user'] = $this->model('UserModel')->getDataPelakuUMKM();
		$data['paginate'] = $this->model('UserModel')->get_pagination_number();
		$this->view('dashboard/templates/header',$data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/user/pelaku_umkm', $data);
		$this->view('dashboard/templates/footer');
	}
}