<?php

class ProdukModel {
	
	private $table = 'produk';
	private $table_relation = 'kategori';
	private $db;
	private $total_records;

	public function __construct()
	{
		$this->db = new Database;
		$this->get_all_data_produk();
	}

	public function get_all_data_produk()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		$this->total_records = count($this->db->resultSet());
		return $this->db->resultSet();
	}

	public function get_pagination_number()
	{
		return ceil($this->total_records / 10);
	}

	public function getAllProduk()
	{
		$start = 0;
		$query = 'SELECT '.$this->table.'.*,'. $this->table_relation.'.nama_kategori FROM ' . $this->table . 
						' JOIN '. $this->table_relation . " ON " . $this->table .".". $this->table_relation."_id = ".$this->table_relation.".id" . ' LIMIT 10';
		$this->db->query($query);
		$this->total_records = count($this->db->resultSet());
		return $this->db->resultSet();
	}

	public function getProdukById($id)
	{
		$query = 'SELECT ' . $this->table . '.*,' . $this->table_relation . '.nama_kategori FROM ' . $this->table .
			' JOIN ' . $this->table_relation . ' ON ' . $this->table . '.' . $this->table_relation . '_id = ' . $this->table_relation . '.id WHERE ' . $this->table . '.id=:id';
		$this->db->query($query);
		$this->db->bind('id',$id);
		return $this->db->single();
	}
	public function tambahProduk($data)
	{
		$ekstensi_diperbolehkan	= array('png', 'jpg');
		$gambar = $_FILES['gambar']['name'];
		$x = explode('.', $gambar);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['gambar']['tmp_name'];
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			move_uploaded_file($file_tmp, realpath('../public') . '/assets/img/produk/' . $gambar);
			$query = "INSERT INTO produk (gambar,nama_produk,harga,deskripsi,tanggal_update,nama_toko,kategori_id) VALUES (:gambar,:nama_produk,:harga,:deskripsi,:tanggal_update,:nama_toko,:kategori_id)";
			$this->db->query($query);
			$this->db->bind('gambar',$gambar);
			$this->db->bind('nama_produk',$data['nama_produk']);
			$this->db->bind('harga',$data['harga']);
			$this->db->bind('deskripsi',$data['deskripsi']);
			$this->db->bind('tanggal_update',$data['tanggal_update']);
			$this->db->bind('nama_toko',$data['nama_toko']);
			$this->db->bind('kategori_id',$data['kategori_id']);
			$this->db->execute();
		}
		return $this->db->rowCount();
	}

	public function updateDataProduk($data)
	{
		if (!empty($_FILES['gambar']['name'])) {
			$ekstensi_diperbolehkan	= array('png', 'jpg');
			$gambar = $_FILES['gambar']['name'];
			$x = explode('.', $gambar);
			$ekstensi = strtolower(end($x));
			$file_tmp = $_FILES['gambar']['tmp_name'];
		}
		if (!empty($_FILES['gambar']['name'])) {
			if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
				move_uploaded_file($file_tmp, realpath('../public') . '/assets/img/produk/' . $gambar);
				$query = "UPDATE produk SET gambar=:gambar,nama_produk=:nama_produk,harga=:harga,deskripsi=:deskripsi,tanggal_update=:tanggal_update,nama_toko=:nama_toko,kategori_id=:kategori_id WHERE id=:id";
				$this->db->query($query);
				$this->db->bind('id', $data['id']);
				$this->db->bind('gambar', $gambar);
				$this->db->bind('nama_produk', $data['nama_produk']);
				$this->db->bind('harga', $data['harga']);
				$this->db->bind('deskripsi', $data['deskripsi']);
				$this->db->bind('tanggal_update', $data['tanggal_update']);
				$this->db->bind('nama_toko', $data['nama_toko']);
				$this->db->bind('kategori_id', $data['kategori_id']);
			}
		}else{
			$query = "UPDATE produk SET nama_produk=:nama_produk,harga=:harga,deskripsi=:deskripsi,tanggal_update=:tanggal_update,nama_toko=:nama_toko,kategori_id=:kategori_id WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id', $data['id']);
			$this->db->bind('nama_produk', $data['nama_produk']);
			$this->db->bind('harga', $data['harga']);
			$this->db->bind('deskripsi', $data['deskripsi']);
			$this->db->bind('tanggal_update', $data['tanggal_update']);
			$this->db->bind('nama_toko', $data['nama_toko']);
			$this->db->bind('kategori_id', $data['kategori_id']);
		}
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function deleteProduk($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariProduk()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama_produk LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}

	public function pagination()
	{
		$page = explode('/', $_GET['url'])[2];
		$start = 0;
		if ($page > 1) {
			$start = ($page * 10) - 10;
		}
		$this->db->query("SELECT * FROM " . $this->table. ' LIMIT ' . $start . ', 10 ');
		$this->total_records = count($this->db->resultSet());
		return $this->db->resultSet();
	}
}