<?php
class Kategori_model extends CI_Model
{
    public function getMaster()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $query = $this->db->get();

        return $query->result();
    }

    public function getMasterOnBarang()
    {
        $this->db->select('
            kategori.id as id,
            kategori.nama as nama
        ');

        $this->db->from('kategori');
        $this->db->join('barang', 'kategori.id = barang.kategori_id');
        $this->db->group_by('kategori.id');
        $query = $this->db->get();

        return $query->result();
    }
}
