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

    public function get()
    {
        $this->db->select('
            *,
	        penyewa.id as p_id,
	        transaksi.id as t_id
   		');

        $this->db->from('penyewa');
        $this->db->join('transaksi', 'penyewa.id = transaksi.penyewa_id');
        $query = $this->db->get();

        return $query->result();
    }

    public function getPenyewaNearTransaksi()
    {
        $this->db->select('
            penyewa.id as id,
            penyewa.user_id as user_id,
            penyewa.nama as nama,
            penyewa.alamat as alamat,
            penyewa.email as email,
            penyewa.no_telp as no_telp,
            penyewa.media_sosial as media_sosial,
            penyewa.jenis_kelamin as jenis_kelamin,
            MIN(TIMESTAMPDIFF(HOUR,NOW(), DATE_ADD(transaksi.tanggal_pinjam, INTERVAL transaksi.durasi DAY))) AS time_remain,
        ');

        $this->db->from('penyewa');
        $this->db->join('transaksi', 'penyewa.id = transaksi.penyewa_id', 'left');
        $this->db->where('transaksi.tanggal_kembali', NULL, TRUE);
        $this->db->group_by('penyewa.id');
        $query = $this->db->get();

        return $query->result();
    }

    public function create($data)
    {
        $this->db->insert('penyewa', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('penyewa', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penyewa');
    }
}
