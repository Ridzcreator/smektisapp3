<?php
class User_model extends CI_Model
{
    public function getUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();

        return $query->result();
    }
}