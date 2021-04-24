<?php
class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('barang_pinjam_model');
        $this->load->model('kategori_model');
        $this->load->model('barang_model');
        $this->load->model('status_model');

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

        $data['transaksi'] = $this->transaksi_model->getDataTransaksi()->result();
        $data['barang_pinjam'] = $this->barang_pinjam_model->getDataBarang($_SESSION['user_id'])->result();
        $data['master_kategori'] = $this->kategori_model->getMaster()->result();
        $data['master_barang'] = $this->barang_model->getMaster()->result();
        $data['master_status'] = $this->status_model->getMaster()->result();

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/data_transaksi', $data);
        $this->load->view('_include/footer');
    }

    public function store()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $dataTransaksi = array(
            'user_id' => $_SESSION['user_id'],
            'penyewa_id' => $this->input->post('penyewa_id'),
            'status_id' => $this->input->post('status_id'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'durasi' => $this->input->post('durasi'),
            'jaminan' => $this->input->post('jaminan')
        );

        $this->transaksi_model->create($dataTransaksi);

        redirect('admin/transaksi/index');
    }
}
