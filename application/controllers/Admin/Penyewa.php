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
        $data['penyewa'] = $this->penyewa_model->getPenyewaNearTransaksi();

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/data_penyewa', $data);
        $this->load->view('_include/footer');
    }

    public function edit($id)
    {
        $inputpenyewa = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp'),
            'media_sosial' => $this->input->post('media_sosial'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        );

        $this->penyewa_model->update($id, $inputpenyewa);

        redirect('admin/penyewa/index');
    }

    public function save()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $inputpenyewa = array(
            'user_id' => $_SESSION['user_id'],
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp'),
            'media_sosial' => $this->input->post('media_sosial'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        );

        $this->penyewa_model->create($inputpenyewa);

        redirect('admin/penyewa/index');
    }

    public function destroy($id)
    {
        $this->penyewa_model->delete($id);

        redirect('admin/penyewa/index');
    }
}
