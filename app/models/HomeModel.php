<?php

class HomeModel {
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function jumlah_data(){
		$query = 'SELECT * FROM kategori';
		$this->db->query($query);
		$data_kategori = $this->db->resultSet();
		foreach ($data_kategori as $key => $kategori) {
			$query = 'SELECT count(nama_kategori) as :nama_kategori, kategori.* FROM produk 
						JOIN kategori ON produk.kategori_id = kategori.id 
						JOIN toko ON toko.id = produk.toko_id
						JOIN user ON user.toko_id = toko.id
						WHERE produk.kategori_id=:id_kategori
						AND user.id = :id_pelaku_umkm';
			$this->db->query($query);
			$this->db->bind('nama_kategori', $kategori['nama_kategori']);
			$this->db->bind('id_kategori', $kategori['id']);
			$this->db->bind('id_pelaku_umkm', $_SESSION['id']);
			$data[$kategori['nama_kategori']] = $this->db->resultSet();
		}
		
		return $data;
	}
}