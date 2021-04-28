<?php
class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model');


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

        $side['title'] = "Data Barang";

        $data['barang'] = $this->barang_model->getMaster();

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/data_barang', $data);
        $this->load->view('_include/footer');
    }

    public function barang()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $dataBarang = array(
            'user_id' => $_SESSION['user_id'],

            'nama_barang' => $this->input->post('nama_barang'),

        );

        $this->barang_model->create($dataBarang);

        redirect('admin/transaksi/index');
    }
}
