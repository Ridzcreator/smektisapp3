<?php 

class Status extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
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

        $side['title'] = "Kategori Barang";

        $data['master_status'] = $this->status_model->getMaster();

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/status', $data);
        $this->load->view('_include/footer');
    }

}

?>