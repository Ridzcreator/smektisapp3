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

        $side['title'] = "Status";

        $data['master_status'] = $this->status_model->getMaster();

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/status', $data);
        $this->load->view('_include/footer');
    }

    public function tambahstatus()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $tambahstatus = array(
            'nama' => $this->input->post('status_nama'),
        );

        $id_status = $this->status_model->create($tambahstatus);

        $edit_status = array(
            'kode_status' => strtoupper(substr($tambahstatus['nama'], 0, 3) . $id_status)
        );

        $this->status_model->update($id_status, $edit_status);

        redirect('admin/status/index');
    }
}
