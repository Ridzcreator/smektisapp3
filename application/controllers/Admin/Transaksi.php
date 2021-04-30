<?php
class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('penyewa_model');
        $this->load->model('transaksi_model');
        $this->load->model('kategori_model');
        $this->load->model('barang_model');
        $this->load->model('status_model');
        $this->load->model('barang_pinjam_model');

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

        $side['title'] = "Data Transaksi";

        $data['master_penyewa'] = $this->penyewa_model->getMaster();
        $data['transaksi'] = $this->transaksi_model->getDataTransaksi();
        $data['barang_pinjam'] = $this->barang_pinjam_model->getDataBarang($_SESSION['user_id']);
        $data['master_kategori'] = $this->kategori_model->getMasterOnBarang();
        $data['master_barang'] = $this->barang_model->getMaster();
        $data['master_status'] = $this->status_model->getMaster();

        $this->load->view('_include/sidebar', $side);
        $this->load->view('admin/data_transaksi', $data);
        $this->load->view('_include/footer');
    }

    public function store()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $dataTransaksi = array(
            'user_id' => $_SESSION['user_id'],
            'penyewa_id' => $this->input->post('penyewa_id'),
            'status_id' => $this->input->post('status_id'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'durasi' => $this->input->post('durasi'),
            'jaminan' => $this->input->post('jaminan')
        );

        $transaksi_id = $this->transaksi_model->create($dataTransaksi);

        $barang_pinjam = array_count_values($this->input->post('barang_pinjam_ids'));
        foreach ($barang_pinjam as $key => $value) {
            $dataBarang = array(
                'transaksi_id' => $transaksi_id,
                'barang_id' => $key,
                'jumlah' => $value,
            );

            $this->barang_pinjam_model->create($dataBarang);
        }

        redirect('admin/transaksi/index');
    }

    public function edit($transaksi_id)
    {
        $dataTransaksi = array(
            'penyewa_id' => $this->input->post('penyewa_id' . $transaksi_id),
            'status_id' => $this->input->post('status_id' . $transaksi_id),
            'durasi' => $this->input->post('durasi' . $transaksi_id),
            'jaminan' => $this->input->post('jaminan' . $transaksi_id)
        );

        $this->transaksi_model->update($transaksi_id, $dataTransaksi);

        if ($barang_pinjam = array_count_values($this->input->post('barang_pinjam_ids'))) {
            $this->barang_pinjam->deleteByTransaksi($transaksi_id);

            foreach ($barang_pinjam as $key => $value) {
                $dataBarang = array(
                    'transaksi_id' => $transaksi_id,
                    'barang_id' => $key,
                    'jumlah' => $value,
                );

                $this->barang_pinjam_model->create($dataBarang);
            }
        }

        redirect('admin/transaksi/index');
    }

    public function destroy($id)
    {
        $this->transaksi_model->delete($id);

        redirect('admin/transaksi/index');
    }

    public function selesai($id)
    {
        $date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));

        $dataTransaksi = array(
            'tanggal_kembali' => $date->format('Y-m-d H:i:s'),
        );

        $this->transaksi_model->update($id, $dataTransaksi);

        redirect('admin/transaksi/index');
    }
}
