<?php
class Status_model extends CI_Model
{
    public function getMaster()
    {
        $this->db->select('*');
        $this->db->from('status');
        $query = $this->db->get();
        return $query;
    }
}