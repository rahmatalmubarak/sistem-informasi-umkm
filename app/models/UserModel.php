<?php

class UserModel {
	
	private $table = 'user';
	private $table_relation = 'role';
	private $db;
	private $total_records;
	public function __construct()
	{
		$this->db = new Database;
		$this->get_all_data_user();
	}

	public function getAllUser()
	{
		$this->db->query('SELECT '.$this->table.'.*,'. $this->table_relation.'.nama_role FROM ' . $this->table . 
						' JOIN '. $this->table_relation . " ON " . $this->table .".". $this->table_relation."_id = ".$this->table_relation.".id" . ' LIMIT 10');
		return $this->db->resultSet();
	}

	public function getUserById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahUser($data)
	{
		$ekstensi_diperbolehkan	= array('png', 'jpg');
		$photo = $_FILES['photo']['name'];
		$x = explode('.', $photo);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['photo']['tmp_name'];
		if (!empty($photo)) {
			if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
				move_uploaded_file($file_tmp, realpath('../public').'/assets/img/user/' . $photo);
				$query = "INSERT INTO user (photo,nama,email,jenis_kelamin,kontak,nama_toko,rekening,password,role_id) VALUES(:photo,:nama,:email,:jenis_kelamin,:kontak,:nama_toko,:rekening,:password,:role_id)";
				$this->db->query($query);
				$this->db->bind('photo', $photo);
				$this->db->bind('nama',$data['nama']);
				$this->db->bind('email',$data['email']);
				$this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
				$this->db->bind('kontak', $data['kontak']);
				$this->db->bind('nama_toko', $data['nama_toko']);
				$this->db->bind('password', md5($data['password']));
				$this->db->bind('role_id', $data['role_id']);
				$this->db->bind('rekening', $data['rekening']);
				$this->db->execute();
			}
		}
		return $this->db->rowCount();
	}

	public function cekUsername(){
		$email = $_POST['email'];
		$this->db->query("SELECT * FROM user WHERE email = :email");
		$this->db->bind('email', $email);
		return $this->db->single();
	}

	public function get_all_data_user()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		$this->total_records = count($this->db->resultSet());
		return $this->db->resultSet();
	}

	public function get_pagination_number()
	{
		return ceil($this->total_records / 10);
	}

	public function updateDataUser($data)
	{
		if(!empty($_FILES['photo']['name'])){
			$ekstensi_diperbolehkan	= array('png', 'jpg');
			$photo = $_FILES['photo']['name'];
			$x = explode('.', $photo);
			$ekstensi = strtolower(end($x));
			$file_tmp = $_FILES['photo']['tmp_name'];
		}
		if(empty($_POST['password']) && empty($_FILES['photo']['name'])) {
			$query = "UPDATE user SET nama=:nama,email=:email,jenis_kelamin=:jenis_kelamin,kontak=:kontak,nama_toko=:nama_toko,rekening=:rekening,role_id=:role_id WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id', $data['id']);
			$this->db->bind('nama', $data['nama']);
			$this->db->bind('email', $data['email']);
			$this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
			$this->db->bind('kontak', $data['kontak']);
			$this->db->bind('nama_toko', $data['nama_toko']);
			$this->db->bind('role_id', $data['role_id']);
			$this->db->bind('rekening', $data['rekening']);
		} else if(empty($_POST['password'])) {
			if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
				move_uploaded_file($file_tmp, realpath('../public') . '/assets/img/user/' . $photo);
				$query = "UPDATE user SET photo=:photo,nama=:nama,email=:email,jenis_kelamin=:jenis_kelamin,kontak=:kontak,nama_toko=:nama_toko,rekening=:rekening,role_id=:role_id WHERE id=:id";
				$this->db->query($query);
				$this->db->bind('id', $data['id']);
				$this->db->bind('photo', $photo);
				$this->db->bind('nama', $data['nama']);
				$this->db->bind('email', $data['email']);
				$this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
				$this->db->bind('kontak', $data['kontak']);
				$this->db->bind('nama_toko', $data['nama_toko']);
				$this->db->bind('role_id', $data['role_id']);
				$this->db->bind('rekening', $data['rekening']);
			}
		} else if (empty($_FILES['photo']['name'])) {
			$query = "UPDATE user SET nama=:nama,email=:email,jenis_kelamin=:jenis_kelamin,kontak=:kontak,nama_toko=:nama_toko,rekening=:rekening,role_id=:role_id,password=:password WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id', $data['id']);
			$this->db->bind('nama', $data['nama']);
			$this->db->bind('email', $data['email']);
			$this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
			$this->db->bind('kontak', $data['kontak']);
			$this->db->bind('nama_toko', $data['nama_toko']);
			$this->db->bind('password', md5($data['password']));
			$this->db->bind('role_id', $data['role_id']);
			$this->db->bind('rekening', $data['rekening']);
		}else{
			if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
				move_uploaded_file($file_tmp, realpath('../public') . '/assets/img/user/' . $photo);
				$query = "UPDATE user SET photo=:photo,nama=:nama,email=:email,jenis_kelamin=:jenis_kelamin,kontak=:kontak,nama_toko=:nama_toko,rekening=:rekening,role_id=:role_id,password=:password WHERE id=:id";
				$this->db->query($query);
				$this->db->bind('id', $data['id']);
				$this->db->bind('nama', $data['nama']);
				$this->db->bind('photo', $photo);
				$this->db->bind('email', $data['email']);
				$this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
				$this->db->bind('kontak', $data['kontak']);
				$this->db->bind('nama_toko', $data['nama_toko']);
				$this->db->bind('password', md5($data['password']));
				$this->db->bind('role_id', $data['role_id']);
				$this->db->bind('rekening', $data['rekening']);
			}
		}
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function deleteUser($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariUser()
	{
		$key = $_POST['key'];
		$this->db->query('SELECT '.$this->table.'.*,'. $this->table_relation.'.nama_role FROM ' . $this->table . 
						' JOIN '. $this->table_relation . ' ON ' . $this->table .'.'. $this->table_relation.'_id = '.$this->table_relation.'.id' . ' WHERE nama LIKE :key');
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}

	public function pagination($page)
	{
		$start = 0;
		if ($page > 1) {
			$start = ($page * 10) - 10;
		}
		$this->db->query('SELECT '.$this->table.'.*,'. $this->table_relation.'.nama_role FROM ' . $this->table . 
						' JOIN '. $this->table_relation . ' ON ' . $this->table .'.'. $this->table_relation.'_id = '.$this->table_relation.'.id'. ' LIMIT ' . $start . ', 10 ');
		$this->total_records = count($this->db->resultSet());
		return $this->db->resultSet();
	}

	public function detailUser($id){
		$query = 'SELECT * FROM user WHERE id='.$id;
		$this->db->query($query);

		return $this->db->single();
	}
}