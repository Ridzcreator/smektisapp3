<?php
class Laporan extends CI_Controller
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

        $side['title'] = "Laporan";

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/laporan');
        $this->load->view('_include/footer');
    }
}
