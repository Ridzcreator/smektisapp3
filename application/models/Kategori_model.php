<?php
class Kategori_model extends CI_Model
{
    public function getMaster()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $query = $this->db->get();
        return $query;
    }
}