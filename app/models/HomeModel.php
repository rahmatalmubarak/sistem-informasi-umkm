<?php

class HomeModel {
	private $db;
	private $total_records;

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

	public function pagination($page)
	{
		$start = 0;
		if ($page > 1) {
			$start = ($page * 10) - 10;
		}
		$id = $_SESSION['id'];
		$bln = isset($_GET['bln'])? $_GET['bln'] : 0;
		$thn = isset($_GET['thn'])? $_GET['thn'] : 0;
		$this->db->query("SELECT * FROM  transaksi  
						WHERE pelaku_umkm_id=$id AND status = 'sudah bayar' 
						AND if($bln > 0,MONTH(tanggal_transaksi) = $bln,MONTH(tanggal_transaksi)) 
						AND if($thn > 0,YEAR(tanggal_transaksi) = $thn,YEAR(tanggal_transaksi)) 
						LIMIT $start, 10 ");
		$this->total_records = count($this->db->resultSet());
		return $this->db->resultSet();
	}
}