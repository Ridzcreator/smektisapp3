<?php
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');

        // load auth controller
        require(APPPATH . 'controllers/Auth.php');
        $this->auth = new Auth();
    }

    public function index($tahun = null)
    {
        // verifikasi apakah user sudah login
        $this->auth->isLoggedIn();

        if (is_null($tahun)) {
            $tahun = date("Y");
        }

        $side['title'] = "Dashboard";
        $data['kategoris'] = $this->transaksi_model->getTransaksiSummaryByKategori($tahun);
        $footer['kategoriByBulan'] = $this->transaksi_model->getKategoriByBulan($tahun);
        $footer['transaksiByKategori'] = $this->transaksi_model->getTransaksiByKategori($tahun);

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('_include/footer', $footer);
    }
}
