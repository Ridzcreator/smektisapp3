<?php
class Transaksi_model extends CI_Model
{
    public function getDataTransaksi($id = null, $date_start = null, $date_end = null)
    {
        $this->db->select('
        	*,
        	transaksi.id as t_id,
        	penyewa.id as p_id,
        	status.id as s_id,
        	status.nama as status_nama,
        	penyewa.nama as penyewa_nama
    	');
        $this->db->from('transaksi');
        $this->db->join('penyewa', 'penyewa_id = penyewa.id');
        $this->db->join('status', 'status_id = status.id');

        if (!is_null($date_start)) {
            $this->db->where('tanggal_pinjam >=', $date_start);
        }

        if (!is_null($date_end)) {
            $this->db->where('tanggal_pinjam <=', $date_end);
        }

        if (!is_null($id)) {
            $this->db->where('transaksi.id', $id);
            $query = $this->db->get();
            return $query->row();
        } else {
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function create($data)
    {
        $this->db->insert('transaksi', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('transaksi', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('transaksi');
    }

    public function getTransaksiSummaryByKategori($tahun = null) {
        $this->db->select('
            kategori.nama as nama,
            count(barang_pinjam.id) as total
        ');

        $this->db->from('kategori');
        $this->db->join('barang', 'kategori.id = barang.kategori_id');
        $this->db->join('barang_pinjam', 'barang.id = barang_pinjam.barang_id');
        $this->db->join('transaksi', 'barang_pinjam.transaksi_id = transaksi.id');
        $this->db->group_by('kategori.id');
        $this->db->order_by('kategori.nama', 'DESC');

        if (!is_null($tahun)) {
            $this->db->where('YEAR(transaksi.tanggal_pinjam) =', $tahun);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function getKategoriByBulan($tahun = null) {
        $this->db->select("
            MONTH(transaksi.tanggal_pinjam) as bulan,
            GROUP_CONCAT(kategori.nama SEPARATOR ',') as kategori
        ");
        $this->db->from('transaksi');
        $this->db->join('barang_pinjam', 'barang_pinjam.transaksi_id = transaksi.id');
        $this->db->join('barang', 'barang_pinjam.barang_id = barang.id');
        $this->db->join('kategori', 'barang.kategori_id = kategori.id');
        $this->db->group_by('bulan');

        if (!is_null($tahun)) {
            $this->db->where('YEAR(transaksi.tanggal_pinjam) =', $tahun);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function getTransaksiByKategori($tahun = null) {
        $this->db->select("
            kategori.nama as nama,
            MONTH(transaksi.tanggal_pinjam) as bulan,
            count(transaksi.id) as jumlah
        ");
        $this->db->from('kategori');
        $this->db->join('barang', 'kategori.id = barang.kategori_id');
        $this->db->join('barang_pinjam', 'barang.id = barang_pinjam.barang_id');
        $this->db->join('transaksi', 'barang_pinjam.transaksi_id = transaksi.id');
        $this->db->group_by(array('nama', 'bulan'));

        if (!is_null($tahun)) {
            $this->db->where('YEAR(transaksi.tanggal_pinjam) =', $tahun);
        }

        $query = $this->db->get();
        return $query->result();
    }
}
