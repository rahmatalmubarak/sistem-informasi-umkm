<?php

class Auth extends Controller {
	public function index(){
		$this->login();
	}
	public function login()
	{
		$data['title'] = 'Halaman Login';

		$this->view('templates/header', $data);
		$this->view('auth/index', $data);
		$this->view('templates/footer', $data);
	}

	public function prosesLogin() {
		$row = $this->model('LoginModel')->checkLogin($_POST);
		if($row > 0 ) {
				$_SESSION['email'] = $row['email'];
				$_SESSION['nama'] = $row['nama'];
				$_SESSION['id'] = $row['user_id'];
				$_SESSION['role'] = $row['nama_role'];
				$_SESSION['session_login'] = 'sudah_login';

			//$this->model('LoginModel')->isLoggedIn($_SESSION['session_login']);

				$_SESSION['role'] == 'Pelaku UMKM' || $_SESSION['role'] == 'Admin' ? header('location: '. base_url . '/home') : header('location: ' . base_url . '/landingpage');
		} else {
			Flasher::setMessage('Email / Password','salah.','danger');
			header('location: '. base_url . '/auth/login');
			exit;	
		}
	}

	public function register(){
		$data['title'] = 'Halaman Register';
		$this->view('templates/header', $data);
		$this->view('auth/register', $data);
		$this->view('templates/footer', $data);
	}

	public function simpanPelanggan()
	{
		if ($_POST['password'] == $_POST['ulangi_password']) {
			$row = $this->model('UserModel')->cekUsername();
			if ($row && $row['email'] == $_POST['email']) {
				Flasher::setMessage('Gagal', 'Email yang anda masukan sudah pernah digunakan!', 'danger');
				header('location: ' . base_url . '/auth/register');
				exit;
			} else {
				if ($this->model('UserModel')->tambahPelanggan($_POST) > 0) {
					Flasher::setMessage('Berhasil', 'mendaftar', 'success');
					header('location: ' . base_url . '/auth/login');
					exit;
				} else {
					Flasher::setMessage('Gagal', 'mendaftar', 'danger');
					header('location: ' . base_url . '/auth/register');
					exit;
				}
			}
		} else {
			Flasher::setMessage('Gagal', 'password tidak sama.', 'danger');
			header('location: '. base_url . '/auth/register');
			exit;
		}
	}

}