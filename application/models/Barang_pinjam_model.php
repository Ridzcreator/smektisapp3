<?php
class Barang_pinjam_model extends CI_Model
{
    public function getDataBarang($user_id)
    {
        $this->db->select('*, barang.id as b_id, transaksi.id as t_id, barang_pinjam.id as bp_id');
        $this->db->from('barang_pinjam');
        $this->db->join('transaksi', 'barang_pinjam.transaksi_id = transaksi.id');
        $this->db->join('barang', 'barang_pinjam.barang_id = barang.id');
        $this->db->where("transaksi.user_id = $user_id");
        $query = $this->db->get();

        return $query->result();
    }

    public function create($data)
    {
        $this->db->insert('barang_pinjam', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function deleteByTransaksi($transaksi_id)
    {
        $this->db->where('transaksi_id', $transaksi_id);
        $this->db->delete('barang_pinjam');
    }
}
