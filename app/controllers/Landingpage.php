<?php 
class Landingpage extends Controller {
    public function index(){
        $data['title'] = "Sistem informasi UMKM";
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $data['produk'] = $this->model('ProdukModel')->getAllProduk();
        $this->view('templates/header',$data);
        $this->view('landingpage/index',$data);
        $this->view('templates/footer',$data);
    }
    public function detail_product($id){
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $data['produk'] = $this->model('ProdukModel')->getProdukById($id);
        $data['pelaku_UMKM'] = $this->model('UserModel')->getPemilikToko($data['produk']['id_toko']);
        $data['pelanggan'] = $this->model('UserModel')->getUserById($_SESSION['id']);
        $data['title'] = 'Detail Produk - ' . $data['produk']['nama_produk'];
        $this->view('templates/header',$data);
        $this->view('detail/detail_product',$data);
        $this->view('templates/footer',$data);
    }
    public function tambah_keranjang(){
        $this->model('TransaksiModel')->tambahKeranjang($_POST);
    }
    
    public function keranjang($id){
        $this->model('TransaksiModel')->get_semua_keranjang($id);
    }
    public function list_produk(){
        $data['title'] = "List Produk";
        $data['produk'] = $this->model('ProdukModel')->getAllProduk();
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $data['paginate'] = $this->model('ProdukModel')->get_pagination_number();
        $this->view('templates/header', $data);
        $this->view('landingpage/list_produk', $data);
        $this->view('templates/footer', $data);
    }

    public function page()
    {
        $data['title'] = 'Data Produk';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $data['produk'] = $this->model('ProdukModel')->pagination();
        $data['paginate'] = $this->model('ProdukModel')->get_pagination_number();
        $this->view('templates/header', $data);
        $this->view('landingpage/list_produk', $data);
        $this->view('templates/footer', $data);
    }

    public function kategori($kategori)
    {
        $data['title'] = $kategori;
        $data['produk'] = $this->model('ProdukModel')->kategori($kategori);
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $data['paginate'] = $this->model('ProdukModel')->get_pagination_number();
        $this->view('templates/header', $data);
        $this->view('landingpage/list_produk', $data);
        $this->view('templates/footer', $data);
    }
}