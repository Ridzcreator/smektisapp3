<?php
class Status_model extends CI_Model
{
    public function getMaster()
    {
        $this->db->select('*');
        $this->db->from('status');
        $query = $this->db->get();

        return $query->result();
    }

    public function create($data)
    {
        $this->db->insert('status', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('status', $data);
    }
}
