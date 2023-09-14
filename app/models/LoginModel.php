<?php

class LoginModel {
	
	private $table = 'user';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function checkLogin($data)
	{
		$query = "SELECT * FROM user WHERE email = :email AND password = :password";
		$this->db->query($query);
		$this->db->bind('email', $data['email']);
		$this->db->bind('password', md5($data['password']));
		//$this->db->execute();
		//return $this->db->rowCount();
		$data =  $this->db->single();
		return $data;
	}

}