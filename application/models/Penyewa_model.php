<?php
class Penyewa_model extends CI_Model
{
    public function getMaster()
    {
        $this->db->select('*');
        $this->db->from('penyewa');
        $query = $this->db->get();

        return $query->result();
    }
}
