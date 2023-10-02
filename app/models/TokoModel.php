<?php

class TokoModel {
	
	private $table = 'toko';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getTokoById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}
}