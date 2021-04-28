<?php
class Barang_model extends CI_Model
{
    public function getMaster()
    {
        $this->db->select('
        *, barang.id as b_id,
        barang.nama as nama_barang,
        kategori.id as k_id,
        kategori.nama as kategori_nama
        ');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori_id = kategori.id');
        $query = $this->db->get();

        return $query->result();
    }

    public function create($data)
    {
        $this->db->insert('barang', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
}
