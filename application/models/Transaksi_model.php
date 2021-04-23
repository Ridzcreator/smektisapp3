<?php
class Transaksi_model extends CI_Model
{
    public function getDataTransaksi()
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
        $query = $this->db->get();
        return $query;
    }

    public function create($data) {
    	$this->db->insert('transaksi', $data);
    }

}