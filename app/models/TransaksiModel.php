<?php

class TransaksiModel {
	
	private $table = 'transaksi';
	private $db;
	private $total_records;

	public function __construct()
	{
		$this->db = new Database;
		$this->get_all_data_transaksi();
	}

	public function get_all_data_transaksi()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		$this->total_records = count($this->db->resultSet());
		return $this->db->resultSet();
	}

	public function get_pagination_number()
	{
		return ceil($this->total_records / 10);
	}

	public function getAllTransaksi()
	{
		if($_SESSION['role'] == 'Pelanggan'){
			$this->db->query('SELECT transaksi.id as id_transaksi, total, jumlah, tanggal_transaksi, status,produk.*, user.nama as nama_pelanggan FROM transaksi 
							JOIN produk ON transaksi.produk_id = produk.id
							JOIN user ON transaksi.pelanggan_id = user.id 
							WHERE transaksi.pelanggan_id = :id
							LIMIT 0, 10 ');
		}else{
			$this->db->query('SELECT transaksi.id as id_transaksi, total, jumlah, tanggal_transaksi, status,produk.*, user.nama as nama_pelanggan FROM transaksi 
							JOIN produk ON transaksi.produk_id = produk.id
							JOIN user ON transaksi.pelanggan_id = user.id 
							WHERE transaksi.pelaku_umkm_id = :id
							LIMIT 0, 10 ');
			
		}
		$this->db->bind('id', (int)$_SESSION['id']);
		$this->total_records = count($this->db->resultSet());
		return $this->db->resultSet();
	}

	public function getTransaksiById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}
	public function tambahKeranjang($data)
	{
		$query = "INSERT INTO transaksi (produk_id,pelanggan_id,pelaku_umkm_id,jumlah,total,status,notif,tanggal_transaksi) VALUES(:produk_id,:pelanggan_id,:pelaku_umkm_id,:jumlah,:total,'belum bayar',1,NOW())";
		$this->db->query($query);
		$this->db->bind('produk_id',$data['produk_id']);
		$this->db->bind('pelanggan_id',$data['pelanggan_id']);
		$this->db->bind('pelaku_umkm_id',$data['pelaku_umkm_id']);
		$this->db->bind('jumlah',$data['jumlah']);
		$this->db->bind('total',$data['total']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataTransaksi($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		$data_transaksi = $this->db->single();
		if($data_transaksi['status'] == 'belum bayar'){
			$query = "UPDATE transaksi SET status='sudah bayar' WHERE id=:id";
		}else{
			$query = "UPDATE transaksi SET status='belum bayar' WHERE id=:id";
		}
		$this->db->query($query);
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
	public function readNotif($id)
	{
		$query = "UPDATE transaksi SET notif=0 WHERE id=:id";		
		$this->db->query($query);
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteTransaksi($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariTransaksi()
	{
		$key = $_POST['key'];
		if ($_SESSION['role'] == 'Pelanggan') {
			$this->db->query('SELECT transaksi.id as id_transaksi, total, jumlah, status,produk.*, user.nama as nama_pelanggan FROM transaksi 
							JOIN produk ON transaksi.produk_id = produk.id
							JOIN user ON transaksi.pelanggan_id = user.id 
							WHERE transaksi.pelanggan_id = :id
							AND produk.nama_produk LIKE :key
							LIMIT 0, 10 ');
		} else {
			$this->db->query('SELECT transaksi.id as id_transaksi, total, jumlah, status,produk.*, user.nama as nama_pelanggan FROM transaksi 
							JOIN produk ON transaksi.produk_id = produk.id
							JOIN user ON transaksi.pelanggan_id = user.id 
							WHERE transaksi.pelaku_umkm_id = :id
							AND produk.nama_produk LIKE :key
							OR user.nama LIKE :key
							LIMIT 0, 10 ');
		}
		$this->db->bind('key',"%$key%");
		$this->db->bind('id',$_SESSION['id']);
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

	public function get_semua_keranjang($id)
	{
		$this->db->query('SELECT * FROM transaksi WHERE status = "belum bayar" AND pelanggan_id = :id');
		$this->db->bind('id', $id);
		$this->total_records = count($this->db->resultSet());
		return $this->total_records;
	}

	public function get_notif($id)
	{
		$this->db->query('SELECT transaksi.id as id_transaksi, total, jumlah, tanggal_transaksi, status,produk.*, user.nama as nama_pelanggan FROM transaksi 
							JOIN produk ON transaksi.produk_id = produk.id
							JOIN user ON transaksi.pelanggan_id = user.id 
							WHERE notif = 1 AND pelaku_umkm_id = :id');
		$this->db->bind('id', $id);
		return $this->db->resultSet();
	}
}