<?php
class Transaksi_model extends CI_Model
{
    public function getDataTransaksi()
    {
        $this->db->select('*, status.nama as status_nama, penyewa.nama as penyewa_nama');
        $this->db->from('transaksi');
        $this->db->join('penyewa', 'penyewa_id = penyewa.id');
        $this->db->join('status', 'status_id = status.id');
        $query = $this->db->get();
        return $query;
    }
}