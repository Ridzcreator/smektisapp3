<?php
class Penyewa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('penyewa_model');

        // load auth controller
        require(APPPATH . 'controllers/Auth.php');
        $this->auth = new Auth();
    }

    public function index()
    {
        // verifikasi apakah user sudah login
        $this->auth->isLoggedIn();

        $side['title'] = "Data Penyewa";
        $data['penyewa'] = $this->penyewa_model->get();

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/data_penyewa', $data);
        $this->load->view('_include/footer');
    }
    public function data_penyewa()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $inputpenyewa = array(
            'user_id' => $_SESSION['user_id'],
            'nama_penyewa' => $this->input->post('nama_penyewa'),
            'transaksi_id' => $this->input->post('nama_penyewa')
        );

        $this->penyewa_model->create($inputpenyewa);

        redirect('admin/transaksi/index');
    }
}
