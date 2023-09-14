<?php

class Login extends Controller {
	public function index()
	{
		$data['title'] = 'Halaman Login';

		$this->view('login/login', $data);
	}

	public function prosesLogin() {
		$row = $this->model('LoginModel')->checkLogin($_POST);
		if($row > 0 ) {
				$_SESSION['email'] = $row['email'];
				$_SESSION['nama'] = $row['nama'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['session_login'] = 'sudah_login'; 

				//$this->model('LoginModel')->isLoggedIn($_SESSION['session_login']);
				
				header('location: '. base_url . '/home');
		} else {
			Flasher::setMessage('Email / Password','salah.','danger');
			header('location: '. base_url . '/login');
			exit;	
		}
	}
}