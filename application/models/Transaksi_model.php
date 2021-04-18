<?php
class Transaksi_model extends CI_Model
{
    public function getDataTransaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $query = $this->db->get();
        return $query;
    }
}