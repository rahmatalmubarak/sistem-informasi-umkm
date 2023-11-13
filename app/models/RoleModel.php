<?php

class RoleModel {
	
	private $table = 'role';
	private $db;
	private $total_records;

	public function __construct()
	{
		$this->db = new Database;
		$this->get_all_data();
	}

	public function get_all_data()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		$this->total_records = count($this->db->resultSet());
		return $this->db->resultSet();
	}

	public function get_pagination_number()
	{
		return ceil($this->total_records / 10);
	}

	public function getAllRole()
	{
		$start = 0;
		$this->db->query('SELECT * FROM ' . $this->table . ' LIMIT ' . $start . ', 10 ');
		$this->total_records = count($this->db->resultSet());
		return $this->db->resultSet();
	}

	public function getRoleById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}
	public function tambahRole($data)
	{
		$query = "INSERT INTO role (nama_role) VALUES(:nama_role)";
		$this->db->query($query);
		$this->db->bind('nama_role',$data['nama_role']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataRole($data)
	{
		$query = "UPDATE role SET nama_role=:nama_role WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('nama_role',$data['nama_role']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteRole($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		try {
			$this->db->execute();
		} catch (\Throwable $e) {}

		return $this->db->rowCount();
	}

	public function cariRole()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama_role LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}

	public function pagination($page)
	{
		$start = 0;
		if ($page > 1) {
			$start = ($page * 10) - 10;
		}
		$this->db->query("SELECT * FROM " . $this->table. ' LIMIT ' . $start . ', 10 ');
		$this->total_records = count($this->db->resultSet());
		return $this->db->resultSet();
	}


	public function middleware($role_user, $role_diizinkan)
	{
		if ($role_user != $role_diizinkan) {
			header('location: ' . base_url . '/home');
		}
	}
}