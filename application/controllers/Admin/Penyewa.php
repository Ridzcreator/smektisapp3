<?php
class Penyewa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // load auth controller
        require(APPPATH . 'controllers/Auth.php');
        $this->auth = new Auth();
    }

    public function index()
    {
        // verifikasi apakah user sudah login
        $this->auth->isLoggedIn();

        $side['title'] = "Data Penyewa";

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/data_penyewa');
        $this->load->view('_include/footer');
    }
}
