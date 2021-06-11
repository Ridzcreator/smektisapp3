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

        foreach ($data['penyewa'] as $key => $data_penyewa) {
            $data_penyewa->barang = $this->penyewa_model->getPenyewaNearTransaksiDetail($data_penyewa->id, $data_penyewa->time_remain);
        }

        $data['other_penyewa'] = $this->penyewa_model->getPenyewaFreeTransaksi();

        $penyewa_ids = [];
        foreach ($data['penyewa'] as $key => $penyewa) {
            array_push($penyewa_ids, $penyewa->id);
        }

        foreach ($data['other_penyewa'] as $key => $penyewa) {
            if (!in_array($penyewa->id, $penyewa_ids)) {
                array_push($data['penyewa'], $penyewa);
            }
        }

        // return print("<pre>".print_r($data['penyewa'], true)."</pre>");

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

        $id_penyewa = $this->penyewa_model->create($inputpenyewa);

        $edit_penyewa = array(
            'kode_penyewa' => strtoupper(substr($inputpenyewa['nama'], 0, 3) . $id_penyewa)
        );

        $this->penyewa_model->update($id_penyewa, $edit_penyewa);

        redirect('admin/penyewa/index');
    }

    public function destroy($id)
    {
        $this->penyewa_model->delete($id);

        redirect('admin/penyewa/index');
    }
}
