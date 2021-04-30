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

        $data['barang'] = $this->barang_model->get();

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/data_barang', $data);
        $this->load->view('_include/footer');
    }

    public function tambahbarang()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $get = array(
            'user_id' => $_SESSION['user_id'],
            'kategori_id' => $this->input->post('kategori_id'),
            'nama' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga_barang'),
            'stok' => $this->input->post('stok_barang'),
            'keterangan' => $this->input->post('keterangan_barang'),
        );

        $this->barang_model->create($get);

        redirect('admin/barang/index');
    }

    public function destroy($id)
    {
        $this->barang_model->delete($id);

        redirect('admin/barang/index');
    }
}
