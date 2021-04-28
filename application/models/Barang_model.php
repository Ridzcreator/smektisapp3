<?php
class Barang_model extends CI_Model
{
    public function getMaster()
    {
        $this->db->select('
        	barang.id as id,
        	barang.kategori_id as kategori_id,
        	barang.nama as nama,
        	barang.stok as stok,
        	(barang.stok - sum(barang_pinjam.jumlah)) as status
    	');
        $this->db->from('barang');
        $this->db->join('barang_pinjam', 'barang.id = barang_pinjam.barang_id', 'left');
        $this->db->join('transaksi', 'transaksi.id = barang_pinjam.transaksi_id', 'left');
        $this->db->where('transaksi.tanggal_kembali', null, false);
        $this->db->group_by('barang.id');
        $query = $this->db->get();

        return $query->result();
    }

    public function get()
    {
        $this->db->select('
	        barang.id as b_id,
	        barang.nama as nama_barang,
	        barang.harga as harga,
	        barang.stok as stok,
	        barang.keterangan as keterangan,
	        kategori.id as k_id,
	        kategori.nama as kategori_nama,
	        (barang.stok - sum(barang_pinjam.jumlah)) as status
        ');

        $this->db->from('barang');
        $this->db->join('kategori', 'kategori_id = kategori.id');
        $this->db->join('barang_pinjam', 'barang.id = barang_pinjam.barang_id', 'left');
        $this->db->join('transaksi', 'transaksi.id = barang_pinjam.transaksi_id', 'left');
        $this->db->where('transaksi.tanggal_kembali', null, false);
        $this->db->group_by('barang.id');
        $query = $this->db->get();

        return $query->result();
    }

    public function create($data)
    {
        $this->db->insert('barang', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
}
