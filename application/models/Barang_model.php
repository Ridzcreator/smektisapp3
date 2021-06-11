<?php
class Barang_model extends CI_Model
{
    public function getMaster()
    {
        $this->db->select('
        	barang.id as id,
        	barang.kategori_id as kategori_id,
            barang.kode_barang,
        	barang.nama as nama,
        	barang.stok as stok,
        	(barang.stok - sum(case when transaksi.tanggal_kembali is null then barang_pinjam.jumlah else 0 end)) as status
    	');
        $this->db->from('barang');
        $this->db->join('barang_pinjam', 'barang.id = barang_pinjam.barang_id', 'left');
        $this->db->join('transaksi', 'transaksi.id = barang_pinjam.transaksi_id', 'left');
        $this->db->group_by('barang.id');
        $query = $this->db->get();

        return $query->result();
    }

    public function get()
    {
        $this->db->select('
	        barang.id as b_id,
            barang.kode_barang,
	        barang.nama as nama_barang,
	        barang.harga as harga,
	        barang.stok as stok,
	        barang.keterangan as keterangan,
	        kategori.id as k_id,
	        kategori.nama as kategori_nama,
	        (barang.stok - sum(case when transaksi.tanggal_kembali is null then barang_pinjam.jumlah else 0 end)) as status
        ');

        $this->db->from('barang');
        $this->db->join('kategori', 'kategori_id = kategori.id');
        $this->db->join('barang_pinjam', 'barang.id = barang_pinjam.barang_id', 'left');
        $this->db->join('transaksi', 'transaksi.id = barang_pinjam.transaksi_id', 'left');
        // $this->db->where('transaksi.tanggal_kembali', null, false);
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

    public function update($b_id, $data)
    {
        $this->db->where('id', $b_id);
        $this->db->update('barang', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('barang');
    }
}
