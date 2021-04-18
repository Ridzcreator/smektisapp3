<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// load auth controller
    	require (APPPATH.'controllers/Auth.php');
        $this->auth = new Auth(); 
	}

    public function index()
    {
    	// verifikasi apakah user sudah login
        $this->auth->isLoggedIn();

    	$side['title'] = "Dashboard";

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/dashboard');
        $this->load->view('_include/footer');
    }
}
