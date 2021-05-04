<?php
class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('kategori_model');
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
        $data['master_kategori'] = $this->kategori_model->getMaster();

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/data_barang', $data);
        $this->load->view('_include/footer');
    }

    public function editbarang($b_id)
    {
        $inputbarang = array(
            'user_id' => $_SESSION['user_id'],
            'kategori_id' => $this->input->post('kategori_id'),
            'nama' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga_barang'),
            'stok' => $this->input->post('stok_barang'),
            'keterangan' => $this->input->post('keterangan_barang'),
        );

        $this->barang_model->update($b_id, $inputbarang);

        redirect('admin/barang/index');
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

        $barang_id = $this->barang_model->create($get);

        $config['upload_path'] = APPPATH. '../assets/img/product/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 204800;
        $config['file_name'] = $barang_id . '_image'; // 1_image

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image')){
            $error = array('error' => $this->upload->display_errors());
        }
        else{
            //file is uploaded successfully
            //now get the file uploaded data 
            $upload_data = $this->upload->data('file_name');

        }
            $ext = explode('.', $_FILES['image']['name']);

            $edit = array(
                'foto' => $barang_id . '_image' . $upload_data['file_type']
            );

            $this->barang_model->update($barang_id, $edit);

        redirect('admin/barang/index');
    }

    public function tambahkategoribarang()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $get = array(
            'nama' => $this->input->post('kategori_nama'),
        );

        $this->kategori_model->create($get);

        redirect('admin/barang/index');
    }

    public function destroy($id)
    {
        $this->barang_model->delete($id);

        redirect('admin/barang/index');
    }
}
