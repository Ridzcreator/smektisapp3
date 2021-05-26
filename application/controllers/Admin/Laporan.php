<?php
class Laporan extends CI_Controller
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
        // verifikasi apakah user sudah login
        $this->auth->isLoggedIn();

        $date_start = null;
        $date_end = null;

        if ($start = $this->input->post('date_start')) {
            $date_start = date("Y-m-d H:i:s", strtotime($start));
            $data['date_start'] = $date_start;
        }

        if ($end = $this->input->post('date_end')) {
            $date_end = date("Y-m-d H:i:s", strtotime($end));
            $data['date_end'] = $date_end;
        }

        if ($daterange = $this->input->post('daterange')) {
            $data['daterange'] = $daterange;
        }

        $side['title'] = "Laporan";
        $data['master_penyewa'] = $this->penyewa_model->getMaster();
        $data['transaksi'] = $this->transaksi_model->getDataTransaksi(null, $date_start, $date_end);
        $data['barang_pinjam'] = $this->barang_pinjam_model->getDataBarang($_SESSION['user_id']);
        $data['master_kategori'] = $this->kategori_model->getMasterOnBarang();
        $data['master_barang'] = $this->barang_model->getMaster();
        $data['master_status'] = $this->status_model->getMaster();

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/laporan', $data);
        $this->load->view('_include/footer');
    }

    public function print()
    {
        // verifikasi apakah user sudah login
        $this->auth->isLoggedIn();

        $date_start = null;
        $date_end = null;

        if (!$kategori = $this->input->post('kategori')) {
            $kategori = null;
        }

        if ($start = $this->input->post('date_start')) {
            $date_start = date("Y-m-d H:i:s", strtotime($start));
        }

        if ($end = $this->input->post('date_end')) {
            $date_end = date("Y-m-d H:i:s", strtotime($end));
        }

        $data['title'] = "Print Laporan";
        $data['master_penyewa'] = $this->penyewa_model->getMaster();
        $data['transaksi'] = $this->transaksi_model->getDataTransaksi(null, $date_start, $date_end);
        $data['barang_pinjam'] = $this->barang_pinjam_model->getDataBarang($_SESSION['user_id']);
        $data['master_kategori'] = $this->kategori_model->getMasterOnBarang();
        $data['master_barang'] = $this->barang_model->getMaster();
        $data['master_status'] = $this->status_model->getMaster();

        $this->load->view('admin/cetaklaporan', $data);
    }
}
