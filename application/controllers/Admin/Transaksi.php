<?php
class Transaksi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');

		// load auth controller
    	require (APPPATH.'controllers/Auth.php');
        $this->auth = new Auth(); 
	}

    public function index()
    {
    	// verifikasi apakah user sudah login
        $this->auth->isLoggedIn();

    	$side['title'] = "Data Transaksi";

        $data['transaksi'] = $this->transaksi_model->getDataTransaksi()->result();

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/data_transaksi', $data);
        $this->load->view('_include/footer');
    }
}
