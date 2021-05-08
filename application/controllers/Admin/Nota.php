<?php
class Nota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('penyewa_model');
        $this->load->model('transaksi_model');
        $this->load->model('kategori_model');
        $this->load->model('barang_model');
        $this->load->model('status_model');
        $this->load->model('barang_pinjam_model');

        // load auth controller
        require(APPPATH . 'controllers/Auth.php');
        $this->auth = new Auth();
    }

    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // verifikasi apakah user sudah login
        $this->auth->isLoggedIn();

        $side['title'] = "Data Transaksi";

        $data['master_penyewa'] = $this->penyewa_model->getMaster();
        $data['transaksi'] = $this->transaksi_model->getDataTransaksi();
        $data['barang_pinjam'] = $this->barang_pinjam_model->getDataBarang($_SESSION['user_id']);
        $data['master_kategori'] = $this->kategori_model->getMasterOnBarang();
        $data['master_barang'] = $this->barang_model->getMaster();
        $data['master_status'] = $this->status_model->getMaster();

        $this->load->view('admin/notatransaksi', $data);
    }
}
