<?php
class Barang_model extends CI_Model
{
    public function getMaster()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $query = $this->db->get();
        return $query;
    }
}
