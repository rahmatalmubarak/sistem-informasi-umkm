<?php

class Role extends Controller {
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
		$data['title'] = 'Data Role';
		$data['role'] = $this->model('RoleModel')->getAllRole();
		$data['paginate'] = $this->model('RoleModel')->get_pagination_number();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/role/index', $data);
		$this->view('dashboard/templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Role';
		$data['role'] = $this->model('RoleModel')->cariRole();
		$data['paginate'] = $this->model('RoleModel')->get_pagination_number();
		$data['key'] = $_POST['key'];
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/role/index', $data);
		$this->view('dashboard/templates/footer');
	}

	public function page()
	{
		$data['title'] = 'Data Role';
		$data['role'] = $this->model('RoleModel')->pagination();
		$data['paginate'] = $this->model('RoleModel')->get_pagination_number();
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/role/index', $data);
		$this->view('dashboard/templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Role';
		$data['role'] = $this->model('RoleModel')->getRoleById($id);
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/role/edit', $data);
		$this->view('dashboard/templates/footer');
	}

	public function tambah() 
	{
		$data['title'] = 'Tambah Role';		
		$this->view('dashboard/templates/header', $data);
		$this->view('dashboard/templates/sidebar', $data);
		$this->view('dashboard/role/create', $data);
		$this->view('dashboard/templates/footer');
	}

	public function simpanRole()
	{		
		if( $this->model('RoleModel')->tambahRole($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/role');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/role');
			exit;	
		}
	}

	public function updateRole(){	
		if( $this->model('RoleModel')->updateDataRole($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/role');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/role');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('RoleModel')->deleteRole($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/role');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/role');
			exit;	
		}
	}
}