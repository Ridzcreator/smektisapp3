<?php
class Transaksi_model extends CI_Model
{
    public function getDataTransaksi($id = null, $date_start = null, $date_end = null)
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
        
        // $this->db->where('transaksi.tanggal_kembali', NULL, FALSE);

        // if (!is_null($kategori)) {
        //     $this->db->where_in('username', $names);
        //     # code...
        // }

        if (!is_null($date_start)) {
            $this->db->where('tanggal_pinjam >=', $date_start);
        }

        if (!is_null($date_end)) {
            $this->db->where('tanggal_pinjam <=', $date_end);
        }

        if (!is_null($id)) {
            $this->db->where('transaksi.id', $id);
            $query = $this->db->get();
            return $query->row();
        } else {
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function create($data)
    {
        $this->db->insert('transaksi', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('transaksi', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('transaksi');
    }
}
