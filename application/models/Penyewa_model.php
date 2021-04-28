<?php
class Penyewa_model extends CI_Model
{
    public function getMaster()
    {
        $this->db->select('*, 
        penyewa.id as p_id,
        penyewa.nama as nama_penyewa,
        transaksi.id as t_id
       ');
        $this->db->from('penyewa');
        $this->db->join('transaksi', 'transaksi.penyewa_id = penyewa.id');
        $query = $this->db->get();

        return $query->result();
    }
    public function create($data)
    {
        $this->db->insert('penyewa', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
}
